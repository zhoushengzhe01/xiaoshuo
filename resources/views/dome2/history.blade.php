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
	<a href="{{$website->site}}">首页</a><span class="jiantou"><img src="{{$website->public}}/images/jiantou.png" alt="小说最近更新"></span>阅读历史 </div>
    <div class="jilu">
        <ul class="t">
            <li class="s1">小说名</li>
            <li class="s2">阅读章节</li>
            <li class="s3">作者</li>
            <li class="s4">上传时间</li>
        </ul>
        <div class="clearfix"></div>
    	<div id="banner">
            <ul>
                @foreach ($fictions as $key=>$val)
                <li class="s1"><a href="{{$website->site}}/book/{{$val->id}}">{{$val->title}}</a> [<a href="{{$website->site}}/book/{{$val->id}}/{{$val->new_catalog_id}}" target="_blank">{{$val->new_catalog_title}}</a>]</li>
                <li class="s2"><a href="{{$website->site}}/book/{{$val->id}}/{{$val->catalog_id}}" target="_blank">{{$val->catalog_title}}</a></li>
                <li class="s3">{{$val->author}}</li>
                <li class="s4">{{$val->created_at}}</a></li>
                @endforeach
                <div class="clear"></div>
            </ul>
        </div>
        <div class="clearfix"></div>
	    {!! $fictions->links() !!}
        <div class="clearfix"></div>
    </div>
</div>
<script>
    //一个结果直接跳转
    @if (count($fictions)==1)
    window.location.href="{{$website->site}}/book/{{$fictions[0]->id}}";
    @endif
</script>

@include('dome2.footer')
</div>
</body>
</html>
