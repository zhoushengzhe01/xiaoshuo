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
use App\Model\UsersLogin_log;
use App\Model\UsersMessage;
use App\Model\UsersSeting;
use App\Model\Website;
use App\Model\WebsiteDomain;
use Hash;

class CollectController extends Controller
{
    //我的收藏
    public function getCollects(Request $request)
    {
        //登录
        if(self::verifyUser()!==true){
            return self::info('你还没有登陆，请登陆', '/login');
        }
        
        $fictions = Fictions::where(['fictions_collect.user_id'=>self::$user->id] )
            ->leftJoin('fictions_collect', 'fictions.id', '=', 'fictions_collect.fiction_id')
            ->select('fictions.*', 'fictions_collect.catalog_id', 'fictions_collect.catalog_title', 'fictions_collect.id as collect_id');

        $count = $fictions->count();
        
        $fictions = $fictions->paginate(20);

        $data = [
            'website'=>self::$website,
            'user'=>self::$user,
            'fictions'=>$fictions,
            'count'=>$count,
            'template'=>self::$website->template,
        ];

        return view('member.collect', $data);
    }
    //收藏操作
    public function actionCollect(Request $request, $action)
    {   
        //登录
        if(self::verifyUser()!==true)
            return self::info('你还没有登陆，请登陆', '/login');

        //接收数据
        if($action=='add')
        {
            $fiction_id = trim($request->input('fiction_id'));
            $catalog_id = trim($request->input('catalog_id'));
            if(empty($fiction_id) && empty($catalog_id))
            {
                return self::error('错误入口');
            }
            
            //收藏小说
            if(!empty($fiction_id))
            {
                //验证
                $collect = FictionsCollect::getCollect(['fiction_id'=>$fiction_id]);
                if(!empty($collect))
                {
                    return self::info('已经存在了');
                }
                $count = FictionsCollect::where('user_id', '=', self::$user->id)->count();
                if($count>self::$user->level->collect)
                {
                    return self::info('你的书架已满', '/collect');
                }

                //查找图书
                $fiction = Fictions::getFiction(['id'=>$fiction_id]);
                if(empty($fiction))
                {
                    return self::info('不存在的小说');
                }
    
                $collect = new FictionsCollect;
                $collect->user_id = self::$user->id;
                $collect->fiction_id = $fiction->id;
                $collect->fiction_title = $fiction->title;
                $collect->catalog_id = '';
                $collect->catalog_title = '';
                $collect->is_delete = 0;
                
                if($collect->save())
                {
                    return self::success('加入成功');
                }
                else
                {
                    return self::error('啊计入失败');
                }
            }
            else if(!empty($catalog_id))
            {
                //验证
                $catalog = FictionsCatalog::getCatalog(['id'=>$catalog_id]);
                if(empty($catalog))
                {
                    return self::info('不存在的章节');
                }
                $collect = FictionsCollect::getCollect(['fiction_id'=>$catalog->fiction_id]);
                if(!empty($collect))
                {
                    $collect->catalog_id = $catalog->id;
                    $collect->catalog_title = $catalog->title;
                    if($collect->save())
                    {
                        return self::success('加入成功');
                    }
                    else
                    {
                        return self::error('加入成功');
                    }
                }
                else
                {
                    //未收藏过的小说
                    $count = FictionsCollect::where('user_id', '=', self::$user->id)->count();
                    if($count>self::$user->level->collect)
                    {
                        return self::info('你的书架已满', '/collect');
                    }
                    //查找图书
                    $fiction = Fictions::getFiction(['id'=>$fiction_id]);
                    if(empty($fiction))
                    {
                        return self::info('不存在的小说');
                    }

                    $collect = new FictionsCollect;
                    $collect->user_id = self::$user->id;
                    $collect->fiction_id = $fiction->id;
                    $collect->fiction_title = $fiction->title;
                    $collect->catalog_id = $catalog->id;
                    $collect->catalog_title = $catalog->title;
                    $collect->is_delete = 0;
                    if($collect->save())
                    {
                        return self::success('加入成功');
                    }
                    else
                    {
                        return self::error('加入成功');
                    }
                }
            }

        }
        elseif($action=='del')
        {
            
            //删除小说
            $id = trim($request->input('id'));
            if(empty($id))
            {
                return self::error('错误入口');
            }
           
            if(is_array($id))
            {
                $result = FictionsCollect::where('id','=',$id)->whereIn('id', $id);
                if($result)
                {
                    return self::success('删除成功');
                }
                else
                {
                    return self::error('删除失败');
                }
            }
            else
            {
                
                $result = FictionsCollect::delCollect(['user_id'=>self::$user->id, 'id'=>$id]);

                if($result)
                {
                    return self::success('删除成功','/collect');
                }
                else
                {
                    return self::error('删除失败');
                }
            }
        }
        else
        {
            return self::error('错误入口');
        }
    }    
}