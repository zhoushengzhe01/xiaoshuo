<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class FictionsCatalog extends Model
{
    protected $table = 'fictions_catalog';

    //获取列表
    public static function getCatalogs($where=[], $order=[], $offset=0, $limit='')
    {
        $catalogs = self::where('id', '<>', '0');

        if(!empty($where))
        {
            $catalogs = $catalogs->where($where);
        }

        if(!empty($order))
        {
            $catalogs = $catalogs->orderBy($order[0], $order[1]);
        }

        if(!empty($limit))
        {
            $catalogs = $catalogs->offset($offset)->limit($limit);
        }
   
        $catalogs = $catalogs->get();

        if(empty($catalogs))
        {
            return false;
        }else
        {
            return $catalogs;
        }
    }

    //获取单个
    public static function getCatalog($where=[], $order=[])
    {
        $catalog = self::where('id', '<>', '0');

        if(!empty($where))
        {
            $catalog = $catalog->where($where);
        }

        if(!empty($order))
        {
            $catalog = $catalog->orderBy($order[0], $order[1]);
        }

        $catalog = $catalog->first();

        if(empty($catalog))
        {
            return false;
        }else
        {
            return $catalog;
        }
    }

    //添加
    public static function postCatalog($data)
    {
        if(empty($data) || count($data)<1 )
            return false;

        $catalog = new self;

        foreach($data as $k=>$v)
        {
            $catalog->{$k} = $v;
        }

        if($catalog->save())
        {
            return $catalog->id;
        }
        else
        {
            return false;
        }
    }

    //修改
    public static function putCatalog($where, $data)
    {
        if(empty($where) || empty($data) || count($data)<1 )
            return false;
        
        $catalog = self::where($where)->first();

        foreach($data as $k=>$v)
        {
            $catalog->{$k} = $v;
        }

        if($catalog->save())
        {
            return $catalog->id;
        }
        else
        {
            return false;
        }
    }

    //删除
    public static function delCatalog($where)
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


