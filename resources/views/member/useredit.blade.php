@extends($template.'.member')

@section('content')
<div class="mt_member">
	@include('member.left')
	<div class="mt_right">
		<div class="mt_right_min">
			<div class="right_content">
				<div class="mt_title">修改资料</div>
				<div class="mt_body">
				<form action="{{$website->site}}/sendmessage" method="post">
					<table width="100%" border="0" cellspacing="1" cellpadding="">
					<tbody>
						<tr>
							<td class="mt_tl">用户名</td>
							<td class="mt_tl">{{$user->username}}</td>
						</tr>
						<tr>
							<td class="mt_tl">昵称</td>
							<td class="mt_tl"><input type="text" class="text" name="nickname" id="nickname" size="25" maxlength="39" value="{{$user->nickname}}"></td>
						</tr>
						<tr>
							<td class="mt_tl">Email</td>
							<td class="mt_tl"><input type="text" class="text" name="email" id="email" size="25" maxlength="60" value="{{$user->email}}"></td>
						</tr>
						<tr>
							<td class="mt_tl">性别</td>
							<td class="mt_tl">
							<input type="radio" class="radio" name="sex" value="1" @if ($user->sex==1) checked="checked" @endif>男  
							<input type="radio" class="radio" name="sex" value="2" @if ($user->sex==2) checked="checked" @endif>女  
							<input type="radio" class="radio" name="sex" value="0" @if ($user->sex==0) checked="checked" @endif>保密
							</td>
						</tr>
						<tr>
							<td class="mt_tl">QQ</td>
							<td class="mt_tl"><input type="text" class="text" name="qq" id="qq" size="25" maxlength="15" value="{{$user->qq}}"></td>
						</tr>
						<tr>
							<td class="mt_tl">MSN</td>
							<td class="mt_tl"><input type="text" class="text" name="msn" id="msn" size="25" maxlength="30" value="{{$user->msn}}"></td>
						</tr>
						<tr>
							<td class="mt_tl">网站</td>
							<td class="mt_tl"><input type="text" class="text" name="website" id="website" size="25" maxlength="100" value="{{$user->website}}"></td>
						</tr>
						<tr>
							<td class="mt_tl">用户签名</td>
							<td class="mt_tl" style="padding: 10px 10px;"><textarea class="textarea" name="sign" id="sign" rows="6" cols="60">{{$user->sign}}</textarea></td>
						</tr>
						<tr>
							<td class="mt_tl">个人简介</td>
							<td class="mt_tl" style="padding: 10px 10px;"><textarea class="textarea" name="intro" id="intro" rows="6" cols="60">{{$user->intro}}</textarea></td>
						</tr>
						<tr>
							<td>{!! csrf_field() !!}</td>
							<td class="mt_tl"><input type="submit" class="button" name="submit" id="submit" value="保 存"></td>
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