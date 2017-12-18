<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class FictionsCategory extends Model
{
    protected $table = 'fictions_category';
    
    //获取列表
    public static function getCategorys($where=[], $order=[], $offset=0, $limit='')
    {
        $categorys = self::where('id', '<>', '0');

        if(!empty($where))
        {
            $categorys = $categorys->where($where);
        }

        if(!empty($order))
        {
            $categorys = $categorys->orderBy($order[0], $order[1]);
        }

        if(!empty($limit))
        {
            $categorys = $categorys->offset($offset)->limit($limit);
        }
   
        $categorys = $categorys->get();

        if(empty($categorys))
        {
            return false;
        }else
        {
            return $categorys;
        }
    }

    //获取单个
    public static function getCategory($where=[], $order=[])
    {
        $category = self::where('id', '<>', '0');

        if(!empty($where))
        {
            $category = $category->where($where);
        }

        if(!empty($order))
        {
            $category = $category->orderBy($order[0], $order[1]);
        }

        $category = $category->first();

        if(empty($category))
        {
            return false;
        }else
        {
            return $category;
        }
    }

    //添加
    public static function postCategory($data)
    {
        if(empty($data) || count($data)<1 )
            return false;

        $category = new self;

        foreach($data as $k=>$v)
        {
            $category->{$k} = $v;
        }

        if($category->save())
        {
            return $category->id;
        }
        else
        {
            return false;
        }
    }

    //修改
    public static function putCategory($where, $data)
    {
        if(empty($where) || empty($data) || count($data)<1 )
            return false;
        
        $category = self::where($where)->first();

        foreach($data as $k=>$v)
        {
            $category->{$k} = $v;
        }

        if($category->save())
        {
            return $category->id;
        }
        else
        {
            return false;
        }
    }

    //删除
    public static function delCategory($where)
    {
        if(empty($where))
            return false;

        if(self::where($where)->delete())
        {
            return true;
        }
        else
        {
            return true;
        }
    }
}