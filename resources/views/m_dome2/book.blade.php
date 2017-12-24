<!DOCTYPE html>
<html mip>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
<link rel="stylesheet" type="text/css" href="https://mipcache.bdstatic.com/static/v1/mip.css">
<link rel="canonical" href="{{$website->site}}/book/385.html">
<title>绝世唐门-唐家三少-玄幻小说-17模板网手机阅读</title>
<meta name="keywords" content="绝世唐门,绝世唐门全文字手打,绝世唐门手机免费阅读,绝世唐门txt下载,唐家三少," />
<meta name="description" content="绝世唐门是作家唐家三少的最新作品,17模板网提供绝世唐门全文字手打,绝世唐门手机免费阅读或下载" />
<style mip-custom>
body,ul,li,p,span,h1,h2,h3,h4,h5,h6.dl,dt,dd{margin:0px;padding:0px;font-size:12px;}ul,li{list-style:none;}h1,h2,h3,h4,h5,h6{font-weight:normal}.foot{background:#47A1DF;color:#fff}.foot li{float:left;width:33%;height:40px;line-height:40px;text-align:center}.foot a{color:#fff;}.dixian{color:#999;text-align:center;margin:10px 0px;}.clear{clear:both;}.nav{height:50px;line-height:50px;background:#47A1DF}.nav mip-link{color:#fff;}.nav .sitename{position:absolute;top:0px;left:10px;font-size:18px;color:#fff;}.nav .sitename mip-img{margin-top:10px;}.nav .pagetitle{position:absolute;left:50px;right:50px;text-align:center;color:#fff;}.nav .searchico mip-img{margin-top:10px;}.nav .searchico{position:absolute;right:10px;color:#fff;}.nav .searchico mip-link{height:50px;width:30px;}.nav .userico{position:absolute;right:50px;color:#fff;}.nav .userico mip-img{margin-top:10px;}.nav .userico mip-link{height:50px;width:30px;}body{background:#eee}.info{position:relative;height:130px;background:#fff}.info h1{font-size:18px;color:#000;}.info .fm{position:absolute;top:30px;left:30px;width:60px;}.info .article{position:absolute;left:120px;top:30px;height:200px;line-height:25px;}.info .author,.info .lastchapter,.info .lastchapter mip-link{color:#999}.bookcase{position:relative;height:50px;background:#fff;}.bookcase li{position:absolute;text-align:center;height:30px;line-height:30px;border-radius:5px;}.bookcase .b1{left:3%;width:45%;background:#E87646;}.bookcase .b1 mip-link{color:#fff;}.bookcase .b2{left:52%;width:45%;border:1px solid #ccc;}.bookcase .b2 mip-link{color:#333;}.intro{background:#fff;padding:10px;padding-bottom:20px;color:#333;border-bottom:1px solid #eee;}.chapters{background:#fff;margin-top:10px;border-top:1px solid #eee}.chapters p,.chapters li{height:40px;line-height:40px;border-bottom:1px solid #eee;padding:0px 10px;}.chapters .p1 span{color:#999;padding-left:10px;font-size:10px;}.chapters .p2{color:#999;text-align:center;}
</style>
</head>
<body>
    <div class="nav">
        <div class="sitename"><mip-link href="{{$website->site}}"><mip-img src="{{$website->public}}/images/home.gif"></mip-img></mip-link></div>
        <div class="pagetitle">小说信息</div>
        <div class="searchico"><mip-link href="{{$website->site}}/search"><mip-img src="{{$website->public}}/images/search.png"></mip-img></mip-link></div>
    </div>

    <div class="info">
        <div class="fm"><mip-img src="{{$website->public}}/images/noimg.jpg"></mip-img></div>
        <ul class="article">
            <li><h1>{{$fiction->title}}</h1></li>
            <li class="author">玄幻小说 / {{$fiction->author}}</li>
            <li class="lastchapter"><mip-link href="{{$website->site}}/book/{{$fiction->id}}/{{$fiction->new_catalog_id}}">更新：{{$fiction->new_catalog_title}}</mip-link></li>
        </ul>
    </div>
    <div class="bookcase">
        <ul>
            <li class="b1"><mip-link href="#">开始阅读</mip-link></li>
            <li class="b2"><mip-link href="{{$website->site}}/collect/add?fiction_id={{$fiction->id}}">加入书架</mip-link></li>
        </ul>
        <div class="clear"></div>
    </div>
    <p class="intro">{{$fiction->intro}}</p>

    <div class="chapters">
	    <p class="p1">最新章节 <span>{{$fiction->updated_at}} 更新</span></p>
        <ul>
            @foreach ($fiction['catalog'] as $key=>$val)
            <li><mip-link href="{{$website->site}}/book/{{$fiction->id}}/{{$val->id}}">{{$val->title}}</mip-link></li>
            @endforeach
        </ul>
        <p class="p2"><mip-link href="{{$website->site}}/0/385/">查看所有章节..</mip-link></p>
    </div>

    @include('m_dome2.footer')
</body>
</html>