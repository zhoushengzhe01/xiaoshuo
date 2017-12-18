<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FictionsCollect extends Model
{
    protected $table = 'fictions_collect';

    //获取列表
    public static function getCollects($where=[], $order=[], $offset=0, $limit='')
    {
        $collects = self::where('id', '<>', '0');

        if(!empty($where))
        {
            $collects = $collects->where($where);
        }

        if(!empty($order))
        {
            $collects = $collects->orderBy($order[0], $order[1]);
        }

        if(!empty($limit))
        {
            $collects = $collects->offset($offset)->limit($limit);
        }
   
        $collects = $collects->get();

        if(empty($collects))
        {
            return false;
        }else
        {
            return $collects;
        }
    }

    //获取单个
    public static function getCollect($where=[], $order=[])
    {
        $collect = self::where('id', '<>', '0');

        if(!empty($where))
        {
            $collect = $collect->where($where);
        }

        if(!empty($order))
        {
            $collect = $collect->orderBy($order[0], $order[1]);
        }

        $collect = $collect->first();

        if(empty($collect))
        {
            return false;
        }else
        {
            return $collect;
        }
    }

    //添加
    public static function postCollect($data)
    {
        if(empty($data) || count($data)<1 )
            return false;

        $collect = new self;

        foreach($data as $k=>$v)
        {
            $collect->{$k} = $v;
        }

        if($collect->save())
        {
            return $collect->id;
        }
        else
        {
            return false;
        }
    }

    //修改
    public static function putCollect($where, $data)
    {
        if(empty($where) || empty($data) || count($data)<1 )
            return false;
        
        $collect = self::where($where)->first();

        foreach($data as $k=>$v)
        {
            $collect->{$k} = $v;
        }

        if($collect->save())
        {
            return $collect->id;
        }
        else
        {
            return false;
        }
    }

    //删除
    public static function delCollect($where)
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
