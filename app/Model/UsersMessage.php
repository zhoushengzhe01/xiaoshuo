<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UsersMessage extends Model
{
    protected $table = 'users_message';

    //获取列表
    public static function getMessages($where=[], $order=[], $offset=0, $limit='')
    {
        $messages = self::where('id', '<>', '0');

        if(!empty($where))
        {
            $messages = $messages->where($where);
        }

        if(!empty($order))
        {
            $messages = $messages->orderBy($order[0], $order[1]);
        }

        if(!empty($limit))
        {
            $messages = $messages->offset($offset)->limit($limit);
        }
   
        $messages = $messages->get();

        if(empty($messages))
        {
            return false;
        }else
        {
            return $messages;
        }
    }

    //获取单个
    public static function getMessage($where=[], $order=[])
    {
        $message = self::where('id', '<>', '0');

        if(!empty($where))
        {
            $message = $message->where($where);
        }

        if(!empty($order))
        {
            $message = $message->orderBy($order[0], $order[1]);
        }

        $message = $message->first();

        if(empty($message))
        {
            return false;
        }else
        {
            return $message;
        }
    }

    //添加
    public static function postMessage($data)
    {
        if(empty($data) || count($data)<1 )
            return false;

        $message = new self;

        foreach($data as $k=>$v)
        {
            $message->{$k} = $v;
        }

        if($message->save())
        {
            return $message->id;
        }
        else
        {
            return false;
        }
    }

    //修改
    public static function putMessage($where, $data)
    {
        if(empty($where) || empty($data) || count($data)<1 )
            return false;
        
        $message = self::where($where)->first();

        foreach($data as $k=>$v)
        {
            $message->{$k} = $v;
        }

        if($message->save())
        {
            return $message->id;
        }
        else
        {
            return false;
        }
    }

    //删除
    public static function delMessage($where)
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
