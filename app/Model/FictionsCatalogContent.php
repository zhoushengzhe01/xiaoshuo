<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FictionsCatalogContent extends Model
{
    protected $table = 'fictions_catalog_content';

    //获取列表
    public static function getCatalogContents($where=[], $order=[], $offset=0, $limit='')
    {
        $catalogcontents = self::where('id', '<>', '0');

        if(!empty($where))
        {
            $catalogcontents = $catalogcontents->where($where);
        }

        if(!empty($order))
        {
            $catalogcontents = $catalogcontents->orderBy($order[0], $order[1]);
        }

        if(!empty($limit))
        {
            $catalogcontents = $catalogcontents->offset($offset)->limit($limit);
        }
   
        $catalogcontents = $catalogcontents->get();

        if(empty($catalogcontents))
        {
            return false;
        }else
        {
            return $catalogcontents;
        }
    }

    //获取单个
    public static function getCatalogContent($where=[], $order=[])
    {
        $catalogcontent = self::where('id', '<>', '0');

        if(!empty($where))
        {
            $catalogcontent = $catalogcontent->where($where);
        }

        if(!empty($order))
        {
            $catalogcontent = $catalogcontent->orderBy($order[0], $order[1]);
        }

        $catalogcontent = $catalogcontent->first();

        if(empty($catalogcontent))
        {
            return false;
        }else
        {
            return $catalogcontent;
        }
    }

    //添加
    public static function postCatalogContent($data)
    {
        if(empty($data) || count($data)<1 )
            return false;

        $catalogcontent = new self;

        foreach($data as $k=>$v)
        {
            $catalogcontent->{$k} = $v;
        }

        if($catalogcontent->save())
        {
            return $catalogcontent->id;
        }
        else
        {
            return false;
        }
    }

    //修改
    public static function putCatalogContent($where, $data)
    {
        if(empty($where) || empty($data) || count($data)<1 )
            return false;
        
        $catalogcontent = self::where($where)->first();

        foreach($data as $k=>$v)
        {
            $catalogcontent->{$k} = $v;
        }

        if($catalogcontent->save())
        {
            return $catalogcontent->id;
        }
        else
        {
            return false;
        }
    }

    //删除
    public static function delCatalogContent($where)
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
