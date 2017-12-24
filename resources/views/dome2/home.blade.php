<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>17模板网_最好看的小说网站</title>
<meta name="keywords" content="杰奇 小说 最新 最快" />
<meta name="description" content="基于杰奇小说连载系统构建，为您提供提供内容优质，更新最快的小说。" />
<link rel="stylesheet" type="text/css" href="{{$website->public}}/style/web.css" />
<script src="{{$website->public}}/script/base.js"></script>
<script src="{{$website->public}}/script/jquery-1.11.0.min.js"></script>
<script src="{{$website->public}}/script/lazyload.js"></script>
<script src="{{$website->public}}/script/web.js"></script>
<!--[if lt IE 9]>
    <script src="html5shiv.js"></script>
<![endif]-->
</head>
<body>
@include('dome2.header')
<div class="main w">
	<div class="block1">
		<ul>
			<?php $result = App\Model\Fictions::getFictions(['is_index'=>1], ['updated_at', 'desc'], 0, 8); ?>
			@foreach ($result as $key=>$val)
			<li>
				<p><a href="{{$website->site}}/book/{{$val->id}}"><img class="lazy" data-original="{{$website->public}}/images/5s.jpg" alt="{{$val->title}}" height="130" width="105" /></a></p>
				<p><h2><a href="{{$website->site}}/book/{{$val->id}}">{{$val->title}}</a></h2></p>
			</li>
			@endforeach
		</ul>
		<div class="clearfix"></div>
    </div>
    <div class="block2">
    	<div class="top">
            <h1><a href="{{$website->site}}/ranking/1">排行榜</a></h1>
            <span class="more"><a href="{{$website->site}}/ranking/1">&nbsp;&nbsp;&nbsp;</a></span>
        </div>
        <div class="l">
        	<ul>
				<?php $result = App\Model\Fictions::getFictions([], ['all_recommend', 'desc'], 0, 10); ?>
				@foreach ($result as $key=>$val)
				<li>
					<i class="i{{$key+1}}">{{$key+1}}</i><a href="{{$website->site}}/book/{{$val->id}}">{{$val->title}}</a>
					<span>[仙侠]</span>
				</li>
				@endforeach
			</ul>
        </div>
        <div class="r">
        	<ul>
				<?php $result = App\Model\Fictions::getFictions([], ['all_click', 'desc'], 0, 6); ?>
				@foreach ($result as $key=>$val)
				<li>
					<a href="{{$website->site}}/book/{{$val->id}}"><img class="lazy" data-original="{{$website->public}}/images/5s.jpg" alt="{{$val->title}}" width="106" height="146" /></a>
					<h2><a href="{{$website->site}}/book/{{$val->id}}">{{$val->title}}</a></h2>
				</li>
				@endforeach
				<div class="clearfix"></div>
            </ul>
            <ul class="ph2">
				<?php $result = App\Model\Fictions::getFictions([], ['all_click', 'desc'], 6, 30); ?>
				@foreach ($result as $key=>$val)
				<li><a href="{{$website->site}}/book/{{$val->id}}">{{$val->title}}</a></li>
				@endforeach
				<div class="clearfix"></div>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="block3">

		<?php
		$category = App\Model\FictionsCategory::getCategorys();
		$result = [];
		foreach($category as $k=>$v){
			$result[$k] = $v; $result[$k]['list'] = App\Model\Fictions::getFictions(['category_id'=>$v->id], ['updated_at', 'desc'], 0, 8);
		}
		?>
		@foreach ($result as $key=>$val)
		<div class="sortone">
            <div class="top">
                <h1><a href="{{$website->site}}/list/{{$val->id}}">{{$val->name}}小说</a></h1>
                <a href="{{$website->site}}/list/{{$val->id}}" class="more"><img src="http://b3.ku180.com/17mb/css/jiantou.png"/></a>
            </div>
            <ul>
				@foreach ($val['list'] as $k=>$v)
				@if ($k==0)
				<li class="first">
					<p class="l"><a href="{{$website->site}}/book/{{$v->id}}"><img class="lazy" data-original="{{$website->public}}/images/5s.jpg" alt="{{$v->title}}" height="94" width="74" /></a></p>
					<div class="r">
						<p class="p1"><a href="{{$website->site}}/book/{{$v->id}}">{{$v->title}}</a></p>
						<p class="p2"><span class="sort0">玄幻</span>&nbsp;<span class="author0">{{$v->author}}</span></p>
						<p class="p3">{{$val->intro}}</p>
					</div>
					<div class="clearfix"></div>
				</li>
				@else
				<li><a href="{{$website->site}}/book/{{$v->id}}">{{$v->title}}</a><span class="author">{{$v->author}}</span></li>
				@endif
				@endforeach
            </ul>
		</div>
		@endforeach
        <div class="clearfix"></div>
    </div>
    <div><script>__17mb_middle();</script></div>
    <div class="block4">
    	<div class="l">
        	<div class="top"><h1><a href="{{$website->site}}/ranking/9">最新入库</a></h1><a href="{{$website->site}}/ranking/9" class="more"><img src="{{$website->public}}/images/jiantou.png" alt="最新入库"/></a></div>
        	<ul>
			<?php $result = App\Model\Fictions::getFictions([], ['created_at', 'desc'], 0, 10); ?>
			@foreach ($result as $key=>$val)
			<li><a href="{{$website->site}}/book/{{$val->id}}">{{$val->title}}</a><span>{{$v->author}}</span></li>
			@endforeach
            </ul>
            <div class="top"><h1><a href="{{$website->site}}/ranking/11">完结小说</a></h1><a href="{{$website->site}}/ranking/11" class="more"><img src="{{$website->public}}/images/jiantou.png" alt="完结小说"/></a></div>
        	<ul>            	
			<?php $result = App\Model\Fictions::getFictions(['state'=>2], ['updated_at', 'desc'], 0, 10); ?>
			@foreach ($result as $key=>$val)
			<li><a href="{{$website->site}}/book/{{$val->id}}">{{$val->title}}</a><span>{{$v->author}}</span></li>
			@endforeach
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="r">
        	<div class="top"><h1><a href="http://b3.ku180.com/paihang/lastupdate_1.html">小说最近更新</a></h1><a href="http://b3.ku180.com/paihang/lastupdate_1.html" class="more"><img src="http://b3.ku180.com/17mb/css/jiantou.png" alt="小说最近更新"/></a></div>
            <div></div>
        	<ul class="lists">
			<?php $result = App\Model\Fictions::getFictions([], ['updated_at', 'desc'], 0, 20); ?>
			@foreach ($result as $key=>$val)
			<li>
				<p class="d1">
					<span class="sortname">[ 玄幻魔法 ]</span>&nbsp;&nbsp;
					<a href="{{$website->site}}/book/{{$val->id}}" class="articlename">{{$val->title}}</a>&nbsp;&nbsp;
					<span class="lastchapter">最新：<a href="{{$website->site}}/book/{{$val->new_catalog_id}}">{{$val->new_catalog_title}}</a></span>
				</p>
				<p class="d2">
					<span class="author">{{$v->author}}</span>
					<span class="lastupdate">更新时间：{{$val->updated_at}}</span>
				</p>
			</li>
			@endforeach
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div><script>__17mb_bottom();</script></div>
</div>

	
<div class="indexfoot w">
	<p class="p1">友情链接：</p>
	<p class="p2"><a href="http://www.17mb.com" target="_blank">17模板网</a>
	<a href="http://www.17mb.com" target="_blank">杰奇小说模板</a></p>
</div>
@include('dome2.footer')
</div>
</body>
</html>
