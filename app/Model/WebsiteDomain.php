<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WebsiteDomain extends Model
{
    protected $table = 'website_domain';

    //获取列表
    public static function getDomains($where=[], $order=[], $offset=0, $limit='')
    {
        $domains = self::where('id', '<>', '0');

        if(!empty($where))
        {
            $domains = $domains->where($where);
        }

        if(!empty($order))
        {
            $domains = $domains->orderBy($order[0], $order[1]);
        }

        if(!empty($limit))
        {
            $domains = $domains->offset($offset)->limit($limit);
        }
   
        $domains = $domains->get();

        if(empty($domains))
        {
            return false;
        }else
        {
            return $domains;
        }
    }

    //获取单个
    public static function getDomain($where=[], $order=[])
    {
        $domain = self::where('id', '<>', '0');

        if(!empty($where))
        {
            $domain = $domain->where($where);
        }

        if(!empty($order))
        {
            $domain = $domain->orderBy($order[0], $order[1]);
        }

        $domain = $domain->first();

        if(empty($domain))
        {
            return false;
        }else
        {
            return $domain;
        }
    }

    //添加
    public static function postDomain($data)
    {
        if(empty($data) || count($data)<1 )
            return false;

        $domain = new self;

        foreach($data as $k=>$v)
        {
            $domain->{$k} = $v;
        }

        if($domain->save())
        {
            return $domain->id;
        }
        else
        {
            return false;
        }
    }

    //修改
    public static function putDomain($where, $data)
    {
        if(empty($where) || empty($data) || count($data)<1 )
            return false;
        
        $domain = self::where($where)->first();

        foreach($data as $k=>$v)
        {
            $domain->{$k} = $v;
        }

        if($domain->save())
        {
            return $domain->id;
        }
        else
        {
            return false;
        }
    }

    //删除
    public static function delDomain($where)
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
