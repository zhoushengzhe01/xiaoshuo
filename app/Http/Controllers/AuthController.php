<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\Fictions;
use App\Model\FictionsCatalog;
use App\Model\FictionsCatalog_content;
use App\Model\FictionsCategory;
use App\Model\FictionsCollect;
use App\Model\FictionsHistory;
use App\Model\FictionsRecommend;
use App\Model\Users;
use App\Model\UsersLevel;
use App\Model\UsersLogin_log;
use App\Model\UsersMessage;
use App\Model\UsersSeting;
use App\Model\Website;
use App\Model\WebsiteDomain;
use Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        self::verifyUser();
    }
    //推出登陆
    public function getLogout(Request $request)
    {
        $request->session()->put('userid', '');
        $request->session()->put('username', '');

        return self::success('退出成功', '/');
    }
    
    //登陆
    public function getLogin(Request $request)
    {
        $data = [
            'website'=>self::$website,
            'user'=>self::$user,
        ];
        
        return view(self::$website->template.'.login', $data);
    }

    //登陆验证
    public function postLogin(Request $request)
    {
        $username = trim($request->input('username'));
        $password = trim($request->input('password'));
        if(empty($username))
        {
            return self::error('请输入用户名');
        }
        if(empty($password))
        {
            return self::error('请输入密码');
        }
        //user
        $user = Users::getUser(['username'=>$username]);
        if(empty($user))
        {
            return self::error('用户名不存在');
        }
        if (!Hash::check($password, $user->password))
        {
            return self::error('用户名或密码错误');
        }
        
        //储层session
        $request->session()->put('userid', $user->id);
        $request->session()->put('username', $user->username);

        return self::success('登陆成功', '/userinfo');
    }

    //注册
    public function getRegister(Request $request)
    {
        $data = [
            'website'=>self::$website,
            'user'=>self::$user,
        ];
        
        return view(self::$website->template.'.register', $data);
        
    }

    //注册验证
    public function postRegister(Request $request)
    {
        //接收数据
        $username = trim($request->input('username'));
        $nickname = trim($request->input('nickname'));
        $password = trim($request->input('password'));
        $setpassword = trim($request->input('setpassword'));
        $email = trim($request->input('email'));
        $qq = trim($request->input('qq'));
        $sex = trim($request->input('sex'));

        //验证数据
        if(empty($username))
        {
            return self::error('请填写用户名');
        }
        if(empty($password))
        {
            return self::error('请填写密码');
        }
        if(empty($setpassword))
        {
            return self::error('请填写确认密码');
        }
        if(strlen($password)<6 || strlen($password)>18)
        {
            return self::error('密码必须大于6位数，小于18位数');
        }
        if($password!=$setpassword)
        {
            return self::error('两次密码输入不一样');
        }
        if(empty($email))
        {
            return self::error('请填写邮箱');
        }
        if(!preg_match("/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i", $email))
        {
            return self::error('请填写正确邮箱');
        }
        $user = Users::getUser(['username'=>$username]);
        if(!empty($user))
        {
            return self::error('对不起用户名已经存在');
        }
        //一个ip一天只能注册20次
        $count = Users::where('login_ip', '=', $request->getClientIp())->where('created_at', '>', date('Y-m-d').' 00:00:00')->count();
        if($count>=20)
        {
            return self::error('你已经注册多个了，不能在注册了。');
        }

        //插入数据
        $user = new Users();
        $user->username = $username;
        $user->nickname = $nickname;
        $user->password = bcrypt($password);
        $user->coin = 0;
        $user->email = $email;
        $user->qq = $qq;
        $user->sex = $sex;
        $user->level = 1;
        $user->login_ip = $request->getClientIp();
        $user->status = 1;
        if($user->save())
        {
            return self::success('注册成功', self::$website->site.'/login');
        }
    }
}
