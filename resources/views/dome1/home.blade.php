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
	
	<div class="submenu">

		<div class="left">
			<?php $result = App\Model\Fictions::getFictions(['is_index'=>1], ['updated_at', 'desc'], 0, 5); ?>
			@foreach ($result as $key=>$val)
			<div id="ft{{$key+1}}" class="left1" @if ($key > 0) style="display:none" @endif>
				<p class="pic"><a href="{{$website->site}}/book/{{$val->id}}"><img src="{{$website->public}}/images/5s.jpg" width="220" height="275"/></a></p>
				<div class="pp">
					<p class="p1"><a href="{{$website->site}}/book/{{$val->id}}">{{$val->title}}</a></p>
					<p class="p2">分类：仙侠小说&nbsp;&nbsp;/&nbsp;&nbsp;作者：<a href="{{$website->site}}/author/?word={{$val->author}}">{{$val->author}}</a></p>
					<p class="p3">{{$val->intro}}</p>
					<p class="p4"><a href="{{$website->site}}/book/{{$val->id}}" class="read">阅读本书</a><span>状态：@if ($val->state == 1) 转载中 @else 转载完毕 @endif</span></p>
					<p class="p5">最新：<a href="{{$website->site}}/book/{{$val->id}}/{{$val->new_catalog_id}}">{{$val->new_catalog_title}}</a>(04-22 17:49)</p>
				</div>
				<div class="clear"></div>
			</div>
			@endforeach
			<div class="list">
				<ul>
					@foreach ($result as $key=>$val)
					<li><a href="javascript:;" onmouseover="showone('{{$key+1}}');"><img src="{{$website->public}}/images/5s.jpg" width="85" height="115" alt="{{$val->name}}" /></a></li>
					@endforeach
					<div class="clear"></div>
				</ul>
			</div>
		</div>

		<div class="right">
			<?php
				$result = [];
        		foreach([3,4,5] as $k=>$v){
					$result[$k] = App\Model\Fictions::getFictions(['is_recommend'=>1, 'category_id'=>$v], ['updated_at', 'desc'], 0, 7);
				}
			?>
			@foreach ($result as $key=>$val)
			<div class="list1">
				<h3><a href="{{$website->site}}/book/{{$val[0]->id}}">{{$val[0]->title}}</a> / <span class="author">{{$val[0]->author}}</span></h3>
				<ul>
					@foreach ($val as $k=>$v)
					@if ($k>0)
					<li><p class="p1"></p><p class="p2"><a href="{{$website->site}}/book/{{$v->id}}">{{$v->title}}</a></p>
						<p class="p3"></p><p class="p4">{{$v->author}}</p></li>
					@endif
					@endforeach
					<div class="clear"></div>
				</ul>
			</div>
			@endforeach
		</div>
		<div class="clear"></div>
	</div>
	<div class="submenu1">
		<div class="list list1">
			<h3><a href="{{$website->site}}/ranking/9">排行榜</a></h3>
			<div class="gengduo"><a href="{{$website->site}}/ranking/9">更多</a></div>
			<ul>
				<?php $result = App\Model\Fictions::getFictions([], ['all_click', 'desc'], 0, 10); ?>
				@foreach ($result as $key=>$val)
				@if ($key==0)
				<li><p class="size1">{{$key+1}}</p><p class="p1"><a href="{{$website->site}}/book/{{$val->id}}">{{$val->title}}</a></p><p class="author">{{$val->author}}</p></li>
				@else
				<li><p class="size1 size{{$key+1}}">{{$key+1}}</p><p class="p1"><a href="{{$website->site}}/book/{{$val->id}}">{{$val->title}}</a></p><p class="author">{{$val->author}}</p></li>
				@endif
				@endforeach
				<div class="clear"></div>
			</ul>
		</div>
        <div class="list list1">
            <h3><a href="{{$website->site}}/ranking/3">推荐排行</a></h3>
            <div class="gengduo"><a href="{{$website->site}}/ranking/3">更多</a></div>
            <ul>
				<?php $result = App\Model\Fictions::getFictions([], ['all_recommend', 'desc'], 0, 10); ?>
				@foreach ($result as $key=>$val)
				@if ($key==0)
				<li><p class="size1">{{$key+1}}</p><p class="p1"><a href="{{$website->site}}/book/{{$val->id}}">{{$val->title}}</a></p><p class="author">{{$val->author}}</p></li>
				@else
				<li><p class="size1 size{{$key+1}}">{{$key+1}}</p><p class="p1"><a href="{{$website->site}}/book/{{$val->id}}">{{$val->title}}</a></p><p class="author">{{$val->author}}</p></li>
				@endif
				@endforeach
				<div class="clear"></div>
            </ul>
        </div>
		<div class="list list1">
			<h3><a href="{{$website->site}}/ranking/11">完结小说</a></h3>
			<div class="gengduo"><a href="{{$website->site}}/ranking/11">更多</a></div>
			<ul>
				<?php $result = App\Model\Fictions::getFictions(['state'=>2], ['updated_at', 'desc'], 0, 10); ?>
				@foreach ($result as $key=>$val)
				@if ($key==0)
				<li><p class="size1">{{$key+1}}</p><p class="p1"><a href="{{$website->site}}/book/{{$val->id}}">{{$val->title}}</a></p><p class="author">{{$val->author}}</p></li>
				@else
				<li><p class="size1 size{{$key+1}}">{{$key+1}}</p><p class="p1"><a href="{{$website->site}}/book/{{$val->id}}">{{$val->title}}</a></p><p class="author">{{$val->author}}</p></li>
				@endif
				@endforeach
				<div class="clear"></div>
			</ul>
		</div>
		
		<div class="list list1">
			<h3><a href="{{$website->site}}/ranking/6">收藏榜</a></h3>
			<div class="gengduo"><a href="{{$website->site}}/ranking/6">更多</a></div>
			<ul>
				<?php $result = App\Model\Fictions::getFictions([], ['all_collect', 'desc'], 0, 10); ?>
				@foreach ($result as $key=>$val)
				@if ($key==0)
				<li><p class="size1">{{$key+1}}</p><p class="p1"><a href="{{$website->site}}/book/{{$val->id}}">{{$val->title}}</a></p><p class="author">{{$val->author}}</p></li>
				@else
				<li><p class="size1 size{{$key+1}}">{{$key+1}}</p><p class="p1"><a href="{{$website->site}}/book/{{$val->id}}">{{$val->title}}</a></p><p class="author">{{$val->author}}</p></li>
				@endif
				@endforeach
				<div class="clear"></div>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
    <div class="clear"></div>
	<div class="submenu2">
	
		<?php
		$category = App\Model\FictionsCategory::getCategorys();
		$result = [];
		foreach($category as $k=>$v){
			$result[$k] = $v; $result[$k]['list'] = App\Model\Fictions::getFictions(['category_id'=>$v->id], ['updated_at', 'desc'], 0, 10);
		}
		?>
		@foreach ($result as $key=>$val)
		<div class="list @if (($key+1)%4==0) list2 @endif">
			<h3><a href="{{$website->site}}/list/{{$val->id}}">{{$val->name}}小说  </a></h3>
			<div class="gengduo"><a href="{{$website->site}}/list/{{$val->id}}">更多</a></div>
			@foreach ($val['list'] as $k=>$v)
			@if ($k==0)
			<div class="left">
				<div class="left1">
					<p class="pic"><a href="{{$website->site}}/book/{{$v->id}}"><img src="{{$website->public}}/images/5s.jpg" width="80" height="105" /></a></p>
					<div class="pp">
						<p class="p1"><a href="{{$website->site}}/book/{{$v->id}}">{{$v->title}}</a></p>
						<p class="p2"><a href="#">作者：{{$v->author}}</a></p>
						<p class="p3">{{$v->intro}}</p>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<ul>
			@else
				<li><p class="size1 size{{$k}}">{{$k+1}}</p><p class="p1"><a href="{{$website->site}}/book/{{$v->id}}">{{$v->title}}</a></p></li>
			@endif

			@if ($k==9)<div class="clear"></div></ul>@endif

			@endforeach
		</div>
		@endforeach
	</div>
    <div class="update">
        <div class="l">
            <p class="p1"><a href="ranking.html">最新入库</a></p>
            <ul>
				<li><a href="article.html">绝世唐门</a><span>唐家三少</span></li>
				<li><a href="article.html">斗罗大陆</a><span>唐家三少</span></li>
				<li><a href="article.html">天珠变</a><span>唐家三少</span></li>
            </ul>
        </div>
        <div class="r">
			<p class="p1"><a href="ranking.html">最近更新</a><a class="more" href="ranking.html">更多...</a></p>
			<li>
				<p class="d1">
					<span class="sortname">[ 玄幻小说 ]</span>
					<a href="article.html" class="articlename">绝世唐门</a>
					<span class="lastchapter">最新：<a href="read.html">第七十二章 死亡之手，死神使者！（下）</a></span>
				</p>
				<p class="d2">
					<span class="author">唐家三少</span>
					<span class="lastupdate">更新时间：2016-04-24</span>
				</p>
			</li>
			<li>
				<p class="d1">
					<span class="sortname">[ 玄幻小说 ]</span>
					<a href="article.html" class="articlename">绝世唐门</a>
					<span class="lastchapter">最新：<a href="read.html">第七十二章 死亡之手，死神使者！（下）</a></span>
				</p>
				<p class="d2">
					<span class="author">唐家三少</span>
					<span class="lastupdate">更新时间：2016-04-24</span>
				</p>
			</li>
			<li>
				<p class="d1">
					<span class="sortname">[ 玄幻小说 ]</span>
					<a href="article.html" class="articlename">绝世唐门</a>
					<span class="lastchapter">最新：<a href="read.html">第七十二章 死亡之手，死神使者！（下）</a></span>
				</p>
				<p class="d2">
					<span class="author">唐家三少</span>
					<span class="lastupdate">更新时间：2016-04-24</span>
				</p>
			</li>
        </div>
        <div class="clear"></div>
    </div>
	<div class="friendlink">
		<p>友情链接：<a href="#" target="_blank">17模板网</a> <a href="#" target="_blank">杰奇小说模板</a></p>
	</div>
	
	<!--底部信息-->
	@include('dome1.footer')
</div>
</body>
</html>
