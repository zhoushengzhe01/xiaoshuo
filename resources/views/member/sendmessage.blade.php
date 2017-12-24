@extends($template.'.member')

@section('content')
<div class="mt_member">
	@include('member.left')
	<div class="mt_right">
		<div class="mt_right_min">
			<div class="right_content">
				<div class="mt_title">发邮件</div>
				<div class="mt_body">
				<form action="{{$website->site}}/sendmessage" method="post">
					<table width="100%" border="0" cellspacing="1" cellpadding="">
					<tbody>
						<tr>
							<td class="mt_tl">收件人</td>
							<td class="mt_tl">网站管理员<input type="hidden" name="username" value="admin"></td>
						</tr>
						<tr>
							<td class="mt_tl">标题</td>
							<td class="mt_tl"><input type="text" class="text" name="title" size="30" maxlength="100"></td>
						</tr>
						<tr>
							<td class="mt_tl">内容</td>
							<td class="mt_tl" style="padding: 10px 10px;"><textarea class="textarea" name="content" rows="12" cols="60"></textarea></td>
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