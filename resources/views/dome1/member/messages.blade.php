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
	
	<!-- 左边菜单 -->
	<div class="mytop">
		<div class="myleft">
		<div class="myleft_top">
			<p>用户设置</p>
			<ul>
				<li id="id1"><a href="{{$website->site}}/collect">我的书架</a></li>
				<li id="id2"><a href="{{$website->site}}/userinfo">用户资料</a></li>
				<li id="id3"><a href="{{$website->site}}/useredit">修改资料</a></li>
				<li id="id4"><a href="{{$website->site}}/setavatar">设置头像</a></li>
				<li id="id5"><a href="{{$website->site}}/passedit">修改密码</a></li>
				<li><a href="{{$website->site}}/logout">退出登录</a></li>
			</ul>
		</div>
		<div class="myleft_bottom">
			<p>短消息</p>
			<ul>
				<li id="id6"><a href="{{$website->site}}/inboxemail">收件箱</a></li>
				<li id="id7"><a href="{{$website->site}}/outboxemail">发件箱</a></li>
				<li id="id8"><a href="{{$website->site}}/sendemail">写给管理员</a></li>
			</ul>
		</div>
	</div>

	<div class="myright" style="border-radius: 3px; border: 1px solid #8D6661">
	<form action="" method="post" name="checkform" id="checkform" onsubmit="return check_confirm();">
	<div class="gridtop">@if ($type=='in')收件箱@else发件箱@endif 共允许消息数：{{$user->level->message}}，现有消息数：{{$count}}）</div>
	<table class="grid" width="100%" align="center" cellpadding="0" cellspacing="0">
		<tr align="content">
			<th width="20%">@if ($type=='in')收件人@else发件人@endif</th>
			<th width="40%">标题</th>
			<th width="15%">日期</th>
			<th width="10%">状态</th>
			<th width="15%">操作</th>
		</tr>
		@foreach ($message as $key=>$val)
		<tr class="booktr">
			<td class="even">@if ($type=='in'){{$val->in_name}}@else{{$val->out_name}}@endif</td>
			<td class="odd">{{$val->title}}</td>
			<td class="even">{{$val->created_at}}</td>
			<td class="odd">@if ($val->state==1) 未读 @else 已读 @endif </td>
			<td class="odd">
				<a href="{{$website->site}}/message/{{$val->id}}">查看</a>
				<a href="{{$website->site}}/message/del/{{$val->id}}">删除</a>
			</td>
		</tr>
		@endforeach
		<div class="clear"></div>
		<tr>
			<td colspan="6" align="center" class="foot">
			{!! $message->links() !!}
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