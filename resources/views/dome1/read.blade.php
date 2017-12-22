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
	
	<div class="main_content">
		<div class="nr_input">
			<p class="nrset"><a href="#">加入书架</a></p>
			<p class="nrset"><a href="#">设置背景</a></p>
			@if ($upper_catalog)
			<p class="nrset"><a href="{{$website->site}}/book/{{$catalog->fiction_id}}/{{$upper_catalog->id}}">上一章</a></p>
			@endif
			<p class="nrset"><a href="{{$website->site}}/book/{{$catalog->fiction_id}}">返回目录</a></p>
			@if ($next_catalog)
			<p class="nrset"><a href="{{$website->site}}/book/{{$catalog->fiction_id}}/{{$next_catalog->id}}">下一章</a></p>
			@endif
		</div>
		<div id="nr_content" class="nr_content">
			<div class="nr_title"><h3>{{$catalog->title}}</h3><span class="articletitle"> 作品:《<a href="{{$website->site}}/book/{{$catalog->fiction_id}}">{{$fiction->title}}</a>》</span></div>
            <div class="nr_page">
				@if ($upper_catalog)
                <a href="{{$website->site}}/book/{{$catalog->fiction_id}}/{{$upper_catalog->id}}">上一章</a>
				@endif
				<a href="{{$website->site}}/book/{{$catalog->fiction_id}}">返回目录</a>
                <a href="{{$website->site}}/collect/add?catalog_id={{$catalog->id}}">加入书签</a>
				@if ($next_catalog)
                <a href="{{$website->site}}/book/{{$catalog->fiction_id}}/{{$next_catalog->id}}">下一章</a>
				@endif
            </div>
			<p class="backpic"></p>
			<div class="novelcontent">
				<p class="articlecontent" id="articlecontent">{!! $catalog->content !!}</p>
			</div>
            <p class="backpic"></p>
            <div class="nr_page">
                @if ($upper_catalog)
                <a href="{{$website->site}}/book/{{$catalog->fiction_id}}/{{$upper_catalog->id}}">上一章</a>
				@endif
				<a href="{{$website->site}}/book/{{$catalog->fiction_id}}">返回目录</a>
                <a href="{{$website->site}}/collect/add?catalog_id={{$catalog->id}}">加入书签</a>
				@if ($next_catalog)
                <a href="{{$website->site}}/book/{{$catalog->fiction_id}}/{{$next_catalog->id}}">下一章</a>
				@endif
            </div>
		</div>
	</div>

	@include('dome1.footer')
</div>
</body>
</html>
