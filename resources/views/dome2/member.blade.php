<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>17???_????????</title>
<meta name="keywords" content="?? ?? ?? ??" />
<meta name="description" content="????????????????????????????????" />
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

<div class="main">
	
    @include('dome2.header')

    <div class="main w">@yield('content')</div>

    <style>
        .mt_member .mt_left .mt_left_min ul{
            border: 1px solid #91C691;
        }
        .mt_member .mt_left .mt_left_min .mt_title{
            background: #91C691;
        }
        .mt_member .mt_right .mt_right_min .right_content{
            border: 1px solid #91C691;
        } 
        .mt_member .mt_right .mt_right_min .right_content .mt_title{
            background: #91C691;
        }
        .mt_member .mt_right .right_content table{
            background: #91C691;
        }
        .mt_member .mt_right .right_content table tr{
            background: #fff;
        }
    </style>

    <!--底部信杯-->
	@include('dome2.footer')
    
</div>
</body>
</html>