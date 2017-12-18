<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FictionsRecommend extends Model
{
    protected $table = 'fictions_recommend';

    //获取列表
    public static function getRecommends($where=[], $order=[], $offset=0, $limit='')
    {
        $recommends = self::where('id', '<>', '0');

        if(!empty($where))
        {
            $recommends = $recommends->where($where);
        }

        if(!empty($order))
        {
            $recommends = $recommends->orderBy($order[0], $order[1]);
        }

        if(!empty($limit))
        {
            $recommends = $recommends->offset($offset)->limit($limit);
        }
   
        $recommends = $recommends->get();

        if(empty($recommends))
        {
            return false;
        }else
        {
            return $recommends;
        }
    }

    //获取单个
    public static function getRecommend($where=[], $order=[])
    {
        $recommend = self::where('id', '<>', '0');

        if(!empty($where))
        {
            $recommend = $recommend->where($where);
        }

        if(!empty($order))
        {
            $recommend = $recommend->orderBy($order[0], $order[1]);
        }

        $recommend = $recommend->first();

        if(empty($recommend))
        {
            return false;
        }else
        {
            return $recommend;
        }
    }

    //添加
    public static function postRecommend($data)
    {
        if(empty($data) || count($data)<1 )
            return false;

        $recommend = new self;

        foreach($data as $k=>$v)
        {
            $recommend->{$k} = $v;
        }

        if($recommend->save())
        {
            return $recommend->id;
        }
        else
        {
            return false;
        }
    }

    //修改
    public static function putRecommend($where, $data)
    {
        if(empty($where) || empty($data) || count($data)<1 )
            return false;
        
        $recommend = self::where($where)->first();

        foreach($data as $k=>$v)
        {
            $recommend->{$k} = $v;
        }

        if($recommend->save())
        {
            return $recommend->id;
        }
        else
        {
            return false;
        }
    }

    //删除
    public static function delRecommend($where)
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
