<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($cname); ?>频道-最新、最全、好看的同步<?php echo ($cname); ?>免费在线观看-<?php echo ($webname); ?></title>
<meta name="keywords" content="最新<?php echo ($cname); ?>，免费<?php echo ($cname); ?><?php $tag['name'] = 'menu';$tag['ids'] = ''.$cid.''; $__LIST__ = get_tag_gxmenu($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): ++$i;$mod = ($i % 2 );?><?php if(is_array($menu["son"])): $i = 0; $__LIST__ = $menu["son"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menuson): ++$i;$mod = ($i % 2 )?>，<?php echo ($menuson["cname"]); ?><?php endforeach; endif; else: echo "" ;endif; ?><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>">
<meta name="description" content="<?php echo ($webname); ?><?php echo ($cname); ?>频道同步播出最新、最热<?php echo ($cname); ?>,来<?php echo ($webname); ?><?php echo ($cname); ?>频道观看最新最热的<?php echo ($cname); ?>">
<link rel='stylesheet' type='text/css' href='<?php echo ($webpath); ?>css/header.css'>
<link rel='stylesheet' type='text/css' href='<?php echo ($webpath); ?>css/index_tv.css'>
</head>
<body>
<div id="wrapper">
<div class="header">
	<h1 class="header_logo"><a href="<?php echo ($webpath); ?>" title="<?php echo ($webname); ?>" target="_self"><?php echo ($webname); ?></a></h1>
	<script type="text/javascript" src="<?php echo ($webpath); ?>js/search_content_utf8.js"></script>
	<div class="searchbox">
	<form method="post" action="<?php echo ($webpath); ?>index.php?s=video/search" onsubmit="return check();" style="z-index: -1;" name="search" id="search" target="_blank">
		<fieldset class="searchbox_search">
			<input id="wd" name="wd" onfocus="serchClick('wd')" autocomplete="off" value="<?php echo (($keyword)?($keyword):'请输入视频名、主演或导演'); ?>" maxlength="26" type="text" class="input"/>
			<button type="submit" id="btnSearch" onclick="stopSearchTextTimer();">搜 索</button>
		</fieldset>
	</form>
	<script>
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
			<a href="<?php echo ($topurl); ?>">热播榜</a><?php echo ($hotkey); ?>
		</div>
	</div><!--searchbox  END-->
	<div class="userpanel_box">
		<div class="dy_top_box"><?php echo get_cms_ads('detail_txt');?></div>
		<div class="userpanel"><a href="javascript:void(0)" id="fav">收藏本站</a>|<a href="<?php echo ($guestbookurl); ?>" target="_blank">求片·建议</a></div>
	</div>
	<div class="quickpanel" id="quickpanel"></div>
</div><!--header 头部结束 END-->
<div class="mainnav">
	<div class="mainnav_list">
    <a href="<?php echo ($webpath); ?>" <?php if($model == 'index'): ?>class="on"<?php endif; ?>>首页</a>
    <?php $tag['name'] = 'menu'; $__LIST__ = get_tag_gxmenu($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): ++$i;$mod = ($i % 2 );?><a onfocus="this.blur();" href="<?php echo ($menu["showurl"]); ?>" <?php if(($menu['id'] == $cid) or ($menu['id'] == $pid)): ?>class="on"<?php endif; ?>><?php echo ($menu["cname"]); ?></a><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
    <a href="<?php echo ($topurl); ?>" <?php if($model == 'top10'): ?>class="on"<?php endif; ?>>排行</a>
    <a href="<?php echo ($specialurl); ?>" <?php if($model == 'special'): ?>class="on"<?php endif; ?>>专题</a>
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
		<a href="javascript://" title="" class="dropbox_tigger" id="Tab_top_0" onmouseover="showTop(0);" onmouseout="hideTop();" target="_self" >百度影音<b></b></a>
		<div class="histroydrop" style="display:none;" id="List_top_0" onmouseover="showTop(0);" onmouseout="hideTop();">
		<div class="histroydrop_tt"><a href="javascript://" title="关闭" class="red" onclick="hideTop();" target="_self">关闭</a></div>
		<div class="softbox"><dl class="softbox_dl">
		<dt>百度影音播放器</dt>
		<dd id="baidu_download_url3"><a href="/player_down.php">本地下载</a></dd>
		<dd class="cutline">|</dd><dd id="baidu_download_url"><a href="http://www.skycn.com/soft/65257.html">天空下载</a></dd>
		<dd class="cutline">|</dd><dd id="baidu_download_url2"><a href="http://dl.pconline.com.cn/download/65022.html#ad=6575">PConline</a></dd>
		</dl></div>
		</div><!--histroydrop  END-->
	</div>
	<div class="dropbox dropbox_2">
		<a href="javascript://" title="" class="dropbox_tigger" id="Tab_top_1" onmouseover="showTop(1);" onmouseout="hideTop();" target="_self">我看过的<b></b></a>
		<div class="histroydrop" style="display:none;" id="List_top_1" onmouseover="showTop(1);" onmouseout="hideTop();">
		<div class="histroydrop_tt"><a href="javascript://" onclick="delCookie('gxhis');" target="_self" title="清空观看记录">清空观看记录</a>|<a href="javascript://" title="关闭" class="red" onclick="hideTop();" target="_self">关闭</a></div>
		<div class="histroydrop_con"><div id="view_history" class="view_history" style="display:;" target="_self"><center>您的观看历史为空。</center></div></div>
		</div><!--histroydrop  END-->
	</div>
</div><!--mainnav 导航结束 END-->
<div class="mainnav_site_box">
<div class="mainnav_site">
	<div class="mainnav_site_con">
		<p><a href="<?php echo get_channel_name(2,'showurl');?>" target="_self" class="on">电视剧首页</a><?php $tag['name'] = 'menu';$tag['ids'] = ''.$cid.''; $__LIST__ = get_tag_gxmenu($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): ++$i;$mod = ($i % 2 );?><?php if(is_array($menu["son"])): $i = 0; $__LIST__ = $menu["son"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menuson): ++$i;$mod = ($i % 2 )?>|<a href="<?php echo ($menuson["showurl"]); ?>"><?php echo ($menuson["cname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?></p>
	</div>
</div><!--nav_channel 副导航  END-->
<div id="topdiv4" class="toptag">
	<dl class="toptag_1">
		<dt>按类型</dt>
		<?php $tag['name'] = 'menu';$tag['ids'] = ''.$cid.''; $__LIST__ = get_tag_gxmenu($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): ++$i;$mod = ($i % 2 );?><?php if(is_array($menu["son"])): $i = 0; $__LIST__ = $menu["son"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menuson): ++$i;$mod = ($i % 2 )?><dd><a href="<?php echo ($menuson["showurl"]); ?>"><?php echo ($menuson["cname"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
	</dl>
	<dl class="toptag_2">
		<dt>按年代</dt>
		<dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/year/2012" title="2012">2012</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/year/2011" title="2011">2011</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/year/2010" title="2010">2010</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/year/2009" title="2009">2009</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/year/2008" title="2008">2008</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/year/2007" title="2007">2007</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/year/2006" title="2006">2006</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/year/2005" title="2005">2005</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/year/2004" title="2004">2004</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/year/2003" title="2003">2003</a></dd>
	</dl>
	<dl class="toptag_3">
		<dt>按地区</dt>
		<dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/area/内地" title="内地">内地</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/area/香港" title="香港">香港</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/area/" title="台湾">台湾</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/area/韩国" title="韩国">韩国</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/area/日本" title="日本">日本</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/area/欧美" title="欧美">欧美</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/area/其它" title="其它">其它</a></dd>

	</dl>
	<dl class="toptag_4">
		<dt>按明星</dt>
		<dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/%E6%9D%A8%E5%B9%82" title="杨幂" target="_blank">杨幂</a></dd>
<dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/%E5%88%98%E8%AF%97%E8%AF%97&t=1" title="刘诗诗" target="_blank">刘诗诗</a></dd>
<dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/%E6%9D%A8%E4%B8%9E%E7%90%B3" title="杨丞琳" target="_blank">杨丞琳</a></dd>
<dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/%E9%98%AE%E7%BB%8F%E5%A4%A9" title="阮经天" target="_blank">阮经天</a></dd>
<dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/%E5%94%90%E5%AB%A3&t=1" title="唐嫣" target="_blank">唐嫣</a></dd>
<dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/%E9%99%88%E4%B9%94%E6%81%A9" title="陈乔恩" target="_blank">陈乔恩</a></dd>
<dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/%E6%9F%B3%E4%BA%91%E9%BE%99&t=1" title="柳云龙" target="_blank">柳云龙</a></dd>
<dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/%E5%90%B4%E5%A5%87%E9%9A%86&t=1" title="吴奇隆" target="_blank">吴奇隆</a></dd>
<dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/%E9%82%93%E8%B6%85" title="邓超" target="_blank">邓超</a></dd>
<dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/%E9%92%9F%E6%B1%89%E8%89%AF" title="钟汉良" target="_blank">钟汉良</a></dd>
<dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/%E6%9D%8E%E7%AC%91%E5%86%89" title="李小冉" target="_blank">李小冉</a></dd>
<dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/%E6%9E%97%E5%BF%83%E5%A6%82" title="林心如" target="_blank">林心如</a></dd>
<dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/%E6%9D%8E%E6%95%8F%E9%95%90" title="李民浩" target="_blank">李民浩</a></dd>
<dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/%E5%86%AF%E7%BB%8D%E5%B3%B0" title="冯绍峰" target="_blank">冯绍峰</a></dd>
<dd><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/%E4%B8%A5%E5%AE%BD" title="严宽" target="_blank">严宽</a></dd>

	</dl>
</div><!--toptag  END-->

<div id="topdiv5" class="wrapper L639R321 wrapper_theater">
	<div class="main">
		<div class="box box_theater">
			<div class="box_tt"><h2>同步卫视</h2>
<a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/area/内地" title="同步卫视更多" target="_blank" class="more">更多</a></div>
<div class="box_con">
	<ul class="movielist movielist_136x96">
		<?php $tag['name'] = 'video';$tag['cid'] = '15';$tag['limit'] = '2';$tag['order'] = 'stars desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
			<a class="pic" title="<?php echo ($video["title"]); ?>" href="<?php echo ($video["readurl"]); ?>"><img title="<?php echo ($video["title"]); ?>" alt="<?php echo ($video["title"]); ?>" src="<?php echo ($video["picurl"]); ?>"></a>
			<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,11)); ?></a><a class="info" title="<?php echo ($video["title"]); ?>在线观看" href="<?php echo ($video["readurl"]); ?>">详情</a></p>
			<span class="movbg"></span>
			<span class="movtxt"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清<?php endif; ?><?php endif; ?></span>
		</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
	</ul>
	<ul class="txtlist">
		<?php $tag['name'] = 'video';$tag['cid'] = '15';$tag['limit'] = '2';$tag['order'] = 'up desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
			<p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,6)); ?></a>(<?php if($video["serial"] > 0): ?>至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清<?php endif; ?><?php endif; ?>)</p>
			<p><?php echo (get_replace_html($video["actor"],0,10)); ?></p>
		</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
	</ul>
</div>


		</div><!--box 卫视剧场 END-->
		<div class="box box_theater">
			<div class="box_tt"><h2>TVB剧场</h2>
<a  href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/area/香港" title="TVB剧场更多" target="_blank" class="more">更多</a></div>
<div class="box_con">
	<ul class="movielist movielist_136x96">
		<?php $tag['name'] = 'video';$tag['cid'] = '17';$tag['limit'] = '2';$tag['order'] = 'stars desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
			<a class="pic" title="<?php echo ($video["title"]); ?>" href="<?php echo ($video["readurl"]); ?>"><img title="<?php echo ($video["title"]); ?>" alt="<?php echo ($video["title"]); ?>" src="<?php echo ($video["picurl"]); ?>"></a>
			<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,11)); ?></a><a class="info" title="<?php echo ($video["title"]); ?>在线观看" href="<?php echo ($video["readurl"]); ?>">详情</a></p>
			<span class="movbg"></span>
			<span class="movtxt"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清<?php endif; ?><?php endif; ?></span>
		</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
	</ul>
	<ul class="txtlist">
		<?php $tag['name'] = 'video';$tag['cid'] = '17';$tag['limit'] = '2';$tag['order'] = 'up desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
			<p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,6)); ?></a>(<?php if($video["serial"] > 0): ?>至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清<?php endif; ?><?php endif; ?>)</p>
			<p><?php echo (get_replace_html($video["actor"],0,10)); ?></p>
		</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
	</ul>
</div>

		</div><!--box TVB剧场 END-->
		<div class="box box_theater">
			<div class="box_tt"><h2>日剧剧场</h2>
<a  href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/area/日本" title="日剧剧场更多" target="_blank" class="more">更多</a></div>
<div class="box_con">
	<ul class="movielist movielist_136x96">
		<?php $tag['name'] = 'video';$tag['cid'] = '19';$tag['limit'] = '2';$tag['order'] = 'stars desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
			<a class="pic" title="<?php echo ($video["title"]); ?>" href="<?php echo ($video["readurl"]); ?>"><img title="<?php echo ($video["title"]); ?>" alt="<?php echo ($video["title"]); ?>" src="<?php echo ($video["picurl"]); ?>"></a>
			<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,11)); ?></a><a class="info" title="<?php echo ($video["title"]); ?>在线观看" href="<?php echo ($video["readurl"]); ?>">详情</a></p>
			<span class="movbg"></span>
			<span class="movtxt"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清<?php endif; ?><?php endif; ?></span>
		</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
	</ul>
	<ul class="txtlist">
		<?php $tag['name'] = 'video';$tag['cid'] = '19';$tag['limit'] = '2';$tag['order'] = 'up desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
			<p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,6)); ?></a>(<?php if($video["serial"] > 0): ?>至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清<?php endif; ?><?php endif; ?>)</p>
			<p><?php echo (get_replace_html($video["actor"],0,10)); ?></p>
		</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
	</ul>
</div>

		</div><!--box 韩剧剧场 END-->
		<div class="box box_theater borderN">
			<div class="box_tt"><h2>欧美剧场</h2>
<a  href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/area/欧美" title="欧美剧场更多" target="_blank" class="more">更多</a></div>
<div class="box_con">
	<ul class="movielist movielist_136x96">
		<?php $tag['name'] = 'video';$tag['cid'] = '20';$tag['limit'] = '2';$tag['order'] = 'stars desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
			<a class="pic" title="<?php echo ($video["title"]); ?>" href="<?php echo ($video["readurl"]); ?>"><img title="<?php echo ($video["title"]); ?>" alt="<?php echo ($video["title"]); ?>" src="<?php echo ($video["picurl"]); ?>"></a>
			<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,11)); ?></a><a class="info" title="<?php echo ($video["title"]); ?>在线观看" href="<?php echo ($video["readurl"]); ?>">详情</a></p>
			<span class="movbg"></span>
			<span class="movtxt"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清<?php endif; ?><?php endif; ?></span>
		</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
	</ul>
	<ul class="txtlist">
		<?php $tag['name'] = 'video';$tag['cid'] = '20';$tag['limit'] = '2';$tag['order'] = 'up desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
			<p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,6)); ?></a>(<?php if($video["serial"] > 0): ?>至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清<?php endif; ?><?php endif; ?>)</p>
			<p><?php echo (get_replace_html($video["actor"],0,10)); ?></p>
		</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
	</ul>
</div>

		</div><!--box 美剧精编 END-->
	</div><!--main 左侧 END-->
	<div class="side">
		<div class="box box_theater">
			<div class="box_tt"><h2>台湾剧剧场</h2>
</div>
<div class="box_con">
	<ul class="movielist movielist_136x96">
		<?php $tag['name'] = 'video';$tag['cid'] = '16';$tag['limit'] = '2';$tag['order'] = 'stars desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
			<a class="pic" title="<?php echo ($video["title"]); ?>" href="<?php echo ($video["readurl"]); ?>"><img title="<?php echo ($video["title"]); ?>" alt="<?php echo ($video["title"]); ?>" src="<?php echo ($video["picurl"]); ?>"></a>
			<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,11)); ?></a><a class="info" title="<?php echo ($video["title"]); ?>在线观看" href="<?php echo ($video["readurl"]); ?>">详情</a></p>
			<span class="movbg"></span>
			<span class="movtxt"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清<?php endif; ?><?php endif; ?></span>
		</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
	</ul>
	<ul class="txtlist">
		<?php $tag['name'] = 'video';$tag['cid'] = '16';$tag['limit'] = '2';$tag['order'] = 'up desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
			<p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,6)); ?></a>(<?php if($video["serial"] > 0): ?>至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清<?php endif; ?><?php endif; ?>)</p>
			<p><?php echo (get_replace_html($video["actor"],0,10)); ?></p>
		</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
	</ul>
</div>

		</div><!--box 日剧精编 END-->
		<div class="box box_theater borderN" style="width:162px;">
			<div class="box_tt"><h2>韩国剧剧场</h2>
</div>
<div class="box_con">
	<ul class="movielist movielist_136x96">
		<?php $tag['name'] = 'video';$tag['cid'] = '18';$tag['limit'] = '2';$tag['order'] = 'stars desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
			<a class="pic" title="<?php echo ($video["title"]); ?>" href="<?php echo ($video["readurl"]); ?>"><img title="<?php echo ($video["title"]); ?>" alt="<?php echo ($video["title"]); ?>" src="<?php echo ($video["picurl"]); ?>"></a>
			<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,11)); ?></a><a class="info" title="<?php echo ($video["title"]); ?>在线观看" href="<?php echo ($video["readurl"]); ?>">详情</a></p>
			<span class="movbg"></span>
			<span class="movtxt"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清<?php endif; ?><?php endif; ?></span>
		</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
	</ul>
	<ul class="txtlist">
		<?php $tag['name'] = 'video';$tag['cid'] = '18';$tag['limit'] = '2';$tag['order'] = 'up desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
			<p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,6)); ?></a>(<?php if($video["serial"] > 0): ?>至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清<?php endif; ?><?php endif; ?>)</p>
			<p><?php echo (get_replace_html($video["actor"],0,10)); ?></p>
		</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
	</ul>
</div>

		</div><!--box 台剧精编 END-->
	</div><!--side 右侧 END-->
</div><!--wrapper  END-->

<div id="topdiv6" class="wrapper">
	<div class="box box_group">
		<div class="contain">
			<div class="box_tt box_tt_typeA"><h2>同步剧场</h2></div>
			<div class="box_con">
				<ul class="movielist movielist_100x140 movielist_widthB"><?php $tag['name'] = 'video';$tag['cid'] = '2';$tag['limit'] = '16';$tag['order'] = 'serial desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
	<a class="pic" title="<?php echo ($video["title"]); ?>" href="<?php echo ($video["readurl"]); ?>"><img title="<?php echo ($video["title"]); ?>" alt="<?php echo ($video["title"]); ?>" src="<?php echo ($webpath); ?>images/img_default.gif" _src="<?php echo ($video["picurlsmall"]); ?>" onmouseover="D.show('teleplay','<?php echo ($video["title"]); ?>','<?php echo ($video["year"]); ?>',' <?php echo ($video["showname"]); ?>','<?php echo ($video["area"]); ?>','<?php echo ($video["score"]); ?>','<?php echo ($video["scoreer"]); ?>', '<?php echo ($video["actor"]); ?>','<?php echo ($video["title"]); ?>','','14','',1)" onmouseout="D.hide()">
	<?php if(($video["intro"] == 'DVD+BD') or ($video["intro"] == 'BD')): ?><span class="movnum movnum_1080"></span><?php endif; ?><?php if(($video["intro"] == 'HD')): ?><span class="movnum movnum_720"></span><?php endif; ?><?php if(($video["intro"] == 'dvd')): ?><span class="movnum movnum_480"></span><?php endif; ?></a>
	<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo ($video["title"]); ?></a>
	<a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>全集" class="info">详情</a></p>
	<span class="movbg"></span>
	<span class="movtxt">更新至<?php echo ($video["serial"]); ?>集</span>
	<p><?php echo ($video["actor"]); ?></p>
</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ul>
			</div>
		</div><!--contain 同步剧场 END-->
	</div><!--box  END-->
</div><!--wrapper  END-->

<div id="topdiv9" class="wrapper L725R243">
	<div class="main">
		<div class="box box_typeB">
			<div class="box_tt"><h2>华语剧场</h2></div>
			<ul class="movielist movielist_100x140"><?php $tag['name'] = 'video';$tag['cid'] = '15,16,17';$tag['limit'] = '12';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
	<a class="pic" title="<?php echo ($video["title"]); ?>" href="<?php echo ($video["readurl"]); ?>"><img title="<?php echo ($video["title"]); ?>" alt="<?php echo ($video["title"]); ?>" src="<?php echo ($webpath); ?>images/img_default.gif" _src="<?php echo ($video["picurlsmall"]); ?>" onmouseover="D.show('teleplay','<?php echo ($video["title"]); ?>','<?php echo ($video["year"]); ?>','<?php echo ($video["showname"]); ?>','<?php echo ($video["area"]); ?>','<?php echo ($video["score"]); ?>','<?php echo ($video["scoreer"]); ?>', '<?php echo ($video["actor"]); ?>','<?php echo (get_replace_html($video["content"],0,30)); ?>','','53','',1)" onmouseout="D.hide()"></a>
	<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo ($video["title"]); ?></a>
	<a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" class="info">详情</a></p>
	<span class="movbg"></span>
	<span class="movtxt"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?></span>
	<p><?php echo ($video["actor"]); ?></p>
</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
			</ul>
		</div>
	</div><!--main  END-->
	<div class="side">
		<div class="sidebox">
			<div class="tabbox" style="border-top:none;">
				<h3 id="Tab_countrylist_0" onmouseover="switchTab('countrylist',0,2,'on','')" class="on" style="width:121px;border-left:none;">华语热播榜</h3>
				<h3 id="Tab_countrylist_1" onmouseover="switchTab('countrylist',1,2,'on','')">经典全集榜</h3>
			</div><!--tabbox  END-->
			<div class="sidebox_con">
				<div id="List_countrylist_0">
				<ol class="ranklist ranklist_typeC"><?php $tag['name'] = 'video';$tag['cid'] = '15,16,17';$tag['limit'] = '10';$tag['order'] = 'weekhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><em><?php if(($i)  ==  "10"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?></em><p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo ($video["title"]); ?></a><strong><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清<?php endif; ?><?php endif; ?></strong></p><span class="score"><?php echo ($video["score"]); ?></span><a href="<?php echo ($video["readurl"]); ?>" title="点击查看影片信息" class="rankinfo" target="_blank">影片信息</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ol>
				</div>
				<div id="List_countrylist_1" style="display:none">
				<ol class="ranklist ranklist_typeC"><?php $tag['name'] = 'video';$tag['serial'] = 'over';$tag['cid'] = '15,16,17';$tag['limit'] = '10';$tag['order'] = 'weekhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><em><?php if(($i)  ==  "10"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?></em><p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo ($video["title"]); ?></a><strong><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?></strong></p><span class="score"><?php echo ($video["score"]); ?></span><a href="<?php echo ($video["readurl"]); ?>" title="点击查看影片信息" class="rankinfo" target="_blank">影片信息</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ol>
				</div>
			</div>
		</div><!--sidebox 内地明星 END-->
	</div><!--side  END-->
</div>

<div id="topdiv10" class="wrapper L725R243">
	<div class="main">
		<div class="box box_typeB">
			<div class="box_tt"><h2>日韩剧场</h2></div>
			<ul class="movielist movielist_100x140"><?php $tag['name'] = 'video';$tag['cid'] = '18,19';$tag['limit'] = '12';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
	<a  class="pic" title="<?php echo ($video["title"]); ?>" href="<?php echo ($video["readurl"]); ?>"><img title="<?php echo ($video["title"]); ?>" alt="<?php echo ($video["title"]); ?>" src="<?php echo ($webpath); ?>images/img_default.gif" _src="<?php echo ($video["picurlsmall"]); ?>" onmouseover="D.show('teleplay','<?php echo ($video["title"]); ?>','<?php echo ($video["year"]); ?>',' <?php echo ($video["showname"]); ?>','<?php echo ($video["area"]); ?>','<?php echo ($video["score"]); ?>','<?php echo ($video["scoreer"]); ?>', '<?php echo ($video["actor"]); ?>','<?php echo (get_replace_html($video["content"],0,30)); ?>','','53','',1)" onmouseout="D.hide()"></a>
	<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo ($video["title"]); ?></a>
	<a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" class="info">详情</a></p>
	<span class="movbg"></span>
	<span class="movtxt"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?></span>
	<p><?php echo ($video["actor"]); ?></p>
</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
			</ul>
		</div>
	</div><!--main  END-->
	<div class="side">
		<div class="sidebox">
			<div class="tabbox" style="border-top:none;">
				<h3 id="Tab_asialist_0" onmouseover="switchTab('asialist',0,2,'on','')" class="on" style="width:121px;border-left:none;">日韩热播榜</h3>
				<h3 id="Tab_asialist_1" onmouseover="switchTab('asialist',1,2,'on','')">经典全集榜</h3>
			</div><!--tabbox  END-->
			<div class="sidebox_con">
				<div id="List_asialist_0">
				<ol class="ranklist ranklist_typeC"><?php $tag['name'] = 'video';$tag['cid'] = '18,19';$tag['limit'] = '10';$tag['order'] = 'weekhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><em><?php if(($i)  ==  "10"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?></em><p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo ($video["title"]); ?></a><strong><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清<?php endif; ?><?php endif; ?></strong></p><span class="score"><?php echo ($video["score"]); ?></span><a href="<?php echo ($video["readurl"]); ?>" title="点击查看影片信息" class="rankinfo" target="_blank">影片信息</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ol>
				</div>
				<div id="List_asialist_1" style="display:none">
				<ol class="ranklist ranklist_typeC"><?php $tag['name'] = 'video';$tag['serial'] = 'over';$tag['cid'] = '18,19';$tag['limit'] = '10';$tag['order'] = 'weekhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><em><?php if(($i)  ==  "10"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?></em><p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo ($video["title"]); ?></a><strong><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?></strong></p><span class="score"><?php echo ($video["score"]); ?></span><a href="<?php echo ($video["readurl"]); ?>" title="点击查看影片信息" class="rankinfo" target="_blank">影片信息</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ol>
				</div>
			</div>
		</div><!--sidebox 内地明星 END-->
	</div><!--side  END-->
</div>

<div id="topdiv11" class="wrapper L725R243">
	<div class="main">
		<div class="box box_typeB">
			<div class="box_tt"><h2>欧美剧场</h2></div>
			<ul class="movielist movielist_100x140"><?php $tag['name'] = 'video';$tag['cid'] = '20';$tag['limit'] = '12';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
	<a class="pic" title="<?php echo ($video["title"]); ?>" href="<?php echo ($video["readurl"]); ?>"><img title="<?php echo ($video["title"]); ?>" alt="<?php echo ($video["title"]); ?>" src="<?php echo ($webpath); ?>images/img_default.gif" _src="<?php echo ($video["picurlsmall"]); ?>" onmouseover="D.show('teleplay','<?php echo ($video["title"]); ?>','<?php echo ($video["year"]); ?>',' <?php echo ($video["showname"]); ?>','<?php echo ($video["area"]); ?>','<?php echo ($video["score"]); ?>','<?php echo ($video["scoreer"]); ?>', '<?php echo ($video["actor"]); ?>','<?php echo (get_replace_html($video["content"],0,30)); ?>','','53','',1)" onmouseout="D.hide()"></a>
	<p class="movielist_tt"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo ($video["title"]); ?></a>
	<a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" class="info">详情</a></p>
	<span class="movbg"></span>
	<span class="movtxt"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?></span>
	<p><?php echo (get_replace_html($video["actor"],0,10)); ?></p>
</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
			</ul>
		</div>
	</div><!--main  END-->
	<div class="side">
		<div class="sidebox">
			<div class="tabbox" style="border-top:none;">
				<h3 id="Tab_europlist_0" onmouseover="switchTab('europlist',0,2,'on','')" class="on" style="width:121px;border-left:none;">欧美热播榜</h3>
				<h3 id="Tab_europlist_1" onmouseover="switchTab('europlist',1,2,'on','')">经典全集榜</h3>
			</div><!--tabbox  END-->
			<div class="sidebox_con">
				<div id="List_europlist_0">
				<ol class="ranklist ranklist_typeC"><?php $tag['name'] = 'video';$tag['cid'] = '20,21';$tag['limit'] = '10';$tag['order'] = 'weekhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><em><?php if(($i)  ==  "10"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?></em><p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo ($video["title"]); ?></a><strong><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>高清<?php endif; ?><?php endif; ?></strong></p><span class="score"><?php echo ($video["score"]); ?></span><a href="<?php echo ($video["readurl"]); ?>" title="点击查看影片信息" class="rankinfo" target="_blank">影片信息</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ol>
				</div>
				<div id="List_europlist_1" style="display:none">
				<ol class="ranklist ranklist_typeC"><?php $tag['name'] = 'video';$tag['serial'] = 'over';$tag['cid'] = '20,21';$tag['limit'] = '10';$tag['order'] = 'weekhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><em><?php if(($i)  ==  "10"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?></em><p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo ($video["title"]); ?></a><strong><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?></strong></p><span class="score"><?php echo ($video["score"]); ?></span><a href="<?php echo ($video["readurl"]); ?>" title="点击查看影片信息" class="rankinfo" target="_blank">影片信息</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ol>
				</div>
			</div>
		</div>
	</div><!--side  END-->
</div>
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
</body>
</html>
<script type="text/javascript" src="<?php echo ($webpath); ?>js/common.min.js"></script>
<script src="<?php echo ($webpath); ?>js/tips_history_lazy.min.js" charset="utf-8" ></script>
<script type="text/javascript">LAZY.init();LAZY.run();</script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/history.js"></script>