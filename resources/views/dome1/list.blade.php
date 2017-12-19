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
			<form action="search.html" method="post">
				<input id="text1" type="text" name="searchkey" />
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
			<li><a href="{{$website->site}}">排行榜</a></li>
			<li><a href="{{$website->site}}">完结小说</a></li>
			<div class="clear"></div>
		</ul>
	</div>
	
	<div class="fl_left">
		<ul>
			@foreach ($category as $val)
			<li><a href="{{$website->site}}/list/{{$val->id}}">{{$val->name}}小说</a></li>
			@endforeach
		</ul>
	</div>

	<div class="fl_right">
		
		<div class="tt">
			<h3><a href="/0/379/">武道狂神</a></h3>
			<span class="pic"><a href="/0/379/"><img src="images/5s.jpg" width="78" height="108" /></a></span>
			<div class="pp">
				<p class="p1"><a href="#">作者：西湖龙王爷</a></p>
				<p class="p2">李学浩在族谱的封皮中找到一本修道秘笈，花了十年时间终于筑基成功，不料急于求成之下走火入魔，身死之后重生到了日本的横滨市，附身于鹤见区的樱野高等学校一个高一学生真中浩二的身上，故事从这里展开……分享书籍《神奈川的高校生道士》作者：李童</p>
			</div>
			<div class="novellink">
				<p><a href="#">立即阅读</a></p>
				<p><a href="#">加入书架</a></p>
				<p><a href="#">推荐本书</a></p>
				<div class="clear"></div>
			</div>
		</div>

		<div class="tt">
			<h3><a href="/0/379/">武道狂神</a></h3>
			<span class="pic"><a href="/0/379/"><img src="images/5s.jpg" width="78" height="108" /></a></span>
			<div class="pp">
				<p class="p1"><a href="#">作者：西湖龙王爷</a></p>
				<p class="p2">李学浩在族谱的封皮中找到一本修道秘笈，花了十年时间终于筑基成功，不料急于求成之下走火入魔，身死之后重生到了日本的横滨市，附身于鹤见区的樱野高等学校一个高一学生真中浩二的身上，故事从这里展开……分享书籍《神奈川的高校生道士》作者：李童</p>
			</div>
			<div class="novellink">
				<p><a href="#">立即阅读</a></p>
				<p><a href="#">加入书架</a></p>
				<p><a href="#">推荐本书</a></p>
				<div class="clear"></div>
			</div>
		</div>
		<div class="tt">
			<h3><a href="/0/379/">武道狂神</a></h3>
			<span class="pic"><a href="/0/379/"><img src="images/5s.jpg" width="78" height="108" /></a></span>
			<div class="pp">
				<p class="p1"><a href="#">作者：西湖龙王爷</a></p>
				<p class="p2">李学浩在族谱的封皮中找到一本修道秘笈，花了十年时间终于筑基成功，不料急于求成之下走火入魔，身死之后重生到了日本的横滨市，附身于鹤见区的樱野高等学校一个高一学生真中浩二的身上，故事从这里展开……分享书籍《神奈川的高校生道士》作者：李童</p>
			</div>
			<div class="novellink">
				<p><a href="#">立即阅读</a></p>
				<p><a href="#">加入书架</a></p>
				<p><a href="#">推荐本书</a></p>
				<div class="clear"></div>
			</div>
		</div>

		<div class="tt">
			<h3><a href="/0/379/">武道狂神</a></h3>
			<span class="pic"><a href="/0/379/"><img src="images/5s.jpg" width="78" height="108" /></a></span>
			<div class="pp">
				<p class="p1"><a href="#">作者：西湖龙王爷</a></p>
				<p class="p2">李学浩在族谱的封皮中找到一本修道秘笈，花了十年时间终于筑基成功，不料急于求成之下走火入魔，身死之后重生到了日本的横滨市，附身于鹤见区的樱野高等学校一个高一学生真中浩二的身上，故事从这里展开……分享书籍《神奈川的高校生道士》作者：李童</p>
			</div>
			<div class="novellink">
				<p><a href="#">立即阅读</a></p>
				<p><a href="#">加入书架</a></p>
				<p><a href="#">推荐本书</a></p>
				<div class="clear"></div>
			</div>
		</div>
		<div class="tt">
			<h3><a href="/0/379/">武道狂神</a></h3>
			<span class="pic"><a href="/0/379/"><img src="images/5s.jpg" width="78" height="108" /></a></span>
			<div class="pp">
				<p class="p1"><a href="#">作者：西湖龙王爷</a></p>
				<p class="p2">李学浩在族谱的封皮中找到一本修道秘笈，花了十年时间终于筑基成功，不料急于求成之下走火入魔，身死之后重生到了日本的横滨市，附身于鹤见区的樱野高等学校一个高一学生真中浩二的身上，故事从这里展开……分享书籍《神奈川的高校生道士》作者：李童</p>
			</div>
			<div class="novellink">
				<p><a href="#">立即阅读</a></p>
				<p><a href="#">加入书架</a></p>
				<p><a href="#">推荐本书</a></p>
				<div class="clear"></div>
			</div>
		</div>
		<div class="tt">
			<h3><a href="/0/379/">武道狂神</a></h3>
			<span class="pic"><a href="/0/379/"><img src="images/5s.jpg" width="78" height="108" /></a></span>
			<div class="pp">
				<p class="p1"><a href="#">作者：西湖龙王爷</a></p>
				<p class="p2">李学浩在族谱的封皮中找到一本修道秘笈，花了十年时间终于筑基成功，不料急于求成之下走火入魔，身死之后重生到了日本的横滨市，附身于鹤见区的樱野高等学校一个高一学生真中浩二的身上，故事从这里展开……分享书籍《神奈川的高校生道士》作者：李童</p>
			</div>
			<div class="novellink">
				<p><a href="#">立即阅读</a></p>
				<p><a href="#">加入书架</a></p>
				<p><a href="#">推荐本书</a></p>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pages">
			<div class="pagelink" id="pagelink">
				<em id="pagestats">1/1</em>
				<a href="#" class="first">1</a>
				<a href="#" class="pgroup">&lt;&lt;</a>
				<strong>1</strong>
				<a href="#" class="ngroup">&gt;&gt;</a>
				<a href="#" class="last">1</a>
			</div>
		</div>
	</div>
	<div class="clear"></div>
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
