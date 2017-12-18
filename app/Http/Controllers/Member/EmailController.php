<?php
namespace App\Http\Controllers\Member;

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
