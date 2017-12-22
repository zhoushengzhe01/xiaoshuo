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
	
	<div class="myright" style="border: 1px solid #8D6661; border-right: 0px;">
		<p class="userinfo">{{$message->title}}</p>
		<div style="padding: 15px; padding-bottom: 0px;">
			<div>{{$message->content}}</div>
			<div class="nr_page">
				<a href="{{$website->site}}/message/del/{{$message->id}}">删除</a>
				<a href="javascript:void(0)" onclick="window.history.back(-1);">返回列表</a>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<script>document.getElementById("id1").style.fontWeight="600";</script>
	
@include('dome1.footer')

</div>
</body>
</html>