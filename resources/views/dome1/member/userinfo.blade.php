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

	<div class="myright" style="border: 1px solid #8D6661; border-radius: 3px; border-right: 0px;">
		<p class="userinfo" style="border-right:1px solid #8D6661;">个人信息</p>
		<table class="grid" id="gridbox" width="100%" cellpadding="0" cellspacing="0">
		<tbody>
			<tr align="left">
				<td width="20%" class="odd">用户ID：</td>
				<td width="40%" class="even">{{$user->id}}</td>
				<td width="40%" rowspan="10" class="even" align="center" style="border-right: 1px solid #786661">
				<img src="{{$user->head}}" class="avatar" alt="头像">
				</td>
			</tr>
			<tr align="left">
				<td class="odd">用户名：</td>
				<td class="even">{{$user->username}}</td>
			</tr>
			<tr align="left">
				<td class="odd">昵称：</td>
				<td class="even">{{$user->nickname}}</td>
			</tr>

			<tr align="left">
				<td class="odd">性别：</td>
				<td class="even">@if ($user->sex==1) 男 @elseif($user->sex==2) 女 @else 保密 @endif</td>
			</tr>
			<tr align="left">
				<td class="odd">Email：</td>
				<td class="even"><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
			</tr>
			<tr align="left">
				<td class="odd">QQ：</td>
				<td class="even">{{$user->qq}}</td>
			</tr>
			<tr align="left">
				<td class="odd">SMN：</td>
				<td class="even">{{$user->msn}}</td>
			</tr>
			<tr align="left">
				<td class="odd">个人网站：</td>
				<td class="even">{{$user->website}}</td>
			</tr>
			<tr align="left">
				<td class="odd">经验值</td>
				<td class="even" colspan="2">{{$user->coin}}</td>
			</tr>
			<tr align="left">
				<td class="odd">登录 IP：</td>
				<td colspan="2" class="even">{{$user->login_ip}}</td>
			</tr>
			<tr align="left">
				<td class="odd">登录时间：</td>
				<td colspan="2" class="even">{{$user->updated_at}}</td>
			</tr>
			<tr align="left">
				<td class="odd">注册日期：</td>
				<td colspan="2" class="even">{{$user->created_at}}</td>
			</tr>
			<tr>
				<td colspan="3" class="foot">等级信息</td>
			</tr>
			<tr align="left">
				<td class="odd">账户类型：</td>
				<td colspan="2" class="even">{{$user->level->title}}</td>
			</tr>
			<tr align="left">
				<td class="odd">最多收藏：</td>
				<td colspan="2" class="even">{{$user->level->collect}}</td>
			</tr>
			<tr align="left">
				<td class="odd">最大推荐：</td>
				<td colspan="2" class="even">{{$user->level->recommend}}</td>
			</tr>
			<tr align="left">
				<td class="odd">每天发送邮箱数：</td>
				<td colspan="2" class="even">{{$user->level->email}}</td>
			</tr>
			<tr>
				<td colspan="3" class="foot">其他信息</td>
			</tr>
			<tr align="left">
				<td class="odd">用户签名：{{$user->sign}}</td>
				<td colspan="2" class="even"></td>
			</tr>
			<tr align="left">
				<td class="odd">个人简介：</td>
				<td colspan="2" class="even">{{$user->intro}}</td>
			</tr>
		</tbody></table>
	</div>
	<div class="clear"></div>
</div>
<script>document.getElementById("id1").style.fontWeight="600";</script>
	
@include('dome1.footer')

</div>
</body>
</html>