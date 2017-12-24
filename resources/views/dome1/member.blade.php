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

    <div class="main w">@yield('content')</div>

    <style>
        .mt_member .mt_left .mt_left_min ul{
            border: 1px solid #8D6661;
        }
        .mt_member .mt_left .mt_left_min .mt_title{
            background: #8D6661;
        }
        .mt_member .mt_right .mt_right_min .right_content{
            border: 1px solid #8D6661;
        } 
        .mt_member .mt_right .mt_right_min .right_content .mt_title{
            background: #8D6661;
        }
        .mt_member .mt_right .right_content table{
            background: #8D6661;
        }
        .mt_member .mt_right .right_content table tr{
            background: #fff;
        }
        .mt_member .mt_right .mt_right_min .right_content .mt_bottom{
            border-top: 1px solid #8D6661;
        }
        .mt_member .mt_left .mt_left_min{
            margin-left: 0px
        }
        .mt_member .mt_right .mt_right_min{
            margin-right: 0px
        }
    </style>

    <!--底部信息-->
	@include('dome1.footer')
    
</div>
</body>
</html>