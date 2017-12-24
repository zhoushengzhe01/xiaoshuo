@extends($template.'.member')

@section('content')

<div class="mt_member">
	@include('member.left')
	<div class="mt_right">
		<div class="mt_right_min">
			<div class="right_content">
				<div class="mt_title">会员信息</div>
				<div class="mt_body">
				<form action="{{$website->site}}/sendmessage" method="post">
					<table width="100%" border="0" cellspacing="1" cellpadding="">
					<tbody>
					<tr>
						<td class="mt_tl" width="20%">用户ID</td>
						<td class="mt_tl" width="40%">{{$user->id}}</td>
						<td class="mt_tl" width="40%" rowspan="8"><img src="{{$user->head}}" class="avatar" alt="头像"></td>
					</tr>
					<tr>
						<td class="mt_tl">用户名</td>
						<td class="mt_tl">{{$user->username}}</td>
					</tr>
					<tr>
						<td class="mt_tl">昵称</td>
						<td class="mt_tl">{{$user->nickname}}</td>
					</tr>
		
					<tr>
						<td class="mt_tl">性别</td>
						<td class="mt_tl">@if ($user->sex==1) 男 @elseif($user->sex==2) 女 @else 保密 @endif</td>
					</tr>
					<tr>
						<td class="mt_tl">Email</td>
						<td class="mt_tl"><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
					</tr>
					<tr>
						<td class="mt_tl">QQ</td>
						<td class="mt_tl">{{$user->qq}}</td>
					</tr>
					<tr>
						<td class="mt_tl">SMN</td>
						<td class="mt_tl">{{$user->msn}}</td>
					</tr>
					<tr>
						<td class="mt_tl">个人网站</td>
						<td class="mt_tl">{{$user->website}}</td>
					</tr>
					<tr>
						<td class="mt_tl">经验值</td>
						<td class="mt_tl" colspan="2">{{$user->coin}}</td>
					</tr>
					<tr>
						<td class="mt_tl">登录 IP</td>
						<td class="mt_tl" colspan="2">{{$user->login_ip}}</td>
					</tr>
					<tr>
						<td class="mt_tl">登录时间</td>
						<td class="mt_tl" colspan="2">{{$user->updated_at}}</td>
					</tr>
					<tr>
						<td class="mt_tl">注册日期</td>
						<td class="mt_tl" colspan="2">{{$user->created_at}}</td>
					</tr>
					<tr>
						<td class="mt_tc" colspan="3" class="foot">等级信息</td>
					</tr>
					<tr>
						<td class="mt_tl">账户类型</td>
						<td class="mt_tl" colspan="2">{{$user->level->title}}</td>
					</tr>
					<tr>
						<td class="mt_tl">最多收藏</td>
						<td class="mt_tl" colspan="2">{{$user->level->collect}}</td>
					</tr>
					<tr>
						<td class="mt_tl">最大推荐</td>
						<td class="mt_tl" colspan="2">{{$user->level->recommend}}</td>
					</tr>
					<tr>
						<td class="mt_tl">每天发送邮箱数</td>
						<td class="mt_tl" colspan="2">{{$user->level->email}}</td>
					</tr>
					<tr>
						<td class="mt_tc" colspan="3" class="foot">其他信息</td>
					</tr>
					<tr>
						<td class="mt_tl">用户签名</td>
						<td class="mt_tl" colspan="2">{{$user->sign}}</td>
					</tr>
					<tr>
						<td class="mt_tl">个人简介</td>
						<td class="mt_tl" colspan="2">{{$user->intro}}</td>
					</tr>
					</tbody>
					</table>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection