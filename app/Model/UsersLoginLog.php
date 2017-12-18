<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UsersLoginLog extends Model
{
    protected $table = 'users_login_log';

    //获取列表
    public static function getLogs($where=[], $order=[], $offset=0, $limit='')
    {
        $logs = self::where('id', '<>', '0');

        if(!empty($where))
        {
            $logs = $logs->where($where);
        }

        if(!empty($order))
        {
            $logs = $logs->orderBy($order[0], $order[1]);
        }

        if(!empty($limit))
        {
            $logs = $logs->offset($offset)->limit($limit);
        }
   
        $logs = $logs->get();

        if(empty($logs))
        {
            return false;
        }else
        {
            return $logs;
        }
    }

    //获取单个
    public static function getLog($where=[], $order=[])
    {
        $log = self::where('id', '<>', '0');

        if(!empty($where))
        {
            $log = $log->where($where);
        }

        if(!empty($order))
        {
            $log = $log->orderBy($order[0], $order[1]);
        }

        $log = $log->first();

        if(empty($log))
        {
            return false;
        }else
        {
            return $log;
        }
    }

    //添加
    public static function postLog($data)
    {
        if(empty($data) || count($data)<1 )
            return false;

        $log = new self;

        foreach($data as $k=>$v)
        {
            $log->{$k} = $v;
        }

        if($log->save())
        {
            return $log->id;
        }
        else
        {
            return false;
        }
    }

    //修改
    public static function putLog($where, $data)
    {
        if(empty($where) || empty($data) || count($data)<1 )
            return false;
        
        $log = self::where($where)->first();

        foreach($data as $k=>$v)
        {
            $log->{$k} = $v;
        }

        if($log->save())
        {
            return $log->id;
        }
        else
        {
            return false;
        }
    }

    //删除
    public static function delLog($where)
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
