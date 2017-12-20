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
<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
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
			<li><a href="{{$website->site}}/ranking/9">完结小说</a></li>
			<div class="clear"></div>
		</ul>
	</div>

	<br/>
	<br/>
	<form name="frmlogin" method="post" action="{{$website->site}}/register">
	<table class="grid" width="300" align="center" style="margin: 0px auto; border-radius: 0px; border-radius:0px 0px 5px 5px; border: 1px solid #8D6661" >
		<caption class="userlogin">新用户注册</caption>
		<tr align="center">
			<td class="odd">

				<table width="500px" height="300px" class="hide" border="0" cellspacing="0" cellpadding="5" style="margin: 10px;">
					<tr>
						<td width="30%" align="right" valign="middle">用户名称：</td>
						<td width="70%">
						<input type="text" class="text" size="20" maxlength="30" style="width:150px" name="username" onKeyPress="javascript: if (event.keyCode==32) return false;" >
						（必填）
						</td>
					</tr>
					<tr>
						<td width="30%" align="right" valign="middle">真实名称：</td>
						<td width="70%">
						<input type="text" class="text" size="20" maxlength="30" style="width:150px" name="nickname" onKeyPress="javascript: if (event.keyCode==32) return false;" >
						（可选）
						</td>
					</tr>
					<tr>
						<td align="right" valign="middle">密　　码：</td>
						<td>
						<input type="password" class="text" size="20" maxlength="30" style="width:150px" name="password">
						（必填）
						</td>
					</tr>
					<tr>
						<td align="right" valign="middle">确认密码：</td>
						<td>
						<input type="password" class="text" size="20" maxlength="30" style="width:150px" name="setpassword">
						（必填）
						</td>
					</tr>
					<tr>
						<td align="right" valign="middle">邮　　箱：</td>
						<td>
						<input type="text" class="text" size="20" maxlength="30" style="width:150px" name="email">
						（必填）
						</td>
					</tr>
					<tr>
						<td align="right" valign="middle">性　　别：</td>
						<td>
							<input type="radio" class="radio" name="sex" value="1"/>男
							<input type="radio" class="radio" name="sex" value="2"/>女
							<input type="radio" class="radio" name="sex" value="0" checked="checked" />保密
						</td>
					</tr>
					<tr>
						<td align="right" valign="middle">QQ　号码：</td>
						<td>
						<input type="text" class="text" size="20" maxlength="30" style="width:150px" name="qq">
						（可选）
						</td>
					</tr>
					<tr>
						<td class="odd" width="25%">{!! csrf_field() !!}</td>
						<td class="even"><input type="submit" class="button" name="submit"  id="submit" value="提 交" /></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr align="center"> 
			<td class="foot">
				<a href="register.html">新用户注册</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="getpass.html">取回密码</a> 
			</td>
		</tr>
	</table>
	</form>
	<br/>
	<br/>
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
