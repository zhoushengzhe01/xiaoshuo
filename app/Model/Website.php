<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    protected $table = 'website';

    //获取列表
    public static function getWebsites($where=[], $order=[], $offset=0, $limit='')
    {
        $websites = self::where('id', '<>', '0');

        if(!empty($where))
        {
            $websites = $websites->where($where);
        }

        if(!empty($order))
        {
            $websites = $websites->orderBy($order[0], $order[1]);
        }

        if(!empty($limit))
        {
            $websites = $websites->offset($offset)->limit($limit);
        }
   
        $websites = $websites->get();

        if(empty($websites))
        {
            return false;
        }else
        {
            return $websites;
        }
    }

    //获取单个
    public static function getWebsite($where=[], $order=[])
    {
        $website = self::where('id', '<>', '0');

        if(!empty($where))
        {
            $website = $website->where($where);
        }

        if(!empty($order))
        {
            $website = $website->orderBy($order[0], $order[1]);
        }

        $website = $website->first();

        if(empty($website))
        {
            return false;
        }else
        {
            return $website;
        }
    }

    //添加
    public static function postWebsite($data)
    {
        if(empty($data) || count($data)<1 )
            return false;

        $website = new self;

        foreach($data as $k=>$v)
        {
            $website->{$k} = $v;
        }

        if($website->save())
        {
            return $website->id;
        }
        else
        {
            return false;
        }
    }

    //修改
    public static function putWebsite($where, $data)
    {
        if(empty($where) || empty($data) || count($data)<1 )
            return false;
        
        $website = self::where($where)->first();

        foreach($data as $k=>$v)
        {
            $website->{$k} = $v;
        }

        if($website->save())
        {
            return $website->id;
        }
        else
        {
            return false;
        }
    }

    //删除
    public static function delWebsite($where)
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
