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
		<?php $result = App\Model\Fictions::getFictions(['is_recommend'=>1, 'category_id'=>$category_id], ['updated_at', 'desc'], 0, 8); ?>
		@foreach ($result as $key=>$val)
		<li>
			<p><a href="{{$website->site}}/book/{{$val->id}}"><img class="lazy" data-original="{{$website->public}}/images/5s.jpg" alt="{{$val->title}}" height="130" width="105" /></a></p>
			<p><h2><a href="{{$website->site}}/book/{{$val->id}}">{{$val->title}}</a></h2></p>
		</li>
		@endforeach
	</ul>
    <div class="clearfix"></div>
</div>
<div><script>__17mb_top();</script><!--顶部广告代码--></div>
<div class="topmenu">
	<a href="{{$website->site}}">首页</a><span class="jiantou"><img src="http://b3.ku180.com/17mb/css/jiantou.png"></span>{{$category->name}}
</div>
<div class="articlelist">
	<div class="l">
    	<ul>
			<?php $category = App\Model\FictionsCategory::getCategorys(); ?>
			@foreach ($category as $key=>$val)
			<li id="s{{$key+1}}" @if ($val->id == $category_id) class="sclick" @endif><a href="{{$website->site}}/list/{{$val->id}}">{{$val->name}}小说</a></li>
			@endforeach
        </ul>
    </div>
    <div class="r">
    	<div class="listcon">
        	<ul>
			@foreach ($fictions as $key=>$val)
				<li>
                	<div class="l2">
                    	<a href="http://b3.ku180.com/0/385/"><img class="lazy" data-original="{{$website->public}}/images/5s.jpg" alt="绝世唐门" height="110" width="90" src="http://b3.ku180.com/files/article/image/0/385/385s.jpg" style="display: inline;"></a>
                    </div>
                    <div class="r2">
                    	<p class="articlename"><a href="{{$website->site}}/book/{{$val->id}}">{{$val->title}}</a><span>@if ($val->state==1)连载 @else 完结 @endif</span></p>
                        <p class="p2"><span>作者：{{$val->author}}</span> | <span>字数：934536</span></p>
                        <p class="p3">{{$val->intro}}</p>
                        <p class="p4">
                        	<a href="http://b3.ku180.com/0/385/" class="read">开始阅读</a>
                            <a href="{{$website->site}}/collect/add?fiction_id={{$val->id}}" class="addbookcase">收藏本书</a>
                            <a href="{{$website->site}}/recommend/{{$val->id}}" class="addvote">推荐本书</a>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </li>
			@endforeach
            </ul>
        </div>
        <div class="clearfix"></div>
        {!! $fictions->links() !!}
    </div>
    <div class="clearfix"></div>
</div>
<div><script>__17mb_bottom();</script><!--底部广告代码--></div>
<script type="text/javascript" charset="gbk">
	$(function() {
		$("img.lazy").lazyload({effect: "fadeIn",placeholder : "http://b3.ku180.com/17mb/images/loading.gif"});
	});
</script>
</div>


@include('dome2.footer')
</div>
</body>
</html>
