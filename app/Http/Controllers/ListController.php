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

class ListController extends Controller
{
    //分类
    public function getList(Request $request, $category_id)
    {
        $category_id = intval($category_id);
        if(empty($category_id))
        {
            return self::error('错误入口');
        }
        

        $data = [
            'website'=>self::$website,
            'user'=>[],
        ];

        return view('dome1.list', $data);
    }

    //排行
    public function getRanking(Request $request)
    {
        die("详细页");
    }

    //搜索
    public function getSearch(Request $request)
    {
        die("阅读页");
    }
}
