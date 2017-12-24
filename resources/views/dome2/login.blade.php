<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>17模板网_最好看的小说网站</title>
<meta name="keywords" content="杰奇 小说 最新 最快" />
<meta name="description" content="基于杰奇小说连载系统构建，为您提供提供内容优质，更新最快的小说。" />
<link rel="stylesheet" type="text/css" href="{{$website->public}}/style/web.css" />
<script src="{{$website->public}}/script/base.js"></script>
<script src="{{$website->public}}/script/jquery-1.11.0.min.js"></script>
<script src="{{$website->public}}/script/lazyload.js"></script>
<script src="{{$website->public}}/script/web.js"></script>
<!--[if lt IE 9]>
    <script src="html5shiv.js"></script>
<![endif]-->
</head>
<body>
@include('dome2.header')

<div class="main w">
	<div class="topmenu loginmenu">
		<a href="{{$website->site}}">首页</a><span class="jiantou"><img src="{{$website->public}}/images/jiantou.png" /></span>用户登录
	</div>
	<div class="login">
		<div class="lform">
			<form name="frmlogin" method="post" action="{{$website->site}}/login">
			<div class="one">
				<span class="s1">帐号：</span>
				<span class="s2"><input type="text" class="s3" size="20" maxlength="30" name="username"></span>
			</div>
			<div class="one">
				<span class="s1">密码：</span>
				<span class="s2"><input type="password" class="s3" size="20" maxlength="30" name="password"></span>
			</div>
			<div class="one">
				<span class="s1">{!! csrf_field() !!}</span>
				<span class="s2"><input type="submit" class="s4" value="&nbsp;登&nbsp;&nbsp;录&nbsp;" name="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{$website->site}}/register">新用户注册</a></span>
			</div>
			<div class="clearfix"></div>
			</form>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

@include('dome2.footer')
</div>
</body>
</html>
