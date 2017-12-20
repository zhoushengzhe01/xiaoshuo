<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use App\Model\Users;
use App\Model\UsersLevel;
use App\Model\Website;
use App\Model\WebsiteDomain;
use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
    
    protected static $website;
    protected static $user = [];

    public function __construct()
    {
        self::init();
    }

    //初始化方法
    public static function init()
    {
        //获取网站信息
        $domain = WebsiteDomain::getDomain(['name'=>trim($_SERVER['SERVER_NAME'])]);

        if(empty($domain))
            die('没有这个域名');

        self::$website = Website::getWebsite(['id'=>$domain->website_id]);
        if(empty(self::$website))
            die('找不到网站信息');
        
        if(self::$website->state==0)
            die('网站处于关闭状态');
        
        self::$website->domain = $domain->name;
        self::$website->site = 'http://'.$domain->name;
        self::$website->public = self::$website->site.'/dome01';
    }

    //验证用户
    public static function verifyUser()
    {
        $userid = Session::get('userid');
        $username = Session::get('username');
        if(empty($userid) || empty($username))
        {
            return self::info('你还没有登陆，请登陆', '/login');
        }
        $user = Users::getUser(['id'=>$userid, 'username'=>$username]);
        //等级
        $user->level = UsersLevel::getLevel(['id'=>$user->level]);
        
        self::$user = $user;
    }
    
    //提示页面
    public static function success($message='操作成功', $url='-1')
    {
        $data = [
            'website'=>self::$website,
            'message'=>$message,
            'url'=>$url,
        ];
        return view('success', $data);
    }

    public static function error($message='操作失败', $url='-1')
    {
        $data = [
            'website'=>self::$website,
            'message'=>$message,
            'url'=>$url,
        ];
        return view('error', $data);
    }

    public static function info($message='操作失败', $url='-1')
    {
        $data = [
            'website'=>self::$website,
            'message'=>$message,
            'url'=>$url,
        ];
        return view('info', $data);
    }
}
