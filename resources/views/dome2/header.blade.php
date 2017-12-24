<!--头部信息-->
<div class="header">
	<div class="top w">
    	<div class="p1">欢迎书友访问<a href="http://b3.ku180.com">17模板网</a></div>
        <div class="p2">
			@if ($user)
			<a href="{{$website->site}}">返回首页</a> | <a href="{{$website->site}}/userinfo"><font color="#269e26">欢迎你：{{$user->username}}（用户信息）</font></a> | <a href="{{$website->site}}/collect">我的书架</a> | <a href="{{$website->site}}/logout" target="_self">退出登陆</a> | <a href="{{$website->site}}/history">阅读记录</a>
			@else
			<a href="{{$website->site}}">返回首页</a> | <a href="{{$website->site}}/login">登陆</a> <a href="{{$website->site}}/register" target="_top">用户注册</a> | <a href="{{$website->site}}/collect">我的书架</a> | <a href="{{$website->site}}/history">阅读记录</a>
			@endif
		</div>
    </div>
    <div class="banner w">
    	<h1 class="logo"><a href="{{$website->site}}"><img src="{{$website->public}}/images/logo.png" alt="{{$website->title}}" /></a></h1>
        <div class="s">
            <form name="t_frmsearch" method="get" action="{{$website->site}}/search">
                <div class="searchkey"><input name="word" type="text" placeholder="请输入搜索词..."></div>
                <div class="searchsubmit"><input type="submit" value=""></div>
            </form>
        </div>
    </div>
    <div class="menu w">
    	<ul>
			<?php $category = App\Model\FictionsCategory::getCategorys(); ?>
			<li class="home curr"><a href="{{$website->site}}">首页</a></li>
			@foreach ($category as $key=>$val)
			<li id="m{{$key+1}}"><a href="{{$website->site}}/list/{{$val->id}}">{{$val->name}}</a></li>
			@endforeach
            <li id="m9"><a href="{{$website->site}}/ranking/9">排行榜</a></li>
            <li id="m10"><a href="{{$website->site}}/collect" rel="nofollow">书架</a></li>
		</ul>
        <div class="clearfix"></div>
    </div>
</div>
