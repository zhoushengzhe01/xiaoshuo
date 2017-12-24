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
	<a href="{{$website->site}}">首页</a><span class="jiantou"><img src="{{$website->public}}/images/jiantou.png" /></span>用户注册
</div>
<div class="login register">
    <div class="lform">
        <form name="frmregister" id="frmregister" action="{{$website->site}}/register" method="post">
			<div class="one">
            	<span class="s1">注册帐号：</span>
                <span class="s2"><input type="text" class="s3" name="username" id="username" size="25" maxlength="30"/></span>
			</div>
			<div class="one">
            	<span class="s1">真实名称：</span>
                <span class="s2"><input type="text" class="s3" name="nickname" id="nickname" size="25" maxlength="30"/></span>
            </div>

			<div class="one">
            	<span class="s1">密　　码：</span>
                <span class="s2"><input type="password" class="s3" name="password" id="password" size="25" maxlength="20"/></span>
            </div>
            
			<div class="one">
            	<span class="s1">重复密码：</span>
                <span class="s2"><input type="password" class="s3" name="setpassword" id="setpassword" size="25" maxlength="20"/></span>
			</div>
			<div class="one">
            	<span class="s1">邮　　箱：</span>
                <span class="s2"><input type="password" class="s3" name="email" id="email" size="25" maxlength="20"/></span>
            </div>
            
			<div class="one">
            	<span class="s1">性　　别：</span>
                <span class="s2">
					<input type="radio" class="radio" name="sex" value="1"/> 男
					<input type="radio" class="radio" name="sex" value="2"/> 女
					<input type="radio" class="radio" name="sex" value="0" checked="checked"/> 保密
                </span>
            </div>
			<div class="one">
            	<span class="s1">{!! csrf_field() !!}</span>
                <span class="s2"><input type="submit" class="s4" name="submit"  id="submit" value="提 交" /></span>
            </div>
        </form>
    </div>

</div>
</div>

@include('dome2.footer')
</div>
</body>
</html>
