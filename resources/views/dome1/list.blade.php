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
	
	<div class="fl_left">
		<ul>
			<?php $category = App\Model\FictionsCategory::getCategorys(); ?>
			@foreach ($category as $val)
			<li @if ($val->id == $category_id) class="menucurr" @endif><a href="{{$website->site}}/list/{{$val->id}}">{{$val->name}}小说</a></li>
			@endforeach
		</ul>
	</div>

	<div class="fl_right">
		@foreach ($fictions as $key=>$val)		
		<div class="tt">
			<h3><a href="{{$website->site}}/book/{{$val->id}}">{{$val->title}}</a></h3>
			<span class="pic"><a href="{{$website->site}}/book/{{$val->id}}"><img src="{{$website->public}}/images/5s.jpg" width="78" height="108" /></a></span>
			<div class="pp">
				<p class="p1"><a href="{{$website->site}}/author/?key={{$val->author}}">作者：{{$val->author}}</a></p>
				<p class="p2">{{$val->intro}}</p>
			</div>
			<div class="novellink">
				<p><a href="#">立即阅读</a></p>
				<p><a href="{{$website->site}}/collect/add?fiction_id={{$val->id}}">加入书架</a></p>
				<p><a href="#">推荐本书</a></p>
				<div class="clear"></div>
			</div>
		</div>
		@endforeach
		<div class="clear"></div>
		{!! $fictions->links() !!}
	</div>
	<div class="clear"></div>

	<!--底部信息-->
	@include('dome1.footer')

</div>
</body>
</html>
