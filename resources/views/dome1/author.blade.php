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

    
    <table id="author" class="grid" width="100%" align="center" cellspacing="0" style="border: 1px solid #8D6661" >
        <caption style="color: #666;margin-top: 15px; background: #8D6661; color: #FFF; border-radius: 3px 3px 0px 0px;"><span style="color: #fff; font-weight: bold;">{{$word}}</span>&nbsp;&nbsp;的所有作品</caption>                
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
    {!! $fictions->links() !!}

    	
    <!--底部信息-->
	@include('dome1.footer')
    
</div>
</body>
</html>