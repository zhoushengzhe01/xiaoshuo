<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk">
<title>好看的都市小说,都市小说排行榜-17模板网</title>
<meta name="keywords" content="好看的都市小说,都市小说排行榜,都市小说,17模板网">
<meta name="description" content="17模板网提供好看的都市小说,都市小说排行榜,17模板网为广大网友提供都市小说免费在线无弹窗阅读,17模板网还提供都市小说txt下载。">
<link href="style/style.css" rel="stylesheet" />
<script src="script/common.js"></script>
<script src="script/base.js"></script>
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
		<div class="logo"><a href="/"><img src="images/logo.png" alt="17模板网" /></a></div>
		<div class="search">
			<form action="search.html" method="post">
				<input id="text1" type="text" name="searchkey" />
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
			<li><a href="/">首页</a></li>
			<li><a href="">玄幻小说</a></li>
			<li><a href="">仙侠小说</a></li>
			<li><a href="">都市小说</a></li>
			<li><a href="">军史小说</a></li>
			<li><a href="">网游小说</a></li>
			<li><a href="">科幻小说</a></li>
			<li><a href="">恐怖小说</a></li>
			<li><a href="">其他小说</a></li>
			<li><a href="">排行榜</a></li>
			<li><a href="">完结小说</a></li>
			<div class="clear"></div>
		</ul>
	</div>
	<div class="mytop">
		<div class="register">
			<form name="frmregister" id="frmregister" action="#" method="post">
			<table class="grid" width="500"align="center"cellspacing="0">
				<p class="userinfo">新用户注册</p>
				<tr>
					<td class="odd" width="25%">用户名<span class="hottext">(必填)</span></td>
					<td class="even"><input type="text" class="text" name="username" id="username" size="25" maxlength="30" style="width:160px" value="" onBlur="Ajax.Update('http://b4.ku180.com/regcheck.php?item=u&username='+this.value, {outid:'usermsg', tipid:'usermsg', onLoading:'<img border=\'0\' height=\'16\' width=\'16\' src=\'/images/loading.gif\' /> Loading...'});" /> <span id="usermsg"></span></td>
				</tr>
				<tr>
					<td class="odd" width="25%">密码<span class="hottext">(必填)</span></td>
					<td class="even"><input type="password" class="text" name="password" id="password" size="25" maxlength="20" style="width:160px" value="" onBlur="Ajax.Update('http://b4.ku180.com/regcheck.php?item=p&password='+this.value, {outid:'passmsg', tipid:'passmsg', onLoading:'<img border=\'0\' height=\'16\' width=\'16\' src=\'/images/loading.gif\' /> Loading...'});" /> <span id="passmsg"></span></td>
				</tr>
				<tr>
					<td class="odd" width="25%">重复密码<span class="hottext">(必填)</span></td>
					<td class="even"><input type="password" class="text" name="repassword" id="repassword" size="25" maxlength="20" style="width:160px" value=""  onBlur="Ajax.Update('http://b4.ku180.com/regcheck.php?item=r&password='+password.value+'&repassword='+this.value, {outid:'repassmsg', tipid:'repassmsg', onLoading:'<img border=\'0\' height=\'16\' width=\'16\' src=\'/images/loading.gif\' /> Loading...'});" /> <span id="repassmsg"></span></td>
				</tr>
				<tr>
					<td class="odd" width="25%">Email<span class="hottext">(必填)</span></td>
					<td class="even"><input type="text" class="text" name="email" id="email" size="25" maxlength="60" style="width:160px" value="" onBlur="Ajax.Update('http://b4.ku180.com/regcheck.php?item=m&email='+this.value, {outid:'mailmsg', tipid:'mailmsg', onLoading:'<img border=\'0\' height=\'16\' width=\'16\' src=\'/images/loading.gif\' /> Loading...'});" /> <span id="mailmsg"></span><input type="checkbox" class="checkbox" name="viewemail" value="1" />公开邮箱</td>
				</tr>
				<tr>
					<td class="odd" width="25%">性别</td>
					<td class="even"><input type="radio" class="radio" name="sex" value="1" />男
					<input type="radio" class="radio" name="sex" value="2" />女
					<input type="radio" class="radio" name="sex" value="0" checked="checked" />保密</td>
				</tr>
				<tr>
					<td class="odd" width="25%">QQ</td>
					<td class="even"><input type="text" class="text" name="qq" id="qq" size="25" maxlength="15" style="width:160px" value="" /></td>
				</tr>
				<tr>
					<td class="odd" width="25%">个人网站</td>
					<td class="even"><input type="text" class="text" name="url" id="url" size="25" maxlength="100" style="width:160px" value="" /></td>
				</tr>
				<tr>
					<td class="odd" width="25%">&nbsp;<input type="hidden" name="action" id="action" value="newuser" /></td>
					<td class="even"><input type="submit" class="button" name="submit"  id="submit" value="提 交" /></td>
				</tr>
			</table>
			</form>
			<br/>
		</div>
	</div>
	
	<!--底部信息-->
	<div class="clear"></div>
	<div class="footer">
		<div class="left">
			<div class="footernav">
				<p class="p2">本站所有小说为转载作品，所有章节均由网友上传，转载至本站只是为了宣传本书让更多读者欣赏。<br/>
					17模板网(2018) <script>__17mb_beian();__17mb_tj();__17mb_dl();</script></p>
			</div>
		</div>
		<div class="right"><p><img src="images/erweima.png" /></p></div>
		<div class="clear"></div>
	</div>
	
</div>
</body>
</html>
