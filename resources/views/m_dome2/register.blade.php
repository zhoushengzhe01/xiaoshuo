<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
<link rel="canonical" href="http://m3.ku180.com/">
<title>用户登录</title>
<link href="http://m3.ku180.com/wapcss/css.css" rel="stylesheet"/>
<script src="http://m3.ku180.com/wapjs/jquery.min.js"></script>
<script src="http://m3.ku180.com/wapjs/wap.js"></script>
</head>
<body class="loginbody">

<div class="nav">
    <div class="sitename"><a href="{{$website->site}}"></a></div>
    <div class="pagetitle">用户登录</div>
    <div class="searchico"><a href="{{$website->site}}/"></a></div>
</div>

<div class="fk login">
	<form name="frmlogin" method="post" action="{{$website->site}}/login">
		<div class="login_name">
			<div class="l1">用户名称：</div>
			<div class="l2"><input type="text"  size="20" maxlength="30" name="username"/></div>
			<div class="clear"></div>
		</div>
		<div class="login_name">
			<div class="l1">真实名称：</div>
			<div class="l2"><input type="text"  size="20" maxlength="30" name="nickname"/></div>
			<div class="clear"></div>
		</div>
		<div class="login_pass">
			<div class="l1">密　　码：</div>
			<div class="l2"><input size="20" maxlength="30" type="password" name="password"/></div>
			<div class="clear"></div>
		</div>
		<div class="login_pass">
			<div class="l1">确认密码：</div>
			<div class="l2"><input size="20" maxlength="30" type="password" name="setpassword"/></div>
			<div class="clear"></div>
		</div>
		<div class="login_name">
			<div class="l1">邮　　箱：</div>
			<div class="l2"><input type="text"  size="20" maxlength="30" value="" name="email"/></div>
			<div class="clear"></div>
		</div>
		<div style="disdisplay: none;">
			<div class="l1">性　　别：</div>
			<div class="l2">
				<input type="radio" class="radio" name="sex" value="1"/> 男
				<input type="radio" class="radio" name="sex" value="2"/> 女
				<input type="radio" class="radio" name="sex" value="0" checked="checked" /> 保密
			</div>
			<div class="clear"></div>
		</div>
		<div class="login_btn">{!! csrf_field() !!}
			<a href='javascript:;' onclick="submit()" class="dise">确认注册</a>
		</div>
		<div class="login_btn">
			<a class="dise" href="{{$website->site}}/login">有账号 登陆</a>
		</div>
		<div class="clear"></div>
	</form>
</div>
<br/><br/><br/><br/><br/><br/>
<div class="sbottom">
<div class="foot">
    	<ul>
        	<li><a href="http://m3.ku180.com">17模板网</a></li>
        	<li><a href="http://m3.ku180.com/s.php">找小说</a></li>
        	<li><a href="http://m3.ku180.com/mybook.php">我的书架</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>

	<script>
		function reloadcode(){
		var verify=document.getElementById('showcode');
		verify.setAttribute('src','/code.php?'+Math.random());
		}
    </script>

</body>
</html>

