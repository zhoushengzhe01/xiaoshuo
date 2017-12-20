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
	<div class="gridtop">您的书架可收藏 20 本，已收藏 4 本，本组有 3 本。</div>
	<table class="grid" width="100%" align="center" cellpadding="0" cellspacing="0">
		<tr align="content">
			<th width="5%"><input type="checkbox" id="checkall" name="checkall" value="checkall" onclick="javascript: for (var i=0;i<this.form.elements.length;i++){ if (this.form.elements[i].name != 'checkkall') this.form.elements[i].checked = form.checkall.checked; }"></th>
			<th width="21%">文章名称</th>
			<th width="30%">最新章节</th>
			<th width="30%">书签</th>
			<th width="7%">更新</th>
			<th width="7%">操作</th>
		</tr>
		@foreach ($collect as $key=>$val)		
		
		<tr class="booktr">
			<td class="odd" align="left"><input type="checkbox" id="checkid[]" name="checkid[]" value="12"></td>
			<td class="even"><a href="{{$website->site}}/book/{{$val->fiction_id}}">{{$val->fiction_title}}</a></td>
			<td class="odd"><a href="{{$website->site}}/book/{{$val->catalog_id}}">{{$val->catalog_title}}</a></td>
			<td class="even"><a href="#" target="_blank"></a></td>
			<td class="odd" align="left">04-24</td>
			<td class="even" align="left"><a href="javascript:if(confirm('确实要将本书移出书架么？')) document.location='/modules/article/bookcase.php?delid=12';">移除</a></td>
		</tr>

		@endforeach
		<div class="clear"></div>
		{!! $collect->links() !!}

	  	
	  <tr class="booktr">
		<td class="odd" align="left">
		<input type="checkbox" id="checkid[]" name="checkid[]" value="9">    </td>
		<td class="even" ><a href="/modules/article/readbookcase.php?bid=9&aid=379" target="_blank">武道狂神</a></td>
		<td class="odd"><a href="/modules/article/readbookcase.php?bid=9&aid=379&cid=64847" target="_blank">第一百七十五章 晋升六阶</a>
		
		</td>
		<td class="even"><a href="#" target="_blank"></a></td>
		<td class="odd" align="left">04-22
		</td>
		<td class="even" align="left"><a href="javascript:if(confirm('确实要将本书移出书架么？')) document.location='/modules/article/bookcase.php?delid=9';">移除</a></td>
	
	  <tr class="booktr">
		<td class="odd" align="left">
		<input type="checkbox" id="checkid[]" name="checkid[]" value="11">    </td>
		<td class="even" ><a href="/modules/article/readbookcase.php?bid=11&aid=350" target="_blank">尊主大人别想逃</a></td>
		<td class="odd"><a href="/modules/article/readbookcase.php?bid=11&aid=350&cid=59660" target="_blank">第二百二十一章 终</a>
		
		</td>
		<td class="even"><a href="#" target="_blank"></a></td>
		<td class="odd" align="left">04-22
		</td>
		<td class="even" align="left"><a href="javascript:if(confirm('确实要将本书移出书架么？')) document.location='/modules/article/bookcase.php?delid=11';">移除</a></td>
	  
		</tr>
		<tr>
		<td colspan="6" align="center" class="foot">选中项目
		<select name="newclassid" id="newclassid">
		<option value="-1" selected="selected">移出书架</option>
		<option value="0">移到默认书架</option>
		
		<option value="1">移到第1组书架</option>
		
		<option value="2">移到第2组书架</option>
		
		<option value="3">移到第3组书架</option>
		
		<option value="4">移到第4组书架</option>
		
		<option value="5">移到第5组书架</option>
		
	  </select> <input name="btnsubmit" type="submit" value=" 确认 " class="button" /><input name="clsssid" type="hidden" value="0" /></td>
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