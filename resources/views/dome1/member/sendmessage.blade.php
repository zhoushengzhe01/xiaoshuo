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

	<div class="myright" style="border: 1px solid #8D6661; border-right: 0px;">
	<p class="userinfo">发邮件</p>
	<form name="frmnewmessage" id="frmnewmessage" action="{{$website->site}}/sendmessage" method="post" onsubmit="return frmnewmessage_validate();">
		<table width="100%" class="grid" cellspacing="0" align="center">
		<tbody>
		<tr valign="middle" align="left">
			<td class="odd" width="25%">收件人</td>
			<td class="even">网站管理员<input type="hidden" name="username" value="admin"></td>
		</tr>
			<tr valign="middle" align="left"><td class="odd" width="25%">标题</td>
			<td class="even"><input type="text" class="text" name="title" size="30" maxlength="100" value=""></td>
		</tr>
		<tr valign="middle" align="left">
			<td class="odd" width="25%">内容</td>
			<td class="even"><textarea class="textarea" name="content" rows="12" cols="60"></textarea></td>
		</tr>
		<tr valign="middle" align="left">
			<td class="odd" width="25%">{!! csrf_field() !!}</td>
			<td class="even"><input type="submit" class="button" name="submit" id="submit" value="发 送"></td>
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