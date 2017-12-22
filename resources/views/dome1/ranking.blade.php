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

    <!--类型-->
    <div class="rankingnav">
        <ul>
            <li><a href="{{$website->site}}/ranking/0">总点击榜</a></li>
            <li><a href="{{$website->site}}/ranking/1">月点击榜</a></li>
            <li><a href="{{$website->site}}/ranking/2">周点击榜</a></li>
            <li><a href="{{$website->site}}/ranking/3">总推荐榜</a></li>
            <li><a href="{{$website->site}}/ranking/4">月推荐榜</a></li>
            <li><a href="{{$website->site}}/ranking/5">周推荐榜</a></li>
            <li><a href="{{$website->site}}/ranking/7">月收藏榜</a></li>
            <li><a href="{{$website->site}}/ranking/8">周收藏榜</a></li>
            <li><a href="{{$website->site}}/ranking/9">最新入库</a></li>
            <li><a href="{{$website->site}}/ranking/10">最近更新</a></li>
            <div class="clear"></div>
        </ul>
    </div>
    <table class="grid" cellpadding="0" cellspacing="0" id="rankinglist" width="100%" align="center">
        <tr align="left">
            <th width="20%">文章名称</th>
            <th width="30%">最新章节</th>
            <th width="15%">作者</th>
            <th width="15%">更新</th>
            <th width="10%">状态</th>
            <th width="10%">操作</th>
        </tr>
        @foreach ($fictions as $key=>$val)
        <tr>
            <td class="odd"><a href="{{$website->site}}/book/{{$val->id}}">{{$val->title}}</a></td>
            <td class="even"><a href="{{$website->site}}/book/{{$val->id}}/{{$val->new_catalog_id}}" target="_blank">{{$val->new_catalog_title}}</a></td>
            <td class="odd"><a href="{{$website->site}}/author/?key={{$val->author}}">{{$val->author}}</a></td>
            <td class="odd" align="left">{{$val->created_at}}</td>
            <td class="even" align="left">@if ($val->state == 1) 转载中 @else 转载完毕 @endif</td>
            <td class="even" align="left">
                <a href="#">立即阅读</a>
            </td>
        </tr>
		@endforeach
    </table>

    <!--分页-->
    {!! $fictions->links() !!}

    @include('dome1.footer')
    
</div>
</body>
</html>