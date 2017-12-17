<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class ListController extends Controller
{
    //分类
    public function getList(Request $request)
    {
        die("首页");
    }

    //排行
    public function getRanking(Request $request, fiction_id)
    {
        die("详细页");
    }

    //搜索
    public function getSearch(Request $request, fiction_id, $catalog_id)
    {
        die("阅读页");
    }
}
