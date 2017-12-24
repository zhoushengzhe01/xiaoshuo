<!DOCTYPE html>
<html mip>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
<link rel="stylesheet" type="text/css" href="https://mipcache.bdstatic.com/static/v1/mip.css">
<link rel="canonical" href="{{$website->site}}/0/385/66014.html">
<title>第七十二章 死亡之手，死神使者！（下）是绝世唐门最新更新章节-TXT全集下载-17模板网手机阅读</title>
<meta name="keywords" content="绝世唐门,第七十二章 死亡之手，死神使者！（下）txt手打全文字,绝世唐门TXT下载,绝世唐门最新更新" />
<meta name="description" content="绝世唐门是由作家唐家三少所作,本书属于,本书由17模板网的会员收集于网络,供书友们及时阅读和下载到绝世唐门最新更新手打全文字TXT章节。" />
<style mip-custom>
body,ul,li,p,span,h1,h2,h3,h4,h5,h6.dl,dt,dd{margin:0px;padding:0px;font-size:12px;}ul,li{list-style:none;}h1,h2,h3,h4,h5,h6{font-weight:normal}.foot{background:#47A1DF;color:#fff}.foot li{float:left;width:33%;height:40px;line-height:40px;text-align:center}.foot a{color:#fff;}.dixian{color:#999;text-align:center;margin:10px 0px;}.clear{clear:both;}.nav{height:50px;line-height:50px;background:#47A1DF}.nav mip-link{color:#fff;}.nav .sitename{position:absolute;top:0px;left:10px;font-size:18px;color:#fff;}.nav .sitename mip-img{margin-top:10px;}.nav .pagetitle{position:absolute;left:50px;right:50px;text-align:center;color:#fff;}.nav .searchico mip-img{margin-top:10px;}.nav .searchico{position:absolute;right:10px;color:#fff;}.nav .searchico mip-link{height:50px;width:30px;}.nav .userico{position:absolute;right:50px;color:#fff;}.nav .userico mip-img{margin-top:10px;}.nav .userico mip-link{height:50px;width:30px;}body{background:#DCECD2}.content{margin:10px;font-size:18px;line-height:150%;}.articlename h1{font-size:14px;text-align:center;margin:20px 0px;}.page li{float:left;width:25%;text-align:center;background:#CCE2BF;height:40px;line-height:40px;color:#468000;border:1px solid #BBD6AA;border-width:1px 0px;}
</style>
</head>
<body>
	<div class="nav">
		<div class="sitename"><mip-link href="{{$website->site}}"><mip-img src="{{$website->public}}/images/home.gif"></mip-img></mip-link></div>
		<div class="pagetitle">{{$category->name}}</div>
		<div class="searchico"><mip-link href="{{$website->site}}/search"><mip-img src="{{$website->public}}/images/search.png"></mip-img></mip-link></div>
	</div>

	<div class="articlename"><h1>{{$catalog->title}}</h1></div>
	<ul class="page">
		<li><mip-link href="@if ($upper_catalog){{$website->site}}/book/{{$catalog->fiction_id}}/{{$upper_catalog->id}}@endif">上一章</mip-link></li>
		<li><mip-link href="{{$website->site}}/collect/add?catalog_id={{$catalog->id}}">加书签</mip-link></li>
		<li><mip-link href="{{$website->site}}/book/{{$catalog->fiction_id}}">目录</mip-link></li>
		<li><mip-link href="@if ($next_catalog){{$website->site}}/book/{{$catalog->fiction_id}}/{{$next_catalog->id}}@endif">下一章</mip-link></li>
	</ul>
	<div class="clear"></div>
	
	<div class="content">{!! $catalog->content !!}</div>

	<ul class="page">
		@if ($upper_catalog)
		<li><mip-link href="{{$website->site}}/book/{{$catalog->fiction_id}}/{{$upper_catalog->id}}">上一章</mip-link></li>
		@endif
		<li><mip-link href="{{$website->site}}/collect/add?catalog_id={{$catalog->id}}">加书签</mip-link></li>
		<li><mip-link href="{{$website->site}}/book/{{$catalog->fiction_id}}">目录</mip-link></li>
		@if ($next_catalog)
		<li><mip-link href="{{$website->site}}/book/{{$catalog->fiction_id}}/{{$next_catalog->id}}">下一章</mip-link></li>
		@endif
	</ul>
	<div class="clear"></div>

	@include('m_dome2.footer')
</body>
</html>