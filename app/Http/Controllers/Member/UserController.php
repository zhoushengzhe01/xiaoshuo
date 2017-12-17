<?php
namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Requests;

class UserController extends Controller
{
    //我的收藏
    public function getBookcase(Request $request)
    {
        die("首页");
    }

    //我的资料
    public function getUserinfo(Request $request)
    {
        die("详细页");
    }

    //修改我的资料
    public function getUseredit(Request $request)
    {
        die("阅读页");
    }

    //提交修改资料
    public function postUseredit(Request $request)
    {
        die("阅读页");
    }

    //修改头像
    public function getSetavatar(Request $request)
    {
        die("阅读页");
    }

    //提交修改头像
    public function postSetavatar(Request $request)
    {
        die("阅读页");
    }

    //修改密码
    public function getPassedit(Request $request)
    {
        die("阅读页");
    }

    //提交修改密码
    public function postPassedit(Request $request)
    {
        die("阅读页");
    }
    
}
