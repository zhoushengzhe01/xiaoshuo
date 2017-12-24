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
	
	@include('dome1.header')

	<br/>
	<br/>
	<form name="frmlogin" method="post" action="{{$website->site}}/login">
	<table class="grid" width="300" align="center" style="margin: 0px auto; border-radius: 0px; border-radius:0px 0px 5px 5px; border: 1px solid #8D6661" >
		<caption class="userlogin">用户登录</caption>
		<tr align="center">
			<td class="odd">
				<br/>
				<table width="250px" height="110px" class="hide" border="0" cellspacing="0" cellpadding="5">
					<tr>
						<td width="37%" align="right" valign="middle">用户名：</td>
						<td width="63%"><input type="text" class="text" size="20" maxlength="30" style="width:120px" name="username" onKeyPress="javascript: if (event.keyCode==32) return false;" ></td>
					</tr>
					<tr>
						<td align="right" valign="middle">密　码：</td>
						<td><input type="password" class="text" size="20" maxlength="30" style="width:120px" name="password"></td>
					</tr>
					<tr>
						<td><input type="hidden" name="action" value="login">{!! csrf_field() !!}</td>
						<td><input type="submit" class="button" value="&nbsp;登&nbsp;&nbsp;录&nbsp;" name="submit"></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr align="center"> 
			<td class="foot">
				<a href="{{$website->site}}/register">新用户注册</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="getpass.html">取回密码</a> 
			</td>
		</tr>
	</table>
	</form>
	<br/>
	<br/>

	@include('dome1.footer')
	
</div>
</body>
</html>
