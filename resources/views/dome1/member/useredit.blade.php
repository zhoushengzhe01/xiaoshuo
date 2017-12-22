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

	<div class="myright" style="border: 1px solid #8D6661; border-radius: 3px;">
		<p class="userinfo">个人用户资料修改</p>
		<form name="useredit" id="useredit" action="{{$website->site}}/useredit" method="post">
		<table width="100%" class="grid" align="center" cellpadding="0" cellspacing="0">
		<tbody>
			<tr valign="middle" align="left">
				<td class="odd" width="25%">用户名</td>
				<td class="even">{{$user->username}}</td>
			</tr>
			<tr valign="middle" align="left">
				<td class="odd" width="25%">昵称</td>
				<td class="even"><input type="text" class="text" name="nickname" id="nickname" size="25" maxlength="39" value="{{$user->nickname}}"></td>
			</tr>
			<tr valign="middle" align="left">
				<td class="odd" width="25%">Email</td>
				<td class="even"><input type="text" class="text" name="email" id="email" size="25" maxlength="60" value="{{$user->email}}"></td>
			</tr>
			<tr valign="middle" align="left">
				<td class="odd" width="25%">性别</td>
				<td class="even">
				<input type="radio" class="radio" name="sex" value="1" @if ($user->sex==1) checked="checked" @endif>男
				<input type="radio" class="radio" name="sex" value="2" @if ($user->sex==2) checked="checked" @endif>女
				<input type="radio" class="radio" name="sex" value="0" @if ($user->sex==0) checked="checked" @endif>保密
				</td>
			</tr>
			<tr valign="middle" align="left">
				<td class="odd" width="25%">QQ</td>
				<td class="even"><input type="text" class="text" name="qq" id="qq" size="25" maxlength="15" value="{{$user->qq}}"></td>
			</tr>
			<tr valign="middle" align="left">
				<td class="odd" width="25%">MSN</td>
				<td class="even"><input type="text" class="text" name="msn" id="msn" size="25" maxlength="30" value="{{$user->msn}}"></td>
			</tr>
			<tr valign="middle" align="left">
				<td class="odd" width="25%">网站</td>
				<td class="even"><input type="text" class="text" name="website" id="website" size="25" maxlength="100" value="{{$user->website}}"></td>
			</tr>
			<tr valign="middle" align="left">
				<td class="odd" width="25%">用户签名</td>
				<td class="even"><textarea class="textarea" name="sign" id="sign" rows="6" cols="60">{{$user->signature}}</textarea></td>
			</tr>
			<tr valign="middle" align="left">
				<td class="odd" width="25%">个人简介</td>
				<td class="even"><textarea class="textarea" name="intro" id="intro" rows="6" cols="60">{{$user->intro}}</textarea></td>
			</tr>
			<tr valign="middle" align="left">
				<td class="odd" width="25%">{!! csrf_field() !!}</td>
				<td class="even"><input type="submit" class="button" name="submit" id="submit" value="保 存"></td>
			</tr>
		</tbody></table>
		</form>
	</div>
	<div class="clear"></div>
</div>
<script>document.getElementById("id1").style.fontWeight="600";</script>
	
@include('dome1.footer')

</div>
</body>
</html>