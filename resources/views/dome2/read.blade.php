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

<div class="main w chapter" id="c1">
    <div class="topmenu chaptermenu">
		<a href="{{$website->sute}}">首页</a><span class="jiantou"><img src="{{$website->public}}/images/jiantou.png"></span><span><a href="{{$website->site}}/list/{{$category->id}}">{{$category->name}}</a></span><span class="jiantou"><img src="{{$website->public}}/images/jiantou.png"></span> {{$catalog->title}}
            <div class="chapterset"><script type="text/javascript" src="{{$website->public}}/script/pagetop.js"></script><script src="http://b3.ku180.com/17mb/js/pagetop.js?" type="text/javascript"></script></div>
	</div>
    <h1>{{$catalog->title}}</h1>
    <div class="chapterpage">
    	<ul>
			@if ($upper_catalog)
			<li><a href="{{$website->site}}/book/{{$catalog->fiction_id}}/{{$upper_catalog->id}}">上一页</a></li>
			@endif
			<li><a href="{{$website->site}}/book/{{$catalog->fiction_id}}">返回目录</a></li>
			@if ($next_catalog)
			<li><a href="{{$website->site}}/book/{{$catalog->fiction_id}}/{{$next_catalog->id}}">下一页</a></li>
			@endif
            <li><a href="{{$website->site}}/collect/add?catalog_id={{$catalog->id}}">加入书签</a></li>
            <li><a href="{{$website->site}}/recommend/{{$catalog->fiction_id}}" class="addvote">推荐本书</a></li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <table class="T_s"><tbody><tr><td><script>__17mb_s1();</script><!--内容页方形广告左--></td><td><script>__17mb_s2();</script><!--内容页方形广告中--></td><td><script>__17mb_s2();</script><!--内容页方形广告中--></td></tr></tbody></table>
	<div id="content" class="content">{!! $catalog->content !!}</div>
    <div class="chapterpage">
    	<ul>
			@if ($upper_catalog)
			<li><a href="{{$website->site}}/book/{{$catalog->fiction_id}}/{{$upper_catalog->id}}">上一页</a></li>
			@endif
            <li><a href="{{$website->site}}/book/{{$catalog->fiction_id}}">返回目录</a></li>
            @if ($next_catalog)
			<li><a href="{{$website->site}}/book/{{$catalog->fiction_id}}/{{$next_catalog->id}}">下一页</a></li>
			@endif
            <li><a href="{{$website->site}}/collect/add?catalog_id={{$catalog->id}}">加入书签</a></li>
            <li><a href="{{$website->site}}/recommend/{{$catalog->fiction_id}}" class="addvote">推荐本书</a></li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div><script>__17mb_bottom();</script><!--底部广告代码--></div>
	<p class="articlevote"><br>同类推荐：
	<?php $result = App\Model\Fictions::getFictions(['category_id'=>$fiction->category_id], ['all_recommend', 'desc'], 0, 10); ?>
	@foreach ($result as $key=>$val)
	<a href="{{$website->site}}/book/{{$val->id}}">{{$val->title}}</a>、
	@endforeach
    </p>
</div>


@include('dome2.footer')
</div>
</body>
</html>
