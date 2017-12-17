<?php
namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Requests;

class EmailController extends Controller
{
    //收件箱
    public function getInboxemail(Request $request)
    {
        die("首页");
    }

    //发件箱
    public function getOutboxemail(Request $request)
    {
        die("详细页");
    }

    //发送邮件
    public function getSendemail(Request $request)
    {
        die("阅读页");
    }

    //发送邮件提交
    public function postSendemail(Request $request)
    {
        die("阅读页");
    }

}
