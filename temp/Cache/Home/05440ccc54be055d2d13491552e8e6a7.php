<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($webtitle); ?>-Monster Video Website</title>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="keywords" content="<?php echo ($keywords); ?>">
<meta name="description" content="<?php echo ($description); ?>">
<link rel='stylesheet' type='text/css' href='<?php echo ($webpath); ?>css/template.css'>
<script type="text/javascript" src="<?php echo ($webpath); ?>js/common.index.js"></script>
<link rel="shortcut icon" href="<?php echo ($webpath); ?>favicon.ico" />
<base target="_blank" />
</head>
<body class="topic_body">
<div class="header">
	<h1 class="header_logo"><a href="<?php echo ($webpath); ?>" title="<?php echo ($webname); ?>" target="_self"><?php echo ($webname); ?></a></h1>
	<script type="text/javascript" src="<?php echo ($webpath); ?>js/search_content_utf8.js"></script>
	<div class="searchbox">
	<form method="post" action="<?php echo ($webpath); ?>index.php?s=video/search" onsubmit="return check();" style="z-index: -1;" name="search" id="search" target="_blank">
		<fieldset class="searchbox_search">
			<input id="wd" name="wd" onfocus="serchClick('wd')" autocomplete="off" value="<?php echo (($keyword)?($keyword):'Please type video name,director'); ?>" maxlength="26" type="text" class="input"/>
			<button type="submit" id="btnSearch" onclick="stopSearchTextTimer();">Search</button>
		</fieldset>
	</form>
	<script>
	var CachePic=[];
	function serchClick(name)
	{
		var box=document.getElementById(name);
		if(searchTextTimer!=null||box.value=='请输入视频名、主演或导演')
		{box.value=''};
		stopSearchTextTimer();
		box.style.color='#000';
	}
	setSearchInputContent(document.getElementById("wd"));
	</script>
		<div class="searchbox_hottag">
			<a href="<?php echo ($topurl); ?>">Hot play</a><?php echo ($hotkey); ?>
		</div>
	</div><!--searchbox  END-->
	<div class="userpanel_box">
		<div class="dy_top_box" style="display:none" id="dy_box">
			
		</div>
		<div class="userpanel" id="user_status"><a href="<?php echo ($newvideo); ?>" title="<?php echo date('Y-m-d');?>最近100部更新">Update today：[<?php echo get_channel_count(0);?>]</a>|<a href="<?php echo ($allvideo); ?>" title="全部影片">Total：[<?php echo get_channel_count(-1);?>]</a>|<a href="<?php echo ($releasevideo); ?>" title="新片上映">New </a></div>
	</div>
	<div class="quickpanel" id="quickpanel">
	</div>
</div><!--header 头部结束 END-->
<div class="mainnav">
	<div class="mainnav_list">
    <a href="<?php echo ($webpath); ?>" <?php if($model == 'index'): ?>class="on"<?php endif; ?>>Home</a>
    <?php $tag['name'] = 'menu'; $__LIST__ = get_tag_gxmenu($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): ++$i;$mod = ($i % 2 );?><a onfocus="this.blur();" href="<?php echo ($menu["showurl"]); ?>" <?php if(($menu['id'] == $cid) or ($menu['id'] == $pid)): ?>class="on"<?php endif; ?>><?php echo ($menu["cname"]); ?></a><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
    <a href="<?php echo ($topurl); ?>" <?php if($model == 'top10'): ?>class="on"<?php endif; ?>>Range</a>
    <a href="<?php echo ($specialurl); ?>" <?php if($model == 'special'): ?>class="on"<?php endif; ?>>Special</a>
	</div>
	<div class="dropbox dropbox_1">
	<script>
	var topShow=false;
	function showTop(n){
		if(topShow==true){
			switchTab('top',n,2,"dropbox_tigger dropbox_tigger_on","dropbox_tigger");
		}else{
			document.getElementById("Tab_top_"+n).className="dropbox_tigger dropbox_tigger_on";
			document.getElementById("List_top_"+n).style.display="";
			topShow=true;
		}
	}
	function hideTop(){
		for(i=0;i<2;i++) {
			var CurTabObj = document.getElementById("Tab_top_"+i) ;
			var CurListObj = document.getElementById("List_top_"+i) ;
			CurTabObj.className="dropbox_tigger" ;
			CurListObj.style.display="none";
		}
	}
	</script>
		  
		<a href="javascript://" title="" class="dropbox_tigger" id="Tab_top_0" onmouseover="showTop(0);" onmouseout="hideTop();" target="_self" ><b></b></a>
		<!--histroydrop
		<div class="histroydrop" style="display:none;" id="List_top_0" onmouseover="showTop(0);" onmouseout="hideTop();">
		</div><!--histroydrop  END->
		END-->
	</div>
	<div class="dropbox dropbox_2">
		<a href="javascript://" title="" class="dropbox_tigger" id="Tab_top_1" onmouseover="showTop(1);" onmouseout="hideTop();" target="_self">History<b></b></a>
		<div class="histroydrop" style="display:none;" id="List_top_1" onmouseover="showTop(1);" onmouseout="hideTop();">
		</div><!--histroydrop  END-->
	</div>
</div><!--mainnav 导航结束 END-->
<div class="foucebox">
		<div class="foucebox_con">
<script>
	var ScrollBigPic = [
			<?php $tag['name'] = 'slide';$tag['limit'] = '6';$tag['order'] = 'oid asc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$slide): ++$i;$mod = ($i % 2 );?><?php if(($i)  ==  "1"): ?>'<?php echo ($slide["picurl"]); ?>'<?php else: ?>,'<?php echo ($slide["picurl"]); ?>'<?php endif; ?><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
			] ;
	function loadNext()
	{
		for(var i=1;i<6;i++)
		{
			try{
				if($('bigpic_'+i).src=="<?php echo ($webpath); ?>images/img_default.gif")
					$('bigpic_'+i).src=ScrollBigPic[i];
			}catch(e){};}
	}
</script>
<div class="scrollimg2">
	<div id="SwitchBigPic">
    <?php $tag['name'] = 'slide';$tag['limit'] = '6';$tag['order'] = 'oid asc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$slide): ++$i;$mod = ($i % 2 );?><div class="scrollimg2_bigimg" id="showDiv_<?php echo ($i-1); ?>" <?php if(($i)  ==  "1"): ?>style="display:block"<?php else: ?><?php endif; ?>>
			<div><a href="<?php echo ($slide["link"]); ?>" title="<?php echo (get_replace_html($slide["content"],0,50)); ?>"><img id="bigpic_<?php echo ($i-1); ?>" src="<?php echo ($slide["picurl"]); ?>" onload="loadNext()"  alt="<?php echo (get_replace_html($slide["content"],0,50)); ?>" title="<?php echo (get_replace_html($slide["content"],0,50)); ?>" /></a></div>
			<div id="title_bg_<?php echo ($i-1); ?>" class="scrollimg2_bg" style="filter:alpha(opacity=0);-moz-opacity:0;opacity:0"></div>
			<a id="title_<?php echo ($i-1); ?>" href="<?php echo ($slide["link"]); ?>" title="" class="scrollimg2_txt" style="filter:alpha(opacity=0);-moz-opacity:0;opacity:0"><?php echo (get_replace_html($slide["content"],0,50)); ?></a>
		</div><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
	</div>
	<div class="scrollimg2_tigger">
		<div id="bigHover" class="scrollimg2_tigger_hoverbg"></div>
		<ul><?php $tag['name'] = 'slide';$tag['limit'] = '6';$tag['order'] = 'oid asc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$slide): ++$i;$mod = ($i % 2 );?><li><a href="<?php echo ($slide["link"]); ?>" title=""><img id="big_pic_nav_on_<?php echo ($i-1); ?>" src="<?php echo ($slide["picurl"]); ?>" alt="" title="" /></a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
		</ul>
		<ul class="scrollimg2_tigger_link"><?php $tag['name'] = 'slide';$tag['limit'] = '6';$tag['order'] = 'oid asc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$slide): ++$i;$mod = ($i % 2 );?><li><a id="big_pic_nav_<?php echo ($i-1); ?>" href="<?php echo ($slide["link"]); ?>" onclick="document.body.focus()" title="<?php echo ($slide["title"]); ?>"><img src="<?php echo ($slide["picurl"]); ?>" /></a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
		</ul>
	</div>
</div>
		<script>
			var MovieRecom={	
					step:122,
					hover:"bigHover",       //hover
					bigpic:"SwitchBigPic",	//大图DIV之ID通用部分
					smallpic:"big_pic_nav",//小图之ID通用部分
					selectstyle:"currA",	//小图被选中之后的CSS
					pictxt:"",	//配套图片文字
					totalcount:6,				//图片数量
					autotimeintval:5000,
					objname:"MovieRecom",	//对象名称
					css:"display:none;position:absolute;left:0;top:0;overflow:hidden;" //css
				};
			BigNews.init(MovieRecom);
		</script>
	<div class="foucerank">
		<ul class="tabbox">
			<li id="Tab_rebo_4" class="on" onmouseover="switchTab('rebo',4,5,'on','');">全部</li>
			<li id="Tab_rebo_0" onmouseover="switchTab('rebo',0,5,'on','');">电影</li>
			<li id="Tab_rebo_1" onmouseover="switchTab('rebo',1,5,'on','');">电视剧</li>
			<li id="Tab_rebo_2" onmouseover="switchTab('rebo',2,5,'on','');">动漫</li>
			<li id="Tab_rebo_3" onmouseover="switchTab('rebo',3,5,'on','');">综艺</li>
		</ul>
		<div class="foucerank_con" id="List_rebo_4">
	<ol class="ranklist">
			<?php $tag['name'] = 'video';$tag['limit'] = '10';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li></eq><?php endif; ?><em><?php if(($i)  ==  "10"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?></em><p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo ($video["title"]); ?></a><strong class="type"><?php if($video["serial"] > 0): ?>至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清<?php endif; ?><?php endif; ?></strong></p><span class="score"><?php echo ($video["score"]); ?></span><a href="<?php echo ($video["readurl"]); ?>" title="点击查看影片信息" class="movinfo" target="_blank">影片信息</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
		</ol>
</div>
		<div class="foucerank_con" id="List_rebo_0" style="display:none">
	<ol class="ranklist">
			<?php $tag['name'] = 'video';$tag['cid'] = '1';$tag['limit'] = '10';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li></eq><?php endif; ?><em><?php if(($i)  ==  "10"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?></em><p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo ($video["title"]); ?></a><strong class="type"><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清<?php endif; ?></strong></p><span class="score"><?php echo ($video["score"]); ?></span><a href="<?php echo ($video["readurl"]); ?>" title="点击查看影片信息" class="movinfo" target="_blank">影片信息</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
		</ol>
</div>
		<div class="foucerank_con" id="List_rebo_1" style="display:none">
	<ol class="ranklist ranklist_dsj">
			<?php $tag['name'] = 'video';$tag['cid'] = '2';$tag['limit'] = '10';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li></eq><?php endif; ?><em><?php if(($i)  ==  "10"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?></em><p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo ($video["title"]); ?></a><strong class="type"><?php if($video["serial"] > 0): ?>至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?></strong></p><span class="score"><?php echo ($video["score"]); ?></span><a href="<?php echo ($video["readurl"]); ?>" title="点击查看影片信息" class="movinfo" target="_blank">影片信息</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
		</ol>
</div>
		<div class="foucerank_con" id="List_rebo_2" style="display:none">
	<ol class="ranklist ranklist_dsj">
			<?php $tag['name'] = 'video';$tag['cid'] = '3';$tag['limit'] = '10';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li></eq><?php endif; ?><em><?php if(($i)  ==  "10"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?></em><p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo ($video["title"]); ?></a><strong class="type"><?php if($video["serial"] > 0): ?>至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?></strong></p><span class="score"><?php echo ($video["score"]); ?></span><a href="<?php echo ($video["readurl"]); ?>" title="点击查看影片信息" class="movinfo" target="_blank">影片信息</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
		</ol>
</div>
		<div class="foucerank_con" id="List_rebo_3" style="display:none">
	<ol class="ranklist ranklist_dsj">
			<?php $tag['name'] = 'video';$tag['cid'] = '4';$tag['limit'] = '10';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li></eq><?php endif; ?><em><?php if(($i)  ==  "10"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?></em><p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo ($video["title"]); ?></a><strong class="type"><?php if($video["serial"] > 0): ?><?php echo ($video["serial"]); ?>期<?php else: ?>完结<?php endif; ?></strong></p><span class="score"><?php echo ($video["score"]); ?></span><a href="<?php echo ($video["readurl"]); ?>" title="点击查看影片信息" class="movinfo" target="_blank">影片信息</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
		</ol>
</div>
		<script>
		var Sinterval=false;
		</script>
		<div class="foucerank_scroll">
			<ul class="foucerank_txt" id="scrollHlight" >
				<!--foucebox  
				<li class="HL"><a href="http://www.xun.com/detail/guochanju5185.shtml" target="_blank">《乡村爱情5》爆笑开“春”</a></li>
                <li class="HL"><a href="http://www.xun.com/detail/guochanju5192.shtml" target="_blank">《如意》杨幂、刘恺威定情之作</a></li>
				END-->
			</ul>
		</div>
	</div>
	</div>
</div><!--foucebox  END-->
<?php echo get_cms_ads('duilian');?>
<div class="wrapper">
	<div class="topmovie">
		<div class="topmovie_con">
	<div class="topmovie_bg topmovie_bg_1">
		<h2><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/area/%E6%AC%A7%E7%BE%8E" title="热门大片"><img src="<?php echo ($webpath); ?>images/rmdp.jpg" alt="最新大片" title="最新大片<?php echo date('Y-m-j');?>最后更新" /></a></h2>
				<ul class="movielist movielist_136x96">
                <?php $tag['name'] = 'video';$tag['cid'] = '1';$tag['area'] = '欧美';$tag['limit'] = '2';$tag['stars'] = '5';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
						<a class="pic" title="<?php echo ($video["title"]); ?>" href="<?php echo ($video["readurl"]); ?>"><img title="<?php echo ($video["title"]); ?>" alt="<?php echo ($video["title"]); ?>" src="<?php echo ($video["picurl"]); ?>"></a>
						<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,11)); ?></a><a class="movinfo" title="<?php echo ($video["title"]); ?>在线观看" href="<?php echo ($video["readurl"]); ?>"><?php echo ($video["title"]); ?>在线观看</a></p>
						<span class="movbg"></span>
						<span class="movtxt"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清<?php endif; ?><?php endif; ?></span>
					</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
                </ul>
				<ul class="txtlist"><?php $tag['name'] = 'video';$tag['cid'] = '1';$tag['area'] = '欧美';$tag['stars'] = '5';$tag['limit'] = '2,2';$tag['order'] = 'addtime desc,stars desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
						<p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,7)); ?></a>(<?php if($video["serial"] > 0): ?>至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清<?php endif; ?><?php endif; ?>)</p>
						<p><span><?php echo (get_replace_html($video["actor"],0,10)); ?></span></p>
					</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ul>
			</div>
		</div>
		<div class="topmovie_con">
	<div class="topmovie_bg topmovie_bg_2">
		<h2><a href="<?php echo get_channel_name(8,'showurl');?>" title="男性影院"><img src="<?php echo ($webpath); ?>images/nxyy.jpg" alt="男性影院" title="男性影院" /></a></h2>
				<ul class="movielist movielist_136x96">
                <?php $tag['name'] = 'video';$tag['cid'] = '8,11,13,14';$tag['limit'] = '0,2';$tag['stars'] = '4';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
						<a class="pic" title="<?php echo ($video["title"]); ?>" href="<?php echo ($video["readurl"]); ?>"><img title="<?php echo ($video["title"]); ?>" alt="<?php echo ($video["title"]); ?>" src="<?php echo ($video["picurl"]); ?>"></a>
						<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,11)); ?></a><a class="movinfo" title="<?php echo ($video["title"]); ?>在线观看" href="<?php echo ($video["readurl"]); ?>"><?php echo ($video["title"]); ?>在线观看</a></p>
						<span class="movbg"></span>
						<span class="movtxt"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清<?php endif; ?><?php endif; ?></span>
					</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ul>
				<ul class="txtlist"><?php $tag['name'] = 'video';$tag['cid'] = '8,11,13,14';$tag['stars'] = '4';$tag['limit'] = '2,2';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
						<p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,6)); ?></a>(<?php if($video["serial"] > 0): ?>至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清<?php endif; ?><?php endif; ?>)</p>
						<p><span><?php echo (get_replace_html($video["actor"],0,10)); ?></span></p>
					</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ul>
			</div>
		</div>
		<div class="topmovie_con">
	<div class="topmovie_bg topmovie_bg_3">
		<h2><a href="<?php echo get_channel_name(15,'showurl');?>" title="同步卫视"><img src="<?php echo ($webpath); ?>images/tbws.jpg" alt="同步卫视" title="同步卫视" /></a></h2>
				<ul class="movielist movielist_136x96">
                <?php $tag['name'] = 'video';$tag['cid'] = '15';$tag['limit'] = '2';$tag['stars'] = '5';$tag['serial'] = '1';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
						<a class="pic" title="<?php echo ($video["title"]); ?>" href="<?php echo ($video["readurl"]); ?>"><img title="<?php echo ($video["title"]); ?>" alt="<?php echo ($video["title"]); ?>" src="<?php echo ($video["picurl"]); ?>"></a>
						<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,11)); ?></a><a class="movinfo" title="<?php echo ($video["title"]); ?>在线观看" href="<?php echo ($video["readurl"]); ?>"><?php echo ($video["title"]); ?>在线观看</a></p>
						<span class="movbg"></span>
						<span class="movtxt"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清<?php endif; ?><?php endif; ?></span>
					</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ul>
				<ul class="txtlist"><?php $tag['name'] = 'video';$tag['cid'] = '15';$tag['serial'] = '1';$tag['limit'] = '2,2';$tag['stars'] = '5';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
						<p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,6)); ?></a>(<?php if($video["serial"] > 0): ?>至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清<?php endif; ?><?php endif; ?>)</p>
						<p><span><?php echo (get_replace_html($video["actor"],0,10)); ?></span></p>
					</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ul>
			</div>
		</div>
		<div class="topmovie_con">
	<div class="topmovie_bg topmovie_bg_4">
		<h2><a href="<?php echo get_channel_name(17,'showurl');?>" title="TVB剧场"><img src="<?php echo ($webpath); ?>images/tvbjc.jpg" alt="TVB剧场" title="TVB剧场" /></a></h2>
				<ul class="movielist movielist_136x96">
                <?php $tag['name'] = 'video';$tag['cid'] = '17';$tag['limit'] = '2';$tag['stars'] = '5';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
						<a class="pic" title="<?php echo ($video["title"]); ?>" href="<?php echo ($video["readurl"]); ?>"><img title="<?php echo ($video["title"]); ?>" alt="<?php echo ($video["title"]); ?>" src="<?php echo ($video["picurl"]); ?>"></a>
						<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,11)); ?></a><a class="movinfo" title="<?php echo ($video["title"]); ?>在线观看" href="<?php echo ($video["readurl"]); ?>"><?php echo ($video["title"]); ?>在线观看</a></p>
						<span class="movbg"></span>
						<span class="movtxt"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清<?php endif; ?><?php endif; ?></span>
					</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ul>
				<ul class="txtlist"><?php $tag['name'] = 'video';$tag['cid'] = '17';$tag['limit'] = '2,2';$tag['stars'] = '5';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
						<p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,6)); ?></a>(<?php if($video["serial"] > 0): ?>至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清<?php endif; ?><?php endif; ?>)</p>
						<p><span><?php echo (get_replace_html($video["actor"],0,10)); ?></span></p>
					</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ul>
			</div>
		</div>
		<div class="topmovie_con">
	<div class="topmovie_bg topmovie_bg_5">
		<h2><a href="<?php echo get_channel_name(18,'showurl');?>" title="海外剧场"><img src="<?php echo ($webpath); ?>images/hwjc.jpg" alt="海外剧场" title="海外剧场" /></a></h2>
				<ul class="movielist movielist_136x96">
                <?php $tag['name'] = 'video';$tag['cid'] = '18,19,20,21';$tag['limit'] = '2';$tag['stars'] = '5';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
						<a class="pic" title="<?php echo ($video["title"]); ?>" href="<?php echo ($video["readurl"]); ?>"><img title="<?php echo ($video["title"]); ?>" alt="<?php echo ($video["title"]); ?>" src="<?php echo ($video["picurl"]); ?>"></a>
						<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,11)); ?></a><a class="movinfo" title="<?php echo ($video["title"]); ?>在线观看" href="<?php echo ($video["readurl"]); ?>"><?php echo ($video["title"]); ?>在线观看</a></p>
						<span class="movbg"></span>
						<span class="movtxt"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清<?php endif; ?><?php endif; ?></span>
					</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ul>
				<ul class="txtlist"><?php $tag['name'] = 'video';$tag['cid'] = '18,19,20,21';$tag['limit'] = '2,2';$tag['stars'] = '5';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
						<p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,6)); ?></a>(<?php if($video["serial"] > 0): ?>至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清<?php endif; ?><?php endif; ?>)</p>
						<p><span><?php echo (get_replace_html($video["actor"],0,10)); ?></span></p>
					</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ul>
			</div>
		</div>
		<div class="topmovie_con">
	<div class="topmovie_bg topmovie_bg_6">
		<h2><a href="<?php echo get_channel_name(4,'showurl');?>" title="人气综艺"><img src="<?php echo ($webpath); ?>images/rqzy.jpg" alt="人气综艺" title="人气综艺" /></a></h2>
				<ul class="movielist movielist_136x96">
                <?php $tag['name'] = 'video';$tag['cid'] = '4';$tag['limit'] = '2';$tag['stars'] = '5';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
						<a class="pic" title="<?php echo ($video["title"]); ?>" href="<?php echo ($video["readurl"]); ?>"><img title="<?php echo ($video["title"]); ?>" alt="<?php echo ($video["title"]); ?>" src="<?php echo ($video["picurl"]); ?>"></a>
						<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,11)); ?></a><a class="movinfo" title="<?php echo ($video["title"]); ?>在线观看" href="<?php echo ($video["readurl"]); ?>"><?php echo ($video["title"]); ?>在线观看</a></p>
						<span class="movbg"></span>
						<span class="movtxt"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>期<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清<?php endif; ?><?php endif; ?></span>
					</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ul>
				<ul class="txtlist"><?php $tag['name'] = 'video';$tag['cid'] = '4';$tag['limit'] = '2,2';$tag['stars'] = '5';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
						<p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,6)); ?></a>(<?php if($video["serial"] > 0): ?><?php echo ($video["serial"]); ?>期<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清<?php endif; ?><?php endif; ?>)</p>
						<p><span><?php echo (get_replace_html($video["actor"],0,10)); ?></span></p>
					</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ul>
			</div>
		</div>
	</div><!--topmovie  END-->
</div><!--wrapper  END-->
<div class="banner"><?php echo get_cms_ads('banner');?></div><!--www.xun.com通栏广告位-->
<div class="wrapper box height_1">
	<div class="main">
		<div class="box_tt">
			<h2><a href="<?php echo get_channel_name(1,'showurl');?>" title="今日电影">今日电影</a></h2>
			<div class="act"><?php $tag['name'] = 'video';$tag['cid'] = '1';$tag['limit'] = '5';$tag['year'] = '2011';$tag['order'] = 'monthhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><a title="<?php echo ($video["title"]); ?>" href="<?php echo ($video["readurl"]); ?>"><?php echo (get_replace_html($video["title"],0,15)); ?></a><?php if(($i)  <  "5"): ?>|<?php endif; ?><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
			<a title="更多" href="<?php echo get_channel_name(1,'showurl');?>">更多</a>
			</div>
		</div>
		<ul class="movielist movielist_100x140"><?php $tag['name'] = 'video';$tag['cid'] = '1';$tag['limit'] = '8';$tag['stars'] = '3,4,5';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
	<a title="<?php echo ($video["title"]); ?>" href="<?php echo ($video["readurl"]); ?>" class="pic" target="_blank"><img onmouseover="D.show('movie','<?php echo ($video["title"]); ?>','<?php echo ($video["year"]); ?>','<?php echo ($video["showname"]); ?>','<?php echo ($video["area"]); ?>','<?php echo ($video["score"]); ?>','<?php echo ($video["scoreer"]); ?>', '<?php echo (get_replace_html($video["actor"],0,12)); ?>','','','',1)" onmouseout="D.hide()" _src="<?php echo ($video["picurlsmall"]); ?>" src="<?php echo ($webpath); ?>images/img_default.gif" alt="<?php echo ($video["title"]); ?>" title="<?php echo ($video["title"]); ?>" /><span class='movnum movnum_720'></span></a>
	<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo ($video["title"]); ?></a><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></p>
	<p><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清</if><?php endif; ?></p>
				</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
		</ul>
		<div class="box_tt">
			<h2 class="title_2"><a href="<?php echo get_channel_name(2,'showurl');?>" title="今日电视剧">今日电视剧</a></h2>
			<div class="act"><?php $tag['name'] = 'video';$tag['cid'] = '2';$tag['limit'] = '5';$tag['year'] = '2011';$tag['order'] = 'monthhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><a title="<?php echo ($video["title"]); ?>" href="<?php echo ($video["readurl"]); ?>"><?php echo (get_replace_html($video["title"],0,15)); ?></a><?php if(($i)  <  "5"): ?>|<?php endif; ?><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
			<a title="更多" href="<?php echo get_channel_name(2,'showurl');?>">更多</a>
			</div>
		</div>
		<ul class="movielist movielist_100x140"><?php $tag['name'] = 'video';$tag['cid'] = '2';$tag['limit'] = '8';$tag['stars'] = '3,4,5';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
	<a title="<?php echo ($video["title"]); ?>" href="<?php echo ($video["readurl"]); ?>" title="" class="pic" target="_blank"><img onmouseover="D.show('movie','<?php echo ($video["title"]); ?>','<?php echo ($video["year"]); ?>','<?php echo ($video["showname"]); ?>','<?php echo ($video["area"]); ?>','<?php echo ($video["score"]); ?>','<?php echo ($video["scoreer"]); ?>', '<?php echo (get_replace_html($video["actor"],0,12)); ?>','','','',1)" onmouseout="D.hide()" _src="<?php echo ($video["picurlsmall"]); ?>" src="<?php echo ($webpath); ?>images/img_default.gif" alt="<?php echo ($video["title"]); ?>" title="<?php echo ($video["title"]); ?>" /><span class='movnum movnum_720'></span></a>
	<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo ($video["title"]); ?></a><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></p>
	<p><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清</if><?php endif; ?></p>
    <span class="movbg"></span><span class="movtxt"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?></span>
				</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
		</ul>
		<div class="colbox">
			<div class="box_tt">
				<h2 class="title_3"><a href="<?php echo get_channel_name(4,'showurl');?>" title="今日综艺">今日综艺</a></h2>
				<div class="act"><?php $tag['name'] = 'video';$tag['cid'] = '4';$tag['limit'] = '3';$tag['year'] = '2011';$tag['order'] = 'monthhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><a title="<?php echo ($video["title"]); ?>" href="<?php echo ($video["readurl"]); ?>"><?php echo (get_replace_html($video["title"],0,15)); ?></a><?php if(($i)  <  "3"): ?>|<?php endif; ?><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				<a title="更多" href="<?php echo get_channel_name(4,'showurl');?>">更多</a>
				</div>
			</div>
			<ul class="movielist movielist_100x140"><?php $tag['name'] = 'video';$tag['cid'] = '4';$tag['limit'] = '4';$tag['stars'] = '3,4,5';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
	<a title="<?php echo ($video["title"]); ?>" href="<?php echo ($video["readurl"]); ?>" title="" class="pic" target="_blank"><img onmouseover="D.show('movie','<?php echo ($video["title"]); ?>','<?php echo ($video["year"]); ?>','<?php echo ($video["showname"]); ?>','<?php echo ($video["area"]); ?>','<?php echo ($video["score"]); ?>','<?php echo ($video["scoreer"]); ?>', '<?php echo (get_replace_html($video["actor"],0,12)); ?>','','','',1)" onmouseout="D.hide()" _src="<?php echo ($video["picurlsmall"]); ?>" src="<?php echo ($webpath); ?>images/img_default.gif" alt="<?php echo ($video["title"]); ?>" title="<?php echo ($video["title"]); ?>" /><span class='movnum movnum_720'></span></a>
	<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo ($video["title"]); ?></a><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></p>
	<p><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清</if><?php endif; ?></p>
    <span class="movbg"></span><span class="movtxt"><?php if($video["serial"] > 0): ?><?php echo ($video["serial"]); ?>期<?php else: ?>完结<?php endif; ?></span>
				</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
			</ul>
		</div>
		<div class="colbox">
			<div class="box_tt">
				<h2 class="title_4"><a href="<?php echo get_channel_name(3,'showurl');?>" title="今日动漫">今日动漫</a></h2>
				<div class="act"><?php $tag['name'] = 'video';$tag['cid'] = '3';$tag['limit'] = '3';$tag['year'] = '2011';$tag['order'] = 'monthhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><a title="<?php echo ($video["title"]); ?>" href="<?php echo ($video["readurl"]); ?>"><?php echo (get_replace_html($video["title"],0,15)); ?></a><?php if(($i)  <  "3"): ?>|<?php endif; ?><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				<a title="更多" href="<?php echo get_channel_name(3,'showurl');?>">更多</a>
				</div>
			</div>
			<ul class="movielist movielist_100x140"><?php $tag['name'] = 'video';$tag['cid'] = '3';$tag['limit'] = '4';$tag['stars'] = '3,4,5';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
	<a title="<?php echo ($video["title"]); ?>" href="<?php echo ($video["readurl"]); ?>" title="" class="pic" target="_blank"><img onmouseover="D.show('movie','<?php echo ($video["title"]); ?>','<?php echo ($video["year"]); ?>','<?php echo ($video["showname"]); ?>','<?php echo ($video["area"]); ?>','<?php echo ($video["score"]); ?>','<?php echo ($video["scoreer"]); ?>', '<?php echo (get_replace_html($video["actor"],0,12)); ?>','','','',1)" onmouseout="D.hide()" _src="<?php echo ($video["picurlsmall"]); ?>" src="<?php echo ($webpath); ?>images/img_default.gif" alt="<?php echo ($video["title"]); ?>" title="<?php echo ($video["title"]); ?>" /><span class='movnum movnum_720'></span></a>
	<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo ($video["title"]); ?></a><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></p>
	<p><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清</if><?php endif; ?></p>
    <span class="movbg"></span><span class="movtxt"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?></span>
				</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
			</ul>
		</div>
	</div><!--main  END-->
</div><!--wrapper 今日 END-->
<div class="wrapper box L710R232 height_2">
		<div class="main">
			<div class="box_tt">
				<h2 class="title_5"><a href="<?php echo get_channel_name(1,'showurl');?>" title="电影">电影</a></h2>
				<div class="second_tab">
                    <ul class="second_tab_list">
						<li id="Tab_mfen_0" onmouseover="switchTab('mfen',0,7,'on','')" class="on">热门大片</li>
<li id="Tab_mfen_1" onmouseover="switchTab('mfen',1,7,'on','')" >动作</li>
<li id="Tab_mfen_2" onmouseover="switchTab('mfen',2,7,'on','')" >喜剧</li>
<li id="Tab_mfen_3" onmouseover="switchTab('mfen',3,7,'on','')" >爱情</li>
<li id="Tab_mfen_4" onmouseover="switchTab('mfen',4,7,'on','')" >科幻</li>
<li id="Tab_mfen_5" onmouseover="switchTab('mfen',5,7,'on','')" >剧情</li>
<li id="Tab_mfen_6" onmouseover="switchTab('mfen',6,7,'on','')" >恐怖</li>
                    </ul>
                    <a href="<?php echo get_channel_name(1,'showurl');?>" class="more" title="更多">更多</a>
                </div>
			</div>
			<div class="colmain">
				<ul class="movielist movielist_100x140" id="List_mfen_0"><?php $tag['name'] = 'video';$tag['cid'] = '1';$tag['limit'] = '12';$tag['order'] = 'weekhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
			<a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" class="pic" target="_blank"><img id="mfen_pic_0_<?php echo ($i-1); ?>" onmouseover="D.show('movie','<?php echo ($video["title"]); ?>','<?php echo ($video["year"]); ?>','<?php echo ($video["showname"]); ?>','<?php echo ($video["area"]); ?>','<?php echo ($video["score"]); ?>','<?php echo ($video["scoreer"]); ?>', '<?php echo (get_replace_html($video["actor"],0,12)); ?>','','','',1)" onmouseout="D.hide()" _src="<?php echo ($video["picurlsmall"]); ?>" src="<?php echo ($webpath); ?>images/img_default.gif" alt="<?php echo ($video["title"]); ?>" title="<?php echo ($video["title"]); ?>"  /><span class='movnum movnum_720'></span></a>
			<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,7)); ?></a><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></p>
			<p><?php echo ((get_replace_html($video["intro"],0,8))?(get_replace_html($video["intro"],0,8)):'最新热片'); ?></p>
					</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ul>
				<ul class="movielist movielist_100x140" id="List_mfen_1" style="display:none"><?php $tag['name'] = 'video';$tag['cid'] = '8';$tag['limit'] = '12';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
			<a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" class="pic" target="_blank"><img id="mfen_pic_1_<?php echo ($i-1); ?>" onmouseover="D.show('movie','<?php echo ($video["title"]); ?>','<?php echo ($video["year"]); ?>','<?php echo ($video["showname"]); ?>','<?php echo ($video["area"]); ?>','<?php echo ($video["score"]); ?>','<?php echo ($video["scoreer"]); ?>', '<?php echo (get_replace_html($video["actor"],0,12)); ?>','','','',1)" onmouseout="D.hide()" _src="<?php echo ($video["picurlsmall"]); ?>" src="<?php echo ($webpath); ?>images/img_default.gif" alt="<?php echo ($video["title"]); ?>" title="<?php echo ($video["title"]); ?>"  /><span class='movnum movnum_720'></span></a>
			<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,7)); ?></a><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></p>
			<p><?php echo ((get_replace_html($video["intro"],0,8))?(get_replace_html($video["intro"],0,8)):'最新热片'); ?></p>
					</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ul>
				<ul class="movielist movielist_100x140" id="List_mfen_2" style="display:none"><?php $tag['name'] = 'video';$tag['cid'] = '9';$tag['limit'] = '12';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
			<a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" class="pic" target="_blank"><img id="mfen_pic_2_<?php echo ($i-1); ?>" onmouseover="D.show('movie','<?php echo ($video["title"]); ?>','<?php echo ($video["year"]); ?>','<?php echo ($video["showname"]); ?>','<?php echo ($video["area"]); ?>','<?php echo ($video["score"]); ?>','<?php echo ($video["scoreer"]); ?>', '<?php echo (get_replace_html($video["actor"],0,12)); ?>','','','',1)" onmouseout="D.hide()" _src="<?php echo ($video["picurlsmall"]); ?>" src="<?php echo ($webpath); ?>images/img_default.gif" alt="<?php echo ($video["title"]); ?>" title="<?php echo ($video["title"]); ?>"  /><span class='movnum movnum_720'></span></a>
			<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,7)); ?></a><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></p>
			<p><?php echo ((get_replace_html($video["intro"],0,8))?(get_replace_html($video["intro"],0,8)):'最新热片'); ?></p>
					</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ul>
				<ul class="movielist movielist_100x140" id="List_mfen_3" style="display:none"><?php $tag['name'] = 'video';$tag['cid'] = '10';$tag['limit'] = '12';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
			<a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" class="pic" target="_blank"><img id="mfen_pic_3_<?php echo ($i-1); ?>" onmouseover="D.show('movie','<?php echo ($video["title"]); ?>','<?php echo ($video["year"]); ?>','<?php echo ($video["showname"]); ?>','<?php echo ($video["area"]); ?>','<?php echo ($video["score"]); ?>','<?php echo ($video["scoreer"]); ?>', '<?php echo (get_replace_html($video["actor"],0,12)); ?>','','','',1)" onmouseout="D.hide()" _src="<?php echo ($video["picurlsmall"]); ?>" src="<?php echo ($webpath); ?>images/img_default.gif" alt="<?php echo ($video["title"]); ?>" title="<?php echo ($video["title"]); ?>"  /><span class='movnum movnum_720'></span></a>
			<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,7)); ?></a><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></p>
			<p><?php echo ((get_replace_html($video["intro"],0,8))?(get_replace_html($video["intro"],0,8)):'最新热片'); ?></p>
					</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ul>
				<ul class="movielist movielist_100x140" id="List_mfen_4" style="display:none"><?php $tag['name'] = 'video';$tag['cid'] = '11';$tag['limit'] = '12';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
			<a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" class="pic" target="_blank"><img id="mfen_pic_4_<?php echo ($i-1); ?>" onmouseover="D.show('movie','<?php echo ($video["title"]); ?>','<?php echo ($video["year"]); ?>','<?php echo ($video["showname"]); ?>','<?php echo ($video["area"]); ?>','<?php echo ($video["score"]); ?>','<?php echo ($video["scoreer"]); ?>', '<?php echo (get_replace_html($video["actor"],0,12)); ?>','','','',1)" onmouseout="D.hide()" _src="<?php echo ($video["picurlsmall"]); ?>" src="<?php echo ($webpath); ?>images/img_default.gif" alt="<?php echo ($video["title"]); ?>" title="<?php echo ($video["title"]); ?>"  /><span class='movnum movnum_720'></span></a>
			<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,7)); ?></a><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></p>
			<p><?php echo ((get_replace_html($video["intro"],0,8))?(get_replace_html($video["intro"],0,8)):'最新热片'); ?></p>
					</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ul>
				<ul class="movielist movielist_100x140" id="List_mfen_5" style="display:none"><?php $tag['name'] = 'video';$tag['cid'] = '12';$tag['limit'] = '12';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
			<a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" class="pic" target="_blank"><img id="mfen_pic_5_<?php echo ($i-1); ?>" onmouseover="D.show('movie','<?php echo ($video["title"]); ?>','<?php echo ($video["year"]); ?>','<?php echo ($video["showname"]); ?>','<?php echo ($video["area"]); ?>','<?php echo ($video["score"]); ?>','<?php echo ($video["scoreer"]); ?>', '<?php echo (get_replace_html($video["actor"],0,12)); ?>','','','',1)" onmouseout="D.hide()" _src="<?php echo ($video["picurlsmall"]); ?>" src="<?php echo ($webpath); ?>images/img_default.gif" alt="<?php echo ($video["title"]); ?>" title="<?php echo ($video["title"]); ?>"  /><span class='movnum movnum_720'></span></a>
			<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,7)); ?></a><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></p>
			<p><?php echo ((get_replace_html($video["intro"],0,8))?(get_replace_html($video["intro"],0,8)):'最新热片'); ?></p>
					</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ul>
				<ul class="movielist movielist_100x140" id="List_mfen_6" style="display:none"><?php $tag['name'] = 'video';$tag['cid'] = '13';$tag['limit'] = '12';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
			<a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" class="pic" target="_blank"><img id="mfen_pic_6_<?php echo ($i-1); ?>" onmouseover="D.show('movie','<?php echo ($video["title"]); ?>','<?php echo ($video["year"]); ?>','<?php echo ($video["showname"]); ?>','<?php echo ($video["area"]); ?>','<?php echo ($video["score"]); ?>','<?php echo ($video["scoreer"]); ?>', '<?php echo (get_replace_html($video["actor"],0,12)); ?>','','','',1)" onmouseout="D.hide()" _src="<?php echo ($video["picurlsmall"]); ?>" src="<?php echo ($webpath); ?>images/img_default.gif" alt="<?php echo ($video["title"]); ?>" title="<?php echo ($video["title"]); ?>"  /><span class='movnum movnum_720'></span></a>
			<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,7)); ?></a><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></p>
			<p><?php echo ((get_replace_html($video["intro"],0,8))?(get_replace_html($video["intro"],0,8)):'最新热片'); ?></p>
					</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ul>
			</div>
			<div class="colside">
				<div class="hotbox">
                <?php $tag['name'] = 'video';$tag['cid'] = '1';$tag['limit'] = '1';$tag['stars'] = '5';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><h4><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" class="hotpic"><img src="<?php echo ($webpath); ?>images/img_default.gif" _src="<?php echo ($video["picurl"]); ?>" alt="<?php echo ($video["title"]); ?>" title="<?php echo ($video["title"]); ?>" class="pic"/><?php echo (get_replace_html($video["title"],0,7)); ?><span>(<?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清</if><?php endif; ?>)</span></a></h4>
	<ul class="txtlist2">
		<li>导演:<?php if(!empty($director)): ?><?php echo (get_actor_url($video["director"])); ?><?php else: ?>未知<?php endif; ?></li>
		<li>主演:<?php echo (get_actor_url($video["actor"])); ?></li>
		<li class="listtype">类型:<a href="<?php echo ($video["showurl"]); ?>" title="<?php echo ($video["showname"]); ?>"><?php echo ($video["showname"]); ?></a></p></li>
		<li>年份:<a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/year/<?php echo ($video["year"]); ?>" title="<?php echo ($video["year"]); ?>"><?php echo ($video["year"]); ?></a></li>
	</ul>
	<p><?php echo (get_replace_html(htmlspecialchars_decode($video["content"]),0,27)); ?><a href="<?php echo ($video["readurl"]); ?>" title="详细">详细</a></p><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</div><!--hotbox  END-->
				<div class="side_tt"><h3>用户满意度</h3></div>
				<div class="tabbox3">
					<ul class="tabbox3_tigger">
		<li id="Tab_movieleft_0" onmouseover="switchTab('movieleft',0,5,'on','')" class="on">动作指数</li>
		<li id="Tab_movieleft_1" onmouseover="switchTab('movieleft',1,5,'on','')" >喜剧指数</li>
		<li id="Tab_movieleft_2" onmouseover="switchTab('movieleft',2,5,'on','')" >爱情指数</li>
		<li id="Tab_movieleft_3" onmouseover="switchTab('movieleft',3,5,'on','')" >科幻指数</li>
		<li id="Tab_movieleft_4" onmouseover="switchTab('movieleft',4,5,'on','')" >恐怖指数</li>
</ul>
					<ol id="List_movieleft_0" class="txtlist2 numranking" >
                    <?php $tag['name'] = 'video';$tag['cid'] = '8';$tag['limit'] = '5';$tag['order'] = 'score desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><span>0<?php echo ($i); ?>.</span><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,5)); ?>(<?php echo ($video["area"]); ?>)</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
					</ol>
					<ol id="List_movieleft_1" class="txtlist2 numranking" style="display:none">
                    <?php $tag['name'] = 'video';$tag['cid'] = '9';$tag['limit'] = '5';$tag['order'] = 'score desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><span>0<?php echo ($i); ?>.</span><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,8)); ?></a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
					</ol>
					<ol id="List_movieleft_2" class="txtlist2 numranking" style="display:none">
                    <?php $tag['name'] = 'video';$tag['cid'] = '10';$tag['limit'] = '5';$tag['order'] = 'score desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><span>0<?php echo ($i); ?>.</span><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,8)); ?></a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
					</ol>
					<ol id="List_movieleft_3" class="txtlist2 numranking" style="display:none">
                    <?php $tag['name'] = 'video';$tag['cid'] = '11';$tag['limit'] = '5';$tag['order'] = 'score desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><span>0<?php echo ($i); ?>.</span><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,8)); ?></a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
					</ol>
					<ol id="List_movieleft_4" class="txtlist2 numranking" style="display:none">
                    <?php $tag['name'] = 'video';$tag['cid'] = '13';$tag['limit'] = '5';$tag['order'] = 'score desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><span>0<?php echo ($i); ?>.</span><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,8)); ?></a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
					</ol>
				</div><!--tabbox3  END-->
			</div>
		</div><!--main  END-->
		<div class="side">
			<div class="side_tt side_tt_first"><h3>电影分类</h3></div>
			<div class="side_con">
				<dl class="taglist">
					<dt>类型</dt><?php $tag['name'] = 'menu';$tag['ids'] = '1'; $__LIST__ = get_tag_gxmenu($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): ++$i;$mod = ($i % 2 );?><?php if(is_array($menu["son"])): $i = 0; $__LIST__ = $menu["son"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): ++$i;$mod = ($i % 2 )?><dd><a href="<?php echo ($menu["showurl"]); ?>" title="<?php echo ($menu["cname"]); ?>"><?php echo ($menu["cname"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</dl>
				<dl class="taglist">
					<dt>地区</dt><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/area/内地" title="内地">内地</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/area/香港" title="香港">香港</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/area/" title="台湾">台湾</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/area/韩国" title="韩国">韩国</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/area/日本" title="日本">日本</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/area/欧美" title="欧美">欧美</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/area/其它" title="其它">其它</a></dd>
				</dl>
				<dl class="taglist">
					<dt>年份</dt><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/year/2012" title="2012">2012</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/year/2011" title="2011">2011</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/year/2010" title="2010">2010</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/year/2009" title="2009">2009</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/year/2008" title="2008">2008</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/year/2007" title="2007">2007</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/year/2006" title="2006">2006</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/year/2005" title="2005">2005</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/year/2004" title="2004">2004</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/year/2003" title="2003">2003</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/year/2002" title="2002">2002</a></dd>
				</dl>
				<div class="morelink"><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/order/score" title="评分最高">评分最高&gt;&gt;</a><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/order/addtime" title="最近更新">最近更新&gt;&gt;</a></div>
			</div>
			<div class="side_tt side_tt_2">
				<h3>电影排行榜</h3>
				<div class="tabbox2">
					<a id="Tab_moviebang_0" target="_self" href="javascript://" title="" onmouseover="switchTab('moviebang',0,3,'on','')" class="on">昨天</a><a id="Tab_moviebang_1" target="_self" href="javascript://" title="" onmouseover="switchTab('moviebang',1,3,'on','')">本周</a><a id="Tab_moviebang_2" target="_self" href="javascript://" title="" onmouseover="switchTab('moviebang',2,3,'on','')">本月</a>
				</div>
			</div>
			<div class="side_con">
				<ol id="List_moviebang_0" class="ranklist ranklist_movie">
					<?php $tag['name'] = 'video';$tag['cid'] = '1';$tag['limit'] = '14';$tag['order'] = 'dayhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><em><?php if(($i)  >  "9"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?>.</em><p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo (get_replace_html($video["title"],0,12)); ?></a><span><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清</if><?php endif; ?></span></p><span class="score"><?php echo ($video["score"]); ?></span><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ol>
				<ol id="List_moviebang_1" class="ranklist ranklist_movie" style="display:none">
					<?php $tag['name'] = 'video';$tag['cid'] = '1';$tag['limit'] = '14';$tag['order'] = 'weekhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><em><?php if(($i)  >  "9"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?>.</em><p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo (get_replace_html($video["title"],0,12)); ?></a><span><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清</if><?php endif; ?></span></p><span class="score"><?php echo ($video["score"]); ?></span><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ol>
				<ol id="List_moviebang_2" class="ranklist ranklist_movie" style="display:none">
					<?php $tag['name'] = 'video';$tag['cid'] = '1';$tag['limit'] = '14';$tag['order'] = 'monthhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><em><?php if(($i)  >  "9"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?>.</em><p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo (get_replace_html($video["title"],0,12)); ?></a><span><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清</if><?php endif; ?></span></p><span class="score"><?php echo ($video["score"]); ?></span><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ol>
			</div>
			<div class="sidebanner">
					
			</div><!--sidebanner  END-->
		</div><!--side  END-->
</div><!--wrapper 电影 END-->
<div class="wrapper box L710R232 height_2">
		<div class="main">
			<div class="box_tt">
				<h2 class="title_7"><a href="<?php echo get_channel_name(2,'showurl');?>" title="电视剧">电视剧</a></h2>
				<div class="second_tab">
                    <ul class="second_tab_list">
						<li id="Tab_tfen_0" onmouseover="switchTab('tfen',0,7,'on','')" class="on">同步热播</li>
<li id="Tab_tfen_1" onmouseover="switchTab('tfen',1,7,'on','')" >内地</li>
<li id="Tab_tfen_2" onmouseover="switchTab('tfen',2,7,'on','')" >台湾</li>
<li id="Tab_tfen_3" onmouseover="switchTab('tfen',3,7,'on','')" >香港</li>
<li id="Tab_tfen_4" onmouseover="switchTab('tfen',4,7,'on','')" >韩国</li>
<li id="Tab_tfen_5" onmouseover="switchTab('tfen',5,7,'on','')" >日本</li>
<li id="Tab_tfen_6" onmouseover="switchTab('tfen',6,7,'on','')" >欧美</li>
                    </ul>
                    <a href="<?php echo get_channel_name(2,'showurl');?>" class="more" title="更多">更多</a>
                </div>
			</div>
			<div class="colmain">
				<ul class="movielist movielist_100x140" id="List_tfen_0"><?php $tag['name'] = 'video';$tag['cid'] = '2';$tag['limit'] = '12';$tag['serial'] = '1';$tag['order'] = 'weekhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
			<a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" class="pic" target="_blank"><img id="tfen_pic_0_<?php echo ($i-1); ?>" onmouseover="D.show('movie','<?php echo ($video["title"]); ?>','<?php echo ($video["year"]); ?>','<?php echo ($video["showname"]); ?>','<?php echo ($video["area"]); ?>','<?php echo ($video["score"]); ?>','<?php echo ($video["scoreer"]); ?>', '<?php echo (get_replace_html($video["actor"],0,12)); ?>','','','',1)" onmouseout="D.hide()" _src="<?php echo ($video["picurlsmall"]); ?>" src="<?php echo ($webpath); ?>images/img_default.gif" alt="<?php echo ($video["title"]); ?>" title="<?php echo ($video["title"]); ?>"  /><span class='movnum movnum_720'></span></a>
			<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,7)); ?></a><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></p>
			<p><?php echo ((get_replace_html($video["intro"],0,8))?(get_replace_html($video["intro"],0,8)):'最新热片'); ?></p>
            <span class="movbg"></span><span class="movtxt"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?></span>
					</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ul>
				<ul class="movielist movielist_100x140" id="List_tfen_1" style="display:none"><?php $tag['name'] = 'video';$tag['cid'] = '15';$tag['limit'] = '12';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
			<a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" class="pic" target="_blank"><img id="tfen_pic_1_<?php echo ($i-1); ?>" onmouseover="D.show('movie','<?php echo ($video["title"]); ?>','<?php echo ($video["year"]); ?>','<?php echo ($video["showname"]); ?>','<?php echo ($video["area"]); ?>','<?php echo ($video["score"]); ?>','<?php echo ($video["scoreer"]); ?>', '<?php echo (get_replace_html($video["actor"],0,12)); ?>','','','',1)" onmouseout="D.hide()" _src="<?php echo ($video["picurlsmall"]); ?>" src="<?php echo ($webpath); ?>images/img_default.gif" alt="<?php echo ($video["title"]); ?>" title="<?php echo ($video["title"]); ?>"  /><span class='movnum movnum_720'></span></a>
			<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,7)); ?></a><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></p>
			<p><?php echo ((get_replace_html($video["intro"],0,8))?(get_replace_html($video["intro"],0,8)):'最新热片'); ?></p>
            <span class="movbg"></span><span class="movtxt"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?></span>
            		</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ul>
				<ul class="movielist movielist_100x140" id="List_tfen_2" style="display:none"><?php $tag['name'] = 'video';$tag['cid'] = '16';$tag['limit'] = '12';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
			<a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" class="pic" target="_blank"><img id="tfen_pic_2_<?php echo ($i-1); ?>" onmouseover="D.show('movie','<?php echo ($video["title"]); ?>','<?php echo ($video["year"]); ?>','<?php echo ($video["showname"]); ?>','<?php echo ($video["area"]); ?>','<?php echo ($video["score"]); ?>','<?php echo ($video["scoreer"]); ?>', '<?php echo (get_replace_html($video["actor"],0,12)); ?>','','','',1)" onmouseout="D.hide()" _src="<?php echo ($video["picurlsmall"]); ?>" src="<?php echo ($webpath); ?>images/img_default.gif" alt="<?php echo ($video["title"]); ?>" title="<?php echo ($video["title"]); ?>"  /><span class='movnum movnum_720'></span></a>
			<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,7)); ?></a><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></p>
			<p><?php echo ((get_replace_html($video["intro"],0,8))?(get_replace_html($video["intro"],0,8)):'最新热片'); ?></p>
            <span class="movbg"></span><span class="movtxt"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?></span>
					</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ul>
				<ul class="movielist movielist_100x140" id="List_tfen_3" style="display:none"><?php $tag['name'] = 'video';$tag['cid'] = '17';$tag['limit'] = '12';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
			<a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" class="pic" target="_blank"><img id="tfen_pic_3_<?php echo ($i-1); ?>" onmouseover="D.show('movie','<?php echo ($video["title"]); ?>','<?php echo ($video["year"]); ?>','<?php echo ($video["showname"]); ?>','<?php echo ($video["area"]); ?>','<?php echo ($video["score"]); ?>','<?php echo ($video["scoreer"]); ?>', '<?php echo (get_replace_html($video["actor"],0,12)); ?>','','','',1)'" onmouseout="D.hide()" _src="<?php echo ($video["picurlsmall"]); ?>" src="<?php echo ($webpath); ?>images/img_default.gif" alt="<?php echo ($video["title"]); ?>" title="<?php echo ($video["title"]); ?>"  /><span class='movnum movnum_720'></span></a>
			<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,7)); ?></a><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></p>
			<p><?php echo ((get_replace_html($video["intro"],0,8))?(get_replace_html($video["intro"],0,8)):'最新热片'); ?></p>
            <span class="movbg"></span><span class="movtxt"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?></span>
					</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ul>
				<ul class="movielist movielist_100x140" id="List_tfen_4" style="display:none"><?php $tag['name'] = 'video';$tag['cid'] = '18';$tag['limit'] = '12';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
			<a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" class="pic" target="_blank"><img id="tfen_pic_4_<?php echo ($i-1); ?>" onmouseover="D.show('movie','<?php echo ($video["title"]); ?>','<?php echo ($video["year"]); ?>','<?php echo ($video["showname"]); ?>','<?php echo ($video["area"]); ?>','<?php echo ($video["score"]); ?>','<?php echo ($video["scoreer"]); ?>', '<?php echo (get_replace_html($video["actor"],0,12)); ?>','','','',1)" onmouseout="D.hide()" _src="<?php echo ($video["picurlsmall"]); ?>" src="<?php echo ($webpath); ?>images/img_default.gif" alt="<?php echo ($video["title"]); ?>" title="<?php echo ($video["title"]); ?>"  /><span class='movnum movnum_720'></span></a>
			<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,7)); ?></a><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></p>
			<p><?php echo ((get_replace_html($video["intro"],0,8))?(get_replace_html($video["intro"],0,8)):'最新热片'); ?></p>
            <span class="movbg"></span><span class="movtxt"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?></span>
					</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ul>
				<ul class="movielist movielist_100x140" id="List_tfen_5" style="display:none"><?php $tag['name'] = 'video';$tag['cid'] = '19';$tag['limit'] = '12';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
			<a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" class="pic" target="_blank"><img id="tfen_pic_5_<?php echo ($i-1); ?>" onmouseover="D.show('movie','<?php echo ($video["title"]); ?>','<?php echo ($video["year"]); ?>','<?php echo ($video["showname"]); ?>','<?php echo ($video["area"]); ?>','<?php echo ($video["score"]); ?>','<?php echo ($video["scoreer"]); ?>', '<?php echo (get_replace_html($video["actor"],0,12)); ?>','','','',1)" onmouseout="D.hide()" _src="<?php echo ($video["picurlsmall"]); ?>" src="<?php echo ($webpath); ?>images/img_default.gif" alt="<?php echo ($video["title"]); ?>" title="<?php echo ($video["title"]); ?>" /><span class='movnum movnum_720'></span></a>
			<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,7)); ?></a><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></p>
			<p><?php echo ((get_replace_html($video["intro"],0,8))?(get_replace_html($video["intro"],0,8)):'最新热片'); ?></p>
            <span class="movbg"></span><span class="movtxt"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?></span>
					</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ul>
				<ul class="movielist movielist_100x140" id="List_tfen_6" style="display:none"><?php $tag['name'] = 'video';$tag['cid'] = '20';$tag['limit'] = '12';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
			<a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" class="pic" target="_blank"><img id="tfen_pic_6_<?php echo ($i-1); ?>" onmouseover="D.show('movie','<?php echo ($video["title"]); ?>','<?php echo ($video["year"]); ?>','<?php echo ($video["showname"]); ?>','<?php echo ($video["area"]); ?>','<?php echo ($video["score"]); ?>','<?php echo ($video["scoreer"]); ?>', '<?php echo (get_replace_html($video["actor"],0,12)); ?>','','','',1)" onmouseout="D.hide()" _src="<?php echo ($video["picurlsmall"]); ?>" src="<?php echo ($webpath); ?>images/img_default.gif" alt="<?php echo ($video["title"]); ?>" title="<?php echo ($video["title"]); ?>" /><span class='movnum movnum_720'></span></a>
			<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,7)); ?></a><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></p>
			<p><?php echo ((get_replace_html($video["intro"],0,8))?(get_replace_html($video["intro"],0,8)):'最新热片'); ?></p>
            <span class="movbg"></span><span class="movtxt"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?></span>
					</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ul>
			</div>
			<div class="colside">
				<div class="hotbox">
				<?php $tag['name'] = 'video';$tag['cid'] = '2';$tag['limit'] = '1';$tag['stars'] = '5';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><h4><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" class="hotpic"><img src="<?php echo ($webpath); ?>images/img_default.gif" _src="<?php echo ($video["picurl"]); ?>" alt="<?php echo ($video["title"]); ?>" title="<?php echo ($video["title"]); ?>" class="pic"/><?php echo (get_replace_html($video["title"],0,7)); ?><span>(<?php if($video["serial"] > 0): ?>至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?>)</span></a></h4>
	<ul class="txtlist2">
		<li>导演:<?php if(!empty($director)): ?><?php echo (get_actor_url($video["director"])); ?><?php else: ?>未知<?php endif; ?></li>
		<li>主演:<?php echo (get_actor_url($video["actor"])); ?></li>
		<li class="listtype">类型:<a href="<?php echo ($video["showurl"]); ?>" title="<?php echo ($video["showname"]); ?>"><?php echo ($video["showname"]); ?></a></p></li>
		<li>年份:<a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/year/<?php echo ($video["year"]); ?>" title="<?php echo ($video["year"]); ?>"><?php echo ($video["year"]); ?></a></li>
	</ul>
	<p><?php echo (get_replace_html(htmlspecialchars_decode($video["content"]),0,27)); ?><a href="<?php echo ($video["readurl"]); ?>" title="详细">详细</a></p><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</div><!--hotbox  END-->
                <div class="side_tt"><h3>用户满意度</h3></div>
				<div class="tabbox3">
					<ul class="tabbox3_tigger">
		<li id="Tab_tvleft_0" onmouseover="switchTab('tvleft',0,5,'on','')" class="on">国产剧</li>
		<li id="Tab_tvleft_1" onmouseover="switchTab('tvleft',1,5,'on','')" >台湾剧</li>
		<li id="Tab_tvleft_2" onmouseover="switchTab('tvleft',2,5,'on','')" >香港TVB</li>
		<li id="Tab_tvleft_3" onmouseover="switchTab('tvleft',3,5,'on','')" >欧美剧</li>
		<li id="Tab_tvleft_4" onmouseover="switchTab('tvleft',4,5,'on','')" >韩国剧</li>
</ul>
					<ol id="List_tvleft_0" class="txtlist2 numranking" >
                    <?php $tag['name'] = 'video';$tag['cid'] = '15';$tag['limit'] = '5';$tag['order'] = 'score desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><span>0<?php echo ($i); ?>.</span><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,8)); ?>(<?php if($video["serial"] > 0): ?>至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?>)</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
					</ol>
					<ol id="List_tvleft_1" class="txtlist2 numranking" style="display:none">
                    <?php $tag['name'] = 'video';$tag['cid'] = '16';$tag['limit'] = '5';$tag['order'] = 'score desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><span>0<?php echo ($i); ?>.</span><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,5)); ?>(<?php if($video["serial"] > 0): ?>至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?>)</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
					</ol>
					<ol id="List_tvleft_2" class="txtlist2 numranking" style="display:none">
                    <?php $tag['name'] = 'video';$tag['cid'] = '17';$tag['limit'] = '5';$tag['order'] = 'score desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><span>0<?php echo ($i); ?>.</span><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,5)); ?>(<?php if($video["serial"] > 0): ?>至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?>)</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
					</ol>
					<ol id="List_tvleft_3" class="txtlist2 numranking" style="display:none">
                    <?php $tag['name'] = 'video';$tag['cid'] = '20';$tag['limit'] = '5';$tag['order'] = 'score desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><span>0<?php echo ($i); ?>.</span><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,5)); ?>(<?php if($video["serial"] > 0): ?>至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?>)</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
					</ol>
					<ol id="List_tvleft_4" class="txtlist2 numranking" style="display:none">
                    <?php $tag['name'] = 'video';$tag['cid'] = '18';$tag['limit'] = '5';$tag['order'] = 'score desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><span>0<?php echo ($i); ?>.</span><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,5)); ?>(<?php if($video["serial"] > 0): ?>至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?>)</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
					</ol>
				</div><!--tabbox3  END-->
			</div>
		</div><!--main  END-->
		<div class="side">
			<div class="side_tt side_tt_first"><h3>电视剧分类</h3></div>
			<div class="side_con">
				<dl class="taglist">
					<dt>类型</dt><?php $tag['name'] = 'menu';$tag['ids'] = '2'; $__LIST__ = get_tag_gxmenu($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): ++$i;$mod = ($i % 2 );?><?php if(is_array($menu["son"])): $i = 0; $__LIST__ = $menu["son"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): ++$i;$mod = ($i % 2 )?><dd><a href="<?php echo ($menu["showurl"]); ?>" title="<?php echo ($menu["cname"]); ?>"><?php echo ($menu["cname"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2.html" title="全部">全部</a></dd>
				</dl>
				<dl class="taglist">
					<dt>年份</dt><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/year/2012" title="2012">2012</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/year/2011" title="2011">2011</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/year/2010" title="2010">2010</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/year/2009" title="2009">2009</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/year/2008" title="2008">2008</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/year/2007" title="2007">2007</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/year/2006" title="2006">2006</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/year/2005" title="2005">2005</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/year/2004" title="2004">2004</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/year/2003" title="2003">2003</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/year/2002" title="2002">2002</a></dd>
				</dl>
				<div class="morelink"><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/order/score" title="评分最高">评分最高&gt;&gt;</a><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/order/addtime" title="最近更新">最近更新&gt;&gt;</a></div>
			</div>
			<div class="side_tt side_tt_2">
				<h3>电视剧排行榜</h3>
				<div class="tabbox2">
					<a id="Tab_teleplaybang_0" target="_self" href="javascript://" title="" onmouseover="switchTab('teleplaybang',0,3,'on','')" class="on">昨天</a><a id="Tab_teleplaybang_1" target="_self" href="javascript://" title="" onmouseover="switchTab('teleplaybang',1,3,'on','')">本周</a><a id="Tab_teleplaybang_2" target="_self" href="javascript://" title="" onmouseover="switchTab('teleplaybang',2,3,'on','')">本月</a>
				</div>
			</div>
			<div class="side_con">
				<ol id="List_teleplaybang_0" class="ranklist ranklist_movie">
					<?php $tag['name'] = 'video';$tag['cid'] = '2';$tag['limit'] = '15';$tag['order'] = 'dayhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><em><?php if(($i)  >  "9"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?>.</em><p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo (get_replace_html($video["title"],0,8)); ?></a><strong class="type"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?></strong></p><span class="score"><?php echo ($video["score"]); ?></span><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ol>
				<ol id="List_teleplaybang_1" class="ranklist ranklist_dsj" style="display:none">
					<?php $tag['name'] = 'video';$tag['cid'] = '2';$tag['limit'] = '15';$tag['order'] = 'weekhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><em><?php if(($i)  >  "9"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?>.</em><p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo (get_replace_html($video["title"],0,8)); ?></a><strong class="type"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?></strong></p><span class="score"><?php echo ($video["score"]); ?></span><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ol>
				<ol id="List_teleplaybang_2" class="ranklist ranklist_dsj" style="display:none">
					<?php $tag['name'] = 'video';$tag['cid'] = '2';$tag['limit'] = '15';$tag['order'] = 'monthhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><em><?php if(($i)  >  "9"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?>.</em><p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo (get_replace_html($video["title"],0,8)); ?></a><strong class="type"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?></strong></p><span class="score"><?php echo ($video["score"]); ?></span><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>

				</ol>
			</div>
			<div class="sidebanner">
					
			</div><!--sidebanner  END-->
		</div><!--side  END-->
</div><!--box 电视剧 END-->
<div class="wrapper box box_theater">
		<div class="box_tt">
				<h2 class="title_6"><a href="<?php echo ($specialurl); ?>" title="影视专题">影视专题</a></h2>
				<div class="act"><?php $tag['name'] = 'special';$tag['limit'] = '5';$tag['order'] = 'hits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$special): ++$i;$mod = ($i % 2 );?><a title="<?php echo ($special["title"]); ?>" href="<?php echo ($special["readurl"]); ?>"><?php echo (get_replace_html($special["title"],0,15)); ?></a><?php if(($i)  <  "5"): ?>|<?php endif; ?><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				<a title="更多" href="<?php echo ($specialurl); ?>">更多</a>
				</div>
		</div>
		<div class="box_con"><?php $tag['name'] = 'special';$tag['limit'] = '4';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$special): ++$i;$mod = ($i % 2 );?><div class="hotplate hotplate_theater">
		<dl>
			<dt><a title="<?php echo ($special["title"]); ?>" href="<?php echo ($special["readurl"]); ?>"><img src="images/img_default.gif" _src="<?php echo ($special["logo"]); ?>" onerror="this.src='<?php echo ($webpath); ?>views/images/nophoto.jpg'" alt="<?php echo ($special["title"]); ?>" /></a></dt>
			<dd><h3><?php echo (get_replace_html($special["title"],0,14)); ?></h3></dd>
		</dl>
		</div><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
		</div>
</div><!--box 专题 END-->
<div class="wrapper box L710R232 height_2">
		<div class="main">
			<div class="box_tt">
				<h2 class="title_8"><a href="<?php echo get_channel_name(4,'showurl');?>" title="综艺">综艺</a></h2>
				<div class="act"><?php $tag['name'] = 'video';$tag['cid'] = '4';$tag['limit'] = '5';$tag['order'] = 'monthhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><a title="<?php echo ($video["title"]); ?>" href="<?php echo ($video["readurl"]); ?>"><?php echo (get_replace_html($video["title"],0,15)); ?></a><?php if(($i)  <  "5"): ?>|<?php endif; ?><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				<a title="更多" href="<?php echo get_channel_name(4,'showurl');?>">更多</a>
				</div>
			</div>
			<div class="colmain">
				<ul class="movielist movielist_100x140"><?php $tag['name'] = 'video';$tag['cid'] = '4';$tag['limit'] = '12';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li><a href="<?php echo ($video["readurl"]); ?>"  title="<?php echo ($video["title"]); ?>" class="pic" target="_blank"><img onmouseover="D.show('tv','<?php echo ($video["title"]); ?>','<?php echo ($video["year"]); ?>','<?php echo ($video["showname"]); ?>','<?php echo ($video["area"]); ?>','<?php echo ($video["score"]); ?>','<?php echo ($video["scoreer"]); ?>', '<?php echo ($video["actor"]); ?>','','','',1)" onmouseout="D.hide()" _src="<?php echo ($video["picurlsmall"]); ?>" src="http://images.movie.xunlei.com/img_default.gif" alt="<?php echo ($video["title"]); ?>" title="<?php echo ($video["title"]); ?>"  /><span class='movnum movnum_720'></span></a>
				<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo ($video["title"]); ?></a><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></p>
				<p><?php echo ((get_replace_html($video["intro"],0,8))?(get_replace_html($video["intro"],0,8)):'好看的综艺'); ?></p>
				<span class="movbg"></span><span class="movtxt"><?php if($video["serial"] != 0 || ''): ?><?php echo ($video["serial"]); ?>期<?php else: ?>完结<?php endif; ?></span>
				</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ul>
			</div>
			<div class="colside">
				<div class="hotbox"><?php $tag['name'] = 'video';$tag['cid'] = '4';$tag['limit'] = '1';$tag['stars'] = '5';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" class="hotpic"><img src="<?php echo ($webpath); ?>images/img_default.gif" _src="<?php echo ($video["picurl"]); ?>" alt="<?php echo ($video["title"]); ?>" title="<?php echo ($video["title"]); ?>" class="pic"/><?php echo (get_replace_html($video["title"],0,7)); ?><span>(<?php if($video["serial"] > 0): ?>至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?>)</span></a></h4>
	<ul class="txtlist2">
		<li>主持人:<?php if(!empty($director)): ?><?php echo (get_actor_url($video["director"])); ?><?php else: ?>未知<?php endif; ?></li>
		<li>嘉宾:<?php echo (get_actor_url($video["actor"])); ?></li>
		<li class="listtype">类型:<a href="<?php echo ($video["showurl"]); ?>" title="<?php echo ($video["showname"]); ?>"><?php echo ($video["showname"]); ?></a></p></li>
		<li>年份:<a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/year/<?php echo ($video["year"]); ?>" title="<?php echo ($video["year"]); ?>"><?php echo ($video["year"]); ?></a></li>
	</ul>
	<p><?php echo (get_replace_html(htmlspecialchars_decode($video["content"]),0,27)); ?><a href="<?php echo ($video["readurl"]); ?>" title="详细">详细</a></p><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</div><!--hotbox  END-->
				<div class="side_tt"><h3>卫视同步</h3></div>
				<div class="tabbox3">
					<ul class="tabbox3_tigger">
		<li id="Tab_zongyi_0" onmouseover="switchTab('zongyi',0,5,'on','')" class="on">江浙地区</li>
		<li id="Tab_zongyi_1" onmouseover="switchTab('zongyi',1,5,'on','')" >台湾综艺</li>
		<li id="Tab_zongyi_2" onmouseover="switchTab('zongyi',2,5,'on','')" >凤凰卫视</li>
		<li id="Tab_zongyi_3" onmouseover="switchTab('zongyi',3,5,'on','')" >湖南卫视</li>
		<li id="Tab_zongyi_4" onmouseover="switchTab('zongyi',4,5,'on','')" >京津地区</li>
</ul>
					<ol id="List_zongyi_0" class="txtlist2 numranking" >
						<li class="top"><span>01.</span><a href="http://www.xun.com/detail/zongyi2043.shtml" title="非诚勿扰">非诚勿扰</a></li>
						<li class="top"><span>02.</span><a href="http://www.xun.com/detail/zongyi10207.shtml" title="欢喜冤家">欢喜冤家</a></li>
						<li class="top"><span>03.</span><a href="http://www.xun.com/detail/zongyi5692.shtml" title="老公看你的">老公看你的</a></li>
						<li><span>04.</span><a href="http://www.xun.com/detail/zongyi2260.shtml" title="非常了得">非常了得</a></li>
						<li><span>05.</span><a href="http://www.xun.com/detail/zongyi4176.shtml" title="爱情连连看">爱情连连看</a></li>
					</ol>
					<ol id="List_zongyi_1" class="txtlist2 numranking" style="display:none">
						<li class="top"><span>01.</span><a href="http://www.xun.com/detail/zongyi372.shtml" title="康熙来了">康熙来了</a></li>
						<li class="top"><span>02.</span><a href="http://www.xun.com/detail/zongyi376.shtml" title="大学生了没">大学生了没</a></li>
						<li class="top"><span>03.</span><a href="http://www.xun.com/detail/zongyi378.shtml" title="女人我最大">女人我最大</a></li>
						<li><span>04.</span><a href="http://www.xun.com/detail/zongyi382.shtml" title="SS小燕之夜">SS小燕之夜</a></li>
						<li><span>05.</span><a href="http://www.xun.com/detail/zongyi1815.shtml" title="娱乐百分百">娱乐百分百</a></li>
					</ol>
					<ol id="List_zongyi_2" class="txtlist2 numranking" style="display:none">
						<li class="top"><span>01.</span><a href="http://www.xun.com/detail/zongyi373.shtml" title="锵锵三人行">锵锵三人行</a></li>
						<li class="top"><span>02.</span><a href="http://www.xun.com/detail/zongyi3943.shtml" title="时事开讲">时事开讲</a></li>
						<li class="top"><span>03.</span><a href="http://www.xun.com/detail/zongyi3929.shtml" title="娱乐大风暴">娱乐大风暴</a></li>
						<li><span>04.</span>天下被网罗</li>
						<li><span>05.</span><a href="http://www.xun.com/detail/zongyi4608.shtml" title="美女私房菜">美女私房菜</a></li>
					</ol>
					<ol id="List_zongyi_3" class="txtlist2 numranking" style="display:none">
						<li class="top"><span>01.</span><a href="http://www.xun.com/detail/zongyi1861.shtml" title="快乐大本营">快乐大本营</a></li>
						<li class="top"><span>02.</span><a href="http://www.xun.com/detail/zongyi4446.shtml" title="天天向上">天天向上</a></li>
						<li class="top"><span>03.</span><a href="http://www.xun.com/detail/zongyi4749.shtml" title="我们约会吧">我们约会吧</a></li>
						<li><span>04.</span>舞动奇迹</li>
						<li><span>05.</span><a href="http://www.xun.com/detail/zongyi5668.shtml" title="背后的故事">背后的故事</a></li>
					</ol>
					<ol id="List_zongyi_4" class="txtlist2 numranking" style="display:none">
						<li class="top"><span>01.</span><a href="http://www.xun.com/detail/zongyi359.shtml" title="今夜有戏">今夜有戏</a></li>
						<li class="top"><span>02.</span><a href="http://www.xun.com/detail/zongyi2376.shtml" title="非你莫属">非你莫属</a></li>
						<li class="top"><span>03.</span><a href="http://www.xun.com/detail/zongyi9989.shtml" title="爱情保卫战">爱情保卫战</a></li>
						<li><span>04.</span>光荣绽放</li>
						<li><span>05.</span>最佳现场</li>
					</ol>
				</div><!--tabbox3  END-->
			</div>
		</div><!--main  END-->
		<div class="side">
			<div class="side_tt side_tt_first"><h3>综艺分类</h3></div>
			<div class="side_con">
				<dl class="taglist">
					<dt>明星</dt><dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/孟非" title="孟非">孟非</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/乐嘉" title="乐嘉">乐嘉</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/何炅" title="何炅">何炅</a></dd><dd><a  href="<?php echo ($webpath); ?>index.php?s=video/search/wd/杨澜" title="杨澜">杨澜</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/汪涵" title="汪涵">汪涵</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/欧弟" title="欧弟">欧弟</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/" title="徐熙娣">徐熙娣</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/杨幂" title="杨幂">杨幂</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/吴宗宪" title="吴宗宪">吴宗宪</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/窦文涛" title="窦文涛">窦文涛</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/陈鲁豫" title="陈鲁豫">陈鲁豫</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/郭德纲" title="郭德纲">郭德纲</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd谢娜/" title="谢娜">谢娜</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/蔡康永" title="蔡康永">蔡康永</a></dd>
				</dl>
				<dl class="taglist">
					<dt>地区</dt><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/4/area/内地" title="内地综艺">内地</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/4/area/香港" title="香港综艺">香港</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/4/area/台湾" title="台湾综艺">台湾</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/4/area/韩国" title="韩国综艺">韩国</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/4" title="其他">其他</a></dd>
				</dl>
				<dl class="taglist">
					<dt>年份</dt><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/4/year/2012" title="2012">2012</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/4/year/2011" title="2011">2011</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/4/year/2010" title="2010">2010</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/4/year/2009" title="2009">2009</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/4/year/2008" title="2008">2008</a></dd>
				</dl>
				<div class="morelink"><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/4/order/score" title="评分最高">评分最高&gt;&gt;</a><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/4/order/addtime" title="最近更新">最近更新&gt;&gt;</a></div>
			</div>
			<div class="side_tt side_tt_2">
				<h3>综艺排行榜</h3>
				<div class="tabbox2">
					<a id="Tab_tvbang_0" target="_self" href="javascript://" title="" onmouseover="switchTab('tvbang',0,3,'on','')" class="on">昨天</a><a id="Tab_tvbang_1" target="_self" href="javascript://" title="" onmouseover="switchTab('tvbang',1,3,'on','')">本周</a><a id="Tab_tvbang_2" target="_self" href="javascript://" title="" onmouseover="switchTab('tvbang',2,3,'on','')">本月</a>
				</div>
			</div>
			<div class="side_con">
				<ol id="List_tvbang_0" class="ranklist ranklist_zy">
				<?php $tag['name'] = 'video';$tag['cid'] = '4';$tag['limit'] = '15';$tag['order'] = 'dayhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><em><?php if(($i)  >  "9"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?>.</em><p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo (get_replace_html($video["title"],0,8)); ?></a><strong class="type"><?php if($video["serial"] > 0): ?><?php echo ($video["serial"]); ?>期<?php else: ?>完结<?php endif; ?></strong></p><span class="score"><?php echo ($video["score"]); ?></span><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ol>
				<ol id="List_tvbang_1" class="ranklist ranklist_zy" style="display:none">
				<?php $tag['name'] = 'video';$tag['cid'] = '4';$tag['limit'] = '15';$tag['order'] = 'weekhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><em><?php if(($i)  >  "9"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?>.</em><p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo (get_replace_html($video["title"],0,8)); ?></a><strong class="type"><?php if($video["serial"] > 0): ?><?php echo ($video["serial"]); ?>期<?php else: ?>完结<?php endif; ?></strong></p><span class="score"><?php echo ($video["score"]); ?></span><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ol>
				<ol id="List_tvbang_2" class="ranklist ranklist_zy" style="display:none">
				<?php $tag['name'] = 'video';$tag['cid'] = '4';$tag['limit'] = '15';$tag['order'] = 'monthhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><em><?php if(($i)  >  "9"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?>.</em><p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo (get_replace_html($video["title"],0,8)); ?></a><strong class="type"><?php if($video["serial"] > 0): ?><?php echo ($video["serial"]); ?>期<?php else: ?>完结<?php endif; ?></strong></p><span class="score"><?php echo ($video["score"]); ?></span><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ol>
			</div>
		</div><!--side  END-->
</div><!--wrapper 综艺 END-->
<div class="wrapper box L710R232 height_2">
		<div class="main">
			<div class="box_tt">
				<h2 class="title_9"><a href="<?php echo get_channel_name(3,'showurl');?>" title="动漫">动漫</a></h2>
				<div class="act"><?php $tag['name'] = 'video';$tag['cid'] = '3';$tag['limit'] = '5';$tag['order'] = 'monthhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><a title="<?php echo ($video["title"]); ?>" href="<?php echo ($video["readurl"]); ?>"><?php echo (get_replace_html($video["title"],0,15)); ?></a><?php if(($i)  <  "5"): ?>|<?php endif; ?><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				<a title="更多" href="<?php echo get_channel_name(3,'showurl');?>">更多</a>
				</div>
			</div>
			<div class="colmain">
				<ul class="movielist movielist_100x140"><?php $tag['name'] = 'video';$tag['cid'] = '3';$tag['limit'] = '12';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li><a href="<?php echo ($video["readurl"]); ?>"  title="<?php echo ($video["title"]); ?>" class="pic" target="_blank"><img onmouseover="D.show('anime','<?php echo ($video["title"]); ?>','<?php echo ($video["year"]); ?>','<?php echo ($video["showname"]); ?>','<?php echo ($video["area"]); ?>','<?php echo ($video["score"]); ?>','<?php echo ($video["scoreer"]); ?>', '<?php echo ($video["actor"]); ?>','','','',1)" onmouseout="D.hide()" _src="<?php echo ($video["picurlsmall"]); ?>" src="http://images.movie.xunlei.com/img_default.gif" alt="<?php echo ($video["title"]); ?>" title="<?php echo ($video["title"]); ?>"  /><span class='movnum movnum_720'></span></a>
				<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo ($video["title"]); ?></a><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></p>
				<p><?php echo ((get_replace_html($video["intro"],0,8))?(get_replace_html($video["intro"],0,8)):'好看的动漫'); ?></p>
				<span class="movbg"></span><span class="movtxt"><?php if($video["serial"] != 0 || ''): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?></span>
				</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ul>
			</div>
			<div class="colside">
				<div class="hotbox"><?php $tag['name'] = 'video';$tag['cid'] = '3';$tag['limit'] = '1';$tag['stars'] = '5';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" class="hotpic"><img src="<?php echo ($webpath); ?>images/img_default.gif" _src="<?php echo ($video["picurl"]); ?>" alt="<?php echo ($video["title"]); ?>" title="<?php echo ($video["title"]); ?>" class="pic"/><?php echo (get_replace_html($video["title"],0,7)); ?><span>(<?php if($video["serial"] > 0): ?>至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?>)</span></a></h4>
	<ul class="txtlist2">
		<li>声优:<?php echo (get_actor_url($video["actor"])); ?></li>
		<li class="listtype">类型:<a href="<?php echo ($video["showurl"]); ?>" title="<?php echo ($video["showname"]); ?>"><?php echo ($video["showname"]); ?></a></p></li>
		<li>年份:<a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/year/<?php echo ($video["year"]); ?>" title="<?php echo ($video["year"]); ?>"><?php echo ($video["year"]); ?></a></li>
	</ul>
	<p><?php echo (get_replace_html(htmlspecialchars_decode($video["content"]),0,27)); ?><a href="<?php echo ($video["readurl"]); ?>" title="详细">详细</a></p><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</div><!--hotbox  END-->
				<div class="side_tt"><h3>用户关注度</h3></div>
				<div class="tabbox3">
					<ul class="tabbox3_tigger">
		<li id="Tab_animeleft_0" onmouseover="switchTab('animeleft',0,5,'on','')" class="on">热播动画</li>
		<li id="Tab_animeleft_1" onmouseover="switchTab('animeleft',1,5,'on','')" >美女后宫</li>
		<li id="Tab_animeleft_2" onmouseover="switchTab('animeleft',2,5,'on','')" >宫崎骏集</li>
		<li id="Tab_animeleft_3" onmouseover="switchTab('animeleft',3,5,'on','')" >迪斯尼产</li>
		<li id="Tab_animeleft_4" onmouseover="switchTab('animeleft',4,5,'on','')" >儿时经典</li>
</ul>
					<ol id="List_animeleft_0" class="txtlist2 numranking" >
						<li class="top"><span>01.</span><a href="http://www.xun.com/detail/dongman8067.shtml" title="闪电十一人GO">闪电十一人GO</a></li>
						<li class="top"><span>02.</span><a href="http://www.xun.com/detail/dongman2217.shtml" title="海贼王">海贼王</a></li>
						<li class="top"><span>03.</span><a href="http://www.xun.com/detail/dongman10186.shtml" title="黑塔利亚">黑塔利亚</a></li>
						<li><span>04.</span><a href="http://www.xun.com/detail/dongman4543.shtml" title="名侦探柯南">名侦探柯南</a></li>
						<li><span>05.</span><a href="http://www.xun.com/detail/dongman2252.shtml" title="蜡笔小新第01部 ">蜡笔小新</a></li>
					</ol>
					<ol id="List_animeleft_1" class="txtlist2 numranking" style="display:none">
						<li class="top"><span>01.</span>日在校园</li>
						<li class="top"><span>02.</span>你是主人我是仆</li>
						<li class="top"><span>03.</span>最后的大魔王</li>
						<li><span>04.</span><a href="http://www.xun.com/detail/dongman3292.shtml" title="肯普法">肯普法</a></li>
						<li><span>05.</span>我的主人爱作怪</li>
					</ol>
					<ol id="List_animeleft_2" class="txtlist2 numranking" style="display:none">
						<li class="top"><span>01.</span><a href="http://www.xun.com/detail/dongman7169.shtml" title="龙猫">龙猫</a></li>
						<li class="top"><span>02.</span>天空之城</li>
						<li class="top"><span>03.</span><a href="http://www.xun.com/detail/dongman9258.shtml" title="幽灵公主">幽灵公主</a></li>
						<li><span>04.</span><a href="http://www.xun.com/detail/dongman958.shtml" title="哈尔的移动城">哈尔的移动城</a></li>
						<li><span>05.</span><a href="http://www.xun.com/detail/xijupian6109.shtml" title="借东西的阿莉埃蒂">借东西的阿莉埃蒂</a></li>
					</ol>
					<ol id="List_animeleft_3" class="txtlist2 numranking" style="display:none">
						<li class="top"><span>01.</span><a href="http://www.xun.com/detail/dongman9044.shtml" title="狮子王">狮子王</a></li>
						<li class="top"><span>02.</span>木偶奇遇记</li>
						<li class="top"><span>03.</span><a href="http://www.xun.com/detail/dongman6871.shtml" title="花木兰">花木兰</a></li>
						<li><span>04.</span>泰山</li>
						<li><span>05.</span>米奇与米妮</li>
					</ol>
					<ol id="List_animeleft_4" class="txtlist2 numranking" style="display:none">
						<li class="top"><span>01.</span><a href="http://www.xun.com/detail/dongman7597.shtml" title="圣斗士星矢冥王神话">圣斗士星矢冥王神话</a></li>
						<li class="top"><span>02.</span>X战记</li>
						<li class="top"><span>03.</span>美少女战士</li>
						<li><span>04.</span><a href="http://www.xun.com/detail/dongman3737.shtml" title="七龙珠Z">七龙珠Z</a></li>
						<li><span>05.</span><a href="http://www.xun.com/detail/dongman2585.shtml" title="幽游白书">幽游白书</a></li>
					</ol>
				</div><!--tabbox3  END-->
			</div>
		</div><!--main  END-->
		<div class="side">
			<div class="side_tt side_tt_first"><h3>动漫分类</h3></div>
			<div class="side_con">
				<dl class="taglist">
					<dt>明星</dt><dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/绿川光" title="绿川光">绿川光</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/小清水亚美" title="小清水亚美">小清水亚美</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/福山润" title="福山润">福山润</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/堀江由衣" title="堀江由衣">堀江由衣</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/田中理惠" title="田中理惠">田中理惠</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/古谷彻" title="古谷彻">古谷彻</a></dd>
				</dl>
				<dl class="taglist">
					<dt>地区</dt><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/3/area/日本" title="日本动漫">日本</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/3/area/欧美" title="欧美动漫">欧美</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/3/area/内地" title="国产动漫">中国</a></dd>
				</dl>
				<dl class="taglist">
					<dt>年份</dt><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/3/year/2012" title="2012">2012</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/3/year/2011" title="2011">2011</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/3/year/2010" title="2010">2010</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/3/year/2009" title="2009">2009</a></dd>
				</dl>
				<div class="morelink"><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/3/order/score" title="评分最高">评分最高&gt;&gt;</a><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/3/order/addtime" title="最近更新">最近更新&gt;&gt;</a></div>
			</div>
			<div class="side_tt side_tt_2">
				<h3>动漫排行榜</h3>
				<div class="tabbox2">
					<a id="Tab_animebang_0" target="_self" href="javascript://" title="" onmouseover="switchTab('animebang',0,3,'on','')" class="on">昨天</a><a id="Tab_animebang_1" target="_self" href="javascript://" title="" onmouseover="switchTab('animebang',1,3,'on','')">本周</a><a id="Tab_animebang_2" target="_self" href="javascript://" title="" onmouseover="switchTab('animebang',2,3,'on','')">本月</a>
				</div>
			</div>
			<div class="side_con">
				<ol id="List_animebang_0" class="ranklist ranklist_dsj">
				<?php $tag['name'] = 'video';$tag['cid'] = '3';$tag['limit'] = '16';$tag['order'] = 'dayhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><em><?php if(($i)  >  "9"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?>.</em><p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo (get_replace_html($video["title"],0,8)); ?></a><strong class="type"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?></strong></p><span class="score"><?php echo ($video["score"]); ?></span><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ol>
				<ol id="List_animebang_1" class="ranklist ranklist_dsj" style="display:none">
				<?php $tag['name'] = 'video';$tag['cid'] = '3';$tag['limit'] = '16';$tag['order'] = 'weekhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><em><?php if(($i)  >  "9"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?>.</em><p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo (get_replace_html($video["title"],0,8)); ?></a><strong class="type"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?></strong></p><span class="score"><?php echo ($video["score"]); ?></span><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ol>
				<ol id="List_animebang_2" class="ranklist ranklist_dsj" style="display:none">
				<?php $tag['name'] = 'video';$tag['cid'] = '3';$tag['limit'] = '16';$tag['order'] = 'monthhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><em><?php if(($i)  >  "9"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?>.</em><p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo (get_replace_html($video["title"],0,8)); ?></a><strong class="type"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?></strong></p><span class="score"><?php echo ($video["score"]); ?></span><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看" class="movinfo" target="_blank"><?php echo ($video["title"]); ?>在线观看</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ol>
			</div>
		</div><!--side  END-->
</div><!--wrapper 动漫 END-->
<div class="wrapper box L710R232 height_11 comment">
		<div class="main">
			<div class="box_tt">
				<h2 class="title_11">影视热评</h2>
				<div class="act">Hi，欢迎评论影片，好的评论将会在这里展示</div>
			</div>
				<ul class="commentlist"><?php $tag['name'] = 'comment';$tag['time'] = '2';$tag['content'] = '150';$tag['field'] = '*,count(id) as count';$tag['limit'] = '5';$tag['order'] = 'count desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): ++$i;$mod = ($i % 2 );?><li><h3><span><a href="<?php echo (get_play_url($comment["did"])); ?>" title="观看">观看</a>|<a href="<?php echo (get_read_url(video,$comment["did"])); ?>" title="详情">详情</a>|<a>影评(<?php echo (get_comment_count($comment["did"])); ?>)</a></span><a title="<?php echo (get_movie_info($comment["did"],title)); ?>" href="<?php echo (get_read_url(video,$comment["did"])); ?>">《<?php echo (get_movie_info($comment["did"],title)); ?>》</a></h3>
					<div class="commentlist_user"><span><?php echo (date('Y-m-d',$comment["addtime"])); ?></span>来自<?php echo (GetIpAddress($comment["ip"])); ?>的网友评论:</div>
					<p><?php echo (get_replace_html($comment["content"],0,500)); ?></p>
				</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ul>
		</div>
		<div class="side">
			<div class="side_tt side_tt_first side_tt_2">
				<h3>评论排行榜</h3>
				<div class="tabbox2">
					<a href="javascript://" target="_self" id="Tab_xiaoliang_0" onmouseover="switchTab('xiaoliang',0,3,'on','');" class="on">昨天</a>
					<a href="javascript://" target="_self" id="Tab_xiaoliang_1" onmouseover="switchTab('xiaoliang',1,3,'on','');">本周</a>
					<a href="javascript://" target="_self" id="Tab_xiaoliang_2" onmouseover="switchTab('xiaoliang',2,3,'on','');">本月</a>
				</div>
			</div>
		<div class="side_con">
				<ol class="ranklist" id="List_xiaoliang_0">
				<?php $tag['name'] = 'comment';$tag['time'] = '2';$tag['field'] = '*,count(id) as count';$tag['limit'] = '18';$tag['order'] = 'count desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><em><?php if(($i)  >  "9"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?>.</em><p><a href="<?php echo (get_read_url(video,$comment["did"])); ?>" title="<?php echo (get_movie_info($comment["did"],title)); ?>" target="_blank"><?php echo (get_replace_html(get_movie_info($comment["did"],title),0,20)); ?></a></p><span class="score"><?php echo (get_comment_count($comment["did"])); ?>评</span><a href="<?php echo (get_read_url(video,$comment["did"])); ?>" title="<?php echo (get_movie_info($comment["did"],title)); ?>在线观看" class="movinfo" target="_blank"><?php echo (get_movie_info($comment["did"],title)); ?>在线观看</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
                </ol>
				<ol class="ranklist" id="List_xiaoliang_1" style="display:none">
				<?php $tag['name'] = 'comment';$tag['time'] = '7';$tag['field'] = '*,count(id) as count';$tag['limit'] = '18';$tag['order'] = 'count desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><em><?php if(($i)  >  "9"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?>.</em><p><a href="<?php echo (get_read_url(video,$comment["did"])); ?>" title="<?php echo (get_movie_info($comment["did"],title)); ?>" target="_blank"><?php echo (get_replace_html(get_movie_info($comment["did"],title),0,20)); ?></a></p><span class="score"><?php echo (get_comment_count($comment["did"])); ?>评</span><a href="<?php echo (get_read_url(video,$comment["did"])); ?>" title="<?php echo (get_movie_info($comment["did"],title)); ?>在线观看" class="movinfo" target="_blank"><?php echo (get_movie_info($comment["did"],title)); ?>在线观看</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
                </ol>
				<ol class="ranklist" id="List_xiaoliang_2" style="display:none">
				<?php $tag['name'] = 'comment';$tag['time'] = '30';$tag['field'] = '*,count(id) as count';$tag['limit'] = '18';$tag['order'] = 'count desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><em><?php if(($i)  >  "9"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?>.</em><p><a href="<?php echo (get_read_url(video,$comment["did"])); ?>" title="<?php echo (get_movie_info($comment["did"],title)); ?>" target="_blank"><?php echo (get_replace_html(get_movie_info($comment["did"],title),0,20)); ?></a></p><span class="score"><?php echo (get_comment_count($comment["did"])); ?>评</span><a href="<?php echo (get_read_url(video,$comment["did"])); ?>" title="<?php echo (get_movie_info($comment["did"],title)); ?>在线观看" class="movinfo" target="_blank"><?php echo (get_movie_info($comment["did"],title)); ?>在线观看</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
                </ol>
			</div>
		</div>
</div><!--wrapper 热评 END-->
<div class="wrapper box link">
			<div class="box_tt"><h2 class="title_17">合作专区</h2><div class="act">[接受PR>3链接申请，请贵站做好本站链接后留言]<a href="<?php echo ($guestbookurl); ?>">链接合作</a></div></div>
			<?php $tag['name'] = 'link';$tag['limit'] = '4';$tag['type'] = '2';$tag['order'] = 'oid asc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$link): ++$i;$mod = ($i % 2 );?><?php if(($i)  ==  "1"): ?><ul class="movielist movielist_147x70"><?php endif; ?>
				<li>
					<a href="<?php echo ($link["url"]); ?>" title="<?php echo ($link["title"]); ?>" class="pic"><img src="<?php echo ($link["logo"]); ?>" alt="<?php echo ($link["title"]); ?>" title="<?php echo ($link["title"]); ?>" /></a>
					<p class="title"><a href="<?php echo ($link["url"]); ?>" title="<?php echo ($link["title"]); ?>"><?php echo (get_replace_html($link["title"],0,8)); ?></a></p>
				</li>
			<?php if($i == $link['count']): ?></ul><?php endif; ?><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
			<div class="cooplist"><?php $tag['name'] = 'link';$tag['limit'] = '20';$tag['type'] = '1';$tag['order'] = 'oid asc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$link): ++$i;$mod = ($i % 2 );?><?php if(($i)  ==  "1"): ?><?php else: ?>|<?php endif; ?><a href="<?php echo ($link["url"]); ?>" title="<?php echo ($link["title"]); ?>"><?php echo (get_replace_html($link["title"],0,8)); ?></a><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
			</div>
</div><!--wrapper  END-->
<div class="wrapper box box_search">
	<div class="searchbox">
		<form method="post" action="<?php echo ($webpath); ?>index.php?s=video/search" onsubmit="return check_last();" style="z-index: -1;" name="searchForm" id="searchForm" target="_blank">
			<fieldset class="searchbox_search">
				<input type="text" class="input" value="请输入视频名、主演或导演" autocomplete="off" id="keyword_last" name="wd" onfocus="serchClick('keyword_last')" >
				<button onclick="stopSearchTextTimer_last();" id="btnSearch_last" type="submit">搜 索</button>
			</fieldset>
		</form>
		<div class="searchbox_hottag">
			<a href="<?php echo ($topurl); ?>">热播榜</a><?php echo ($hotkey); ?>
		</div>
	</div>
	<dl class="bottomnav bottomnav_1">
		<dt>首页</dt>
		<?php $tag['name'] = 'menu'; $__LIST__ = get_tag_gxmenu($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): ++$i;$mod = ($i % 2 );?><dd><a href="<?php echo ($menu["showurl"]); ?>"><?php echo ($menu["cname"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
		<dd><a href="<?php echo ($topurl); ?>">排行</a></dd>
		<dd><a href="<?php echo ($specialurl); ?>">专题</a></dd>
	</dl>
	<dl class="bottomnav bottomnav_3">
		<dt>电影分类</dt>
		<?php $tag['name'] = 'menu';$tag['ids'] = '1'; $__LIST__ = get_tag_gxmenu($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): ++$i;$mod = ($i % 2 );?><?php if(is_array($menu["son"])): $i = 0; $__LIST__ = $menu["son"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): ++$i;$mod = ($i % 2 )?><dd><a href="<?php echo ($menu["showurl"]); ?>" title="<?php echo ($menu["cname"]); ?>"><?php echo ($menu["cname"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
	</dl>
	<dl class="bottomnav bottomnav_3">
		<dt>电视剧分类</dt>
		<?php $tag['name'] = 'menu';$tag['ids'] = '2'; $__LIST__ = get_tag_gxmenu($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): ++$i;$mod = ($i % 2 );?><?php if(is_array($menu["son"])): $i = 0; $__LIST__ = $menu["son"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): ++$i;$mod = ($i % 2 )?><dd><a href="<?php echo ($menu["showurl"]); ?>" title="<?php echo ($menu["cname"]); ?>"><?php echo ($menu["cname"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
	</dl>
	<dl class="bottomnav bottomnav_5">
		<dt>支持</dt>
		<dd><a href="<?php echo ($webpath); ?>baiduplayer/F.html">帮助中心</a></dd>
		<dd><a href="http://player.baidu.com/">百度影音官方</a></dd>
		<dd><a href="<?php echo ($guestbookurl); ?>">求片建议</a></dd>
		<dd><a href="<?php echo ($rssurl); ?>">RSS订阅</a></dd>
	</dl>
</div><!--wrapper  END-->
<div class="footer">
	<div class="copyright">
	<p><?php echo ($copyright); ?></p>
	<p class="p_2">Copyright &copy; 2007 - 2013 <a href="<?php echo ($weburl); ?>"><?php echo ($webname); ?></a> Some Rights Reserved <?php echo ($icp); ?> <a href="<?php echo ($baidusitemap); ?>">百度地图</a> <a href="<?php echo ($googlesitemap); ?>">谷歌地图</a> <?php echo ($tongji); ?>  <script language=javascript>
<!--
window["\x64\x6f\x63\x75\x6d\x65\x6e\x74"]["\x77\x72\x69\x74\x65\x6c\x6e"]("\u8d44\u6e90\u63d0\u4f9b\x3a\x3c\x61 \x68\x72\x65\x66\x3d\"\x68\x74\x74\x70\x3a\/\/\x62\x62\x73\x2e\x67\x6f\x70\x65\x2e\x63\x6e\/\" \x74\x61\x72\x67\x65\x74\x3d\"\x5f\x62\x6c\x61\x6e\x6b\" \x73\x74\x79\x6c\x65\x3d\"\x63\x6f\x6c\x6f\x72\x3a\x23\x33\x33\x36\x36\x30\x30\x3b\" \x3e\x3c\x62\x3e\u72d7\u6251\u6e90\u7801\u793e\u533a\x3c\/\x62\x3e\x3c\/\x61\x3e");
//-->
</script></p>
	</div>
</div>
<div style="top: 0; left: 0; display:none;" id="movie_info">
	<div class="bg_tm"></div>
	<div id="div_tip_detail" class="win_content">
		<div class="bg_tm"></div>
		<div id="div_tip_detail" class="win_content">
			
		</div>
	</div>
</div>
</body>
</html>
<script>
		//非内容滞后
		$('quickpanel').innerHTML='<a href="<?php echo ($webpath); ?>url.php" target="_self">放到桌面</a>|<a href="javaScript:AddFav()" target="_self">收藏本站</a>|<a href="<?php echo ($guestbookurl); ?>" target="_blank">求片·建议</a>';
		$('List_top_0').innerHTML='<div class="histroydrop_tt"><a href="javascript://" title="关闭" class="red" onclick="hideTop();" target="_self">关闭</a></div><div class="softbox"><dl class="softbox_dl"><dt>百度影音播放器</dt><dd id="baidu_download_url3"><a href="/player_down.php">本地下载</a></dd><dd class="cutline">|</dd><dd id="baidu_download_url"><a href="http://www.skycn.com/soft/65257.html">天空下载</a></dd><dd class="cutline">|</dd><dd id="baidu_download_url2"><a href="http://dl.pconline.com.cn/download/65022.html#ad=6575">PConline</a></dd></dl></div>';
		$('List_top_1').innerHTML='<div class="histroydrop_tt"><a href="javascript://" onclick="delCookie(\'gxhis\');" target="_self" title="清空观看记录">清空观看记录</a>|<a href="javascript://" title="关闭" class="red" onclick="hideTop();" target="_self">关闭</a></div><div class="histroydrop_con"><div id="view_history" class="view_history" style="display:;" target="_self"><center>您的观看历史为空。</center></div></div>';
</script>
<script language="javaScript">
function AddFav(){
	var url = window.location.href;
	try{
		window.external.addFavorite(url,document.title);
	}catch(err){
		try{
			window.sidebar.addPanel(document.title, url,"");
		}catch(err){
			alert("加入收藏失败，请使用Ctrl+D进行添加");
		}
	}	
}
</script>
<script src="<?php echo ($webpath); ?>js/tips_history_lazy.min.js" charset="utf-8" ></script>
<script type="text/javascript">LAZY.init();LAZY.run();</script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/history.js"></script>