<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use App\Model\Users;
use App\Model\Website;
use App\Model\WebsiteDomain;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
    
    protected static $website;

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
}
