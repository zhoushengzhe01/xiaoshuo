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
    public function __construct()
    {
        parent::__construct();

        self::verifyUser();
    }

    //分类
    public function getList(Request $request, $category_id)
    {
        $category_id = intval($category_id);
        if(empty($category_id))
        {
            return self::error('错误入口');
        }

        //分类名称
        $category = FictionsCategory::getCategory(['id'=>$category_id]);


        $fictions = Fictions::where('category_id', '=', $category_id)->paginate(6);

        $data = [
            'website'=>self::$website,
            'user'=>self::$user,
            'category'=>$category,
            'category_id'=>$category_id,
            'fictions'=>$fictions,
        ];

        return view(self::$website->template.'.list', $data);

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
            'user'=>self::$user,
            'fictions'=>$fictions,
        ];

        return view(self::$website->template.'.ranking', $data);
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
            'user'=>self::$user,
            'word'=>$word,
            'fictions'=>$fictions,
        ];

        return view(self::$website->template.'.search', $data);
    }

    //作者作品
    public function getAuthor(Request $request)
    {

        $word = urldecode($request->input('word'));
        
        if(empty($word))
        {
            return self::info('请输入搜索内容');
        }
        
        $fictions = Fictions::where('author', 'like', '%'.$word.'%')->paginate(6);

        $data = [
            'website'=>self::$website,
            'user'=>self::$user,
            'word'=>$word,
            'fictions'=>$fictions,
        ];

        return view(self::$website->template.'.author', $data);
    }
}
