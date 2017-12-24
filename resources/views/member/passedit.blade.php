@extends($template.'.member')

@section('content')
<div class="mt_member">
	@include('member.left')
	<div class="mt_right">
		<div class="mt_right_min">
			<div class="right_content">
				<div class="mt_title">修改个人密码</div>
				<div class="mt_body">
				<form action="{{$website->site}}/passedit" method="post">
					<table width="100%" border="0" cellspacing="1" cellpadding="" style="">
					<tbody>
						<tr>
							<td width="20%" class="mt_tl">用户名</td>
							<td width="80%" class="mt_tl">{{$user->username}}</td>
						</tr>
						<tr>
							<td class="mt_tl">原密码</td>
							<td class="mt_tl"><input type="password" class="text" name="oldpass" id="oldpass" size="25" maxlength="20" value=""></td>
						</tr>
						<tr>
							<td class="mt_tl">新密码</td>
							<td class="mt_tl"><input type="password" class="text" name="newpass" id="newpass" size="25" maxlength="20" value=""></td>
						</tr>
						<tr>
							<td class="mt_tl">重复新密码</td>
							<td class="mt_tl"><input type="password" class="text" name="repass" id="repass" size="25" maxlength="20" value=""></td>
						</tr>
						<tr>
							<td>{!! csrf_field() !!}</td>
							<td class="mt_tl"><input type="submit" class="button" name="submit" id="submit" value="保 存"></td>
						</tr>
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection