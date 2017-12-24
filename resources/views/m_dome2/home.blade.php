<!DOCTYPE html>
<html mip>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
<link rel="stylesheet" type="text/css" href="https://mipcache.bdstatic.com/static/v1/mip.css">
<link rel="canonical" href="http://m3.ku180.com/">
<title>17模板网-最新小说,最多最的全小说网</title>
<meta name="keywords" content="17模板网" />
<meta name="description" content="17模板网收集了网络热门小说的最新更新手打全文字TXT章节供您手机免费阅读和下载,请收藏17模板网。" />
<style mip-custom>
body,ul,li,p,span,h1,h2,h3,h4,h5,h6.dl,dt,dd{margin:0px;padding:0px;font-size:12px;}ul,li{list-style:none;}h1,h2,h3,h4,h5,h6{font-weight:normal}.foot{background:#47A1DF;color:#fff}.foot li{float:left;width:33%;height:40px;line-height:40px;text-align:center}.foot a{color:#fff;}.dixian{color:#999;text-align:center;margin:10px 0px;}.clear{clear:both;}.nav{height:50px;line-height:50px;background:#47A1DF}.nav mip-link{color:#fff;}.nav .sitename{position:absolute;top:0px;left:10px;font-size:18px;color:#fff;}.nav .searchico mip-img{margin-top:10px;}.nav .searchico{position:absolute;right:10px;color:#fff;}.nav .searchico mip-link{height:50px;width:30px;}.nav .userico{position:absolute;right:50px;color:#fff;}.nav .userico mip-img{margin-top:10px;}.nav .userico mip-link{height:50px;width:30px;}.indexnav{margin:20px 10px;}.indexnav a{color:#fff;}.indexnav li{float:left;width:22%;height:35px;line-height:35px;text-align:center;color:#fff;border-radius:3px;}.indexnav li mip-link{padding-left:15px;color:#333;border:1px solid #86C2FF;border-radius:5px;}.indexnav i{position:absolute;top:9px;left:50%;margin-left:-25px;display:block;height:16px;width:16px;width:16px;}.indexnav .c2{margin-left:4%}.indexnav .c3{margin:0px 4%}.lunbo{margin:10px;border:1px solid #C1EBFF;padding:5px;}.lunbotitle{color:#666;border-bottom:2px solid #47A1DF;margin-top:5px;margin:10px;padding-bottom:10px;font-size:14px;}.block{margin:10px;position:relative}.block li{position:relative;border-bottom:1px solid #eee;padding:10px 0px;}.block .intro{height:20px;line-height:20px;overflow:hidden;color:#999;font-size:12px;margin-top:10px;}.block .fullflag{position:absolute;top:10px;right:65px;display:block;border:1px solid #eee;color:#03C016;padding:1px 5px;border-radius:3px;}.block .sort{position:absolute;top:10px;right:0px;display:block;border:1px solid #eee;color:#999;padding:1px 5px;border-radius:3px;}.block h1{position:relative;font-size:12px;height:20px;line-height:20px;font-size:14px;color:#666;margin-top:20px;}.block .more mip-link{position:absolute;display:block;top:5px;right:5px;font-size:14px;font-weight:normal;color:#999;padding-right:10px;}.block .line{border-bottom:2px solid #47A1DF;margin-top:5px;}.block .block4{border-bottom:1px solid #eee;}.block .b1,.block .b4{width:24%;float:left;margin:10px 0px;}.block .b2,.block .b3{width:24%;float:left;margin:10px 1%;}.block .title,.block .author{font-size:10px;display:block;height:20px;line-height:20px;overflow:hidden;text-align:center;}.block .author{color:#999}
</style>
</head>
<body>
	<div class="nav">
		<div class="sitename"><mip-link href="{{$website->site}}">17模板网</mip-link></div>
		<div class="userico"><mip-link href="{{$website->site}}/user"><mip-img src="{{$website->public}}/images/login.png"></mip-img></mip-link></div>
		<div class="searchico"><mip-link href="{{$website->site}}/search"><mip-img src="{{$website->public}}/images/search.png"></mip-img></mip-link></div>
	</div>
    <div class="indexnav">
		<ul>
			<li class="c1"><mip-link href="{{$website->site}}/list/1"><i><mip-img src="{{$website->public}}/images/fenlei.png"></mip-img></i>分类</mip-link></li>
			<li class="c2"><mip-link href="{{$website->site}}/ranking/1"><i><mip-img src="{{$website->public}}/images/paihang.png"></mip-img></i>排行</mip-link></li>
			<li class="c3"><mip-link href="{{$website->site}}/ranking/11"><i><mip-img src="{{$website->public}}/images/wanben.png"></mip-img></i>完本</mip-link></li>
			<li class="c4"><mip-link href="{{$website->site}}/mybook"><i><mip-img src="{{$website->public}}/images/shujia.png"></mip-img></i>书架</mip-link></li>
		</ul>
		<div class="clear"></div>
	</div>
  
    <p class="lunbotitle">站长推荐</p>
    <div class="lunbo">
        <mip-carousel autoplay defer="2000" layout="responsive" width="200" height="100" indicator buttonController>
			<?php $result = App\Model\Fictions::getFictions(['is_index'=>1], ['updated_at', 'desc'], 0, 5); ?>
			@foreach ($result as $key=>$val)
			<mip-link href="{{$website->site}}/book/{{$val->id}}">
                <mip-img src="{{$website->public}}/images/5s.jpg" layout="responsive"></mip-img>
                <div class="mip-carousle-subtitle">《{{$val->title}}》</div>
            </mip-link>
			@endforeach
        </mip-carousel>
    </div>
	<?php
	$category = App\Model\FictionsCategory::getCategorys();
	$result = [];
	foreach($category as $k=>$v){
		$result[$k] = $v; $result[$k]['list'] = App\Model\Fictions::getFictions(['category_id'=>$v->id], ['updated_at', 'desc'], 0, 10);
	}
	?>
	@foreach ($result as $key=>$val)
	<div class="block">
		<h1><mip-link href="{{$website->site}}/list/{{$val->id}}">{{$val->name}}小说</mip-link></h1>
        <div class="more"><mip-link href="{{$website->site}}/list/{{$val->id}}"><mip-img src="{{$website->public}}/images/more.png"></mip-img></mip-link></div>
        <div class="line"></div>
        <div class="block4">
		@foreach ($val['list'] as $k=>$v)
		@if ($k<4)
		<p class="b{{$k+1}}">
			<mip-link href="{{$website->site}}/book/{{$v->id}}">
				<mip-img src="{{$website->public}}/images/noimg.jpg" width="100" height="130"  layout="responsive"></mip-img>
				<span class="title">{{$v->title}}</span>
				<span class="author">{{$v->author}}</span>
			</mip-link>
		</p>
		@endif
		@endforeach
       	<div class="clear"></div>
        </div>
    	<ul>
			@foreach ($val['list'] as $k=>$v)
			@if ($k>=4)
			<li>
				<mip-link href="{{$website->site}}/book/{{$v->id}}">{{$v->title}}</mip-link>
				<p class="intro">{{$v->intro}}</p>
				<span class="fullflag">@if ($v->state==1) 连载 @else 完结 @endif</span>
				<span class="sort">玄幻小说</span>
			</li>
			@endif
			@endforeach
		</ul>
    </div>
	@endforeach
    
	<div class="block">
    	<h1><mip-link href="http://m3.ku180.com/top/lastupdate-1.html">最近更新</mip-link></h1>
        <div class="line"></div>
    	<ul>
			<?php $result = App\Model\Fictions::getFictions([], ['updated_at', 'desc'], 0, 15); ?>
			@foreach ($result as $key=>$val)
			<li>
				<mip-link href="{{$website->site}}/book/{{$val->id}}">{{$val->title}}</mip-link>
				<p class="intro">{{$val->intro}}</p>
				<span class="fullflag">@if ($v->state==1) 连载 @else 完结 @endif</span>
				<span class="sort">玄幻小说</span>
			</li>
			@endforeach
		</ul>
    </div>
    
    <p class="dixian">我是有底线的...</p>
    
    @include('m_dome2.footer')
</body>
</html>