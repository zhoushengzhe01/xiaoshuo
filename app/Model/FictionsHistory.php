<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FictionsHistory extends Model
{
    protected $table = 'fictions_history';

    //获取列表
    public static function getHistorys($where=[], $order=[], $offset=0, $limit='')
    {
        $historys = self::where('id', '<>', '0');

        if(!empty($where))
        {
            $historys = $historys->where($where);
        }

        if(!empty($order))
        {
            $historys = $historys->orderBy($order[0], $order[1]);
        }

        if(!empty($limit))
        {
            $historys = $historys->offset($offset)->limit($limit);
        }
   
        $historys = $historys->get();

        if(empty($historys))
        {
            return false;
        }else
        {
            return $historys;
        }
    }

    //获取单个
    public static function getHistory($where=[], $order=[])
    {
        $history = self::where('id', '<>', '0');

        if(!empty($where))
        {
            $history = $history->where($where);
        }

        if(!empty($order))
        {
            $history = $history->orderBy($order[0], $order[1]);
        }

        $history = $history->first();

        if(empty($history))
        {
            return false;
        }else
        {
            return $history;
        }
    }

    //添加
    public static function postHistory($data)
    {
        if(empty($data) || count($data)<1 )
            return false;

        $history = new self;

        foreach($data as $k=>$v)
        {
            $history->{$k} = $v;
        }

        if($history->save())
        {
            return $history->id;
        }
        else
        {
            return false;
        }
    }

    //修改
    public static function putHistory($where, $data)
    {
        if(empty($where) || empty($data) || count($data)<1 )
            return false;
        
        $history = self::where($where)->first();

        foreach($data as $k=>$v)
        {
            $history->{$k} = $v;
        }

        if($history->save())
        {
            return $history->id;
        }
        else
        {
            return false;
        }
    }

    //删除
    public static function delHistory($where)
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
