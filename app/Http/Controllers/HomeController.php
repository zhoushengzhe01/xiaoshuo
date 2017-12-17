<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class HomeController extends Controller
{
    //首页
    public function getIndex(Request $request)
    {
        die("首页");
    }

    //详细页
    public function getBook(Request $request, fiction_id)
    {
        die("详细页");
    }

    //阅读页
    public function getRead(Request $request, fiction_id, $catalog_id)
    {
        die("阅读页");
    }
}
