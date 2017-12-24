@extends($template.'.member')

@section('content')
<div class="mt_member">
	@include('member.left')
	<div class="mt_right">
		<div class="mt_right_min">
			<div class="right_content">
				<div class="mt_title">@if ($type=='in')收件箱@else发件箱@endif 共允许消息数：{{$user->level->message}}，现有消息数：{{$count}}</div>
				<div class="mt_body">
					<table width="100%" border="0" cellspacing="1" cellpadding="" style="">
					<tbody>
						<tr>
							<th width="15%">@if ($type=='in')收件人@else发件人@endif</th>
							<th width="35%">标题</th>
							<th width="20%">日期</th>
							<th width="15%">状态</th>
							<th width="15%">操作</th>
						</tr>
						@foreach ($message as $key=>$val)
						<tr>
							<td>@if ($type=='in'){{$val->in_name}}@else{{$val->out_name}}@endif</td>
							<td>{{$val->title}}</td>
							<td>{{$val->created_at}}</td>
							<td>@if ($val->state==1) 未读 @else 已读 @endif </td>
							<td>
								<a href="{{$website->site}}/message/{{$val->id}}">查看</a>
								<a href="{{$website->site}}/message/del/{{$val->id}}">删除</a>
							</td>
						</tr>
						@endforeach
					</tbody>
					</table>
				</div>
				<div class="mt_bottom">{!! $message->links() !!}</div>
				
			</div>
		</div>
	</div>
</div>
@endsection