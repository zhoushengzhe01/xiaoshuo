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

	<div class="myright" style="border-radius: 3px; border: 1px solid #8D6661">
	<form action="" method="post" name="checkform" id="checkform" onsubmit="return check_confirm();">
	<div class="gridtop">您的书架可收藏 {{$user->level->collect}} 本，已收藏 {{$count}} 本。</div>
	<table class="grid" width="100%" align="center" cellpadding="0" cellspacing="0">
		<tr align="content">
			<th width="18%">文章名称</th>
			<th width="25%">最新章节</th>
			<th width="25%">书签</th>
			<th width="15%">更新</th>
			<th width="7%">操作</th>
		</tr>
		@foreach ($fictions as $key=>$val)
		<tr class="booktr">
			<td class="even"><a href="{{$website->site}}/book/{{$val->id}}">{{$val->title}}</a></td>
			<td class="odd"><a href="{{$website->site}}/book/{{$val->id}}/{{$val->new_catalog_id}}">{{$val->new_catalog_title}}</a></td>
			<td class="even"><a href="{{$website->site}}/book/{{$val->id}}/{{$val->catalog_id}}">{{$val->catalog_title}}</a></td>
			<td class="odd" align="left">{{$val->publish_at}}</td>
			<td class="even" align="left">
				<a href="javascript:if(confirm('确实要将本书移出书架么？')) document.location='{{$website->site}}/collect/del/?id={{$val->collect_id}}';">移除</a>
			</td>
		</tr>
		@endforeach
		<div class="clear"></div>
		<tr>
			<td colspan="6" align="center" class="foot">
			{!! $fictions->links() !!}
			</td>
		</tr>
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