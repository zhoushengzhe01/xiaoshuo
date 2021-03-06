<?php
namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

class MessageController extends Controller
{
    //收件箱
    public function getMessages(Request $request, $type)
    {
       
        //登录
        if(self::verifyUser()!==true)
        {
            return self::info('你还没有登陆，请登陆', '/login');
        }

        if($type=='in')
        {
            
            $message = UsersMessage::where('in_uid', '=', self::$user->id);

            $count = $message->count();
            $message = $message->paginate(20);
        }
        if($type=='out')
        {
            $message = UsersMessage::where('out_uid', '=', self::$user->id);
            
            $count = $message->count();
            $message = $message->paginate(20);
            
        }

        $data = [
            'website'=>self::$website,
            'user'=>self::$user,
            'message'=>$message,
            'count'=>$count,
            'type'=>$type,
            'template'=>self::$website->template,
        ];
        
        return view('member.messages', $data);
    }

    //查看邮箱
    public function getMessage(Request $request, $message_id)
    {
        //登录
        if(self::verifyUser()!==true)
        {
            return self::info('你还没有登陆，请登陆', '/login');
        }
        
        if(empty($message_id))
        {
            return self::info('错误入口');
        }

        $message = UsersMessage::getMessage(['id'=>$message_id]);

        $data = [
            'website'=>self::$website,
            'user'=>self::$user,
            'message'=>$message,
            'template'=>self::$website->template,
        ];

        return view('member.message', $data);
    }

    //删除邮箱
    public function delMessage(Request $request, $message_id)
    {
        //登录
        if(self::verifyUser()!==true)
        {
            return self::info('你还没有登陆，请登陆', '/login');
        }

        if(empty($message_id))
        {
            return self::info('错误入口');
        }

        if(UsersMessage::delMessage(['id'=>$message_id]))
        {
            return self::success('删除成功', '/messages/out');
        }
        else
        {
            return self::info('删除失败');
        }
        
    }

   

    //发送邮件
    public function getSendmessage(Request $request)
    {
        //登录
        if(self::verifyUser()!==true)
        {
            return self::info('你还没有登陆，请登陆', '/login');
        }

        $data = [
            'website'=>self::$website,
            'user'=>self::$user,
            'template'=>self::$website->template,
        ];

        return view('member.sendmessage', $data);
    }

    //发送邮件提交
    public function postSendmessage(Request $request)
    {
        //登录
        if(self::verifyUser()!==true)
        {
            return self::info('你还没有登陆，请登陆', '/login');
        }
        //接收数据
        $username = trim($request->input('username'));
        $title = trim($request->input('title'));
        $content = trim($request->input('content')); 

        if(empty($username))
        {
            return self::info('请填写收件人ID');
        }
        if(empty($title))
        {
            return self::info('请填写标题');
        }
        if(empty($content))
        {
            return self::info('请填写内容');
        }

        //检测发送条数
        $count = UsersMessage::where('out_uid', '=', self::$user->id)->count();
        if($count > self::$user->level->message)
        {
            return self::info('邮箱已满，请删除不需要邮件。', '/outmessage');
        }
        
        $in_user = Users::getUser(['username'=>$username]);
        if(empty($in_user))
        {
            return self::info('收件人不存在。');
        }
        
        $message = new UsersMessage;
        $message->title = $title;
        $message->content = $content;
        $message->out_uid =$in_user->id;
        $message->out_name = $in_user->username;
        $message->in_uid = self::$user->id;
        $message->in_name = self::$user->username;
        $message->state = 1;
        if($message->save())
        {
            return self::success('发送成功', self::$website->site.'/outmessage');
        }
        else
        {
            return self::success('发送失败');
        }

    }

    
}
