function showone(n){
    for(i=1;i<6;i++){
        if(document.getElementById('ft'+i).style.display != 'none'){
            document.getElementById('ft'+i).style.display = 'none'
        }
    }
    document.getElementById('ft'+n).style.display = 'block';
}
function nrsetshow(){
    var nrsetshow = document.getElementById('nrset_show');
    if(nrsetshow.style.display != 'block'){
        nrsetshow.style.display = 'block';
    }else{
        nrsetshow.style.display = 'none';
    }
}

function __17mb_beian(){//备案号填写
	document.write("粤ICP备8888888号");
}
function __17mb_tj(){//统计代码
	document.write('<script src="https://s19.cnzz.com/z_stat.php?id=1265609214&web_id=1265609214" language="JavaScript"></script>');
}
function __17mb_dl(){//对联
	document.write("<!--对联广告代码-->");
}
function __17mb_top(){//顶部广告
	document.write("<!--顶部广告代码-->");
}
function __17mb_middle(){//中部广告
	document.write("<!--中部广告代码-->");
}
function __17mb_bottom(){//底部广告
	document.write("<!--底部广告代码-->");
}
function __17mb_inforight(){
    document.write('<div style="height:250px;line-height:250px;font-size:30px;">任性广告位</div>');
}
function __17mb_s1(){//内容页方形广告左
	document.write("<!--内容页方形广告左-->");
}
function __17mb_s2(){//内容页方形广告中
	document.write("<!--内容页方形广告中-->");
}
function __17mb_s3(){//内容页方形广告右
	document.write("<!--内容页方形广告右-->");
}
function __17mb_s4(){//内容页翻页上
	document.write("<!--内容页翻页上-->");
}
function __17mb_s5(){//内容页翻页下
	document.write("<!--内容页翻页下-->");
}