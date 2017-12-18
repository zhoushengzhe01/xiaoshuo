<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UsersSeting extends Model
{
    protected $table = 'users_seting';

    //获取列表
    public static function getSetings($where=[], $order=[], $offset=0, $limit='')
    {
        $setings = self::where('id', '<>', '0');

        if(!empty($where))
        {
            $setings = $setings->where($where);
        }

        if(!empty($order))
        {
            $setings = $setings->orderBy($order[0], $order[1]);
        }

        if(!empty($limit))
        {
            $setings = $setings->offset($offset)->limit($limit);
        }
   
        $setings = $setings->get();

        if(empty($setings))
        {
            return false;
        }else
        {
            return $setings;
        }
    }

    //获取单个
    public static function getSeting($where=[], $order=[])
    {
        $seting = self::where('id', '<>', '0');

        if(!empty($where))
        {
            $seting = $seting->where($where);
        }

        if(!empty($order))
        {
            $seting = $seting->orderBy($order[0], $order[1]);
        }

        $seting = $seting->first();

        if(empty($seting))
        {
            return false;
        }else
        {
            return $seting;
        }
    }

    //添加
    public static function postSeting($data)
    {
        if(empty($data) || count($data)<1 )
            return false;

        $seting = new self;

        foreach($data as $k=>$v)
        {
            $seting->{$k} = $v;
        }

        if($seting->save())
        {
            return $seting->id;
        }
        else
        {
            return false;
        }
    }

    //修改
    public static function putSeting($where, $data)
    {
        if(empty($where) || empty($data) || count($data)<1 )
            return false;
        
        $seting = self::where($where)->first();

        foreach($data as $k=>$v)
        {
            $seting->{$k} = $v;
        }

        if($seting->save())
        {
            return $seting->id;
        }
        else
        {
            return false;
        }
    }

    //删除
    public static function delSeting($where)
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
