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
	<!-- 头部部分 -->
	<div class="head">
        <div class="top">
			<div class="p2">
				<!-- <a href="/">返回首页</a> | <a href="/login.html">登陆</a> <a href="/register.html">用户注册</a> | <a href="bookcase.html">我的书架</a> | <a href="history.html">阅读记录</a> -->
				<a href="/userdetail.php"><font color="#876762">欢迎你：zhoushengzhe（用户信息）</font></a> | <a href="bookcase.html">我的书架</a> | <a href="/">退出登陆</a> | <a href="history.html">阅读记录</a>
			</div>
        </div>
		<div class="logo"><a href="{{$website->site}}"><img src="{{$website->public}}/images/logo.png" alt="###" /></a></div>
		<div class="search">
			<form action="{{$website->site}}/search" method="get">
				<input id="text1" type="text" name="word"/>
				<input id="text2" type="submit" value="点击搜索"/>
			</form>
		</div>
		<div class="dl_sj">
			<p class="sj"><i></i><a href="bookcase.html">书架</a></p>
			<div class="clear"></div>
		</div>
	</div>
	<!--导航-->
	<div class="nav">
		<ul>
			<?php $category = App\Model\FictionsCategory::getCategorys(); ?>
			<li><a href="{{$website->site}}">首页</a></li>
			@foreach ($category as $val)
			<li><a href="{{$website->site}}/list/{{$val->id}}">{{$val->name}}小说</a></li>
			@endforeach
			<li><a href="{{$website->site}}/ranking/9">排行榜</a></li>
			<li><a href="{{$website->site}}/ranking/11">完结小说</a></li>
			<div class="clear"></div>
		</ul>
	</div>
	
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
	
	<!--底部信息-->
	<div class="footer">
			<div class="left">
				<div class="footernav">
					<p class="p2">本站所有小说为转载作品，所有章节均由网友上传，转载至本站只是为了宣传本书让更多读者欣赏。<br/>
						17模板网(2018) <script>__17mb_beian();__17mb_tj();__17mb_dl();</script></p>
				</div>
			</div>
			<div class="right"><p><img src="../images/erweima.png" /></p></div>
			<div class="clear"></div>
		</div>
	</div>

</div>
</body>
</html>