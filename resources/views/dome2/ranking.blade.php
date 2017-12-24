<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>17模板网_最好看的小说网站</title>
<meta name="keywords" content="杰奇 小说 最新 最快" />
<meta name="description" content="基于杰奇小说连载系统构建，为您提供提供内容优质，更新最快的小说。" />
<link rel="stylesheet" type="text/css" href="{{$website->public}}/style/web.css" />
<script src="{{$website->public}}/script/base.js"></script>
<script src="{{$website->public}}/script/jquery-1.11.0.min.js"></script>
<script src="{{$website->public}}/script/lazyload.js"></script>
<script src="{{$website->public}}/script/web.js"></script>
<!--[if lt IE 9]>
    <script src="html5shiv.js"></script>
<![endif]-->
</head>
<body>
@include('dome2.header')

<div class="main w">

<div class="topmenu toplistmenu">
	<a href="http://b3.ku180.com">首页</a><span class="jiantou"><img src="http://b3.ku180.com/17mb/css/jiantou.png" /></span>总点击榜
</div>
<div><script>__17mb_top();</script></div>
<div class="toplist">
	<div class="l toplistl">
    	<ul>
            <li><a href="{{$website->site}}/ranking/0">总点击榜</a></li>
            <li><a href="{{$website->site}}/ranking/1">月点击榜</a></li>
            <li><a href="{{$website->site}}/ranking/2">周点击榜</a></li>
            <li><a href="{{$website->site}}/ranking/3">总推荐榜</a></li>
            <li><a href="{{$website->site}}/ranking/4">月推荐榜</a></li>
            <li><a href="{{$website->site}}/ranking/5">周推荐榜</a></li>
            <li><a href="{{$website->site}}/ranking/7">月收藏榜</a></li>
            <li><a href="{{$website->site}}/ranking/8">周收藏榜</a></li>
            <li><a href="{{$website->site}}/ranking/9">最新入库</a></li>
            <li><a href="{{$website->site}}/ranking/10">最近更新</a></li>
            <div class="clear"></div>
        </ul>
    </div>
    <div class="r">
    <ul class="lists">
    @foreach ($fictions as $key=>$val)
    <li>
        <p class="d1">
            <span class="sortname">[ 仙侠修真 ]</span>&nbsp;&nbsp;
            <a href="{{$website->site}}/book/{{$val->id}}">{{$val->title}}</a>&nbsp;&nbsp;
            <span class="lastchapter">最新：<a href="{{$website->site}}/book/{{$val->id}}/{{$val->new_catalog_id}}" target="_blank">{{$val->new_catalog_title}}</a></span>
        </p>
        <p class="d2">
            <span class="author">{{$val->author}}</span>
            <span class="lastupdate">更新时间：{{$val->updated_at}}</span>
        </p>
    </li>
    @endforeach
    </ul>
    <div class="clearfix"></div>
    {!! $fictions->links() !!}
    </div>
    <div class="clearfix"></div>
</div>
<div>
@include('dome2.footer')
</div>
</body>
</html>
