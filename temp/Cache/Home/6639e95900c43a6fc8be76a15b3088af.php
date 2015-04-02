<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title><?php echo ($webtitle); ?></title>
<meta name="keywords" content="<?php echo ($keywords); ?>">
<meta name="description" content="<?php echo ($description); ?>">
<link rel='stylesheet' type='text/css' href='<?php echo ($webpath); ?>css/search.css'>
<link rel='stylesheet' type='text/css' href='<?php echo ($webpath); ?>css/header.css'>
<script>
function search_tab(type){
	var types = ['movie','teleplay','tv','anime'];
	for(var i=0; i<types.length; i++){
		var _obj = _$('sort-list-' + types[i]);
		try{
			_obj.style.display = 'none';
		}catch(e){}
		var _obj = _$('tab-' + types[i]);
		try{
			_obj.className = '';}catch(e){}}
	
	var _obj = _$('sort-list-' + type);
	try{
		_obj.style.display = 'block';
	}catch(e){}
	var _obj = _$('tab-' + type);
	try{
		_obj.className = 'on';}catch(e){}
	
	function _$(id){
		return document.getElementById(id);}
}
function show_tab(open, close){
	if(close != ''){
		var close_tab = close.split(',');
		for(var i=0; i<close_tab.length; i++){
			try{
				document.getElementById('tab_content_' + close_tab[i]).style.display = 'none';
			}catch(e){}
			try{
				document.getElementById('tab_' + close_tab[i]).className = '';}catch(e){}}
		try{
			document.getElementById('tab_content_' + open).style.display = 'block';
		}catch(e){}
		try{
			document.getElementById('tab_' + open).className = 'on';}catch(e){}}
}
</script>
</head>
<body class="topic_body">
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
<div class="wrapper">
	<div class="main">
		<div class="search_key">搜索<span class="HL">“<?php echo ($keyword); ?>”</span>，共找到视频<span class="HL"><?php echo ($count); ?></span>个</div><!--search_key  END-->
		<div class="tabbox" onclick="" style="display:''">
			<ul>
				<li><a href="<?php echo ($webpath); ?>index.php?s=video/search/wd/<?php echo ($keyword); ?>" title="全部" <?php if(intval($_REQUEST['id']) == 0): ?>class="on"<?php else: ?><?php endif; ?>>全部(<?php echo ($count_a); ?>)</a></li>
				<?php if($count_m > 0): ?><li><a href="<?php echo ($webpath); ?>index.php?s=video/search/id/1/wd/<?php echo ($keyword); ?>" title="电影" <?php if(intval($_REQUEST['id']) == 1): ?>class="on"<?php else: ?><?php endif; ?>>电影(<?php echo ($count_m); ?>)</a></li><?php else: ?><?php endif; ?>
				<?php if($count_t > 0): ?><li><a href="<?php echo ($webpath); ?>index.php?s=video/search/id/2/wd/<?php echo ($keyword); ?>" title="电视剧" <?php if(intval($_REQUEST['id']) == 2): ?>class="on"<?php else: ?><?php endif; ?>>电视剧(<?php echo ($count_t); ?>)</a></li><?php else: ?><?php endif; ?>
				<?php if($count_c > 0): ?><li><a href="<?php echo ($webpath); ?>index.php?s=video/search/id/3/wd/<?php echo ($keyword); ?>" title="动漫" <?php if(intval($_REQUEST['id']) == 3): ?>class="on"<?php else: ?><?php endif; ?>>动漫(<?php echo ($count_c); ?>)</a></li><?php else: ?><?php endif; ?>
				<?php if($count_v > 0): ?><li><a href="<?php echo ($webpath); ?>index.php?s=video/search/id/4/wd/<?php echo ($keyword); ?>" title="综艺" <?php if(intval($_REQUEST['id']) == 4): ?>class="on"<?php else: ?><?php endif; ?>>综艺(<?php echo ($count_v); ?>)</a></li><?php else: ?><?php endif; ?>
			</ul>
		</div><!--tabbox 搜索结果切换 END-->
		<div class="orderbox"></div>
		<ol class="reusltbox"><?php $tag['name'] = 'video';$tag['limit'] = '10';$tag['order'] = ''.$order.''; $__LIST__ = get_tag_gxsearch($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li class="reusltbox_list">
				<a target="_blank" href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" class="pic"><img src="<?php echo ($video["picurl"]); ?>" onerror="this.src='<?php echo ($webpath); ?>views/images/nophoto.jpg'" alt="<?php echo ($video["title"]); ?>" title="<?php echo ($video["title"]); ?>"><span class="bg"></span><span class="txt"><span><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>完结<?php endif; ?><?php endif; ?></span></span></a>
				<h2><a target="_blank" title="<?php echo ($video["title"]); ?>" href="<?php echo ($video["readurl"]); ?>"><?php echo (get_hilight($video['title'],$keyword)); ?></a><span><?php echo (get_channel_name(get_pid($video["cid"]))); ?></span></h2>
				<div class="reusltbox_score">
					<span><strong><?php echo ($video["score"]); ?></strong>分</span>(<?php echo ($video["scoreer"]); ?>人评)
				</div>
				<ul class="reusltbox_list_detail">
					<li>类型：<?php echo ($video["showname"]); ?></li>
					<li>语言：<span><?php echo ($video["language"]); ?></span></li>
					<li>导演：<?php echo (get_hilight(($video['director'])?($video['director']):'未知',$keyword)); ?></li>
					<li>地区：<?php echo ($video["area"]); ?></li>
					<li class="Hauto">主演：<?php echo (get_actor_url($video["actor"])); ?></li>
					<li>年份：<span><?php echo (($video["year"])?($video["year"]):'未录入'); ?></span></li>
				</ul>
				<p class="reusltbox_info"><?php echo (get_hilight(get_replace_html($video["content"],0,70,'utf-8',true),$keyword)); ?></p>
					<div class="reusltbox_links">
						<div class="reusltbox_links_playlink">
								<a href="<?php echo ($video["playerurl"]); ?>" title="立即观看" class="play" target="_blank" blockid="2264">立即观看<b></b></a>
						</div>
							|<a href="<?php echo ($video["readurl"]); ?>" title="影片详情" target="_blank"><strong>影片详情</strong></a>
			</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
			
		</ol><?php if($count > 10): ?><p class="ggPager"><?php echo ($pages); ?></p><?php endif; ?><!--main  END-->
	</div>
	
	<div class="side">
		<div class="box">
			<h2>近期热门影片</h2>
			<div class="box_con">
				<ul class="movielist" id="recommend-list-movie"><?php $tag['name'] = 'video';$tag['limit'] = '4';$tag['order'] = 'weekhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li><a target="_blank" title="点击播放&#10;<?php echo ($video["title"]); ?>" href="<?php echo ($video["playerurl"]); ?>" class="pic"><img src="<?php echo ($video["picurl"]); ?>" /></a>
				<p class="title"><a target="_blank" title="点击播放&#10;<?php echo ($video["title"]); ?>" href="<?php echo ($video["playerurl"]); ?>"><?php echo ($video["title"]); ?></a></p>
				<span class="bg"></span><span class="txt"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo (get_replace_html($video["intro"],0,8)); ?><?php else: ?>完结<?php endif; ?><?php endif; ?></span>
				<p><?php echo (get_replace_html($video["actor"],0,10)); ?></p>
				</li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ul>
			</div>
		</div>	
				
		<div class="box">
			<h2>影片热播榜<span>TOP10</span></h2>
			<div class="box_con">
				<div class="tabbox">
					<ul>
						<li><a href="javascript:;" onclick="this.blur()" onmouseover="search_tab('movie')" id="tab-movie" title="电影" class="on">电影</a></li>
						<li><a href="javascript:;" onclick="this.blur()" onmouseover="search_tab('teleplay')" id="tab-teleplay" title="电视剧">电视剧</a></li>
						<li><a href="javascript:;" onclick="this.blur()" onmouseover="search_tab('tv')" id="tab-tv" title="综艺">综艺</a></li>
						<li><a href="javascript:;" onclick="this.blur()" onmouseover="search_tab('anime')" id="tab-anime" title="动漫">动漫</a></li>
					</ul>
				</div>
				<ol class='sort-list' id='sort-list-movie' style='display:'><?php $tag['name'] = 'video';$tag['cid'] = '1';$tag['limit'] = '10';$tag['order'] = 'dayhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li></eq><?php endif; ?><em><?php if(($i)  ==  "10"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?></em>
				<a target="_blank" title="点击播放&#10;<?php echo ($video["title"]); ?>" href="<?php echo ($video["playerurl"]); ?>"><?php echo ($video["title"]); ?></a>
				<a target="_blank" class="playMov" title="点击查看影片信息" href="<?php echo ($video["readurl"]); ?>"></a>
				<span><?php echo ($video["intro"]); ?></span><span class="score"><strong><?php echo ($video["score"]); ?></strong></span></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ol>
				<ol class='sort-list' id='sort-list-teleplay' style='display:none'><?php $tag['name'] = 'video';$tag['cid'] = '2';$tag['limit'] = '10';$tag['order'] = 'dayhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li></eq><?php endif; ?><em><?php if(($i)  ==  "10"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?></em>
				<a target="_blank" title="点击播放&#10;<?php echo ($video["title"]); ?>" href="<?php echo ($video["playerurl"]); ?>"><?php echo ($video["title"]); ?></a>
				<a target="_blank" class="playMov" title="点击查看影片信息" href="<?php echo ($video["readurl"]); ?>"></a>
				<span><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?></span><span class="score"><strong><?php echo ($video["score"]); ?></strong></span></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ol>
				<ol class='sort-list' id='sort-list-tv' style='display:none'><?php $tag['name'] = 'video';$tag['cid'] = '4';$tag['limit'] = '10';$tag['order'] = 'dayhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li></eq><?php endif; ?><em><?php if(($i)  ==  "10"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?></em>
				<a target="_blank" title="点击播放&#10;<?php echo ($video["title"]); ?>" href="<?php echo ($video["playerurl"]); ?>"><?php echo ($video["title"]); ?></a>
				<a target="_blank" class="playMov" title="点击查看影片信息" href="<?php echo ($video["readurl"]); ?>"></a>
				<span><?php if($video["serial"] > 0): ?><?php echo ($video["serial"]); ?>期<?php else: ?>完结<?php endif; ?></span><span class="score"><strong><?php echo ($video["score"]); ?></strong></span></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ol>
				<ol class='sort-list' id='sort-list-anime' style='display:none'><?php $tag['name'] = 'video';$tag['cid'] = '3';$tag['limit'] = '10';$tag['order'] = 'dayhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li></eq><?php endif; ?><em><?php if(($i)  ==  "10"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?></em>
				<a target="_blank" title="点击播放&#10;<?php echo ($video["title"]); ?>" href="<?php echo ($video["playerurl"]); ?>"><?php echo ($video["title"]); ?></a>
				<a target="_blank" class="playMov" title="点击查看影片信息" href="<?php echo ($video["readurl"]); ?>"></a>
				<span><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?></span><span class="score"><strong><?php echo ($video["score"]); ?></strong></span></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
				</ol>
				</div>
		</div><!--box 明星最新动态 END-->
	</div><!--side  END-->
</div><!--wrap  END-->
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
</html>.
<script language="javascript">var SitePath='<?php echo ($webpath); ?>';var SiteMid='<?php echo ($mid); ?>';var SiteCid='<?php echo ($cid); ?>';var SitePid='<?php echo ($pid); ?>';var SiteId='<?php echo ($id); ?>';</script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/jquery.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/system.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/history.js"></script>
<script type="text/javascript" src="<?php echo ($webpath); ?>js/common.min.js"></script>
<script src="<?php echo ($webpath); ?>js/tips_history_lazy.min.js" charset="utf-8" ></script>
<script type="text/javascript">LAZY.init();LAZY.run();</script>