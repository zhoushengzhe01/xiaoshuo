<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>{{$website->title}}-{{$website->seo_title}}</title>
<meta name="keywords" content="{{$website->seo_keywords}}"/>
<meta name="description" content="{{$website->seo_description}}"/>
<link href="{{$website->public}}/style/style.css" rel="stylesheet" />
<script src="{{$website->public}}/script/common.js"></script>
<script src="{{$website->public}}/script/base.js"></script>
</head>
<body>
<div class="main">

	@include('dome1.header')

	<div class="jilu">
		<ul class="t">
			<li class="s1">小说名</li>
			<li class="s2">章节</li>
			<li class="s3">作者</li>
			<li class="s4">删除</li>
		</ul>
		<div class="clearfix"></div>
		<div id="banner">
			@foreach ($fictions as $key=>$val)
			<ul>
				<li class="s1"><a href="{{$website->site}}/book/{{$val->id}}" target="_blank">{{$val->title}}</a></li>
				<li class="s2"><a href="{{$website->site}}/book/{{$val->id}}/{{$val->catalog_id}}" target="_blank">{{$val->catalog_title}}</a></li>
				<li class="s3"><a href="{{$website->site}}/author/?word={{$val->author}}" target="_blank">{{$val->author}}</a></li>
				<li class="s4"><a href="#">删除</a></li>
			</ul>
			@endforeach
			<ul><li class="tip">阅读记录保存最近阅读的20本小说！</li><div class="clear"></div></ul>
		</div>
		<div class="clearfix"></div>
	</div>

	<!--底部信息-->
	@include('dome1.footer')
	
</div>

</body>
</html>
