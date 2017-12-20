<?php
namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
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

class UserController extends Controller
{

    public function __construct()
    {
        parent::__construct();

        //验证用户
        self::verifyUser();
    }
    //我的收藏
    public function getCollects(Request $request)
    {
        // $fictions = Fictions::where(['fictions_collect.user_id'=>self::$user->id] )
        //     ->leftJoin('fictions_collect', 'fictions.id', '=', 'fictions_collect.fiction_id')
        //     ->select('fictions.*')
        //     ->paginate(20);
        //     echo self::$user->id;
        //     die(self::$user->id);

        $collect = FictionsCollect::where('user_id','=',self::$user->id)->paginate(20);
        $data = [
            'website'=>self::$website,
            'user'=>self::$user,
            'collect'=>$collect,
        ];
        return view('dome1.member.collect', $data);
    }

    //我的资料
    public function getUserinfo(Request $request)
    {
        //die("详细页");
    }

    //修改我的资料
    public function getUseredit(Request $request)
    {
        //die("阅读页");
    }

    //提交修改资料
    public function postUseredit(Request $request)
    {
        //die("阅读页");
    }

    //修改头像
    public function getSetavatar(Request $request)
    {
        //die("阅读页");
    }

    //提交修改头像
    public function postSetavatar(Request $request)
    {
        //die("阅读页");
    }

    //修改密码
    public function getPassedit(Request $request)
    {
        //die("阅读页");
    }

    //提交修改密码
    public function postPassedit(Request $request)
    {
        //die("阅读页");
    }
    
}
