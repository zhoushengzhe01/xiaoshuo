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

	<div class="myright" style=" border: 1px solid #8D6661; border-right: 0px; border-radius: 3px;">
		<p class="userinfo">设置个人用户头像</p>
		<form name="setavatar" id="setavatar" action="{{$website->site}}/sethead" method="post" enctype="multipart/form-data">
		<table width="100%" class="grid" cellspacing="1" align="center">
		<tbody>
			<tr valign="middle" align="left">
				<td class="odd" width="25%">用户名</td>
				<td class="even">{{$user->username}}</td>
			</tr>
			<tr valign="middle" align="left">
				<td class="odd" width="25%">当前头像</td>
				<td class="even"><img src="{{$website->site}}/{{$user->head}}" style="width: 100px;height: 100px;margin: 4px 0px;"/></td>
			</tr>
			<tr valign="middle" align="left">
				<td class="odd" width="25%">上传头像</td>
				<td class="even"><input type="file" class="text" size="30" name="photo" id="photo"><br>
				<span class="hottext" style="color: red">头像图片格式为 .gif .jpg .jpeg .png ，文件大小不能超过 1000K</span>
				</td>
			</tr>
			<tr valign="middle" align="left">
				<td class="odd" width="25%">{!! csrf_field() !!}</td>
				<td class="even"><input type="submit" class="button" name="submit" id="submit" value="上传头像"></td>
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