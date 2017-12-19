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
			<?php $category = App\Model\FictionsCategory::getCategorys(); ?>
			<li><a href="{{$website->site}}">首页</a></li>
			@foreach ($category as $val)
			<li><a href="{{$website->site}}/list/{{$val->id}}">{{$val->name}}小说</a></li>
			@endforeach
			<li><a href="{{$website->site}}">排行榜</a></li>
			<li><a href="{{$website->site}}">完结小说</a></li>
			<div class="clear"></div>
		</ul>
	</div>

	<!--详情-->
	<div class="catalog">
		<div class="catalog1">
			<div class="pic"><img src="{{$website->public}}/images/5s.jpg" width="185" height="245" /></div>
			<div class="introduce">
				<h1>{{$fiction->title}}</h1>
				<p class="bjt"></p>
				<p class="bq"><span>更新：{{$fiction->updated_at}}</span><span>作者：<a href="{{$website->site}}/search/?key={{$fiction->author}}">{{$fiction->author}}</a></span><span>状态：@if ($fiction->state == 1) 转载中 @else 转载完毕 @endif</span><span>点击：{{$fiction->click}}</span></p>
				<p class="jj">{{$fiction->intro}}</p>
				<div class="cataloglink">
					<p><a href="#begin">立即阅读</a></p>
					<p><a href="javascript:addbookcase(1,0)">加入书架</a></p>
                    <p><a href="javascript:vote(1)">推荐本书</a></p>
					<p><a href="#">下载TXT</a></p>
					<div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="catalogads">
        <script>__17mb_inforight()</script>
	</div>
	<div class="clear"></div>
	<div class="ml_content">
		<div class="zb">
			<div class="newest">
				<h3><a>最新九章</a></h3>
               	<p class="lastchapter">最新章节：<a href="{{$website->site}}/book/{{$fiction->id}}/{{$fiction->new_catalog_id}}">{{$fiction->new_catalog_title}}</a></p>
                <div class="last9">
                    <ul>
						<?php $result = App\Model\FictionsCatalog::getCatalogs(['fiction_id'=>$fiction->id], ['updated_at', 'desc'], 0, 9); ?>
						@foreach ($result as $key=>$val)
						<li>{{$key+1}}、<a href="{{$website->site}}/book/{{$fiction->id}}/{{$val->id}}">{{$val->title}}</a></li>
						@endforeach
                        <div class="clear"></div>
                    </ul>
                </div>
			</div>
			<div class="ml_list">
                <a name="begin"></a>
				<h3><a>全部章节</a></h3>
				<ul class="chapters">
					@foreach ($fiction['catalog'] as $key=>$val)
					<li class="chapter"><a href="{{$website->site}}/book/{{$fiction->id}}/{{$val->id}}" title="{{$val->updated_at}}更新，共{{$val->work}}字">{{$val->title}}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
		<div class="yb">
			<div class="list">
				<?php $result = App\Model\Fictions::getFictions(['category_id'=>$fiction->category_id], ['all_click', 'desc'], 0, 10); ?>
				<h3><a href="{{$website->site}}/ranking/all_click">热门小说</a></h3>
				<div class="gengduo"><a href="{{$website->site}}/ranking/all_click">更多</a></div>
				<div class="ml_frame">
					<div class="left">
						@foreach ($result as $key=>$val)
						@if ($key==0)
						<div class="left1">
							<p class="pic"><a href="{{$website->site}}/book/{{$val->id}}"><img src="{{$website->public}}/images/5s.jpg" width="80" height="105" /></a></p>
							<div class="pp">
								<p class="p1"><a href="{{$website->site}}/book/{{$val->id}}">{{$val->title}}</a></p>
								<p class="p2"><a href="{{$website->site}}/search/?key={{$val->author}}">作者：{{$val->author}}</a></p>
								<p class="p3">{{$val->intro}}</p>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
						</div>
						@endif
						@endforeach
					</div>
					<ul>
						@foreach ($result as $key=>$val)
						@if ($key>0)
						<li><p class="size1 size4">{{$key+1}}</p><p class="p1"><a href="{{$website->site}}/book/{{$val->id}}">{{$val->title}}</a></p></li>
						@endif
						@endforeach
						<div class="clear"></div>
					</ul>
				</div>
			</div>
			
			<div class="list">
				<?php $result = App\Model\Fictions::getFictions(['category_id'=>$fiction->category_id], ['all_recommend', 'desc'], 0, 10); ?>
				<h3><a href="{{$website->site}}/list/{{$fiction->category_id}}">本类推荐</a></h3>
				<div class="gengduo"><a href="{{$website->site}}/list/{{$fiction->category_id}}">更多</a></div>
				<div class="ml_frame">
					<div class="left">
						@foreach ($result as $key=>$val)
						@if ($key==0)
						<div class="left1">
							<p class="pic"><a href="{{$website->site}}/book/{{$val->id}}"><img src="{{$website->public}}/images/5s.jpg" width="80" height="105" /></a></p>
							<div class="pp">
								<p class="p1"><a href="{{$website->site}}/book/{{$val->id}}">{{$val->title}}</a></p>
								<p class="p2"><a href="{{$website->site}}/search/?key={{$val->author}}">作者：{{$val->author}}</a></p>
								<p class="p3">{{$val->intro}}</p>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
						</div>
						@endif
						@endforeach
					</div>
					<ul>
						@foreach ($result as $key=>$val)
						@if ($key>0)
						<li><p class="size1 size4">{{$key+1}}</p><p class="p1"><a href="{{$website->site}}/book/{{$val->id}}">{{$val->title}}</a></p></li>
						@endif
						@endforeach
						<div class="clear"></div>
					</ul>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>

	<!--底部信息-->
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
