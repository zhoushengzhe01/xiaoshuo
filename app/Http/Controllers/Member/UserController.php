<?php
namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Model\Fictions;
use App\Model\FictionsCatalog;
use App\Model\FictionsCatalogContent;
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

class UserController extends Controller
{

    public function __construct()
    {
        parent::__construct();

        //验证用户
        
    }
    
    //我的资料
    public function getUserinfo(Request $request)
    {
        //登录
        if(self::verifyUser()!==true)
        {
            return self::info('你还没有登陆，请登陆', '/login');
        }

        $data = [
            'website'=>self::$website,
            'user'=>self::$user,
        ];

        return view('dome1.member.userinfo', $data);
    }

    //修改我的资料
    public function getUseredit(Request $request)
    {
        //登录
        if(self::verifyUser()!==true)
        {
            return self::info('你还没有登陆，请登陆', '/login');
        }

        $data = [
            'website'=>self::$website,
            'user'=>self::$user,
        ];

        return view('dome1.member.useredit', $data);
    }

    //提交修改资料
    public function postUseredit(Request $request)
    {    
        //登录
        if(self::verifyUser()!==true)
        {
            return self::info('你还没有登陆，请登陆', '/login');
        }
        
        //接收数据
        $nickname = trim($request->input('nickname'));
        $email = trim($request->input('email'));
        $qq = trim($request->input('qq'));
        $msn = trim($request->input('msn'));
        $sex = trim($request->input('sex'));
        $website = trim($request->input('website'));
        $sign = trim($request->input('sign'));
        $intro = trim($request->input('intro'));

        //验证必填
        if(empty($email))
        {
            return self::error('请填写邮箱');
        }
        if(!preg_match("/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i", $email))
        {
            return self::error('请填写正确邮箱');
        }
        
        $user = Users::getUser(['id'=>self::$user->id]);
        $user->nickname = $nickname;
        $user->email = $email;
        $user->qq = $qq;
        $user->msn = $msn;
        $user->sex = $sex;
        $user->website = $website;
        $user->sign = $sign;
        $user->intro = $intro;
        if($user->save())
        {
            return self::success('修改成功');
        }
        else
        {   
            return self::error('修改失败');
        }        
    }

    //修改头像
    public function getSethead(Request $request)
    {
        //登录
        if(self::verifyUser()!==true)
        {
            return self::info('你还没有登陆，请登陆', '/login');
        }

        $data = [
            'website'=>self::$website,
            'user'=>self::$user,
        ];

        return view('dome1.member.sethead', $data);
    }

    //提交修改头像
    public function postSethead(Request $request)
    {
        //登录
        if(self::verifyUser()!==true)
        {
            return self::info('你还没有登陆，请登陆', '/login');
        }

        //获取网站
        $file = $request->file('photo');
        if ($file->isValid()) {

            $clientName = $file->getClientOriginalName();
            $tmpName = $file->getFileName();
            $realPath = $file->getRealPath();
            $extension = $file->getClientOriginalExtension();
            $mimeTye = $file->getMimeType();
            
            //验证
            if(!in_array($mimeTye, ['image/png', 'image/jpeg', 'image/gif']))
            {
                return self::info('图片格式不正确');
            }
            //验证图片格式
            $newName = "head_". self::$user->id .".".$extension;

            $path = $file->move('uploads',$newName);

            //修改数据
            $user = Users::getUser(['id'=>self::$user->id]);
            $user->head = $path;
            if($user->save())
            {
                return self::success('修改成功');
            }
            else
            {   
                return self::error('修改失败');
            }
        }
        else
        {
            return self::info('上传出错');
        }

    }

    //修改密码
    public function getPassedit(Request $request)
    {
        //登录
        if(self::verifyUser()!==true)
        {
            return self::info('你还没有登陆，请登陆', '/login');
        }

        $data = [
            'website'=>self::$website,
            'user'=>self::$user,
        ];

        return view('dome1.member.passedit', $data);
    }

    //提交修改密码
    public function postPassedit(Request $request)
    {
        //登录
        if(self::verifyUser()!==true)
        {
            return self::info('你还没有登陆，请登陆', '/login');
        }
        $oldpass = trim($request->input('oldpass'));
        $newpass = trim($request->input('newpass'));
        $repass = trim($request->input('repass'));
        
        
        if(empty($oldpass))
        {
            return self::error('请输入老密码');
        }
       
        if(empty($newpass))
        {
            return self::error('请输入新密码');
        }
        if(empty($repass))
        {
            return self::error('输入确认新密码');
        }
        if(strlen($newpass)<6 || strlen($newpass)>18)
        {
            return self::error('密码必须大于6位数，小于18位数');
        }
        if($newpass!=$repass)
        {
            return self::error('两次密码输入不一样');
        }
    
        $user = Users::getUser(['id'=>self::$user->id]);
        if (!Hash::check($oldpass, $user->password))
        {
            return self::error('老密码不正确');
        }
        $user->password = bcrypt($newpass);
        if($user->save())
        {
            return self::success('修改成功', self::$website->site.'/login');
        }
        
    }
    
}