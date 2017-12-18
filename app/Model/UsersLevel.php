<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UsersLevel extends Model
{
    protected $table = 'users_level';

    //获取列表
    public static function getLevels($where=[], $order=[], $offset=0, $limit='')
    {
        $levels = self::where('id', '<>', '0');

        if(!empty($where))
        {
            $levels = $levels->where($where);
        }

        if(!empty($order))
        {
            $levels = $levels->orderBy($order[0], $order[1]);
        }

        if(!empty($limit))
        {
            $levels = $levels->offset($offset)->limit($limit);
        }
   
        $levels = $levels->get();

        if(empty($levels))
        {
            return false;
        }else
        {
            return $levels;
        }
    }

    //获取单个
    public static function getLevel($where=[], $order=[])
    {
        $level = self::where('id', '<>', '0');

        if(!empty($where))
        {
            $level = $level->where($where);
        }

        if(!empty($order))
        {
            $level = $level->orderBy($order[0], $order[1]);
        }

        $level = $level->first();

        if(empty($level))
        {
            return false;
        }else
        {
            return $level;
        }
    }

    //添加
    public static function postLevel($data)
    {
        if(empty($data) || count($data)<1 )
            return false;

        $level = new self;

        foreach($data as $k=>$v)
        {
            $level->{$k} = $v;
        }

        if($level->save())
        {
            return $level->id;
        }
        else
        {
            return false;
        }
    }

    //修改
    public static function putLevel($where, $data)
    {
        if(empty($where) || empty($data) || count($data)<1 )
            return false;
        
        $level = self::where($where)->first();

        foreach($data as $k=>$v)
        {
            $level->{$k} = $v;
        }

        if($level->save())
        {
            return $level->id;
        }
        else
        {
            return false;
        }
    }

    //删除
    public static function delLevel($where)
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
