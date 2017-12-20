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

class ListController extends Controller
{
    //分类
    public function getList(Request $request, $category_id)
    {
        $category_id = intval($category_id);
        if(empty($category_id))
        {
            return self::error('错误入口');
        }

        $fictions = Fictions::where('category_id', '=', $category_id)->paginate(6);

        $data = [
            'website'=>self::$website,
            'user'=>[],
            'category_id'=>$category_id,
            'fictions'=>$fictions,
        ];

        return view('dome1.list', $data);
    }

    //排行
    public function getRanking(Request $request, $type)
    {
        $order = ['all_click','month_click','week_click','all_recommend','month_recommend','week_recommend','all_collect','month_collect','week_collect','created_at','updated_at','state'];
        if(empty($order[$type]))
        {
            return self::error('错误入口');
        }

        if($type==11)
        {
            $fictions = Fictions::where('state', '=', 2)->orderBy('updated_at', 'desc')->paginate(25);
        }
        else
        {
            $fictions = Fictions::orderBy($order[$type], 'desc')->paginate(25);
        }
        

        $data = [
            'website'=>self::$website,
            'user'=>[],
            'fictions'=>$fictions,
        ];

        return view('dome1.ranking', $data);
    }

    //搜索
    public function getSearch(Request $request)
    {
        $word = trim($request->input('word'));
        
        if(empty($word))
        {
            return self::info('请输入搜索内容');
        }
        
        $fictions = Fictions::where('title', 'like', '%'.$word.'%')->paginate(6);
        
        $data = [
            'website'=>self::$website,
            'user'=>[],
            'word'=>$word,
            'fictions'=>$fictions,
        ];

        return view('dome1.search', $data);
    }

    //作者作品
    public function getAuthor(Request $request)
    {
        $word = trim($request->input('word'));
        
        if(empty($word))
        {
            return self::info('请输入搜索内容');
        }
        
        $fictions = Fictions::where('author', 'like', '%'.$word.'%')->paginate(6);

        $data = [
            'website'=>self::$website,
            'user'=>[],
            'word'=>$word,
            'fictions'=>$fictions,
        ];

        return view('dome1.author', $data);
    }
}
