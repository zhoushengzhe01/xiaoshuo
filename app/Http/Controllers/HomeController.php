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
        //分类
        $category = FictionsCategory::getCategorys();

        //首页小说
        $index_fictions = Fictions::getFictions(['is_index'=>1], ['updated_at', 'desc'], 0, 5);

        //推荐小说
        $cat = [3,4,5];
        foreach($cat as $k=>$v){
            $recommend_fictions[$k] = Fictions::getFictions(['is_recommend'=>1, 'category_id'=>$v], ['updated_at', 'desc'], 0, 7);
        }

        //排行榜
        $click_fictions = Fictions::getFictions([], ['all_click', 'desc'], 0, 10);
        $recomm_fictions = Fictions::getFictions([], ['all_recommend', 'desc'], 0, 10);
        $collect_fictions = Fictions::getFictions([], ['all_collect', 'desc'], 0, 10);
        $state_fictions = Fictions::getFictions(['state'=>2], ['updated_at', 'desc'], 0, 10);
        
        //查找分类漫画
        foreach($category as $k=>$v){
            $category_fictions[$k] = $v;
            $category_fictions[$k]['list'] = Fictions::getFictions(['category_id'=>$v->id], ['updated_at', 'desc'], 0, 10);
        }

        //数据
        $data = [
            'website'=>self::$website,
            'user'=>[],
            'category'=>$category,
            'index_fictions'=>$index_fictions,
            'recommend_fictions'=>$recommend_fictions,
            'click_fictions'=>$click_fictions,
            'recomm_fictions'=>$recomm_fictions,
            'collect_fictions'=>$collect_fictions,
            'state_fictions'=>$state_fictions,
            'category_fictions' => $category_fictions,
        ];

        return view('dome1.home', $data);
    }

    //详细页
    public function getBook(Request $request, $fiction_id)
    {
        //分类
        $category = FictionsCategory::getCategorys();

        if(empty($fiction_id))
            die("错误入口");
        
        $fiction = Fictions::getFiction(['id'=>$fiction_id]);
        if(empty($fiction))
            die("找不到小说");

        //查找章节
        $fiction['catalog'] = FictionsCatalog::getCatalogs(['fiction_id'=>$fiction->id], ['updated_at', 'asc']);
        $fiction['category_name'] = $category[$fiction['category_id']];

        $count = count($fiction['catalog']);
        for($i=($count-1) ; $i>($count-10) ; $i--){
            $newcatalog[] = $fiction['catalog'][$i];
        }
        $fiction['newcatalog'] = $newcatalog;

        //数据
        $data = [
            'website'=>self::$website,
            'user'=>[],
            'category'=>$category,
            'fiction'=>$fiction,
        ];

        return view('dome1.book', $data);
    }

    //阅读页
    public function getRead(Request $request, $fiction_id, $catalog_id)
    {
        //分类
        $category = FictionsCategory::getCategorys();

        if(empty($fiction_id) || empty($catalog_id))
            die("错误入口");
        
        $fiction = Fictions::getFiction(['id'=>$fiction_id]);
        if(empty($fiction))
            die("找不到小说");

        $catalog = FictionsCatalog::getCatalog(['id'=>$catalog_id]);
        if(empty($catalog))
            die("找不到章节");
        
        //查找内容
        $catalogcontent = FictionsCatalogContent::getCatalogContent(['fiction_id'=>$fiction_id, 'catalog_id'=>$catalog_id]);
        $catalog['content'] = $catalogcontent->content;

        
        $data = [
            'website'=>self::$website,
            'user'=>[],
            'category'=>$category,
            'catalog'=>$catalog,
        ];

        return view('dome1.read', $data);
    }
}
