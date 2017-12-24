@extends($template.'.member')

@section('content')
<div class="mt_member">
	@include('member.left')
	<div class="mt_right">
		<div class="mt_right_min">
			<div class="right_content">
				<div class="mt_title">设置头像</div>
				<div class="mt_body">
				<form action="{{$website->site}}/sendmessage" method="post">
					<table width="100%" border="0" cellspacing="1" cellpadding="">
					<tbody>
						<tr>
							<td class="mt_tl">用户名</td>
							<td class="mt_tl">{{$user->username}}</td>
						</tr>
						<tr>
							<td class="mt_tl">当前头像</td>
							<td class="mt_tl" style="padding: 10px 10px;"><img src="{{$website->site}}/{{$user->head}}" width="100"/></td>
						</tr>
						<tr>
							<td class="mt_tl">上传头像</td>
							<td class="mt_tl">
								<input type="file" class="text" size="30" name="photo"> <span>图片格式：.gif .jpg .jpeg .png</span>
							</td>
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