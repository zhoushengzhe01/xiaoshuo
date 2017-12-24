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

class HistoryController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        self::verifyUser();
    }

    //列表
    public function getHistorys(Request $request)
    {
        $uv = md5($request->server('HTTP_COOKIE') + $request->server('REMOTE_ADDR'));

        $fictions = Fictions::where(['fictions_history.uv'=>$uv] )
            ->leftJoin('fictions_history', 'fictions.id', '=', 'fictions_history.fiction_id')
            ->select('fictions.*', 'fictions_history.catalog_id', 'fictions_history.catalog_title', 'fictions_history.id as history_id');

        $count = $fictions->count();
        
        $fictions = $fictions->paginate(20);

        $data = [
            'website'=>self::$website,
            'user'=>self::$user,
            'fictions'=>$fictions,
            'count'=>$count,
        ];
        
        return view(self::$website->template.'.history', $data);
    }

    //删除
    public function delHistorys(Request $request, $history_id)
    {
        $uv = md5($request->server('HTTP_COOKIE') + $request->server('REMOTE_ADDR'));
        if(empty($history_id))
            return self::error('错误入口');
        
        $result = FictionsHistory::where(['id','=',$history_id])->where('uv','=',$uv)->delete();

        if($result)
        {
            return self::success('删除成功', '/history');
        }
        else
        {
            return self::success('删除失败');
        }
        
    }
}
