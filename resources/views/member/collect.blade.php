@extends($template.'.member')

@section('content')
<div class="mt_member">
	@include('member.left')
	<div class="mt_right">
		<div class="mt_right_min">
			<div class="right_content">
				<div class="mt_title">我的书架</div>
				<div class="mt_body">
					<table width="100%" border="0" cellspacing="1" cellpadding="" style="">
					<tbody>
					<tr>
						<th width="15%">文章名称</th>
						<th width="28%">最新章节</th>
						<th width="27%">书签</th>
						<th width="20%">更新</th>
						<th width="10%">操作</th>
					</tr>
					@foreach ($fictions as $key=>$val)
					<tr>
						<td><a href="{{$website->site}}/book/{{$val->id}}">{{$val->title}}</a></td>
						<td><a href="{{$website->site}}/book/{{$val->id}}/{{$val->new_catalog_id}}">{{$val->new_catalog_title}}</a></td>
						<td><a href="{{$website->site}}/book/{{$val->id}}/{{$val->catalog_id}}">{{$val->catalog_title}}</a></td>
						<td>{{$val->publish_at}}</td>
						<td><a href="javascript:if(confirm('确实要将本书移出书架么？')) document.location='{{$website->site}}/collect/del/?id={{$val->collect_id}}';">移除</a></td>
					</tr>
					@endforeach
					</tbody>
					</table>
				</div>
				<div class="mt_bottom">{!! $fictions->links() !!}</div>
			</div>
		</div>
	</div>
</div>
@endsection