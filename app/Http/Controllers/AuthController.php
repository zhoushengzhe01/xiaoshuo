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

class AuthController extends Controller
{
    //推出登陆
    public function getLogout(Request $request)
    {
        die("首页");
    }
    
    //登陆
    public function getLogin(Request $request)
    {
        $data = [
            'website'=>self::$website,
            'user'=>[],
        ];
        
        return view('dome1.login', $data);
    }

    //登陆验证
    public function postLogin(Request $request)
    {
        die("阅读页");
    }

    //注册
    public function getRegister(Request $request)
    {
        $data = [
            'website'=>self::$website,
            'user'=>[],
        ];
        
        return view('dome1.register', $data);
        
    }

    //注册验证
    public function postRegister(Request $request)
    {
        die;
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

        $user = Users::getUser(['username'=>$username]);
        if(!empty($user))
        {
            return self::error('对不起用户名已经存在');
        }
        
        //插入数据
        $user = new Users;
        $user->username = $username;
        $user->nickname = $nickname;
        $user->password = $password;
        $user->setpassword = $setpassword;
        $user->email = $email;
        $user->qq = $qq;
        $user->sex = $sex;
        
        if($user->save())
        {
            return self::success('注册成功', self::$website->site.'/login');
        }
    }
}
