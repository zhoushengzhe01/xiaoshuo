<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';

    //获取列表
    public static function getUsers($where=[], $order=[], $offset=0, $limit='')
    {
        $users = self::where('id', '<>', '0');

        if(!empty($where))
        {
            $users = $users->where($where);
        }

        if(!empty($order))
        {
            $users = $users->orderBy($order[0], $order[1]);
        }

        if(!empty($limit))
        {
            $users = $users->offset($offset)->limit($limit);
        }
   
        $users = $users->get();

        if(empty($users))
        {
            return false;
        }else
        {
            return $users;
        }
    }

    //获取单个
    public static function getUser($where=[], $order=[])
    {
        $user = self::where('id', '<>', '0');

        if(!empty($where))
        {
            $user = $user->where($where);
        }

        if(!empty($order))
        {
            $user = $user->orderBy($order[0], $order[1]);
        }

        $user = $user->first();

        if(empty($user))
        {
            return false;
        }else
        {
            return $user;
        }
    }

    //添加
    public static function postUser($data)
    {
        if(empty($data) || count($data)<1 )
            return false;

        $user = new self;

        foreach($data as $k=>$v)
        {
            $user->{$k} = $v;
        }

        if($user->save())
        {
            return $user->id;
        }
        else
        {
            return false;
        }
    }

    //修改
    public static function putUser($where, $data)
    {
        if(empty($where) || empty($data) || count($data)<1 )
            return false;
        
        $user = self::where($where)->first();

        foreach($data as $k=>$v)
        {
            $user->{$k} = $v;
        }

        if($user->save())
        {
            return $user->id;
        }
        else
        {
            return false;
        }
    }

    //删除
    public static function delUser($where)
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
