<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use App\Model\UsersLogin_log;
use App\Model\UsersMessage;
use App\Model\UsersSeting;
use App\Model\Website;
use App\Model\WebsiteDomain;

class HomeController extends Controller
{
    //首页
    public function getIndex(Request $request)
    {
        $data = [
            'website'=>self::$website,
            'user'=>[],
            
        ];
        return view('dome1.home', $data);
    }

    //详细页
    public function getBook(Request $request, $fiction_id)
    {
        $fiction_id = intval($fiction_id);
        if(empty($fiction_id))
        {
            return self::error('错误入口');
        }
        
        $fiction = Fictions::getFiction(['id'=>$fiction_id]);
        if(empty($fiction))
        {
            return self::info('找不到小说');
        }

        //全部章节
        $fiction['catalog'] = FictionsCatalog::getCatalogs(['fiction_id'=>$fiction->id], ['updated_at', 'asc']);

        //最新章节
        $fiction['newcatalog'] = FictionsCatalog::getCatalogs(['fiction_id'=>$fiction->id], ['updated_at', 'desc'], 0, 9);

        //数据
        $data = [
            'website'=>self::$website,
            'user'=>[],
            'fiction'=>$fiction,
        ];

        return view('dome1.book', $data);
    }

    //阅读页
    public function getRead(Request $request, $fiction_id, $catalog_id)
    {
        $fiction_id = intval($fiction_id);
        $catalog_id = intval($catalog_id);
        if(empty($fiction_id) || empty($catalog_id))
        {
            return self::error('错误入口');
        }
        
        $fiction = Fictions::getFiction(['id'=>$fiction_id]);
        if(empty($fiction))
        {
            return self::info('找不到小说');
        }

        $catalog = FictionsCatalog::getCatalog(['fiction_id'=>$fiction_id,'id'=>$catalog_id]);
        if(empty($catalog))
        {
            return self::info('找不到章节');
        }

        //上一篇
        $upper_catalog = FictionsCatalog::where('fiction_id', '=', $fiction_id)->where('id', '<', $catalog_id)->orderBy('id','desc')->first();

        //下一篇
        $next_catalog = FictionsCatalog::where('fiction_id', '=', $fiction_id)->where('id', '>', $catalog_id)->orderBy('id','asc')->first();


        //查找内容
        $catalogcontent = FictionsCatalogContent::getCatalogContent(['fiction_id'=>$fiction_id, 'catalog_id'=>$catalog_id]);
        $catalog['content'] = $catalogcontent->content;
        
        $data = [
            'website'=>self::$website,
            'user'=>[],
            'fiction'=>$fiction,
            'catalog'=>$catalog,
            'upper_catalog'=>$upper_catalog,
            'next_catalog'=>$next_catalog,
        ];

        return view('dome1.read', $data);
    }
}
