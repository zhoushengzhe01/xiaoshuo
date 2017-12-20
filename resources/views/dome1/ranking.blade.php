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
	<!-- 头部部分 -->
	<div class="head">
        <div class="top">
			<div class="p2">
				<!-- <a href="/">返回首页</a> | <a href="/login.html">登陆</a> <a href="/register.html">用户注册</a> | <a href="bookcase.html">我的书架</a> | <a href="history.html">阅读记录</a> -->
				<a href="/userdetail.php"><font color="#876762">欢迎你：zhoushengzhe（用户信息）</font></a> | <a href="bookcase.html">我的书架</a> | <a href="/">退出登陆</a> | <a href="history.html">阅读记录</a>
			</div>
        </div>
		<div class="logo"><a href="{{$website->site}}"><img src="{{$website->public}}/images/logo.png" alt="###" /></a></div>
		<div class="search">
			<form action="{{$website->site}}/search" method="get">
				<input id="text1" type="text" name="word"/>
				<input id="text2" type="submit" value="点击搜索"/>
			</form>
		</div>
		<div class="dl_sj">
			<p class="sj"><i></i><a href="bookcase.html">书架</a></p>
			<div class="clear"></div>
		</div>
	</div>
	<!--导航-->
	<div class="nav">
		<ul>
			<?php $category = App\Model\FictionsCategory::getCategorys(); ?>
			<li><a href="{{$website->site}}">首页</a></li>
			@foreach ($category as $val)
			<li><a href="{{$website->site}}/list/{{$val->id}}">{{$val->name}}小说</a></li>
			@endforeach
			<li><a href="{{$website->site}}/ranking/9">排行榜</a></li>
			<li><a href="{{$website->site}}/ranking/9">完结小说</a></li>
			<div class="clear"></div>
		</ul>
	</div>

    <!--类型-->
    <div class="rankingnav">
        <ul>
            <li><a href="{{$website->site}}/ranking/0">总点击榜</a></li>
            <li><a href="{{$website->site}}/ranking/1">月点击榜</a></li>
            <li><a href="{{$website->site}}/ranking/2">周点击榜</a></li>
            <li><a href="{{$website->site}}/ranking/3">总推荐榜</a></li>
            <li><a href="{{$website->site}}/ranking/4">月推荐榜</a></li>
            <li><a href="{{$website->site}}/ranking/5">周推荐榜</a></li>
            <li><a href="{{$website->site}}/ranking/7">月收藏榜</a></li>
            <li><a href="{{$website->site}}/ranking/8">周收藏榜</a></li>
            <li><a href="{{$website->site}}/ranking/9">最新入库</a></li>
            <li><a href="{{$website->site}}/ranking/10">最近更新</a></li>
            <div class="clear"></div>
        </ul>
    </div>
    <table class="grid" cellpadding="0" cellspacing="0" id="rankinglist" width="100%" align="center">
        <tr align="left">
            <th width="20%">文章名称</th>
            <th width="30%">最新章节</th>
            <th width="15%">作者</th>
            <th width="15%">更新</th>
            <th width="10%">状态</th>
            <th width="10%">操作</th>
        </tr>
        @foreach ($fictions as $key=>$val)
        <tr>
            <td class="odd"><a href="{{$website->site}}/book/{{$val->id}}">{{$val->title}}</a></td>
            <td class="even"><a href="{{$website->site}}/book/{{$val->id}}/{{$val->new_catalog_id}}" target="_blank">{{$val->new_catalog_title}}</a></td>
            <td class="odd"><a href="{{$website->site}}/author/?key={{$val->author}}">{{$val->author}}</a></td>
            <td class="odd" align="left">{{$val->created_at}}</td>
            <td class="even" align="left">@if ($val->state == 1) 转载中 @else 转载完毕 @endif</td>
            <td class="even" align="left">
                <a href="#">立即阅读</a>
            </td>
        </tr>
		@endforeach
    </table>

    <!--分页-->
    {!! $fictions->links() !!}

    <!--底部信息-->
    <div class="footer">
        <div class="left">
            <div class="footernav">
                <p class="p2">本站所有小说为转载作品，所有章节均由网友上传，转载至本站只是为了宣传本书让更多读者欣赏。<br/>
                    17模板网(2018) <script>__17mb_beian();__17mb_tj();__17mb_dl();</script></p>
            </div>
        </div>
        <div class="right"><p><img src="images/erweima.png" /></p></div>
        <div class="clear"></div>
    </div>
    
</div>
</body>
</html>