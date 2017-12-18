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

class HomeController extends Controller
{
    //首页
    public function getIndex(Request $request)
    {
        $website = "okok";
        //$fictions = Fictions::getFictions([], ['id', 'desc'], 0, 2);

        //Fictions::putFiction(['id'=>912], ['title'=>'龙符']);

        //print_r($fictions->toArray());
        //return view('dome1.home')->with($with_paras);
        return view('dome1.home', ['website' => 'Samantha']);
    }

    //详细页
    public function getBook(Request $request, $fiction_id)
    {
        die("详细页");
    }

    //阅读页
    public function getRead(Request $request, $fiction_id, $catalog_id)
    {
        die("阅读页");
    }
}
