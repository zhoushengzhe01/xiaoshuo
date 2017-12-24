<!DOCTYPE html>
<html mip>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
<link rel="stylesheet" type="text/css" href="https://mipcache.bdstatic.com/static/v1/mip.css">
<link rel="canonical" href="http://m3.ku180.com/">
<title>完本小说-手机阅读</title>
<meta name="keywords" content="完本小说,完本小说分类列表" />
<meta name="description" content="分类中完本小说的列表" />
<style mip-custom>
body,ul,li,p,span,h1,h2,h3,h4,h5,h6.dl,dt,dd{margin:0px;padding:0px;font-size:12px;}ul,li{list-style:none;}h1,h2,h3,h4,h5,h6{font-weight:normal}.foot{background:#47A1DF;color:#fff}.foot li{float:left;width:33%;height:40px;line-height:40px;text-align:center}.foot a{color:#fff;}.dixian{color:#999;text-align:center;margin:10px 0px;}.clear{clear:both;}.nav{height:50px;line-height:50px;background:#47A1DF}.nav mip-link{color:#fff;}.nav .sitename{position:absolute;top:0px;left:10px;font-size:18px;color:#fff;}.nav .sitename mip-img{margin-top:10px;}.nav .pagetitle{position:absolute;left:50px;right:50px;text-align:center;color:#fff;}.nav .searchico mip-img{margin-top:10px;}.nav .searchico{position:absolute;right:10px;color:#fff;}.nav .searchico mip-link{height:50px;width:30px;}.nav .userico{position:absolute;right:50px;color:#fff;}.nav .userico mip-img{margin-top:10px;}.nav .userico mip-link{height:50px;width:30px;}.topul li{position:relative;height:90px;border-bottom:1px solid #ddd;margin:10px;}.topul .top_img{position:absolute;top:0px;left:0px;display:block;width:60px;border:1px solid #ddd;padding:2px;}.topul h2,.topul p,.topul .author,.topul .other{position:absolute;color:#999;}.topul h2{top:0px;left:75px;height:20px;line-height:20px;overflow:hidden;font-size:14px;}.topul p{top:20px;left:75px;height:40px;line-height:20px;overflow:hidden;font-size:12px;}.topul .author{top:65px;left:75px;font-size:10px;}.topul .author mip-link{color:#999}.topul .other{top:65px;right:10px;font-size:10px;}.page{border:1px solid #47A1DF;background:#47A1DF;margin:10px;margin-top:20px;border-radius:5px;height:30px;line-height:30px;color:#fff;}.page mip-link{color:#fff;}.page li{float:left;width:24%;text-align:center;}.page1{border-right:1px solid #74bced;}.page2{border-left:1px solid #3593d3;border-right:1px solid #74bced}.page3{border-left:1px solid #3593d3;border-right:1px solid #74bced}.page4{border-left:1px solid #3593d3;}.pagetips{text-align:center;margin-bottom:70px;}
</style>
</head>
<body>
    <div class="nav">
		<div class="sitename"><mip-link href="{{$website->site}}"><mip-img src="{{$website->public}}/images/home.gif"></mip-img></mip-link></div>
		<div class="pagetitle">完本小说</div>
		<div class="searchico"><mip-link href="{{$website->site}}/search"><mip-img src="{{$website->public}}/images/search.png"></mip-img></mip-link></div>
	</div>
    
    @foreach ($fictions as $key=>$val)
    <ul class="topul">
        <li>
        <a href="{{$website->site}}/book/{{$val->id}}" title="{{$val->title}}" target="_blank" class="top_img"><mip-img src="{{$website->public}}/images/5s.jpg"></mip-img></a>
            <h2><mip-link href="{{$website->site}}/book/{{$val->id}}">{{$val->title}}</mip-link></h2>
            <p>{{$val->intro}}</p>
            <span class="author">{{$val->author}}</span>
            <span class="other">{{$val->updated_at}}</span>
        </li>
    </ul>
    @endforeach
    {!! $fictions->links() !!}

    
    @include('m_dome2.footer')
</body>
</html>

