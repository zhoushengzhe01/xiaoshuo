	<!-- 头部部分 -->
	<div class="head">
        <div class="top">
			<div class="p2">
				@if ($user)
				<a href="{{$website->site}}/userinfo"><font color="#876762">欢迎你：{{$user->username}}（用户信息）</font></a> | <a href="{{$website->site}}/collect">我的书架</a> | <a href="/logout">退出登陆</a> | <a href="{{$website->site}}/history">阅读记录</a>
				@else
				<a href="{{$website->site}}">返回首页</a> | <a href="{{$website->site}}/login">登陆</a> <a href="{{$website->site}}/register">用户注册</a> | <a href="{{$website->site}}/collect">我的书架</a> | <a href="{{$website->site}}/history">阅读记录</a>
				@endif
			</div>
        </div>
		<div class="logo"><a href="{{$website->site}}"><img src="{{$website->public}}/images/logo.png" alt="{{$website->title}}" /></a></div>
		<div class="search">
			<form action="{{$website->site}}/search" method="get">
				<input id="text1" type="text" name="word"/>
				<input id="text2" type="submit" value="点击搜索"/>
			</form>
		</div>
		<div class="dl_sj">
			<p class="sj"><i></i><a href="{{$website->site}}/collect">书架</a></p>
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
			<li><a href="{{$website->site}}/ranking/11">完结小说</a></li>
			<div class="clear"></div>
		</ul>
	</div>
    