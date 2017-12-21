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


class UserController extends Controller
{

    public function __construct()
    {
        parent::__construct();

        //验证用户
        
    }
    //我的收藏
    public function getCollects(Request $request)
    {
        //登录
        if(self::verifyUser()!==true)
        {
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
        ];

        return view('dome1.member.collect', $data);
    }
    //收藏操作
    public function actionCollect(Request $request, $action)
    {   
        //登录
        if(self::verifyUser()!==true)
        {
            return self::info('你还没有登陆，请登陆', '/login');
        }

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
                    return self::success('删除成功');
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

    //我的资料
    public function getUserinfo(Request $request)
    {
        //登录
        if(self::verifyUser()!==true)
        {
            return self::info('你还没有登陆，请登陆', '/login');
        }

        $data = [
            'website'=>self::$website,
            'user'=>self::$user,
        ];

        return view('dome1.member.userinfo', $data);
    }

    //修改我的资料
    public function getUseredit(Request $request)
    {
        //登录
        if(self::verifyUser()!==true)
        {
            return self::info('你还没有登陆，请登陆', '/login');
        }

        $data = [
            'website'=>self::$website,
            'user'=>self::$user,
        ];

        return view('dome1.member.useredit', $data);
    }

    //提交修改资料
    public function postUseredit(Request $request)
    {    
        //登录
        if(self::verifyUser()!==true)
        {
            return self::info('你还没有登陆，请登陆', '/login');
        }
        
        //接收数据
        $nickname = trim($request->input('nickname'));
        $email = trim($request->input('email'));
        $qq = trim($request->input('qq'));
        $msn = trim($request->input('msn'));
        $sex = trim($request->input('sex'));
        $website = trim($request->input('website'));
        $sign = trim($request->input('sign'));
        $intro = trim($request->input('intro'));

        //验证必填
        if(empty($email))
        {
            return self::error('请填写邮箱');
        }
        if(!preg_match("/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i", $email))
        {
            return self::error('请填写正确邮箱');
        }
        
        $user = Users::getUser(['id'=>self::$user->id]);
        $user->nickname = $nickname;
        $user->email = $email;
        $user->qq = $qq;
        $user->msn = $msn;
        $user->sex = $sex;
        $user->website = $website;
        $user->sign = $sign;
        $user->intro = $intro;
        if($user->save())
        {
            return self::success('修改成功');
        }
        else
        {   
            return self::error('修改失败');
        }        
    }

    //修改头像
    public function getSethead(Request $request)
    {
        //登录
        if(self::verifyUser()!==true)
        {
            return self::info('你还没有登陆，请登陆', '/login');
        }

        $data = [
            'website'=>self::$website,
            'user'=>self::$user,
        ];

        return view('dome1.member.sethead', $data);
    }

    //提交修改头像
    public function postSethead(Request $request)
    {
        //登录
        if(self::verifyUser()!==true)
        {
            return self::info('你还没有登陆，请登陆', '/login');
        }

            
        $file = $request->file('photo');

        // 文件是否上传成功
        if ($file->isValid()) {
            
            // 获取文件相关信息
            $originalName = $file->getClientOriginalName(); // 文件原名
            $ext = $file->getClientOriginalExtension();     // 扩展名
            $realPath = $file->getRealPath();   //临时文件的绝对路径
            $type = $file->getClientMimeType();     // image/jpeg
            
            // 上传文件
            $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
            // 使用我们新建的uploads本地存储空间（目录）
            die;
            $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
            var_dump($bool);

        }

        // if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
           
        //     $photo = $request->file('photo');
        //     $extension = $photo->extension();
        //     die('okok');
        //     //$store_result = $photo->store('photo');
            
        //     $store_result = $photo->storeAs('photo', 'test.jpg');
        //     $output = [
        //         'extension' => $extension,
        //         'store_result' => $store_result
        //     ];
        //     print_r($output);exit();
        // }
        // exit('未获取到上传文件或上传过程出错');

    }

    //修改密码
    public function getPassedit(Request $request)
    {
        //die("阅读页");
    }

    //提交修改密码
    public function postPassedit(Request $request)
    {
        //die("阅读页");
    }
    
}