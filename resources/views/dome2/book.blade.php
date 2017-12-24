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
    <p class="topmenu chaptermenu">
        <a href="{{$website->sute}}">首页</a><span class="jiantou"><img src="{{$website->public}}/images/jiantou.png"></span><span><a href="{{$website->site}}/list/{{$category->id}}">{{$category->name}}</a></span><span class="jiantou"><img src="{{$website->public}}/images/jiantou.png"></span>《{{$fiction->title}}》章节列表
	</p>
	<div class="articleinfo">
    	<div class="l">
        	<p><img src="{{$website->public}}/images/5s.jpg" alt="{{$fiction->title}}" height="200" width="150"></p>
        </div>
        <div class="r">
        	<div class="l2">
                <div class="p1"><h1>{{$fiction->title}}</h1><span class="author">作者：{{$fiction->author}}</span></div>
                <div class="p2">
                    <p>类型：都市言情</p>
                    <p><a href="#">下载TXT</a></p>
                    <p><a href="{{$website->site}}/collect/add?fiction_id={{$fiction->id}}">加入书架</a></p>
                    <p><a href="{{$website->site}}/recommend/{{$fiction->id}}" class="addvote">推荐本书</a></p>
                    <div class="clearfix"></div>
                </div>
                <p class="p3">{{$fiction->intro}}</p>
                <p class="p4">最新章节：<a href="{{$website->site}}/book/{{$fiction->id}}/{{$fiction->new_catalog_id}}">{{$fiction->new_catalog_title}}</a>({{$fiction->updated_at}})</p>
            </div>
            <div class="r2">广告位 300*250</div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div><script>__17mb_middle();</script><!--中部广告代码--></div>
    <div class="chapterlist">
    	<div class="top">《武道狂神》最新章节<div class="gobottom"><a href="#bottom">↓ 直达底部 ↓</a></div></div>
        <ul>
		@foreach ($fiction['catalog'] as $key=>$val)
		<li><a href="{{$website->site}}/book/{{$fiction->id}}/{{$val->id}}" title="{{$val->updated_at}}更新，共{{$val->work}}字">{{$val->title}}</a></li>
		@endforeach
        </ul>
        <div class="clearfix"></div>
        <div class="gotop"><a href="#">↑返回顶部↑</a></div>
    </div>
    <p class="articlevote">同类推荐：
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
