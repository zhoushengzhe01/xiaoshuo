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
<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>

<div class="main">
	
	@include('dome1.header')

	<br/>
	<br/>
	<form name="frmlogin" method="post" action="{{$website->site}}/register">
	<table class="grid" width="300" align="center" style="margin: 0px auto; border-radius: 0px; border-radius:0px 0px 5px 5px; border: 1px solid #8D6661" >
		<caption class="userlogin">新用户注册</caption>
		<tr align="center">
			<td class="odd">

				<table width="500px" height="300px" class="hide" border="0" cellspacing="0" cellpadding="5" style="margin: 10px;">
					<tr>
						<td width="30%" align="right" valign="middle">用户名称：</td>
						<td width="70%">
						<input type="text" class="text" size="20" maxlength="30" style="width:150px" name="username">
						（必填）
						</td>
					</tr>
					<tr>
						<td width="30%" align="right" valign="middle">真实名称：</td>
						<td width="70%">
						<input type="text" class="text" size="20" maxlength="30" style="width:150px" name="nickname">
						（可选）
						</td>
					</tr>
					<tr>
						<td align="right" valign="middle">密　　码：</td>
						<td>
						<input type="password" class="text" size="20" maxlength="30" style="width:150px" name="password">
						（必填）
						</td>
					</tr>
					<tr>
						<td align="right" valign="middle">确认密码：</td>
						<td>
						<input type="password" class="text" size="20" maxlength="30" style="width:150px" name="setpassword">
						（必填）
						</td>
					</tr>
					<tr>
						<td align="right" valign="middle">邮　　箱：</td>
						<td>
						<input type="text" class="text" size="20" maxlength="30" style="width:150px" name="email">
						（必填）
						</td>
					</tr>
					<tr>
						<td align="right" valign="middle">性　　别：</td>
						<td>
							<input type="radio" class="radio" name="sex" value="1"/>男
							<input type="radio" class="radio" name="sex" value="2"/>女
							<input type="radio" class="radio" name="sex" value="0" checked="checked" />保密
						</td>
					</tr>
					<tr>
						<td align="right" valign="middle">QQ　号码：</td>
						<td>
						<input type="text" class="text" size="20" maxlength="30" style="width:150px" name="qq">
						（可选）
						</td>
					</tr>
					<tr>
						<td class="odd" width="25%">{!! csrf_field() !!}</td>
						<td class="even"><input type="submit" class="button" name="submit"  id="submit" value="提 交" /></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr align="center"> 
			<td class="foot">
				<a href="register.html">新用户注册</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
