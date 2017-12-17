<?php
namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Requests;

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
        die("详细页");
    }

    //登陆验证
    public function postLogin(Request $request)
    {
        die("阅读页");
    }

    //注册
    public function getRegister(Request $request)
    {
        die("阅读页");
    }

    //注册验证
    public function postRegister(Request $request)
    {
        die("阅读页");
    }
}
