<?php
namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use Storage;
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
use App\Model\UsersLoginLog;
use App\Model\UsersMessage;
use App\Model\UsersSeting;
use App\Model\Website;
use App\Model\WebsiteDomain;
use Hash;

class RecommendController extends Controller
{
    //我的收藏
    public function getRecommend(Request $request, $fictions_id)
    {
        
        if(self::verifyUser()!==true){
             return self::info('你还没有登陆，请登陆', '/login');
        }
        if(empty($fictions_id))
        {
            return self::error('错误入口');
        }
       
        //每天推荐的次数
        $count = FictionsRecommend::where('user_id', '=', self::$user->id)->where('created_at', '>' ,date('Y-m-d').' 00:00:00')->count();
        if($count >= self::$user->level->recommend)
        {
            return self::info('今日推荐次数已满');
        }
        
        $fiction = Fictions::getFiction(['id'=>$fictions_id]);
        if(empty($fiction))
        {
            return self::info('找不到小说');
        }
        //检测是否推荐过
        $recommend = FictionsRecommend::where('user_id', '=', self::$user->id)->where('fiction_id', '=', $fictions_id)->where('created_at', '>' ,date('Y-m-d').' 00:00:00')->count();
        if(!empty($recommend))
        {
            return self::info('今天你已经推荐过了');
        }

        $fiction->all_recommend = $fiction->all_recommend + 1;
        $fiction->year_recommend = $fiction->year_recommend + 1;
        $fiction->month_recommend = $fiction->month_recommend + 1;
        $fiction->week_recommend = $fiction->week_recommend + 1;
        $fiction->save();

        $recommend = new FictionsRecommend();
        $recommend->user_id = self::$user->id;
        $recommend->fiction_id = $fiction->id;
        $recommend->fiction_title = $fiction->title;

        if($recommend->save())
        {
            return self::success('推荐成功');
        }
        else
        {
            return self::error('推荐失败');
        }
    }  
}