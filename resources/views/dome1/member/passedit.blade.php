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
	
	@include('dome1.member.left')


	<div class="myright" style="border: 1px solid #8D6661; border-right: 0px; border-radius: 3px;">
		<p class="userinfo">修改个人密码</p>
		<form name="frmpassedit" id="frmpassedit" action="{{$website->site}}/passedit" method="post" onsubmit="return frmpassedit_validate();">
		<table width="100%" class="grid" cellspacing="0" cellpadding="0" align="center" style="margin: 0px auto">
		<tbody>
			<tr valign="middle" align="left">
				<td class="odd" width="25%">用户名</td>
				<td class="even">{{$user->username}}</td>
			</tr>
			<tr valign="middle" align="left">
				<td class="odd" width="25%">原密码</td>
				<td class="even"><input type="password" class="text" name="oldpass" id="oldpass" size="25" maxlength="20" value=""></td>
			</tr>
			<tr valign="middle" align="left">
				<td class="odd" width="25%">新密码</td>
				<td class="even"><input type="password" class="text" name="newpass" id="newpass" size="25" maxlength="20" value=""></td>
			</tr>
			<tr valign="middle" align="left">
				<td class="odd" width="25%">重复新密码</td>
				<td class="even"><input type="password" class="text" name="repass" id="repass" size="25" maxlength="20" value=""></td>
			</tr>
			<tr valign="middle" align="left">
				<td class="odd" width="25%">{!! csrf_field() !!}</td>
				<td class="even"><input type="submit" class="button" name="submit" id="submit" value="保 存"></td>
			</tr>
		</tbody>
		</table>
		</form>
	</div>
	<div class="clear"></div>
</div>
<script>document.getElementById("id1").style.fontWeight="600";</script>
	
@include('dome1.footer')

</div>
</body>
</html>