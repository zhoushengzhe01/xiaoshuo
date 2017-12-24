@extends($template.'.member')

@section('content')
<div class="mt_member">
	@include('member.left')
	<div class="mt_right">
		<div class="mt_right_min">
			<div class="right_content">
				<div class="mt_title">{{$message->title}}</div>
				<div class="mt_body">
					<div style="padding:15px;">{{$message->content}}</div>
				</div>
				<div class="mt_bottom">
					<a class="mt_but" href="{{$website->site}}/message/del/{{$message->id}}">删除</a>
					<a class="mt_but" href="javascript:void(0)" onclick="window.history.back(-1);">返回列表</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection