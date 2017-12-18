<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Fictions extends Model
{
    protected $table = 'fictions';

    //获取列表
    public static function getFictions($where=[], $order=[], $offset=0, $limit='')
    {
        $fictions = self::where('id', '<>', '0');

        if(!empty($where))
        {
            $fictions = $fictions->where($where);
        }

        if(!empty($order))
        {
            $fictions = $fictions->orderBy($order[0], $order[1]);
        }

        if(!empty($limit))
        {
            $fictions = $fictions->offset($offset)->limit($limit);
        }
   
        $fictions = $fictions->get();

        if(empty($fictions))
        {
            return false;
        }else
        {
            return $fictions;
        }
    }

    //获取单个
    public static function getFiction($where=[], $order=[])
    {
        $fiction = self::where('id', '<>', '0');

        if(!empty($where))
        {
            $fiction = $fiction->where($where);
        }

        if(!empty($order))
        {
            $fiction = $fiction->orderBy($order[0], $order[1]);
        }

        $fiction = $fiction->first();

        if(empty($fiction))
        {
            return false;
        }else
        {
            return $fiction;
        }
    }

    //添加
    public static function postFiction($data)
    {
        if(empty($data) || count($data)<1 )
            return false;

        $fiction = new self;

        foreach($data as $k=>$v)
        {
            $fiction->{$k} = $v;
        }

        if($fiction->save())
        {
            return $fiction->id;
        }
        else
        {
            return false;
        }
    }

    //修改
    public static function putFiction($where, $data)
    {
        if(empty($where) || empty($data) || count($data)<1 )
            return false;
        
        $fiction = self::where($where)->first();

        foreach($data as $k=>$v)
        {
            $fiction->{$k} = $v;
        }

        if($fiction->save())
        {
            return $fiction->id;
        }
        else
        {
            return false;
        }
    }

    //删除
    public static function delFiction($where)
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