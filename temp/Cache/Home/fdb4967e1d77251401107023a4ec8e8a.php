<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($webtitle); ?></title>
<meta name="keywords" content="<?php echo ($ckeywords); ?><?php echo ($keywords); ?>">
<meta name="description" content="<?php echo ($cdescription); ?><?php echo ($description); ?>">
<link rel='stylesheet' type='text/css' href='<?php echo ($webpath); ?>css/topic.css'>
<link rel='stylesheet' type='text/css' href='<?php echo ($webpath); ?>css/header.css'>
</head>
<body>
<div class="top_con">
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
</div>
<div class="wrap">
<div class="focus" style="min-height:200px;height:auto;"></div>
	<div class="areabox topTab side">
		<div class="area_head"><h2>热门专题排行</h2></div>
		<div class="area_cont">
			<ol><?php $tag['name'] = 'special';$tag['limit'] = '10';$tag['order'] = 'hits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$special): ++$i;$mod = ($i % 2 );?><li><a href="<?php echo ($special["readurl"]); ?>"><?php echo (get_replace_html($special["title"],0,12)); ?></a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
			</ol>
		</div> <!--人气榜 -->
	</div>
	<div class="primary">
		<div class="areabox">
			<div class="area_head tab_head">	
				<ul>	
					<li><a name="anchor_page_3698" id="Tab_rank_0" class="on" onclick="switchTab_special('rank',0,3,'on','',3698)">最新专题</a></li>
					<li><a name="anchor_page_3732" id="Tab_rank_1" onclick="switchTab_special('rank',1,3,'on','',3732)">电影专题</a></li>
					<li><a name="anchor_page_3733" id="Tab_rank_2" onclick="switchTab_special('rank',2,3,'on','',3733)">电视专题</a></li>
				</ul>
			</div>
			<div class="area_cont" id="List_rank_0">
<div id="page_3698_0">
<?php $tag['name'] = 'special';$tag['limit'] = '10';$tag['order'] = 'addtime'; $__LIST__ = get_tag_gxlist($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$special): ++$i;$mod = ($i % 2 );?><div class="item_previ">
					<h3><a title="<?php echo ($special["title"]); ?>" href="<?php echo ($special["readurl"]); ?>"><?php echo (get_replace_html($special["title"],0,20)); ?></a></h3>
					<p class="time"><?php echo (date('Y-m-d',$special["addtime"])); ?></p>
					<div class="previ_show">
						<a title="<?php echo ($special["title"]); ?>" href="<?php echo ($special["readurl"]); ?>" class="pic"><img src="<?php echo ($special["logo"]); ?>" width="208" height="96" title="<?php echo ($special["title"]); ?>" alt="<?php echo ($special["title"]); ?>" /></a>
					<p class="previ_op">包括 <?php echo ($special["count"]); ?> 部视频</p>
					</div>
					<p class="previ_intro"><?php echo (get_replace_html($special["content"],0,150)); ?><a href="<?php echo ($special["readurl"]); ?>">[查看]</a></p>
</div><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
</div>
<?php if($count > 10): ?><div class="pages"><?php echo ($pages); ?></div><?php endif; ?>
			</div>
			<div class="area_cont" id="List_rank_1" style="display:none">
<div id="page_3732_0">
<?php $tag['name'] = 'special';$tag['class'] = '1';$tag['limit'] = '10';$tag['order'] = 'addtime'; $__LIST__ = get_tag_gxlist($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$special): ++$i;$mod = ($i % 2 );?><div class="item_previ">
					<h3><a title="<?php echo ($special["title"]); ?>" href="<?php echo ($special["readurl"]); ?>"><?php echo (get_replace_html($special["title"],0,20)); ?></a></h3>
					<p class="time"><?php echo (date('Y-m-d',$special["addtime"])); ?></p>
					<div class="previ_show">
						<a title="<?php echo ($special["title"]); ?>" href="<?php echo ($special["readurl"]); ?>" class="pic"><img src="<?php echo ($special["logo"]); ?>" width="208" height="96" title="<?php echo ($special["title"]); ?>" alt="<?php echo ($special["title"]); ?>" /></a>
					<p class="previ_op">包括 <?php echo ($special["count"]); ?> 部视频</p>
					</div>
					<p class="previ_intro"><?php echo (get_replace_html($special["content"],0,150)); ?><a href="<?php echo ($special["readurl"]); ?>">[查看]</a></p>
</div><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
</div>
<?php if($count > 10): ?><div class="pages"><?php echo ($pages); ?></div><?php endif; ?>
			</div>
			<div class="area_cont" id="List_rank_2" style="display:none">
<div id="page_3733_0">
<?php $tag['name'] = 'special';$tag['class'] = '2';$tag['limit'] = '10';$tag['order'] = 'addtime'; $__LIST__ = get_tag_gxlist($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$special): ++$i;$mod = ($i % 2 );?><div class="item_previ">
					<h3><a title="<?php echo ($special["title"]); ?>" href="<?php echo ($special["readurl"]); ?>"><?php echo (get_replace_html($special["title"],0,20)); ?></a></h3>
					<p class="time"><?php echo (date('Y-m-d',$special["addtime"])); ?></p>
					<div class="previ_show">
						<a title="<?php echo ($special["title"]); ?>" href="<?php echo ($special["readurl"]); ?>" class="pic"><img src="<?php echo ($special["logo"]); ?>" width="208" height="96" title="<?php echo ($special["title"]); ?>" alt="<?php echo ($special["title"]); ?>" /></a>
					<p class="previ_op">包括 <?php echo ($special["count"]); ?> 部视频</p>
					</div>
					<p class="previ_intro"><?php echo (get_replace_html($special["content"],0,150)); ?><a href="<?php echo ($special["readurl"]); ?>">[查看]</a></p>
</div><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
</div>
<?php if($count > 10): ?><div class="pages"><?php echo ($pages); ?></div><?php endif; ?>
			</div>
</div></div>
	<div class="side">
		<div class="areabox">
			<div class="area_head"><h2>专题评论区</h2></div>
			<div class="area_cont discuss_con">
				<ul class="discuss_list">
					<li>您最喜欢看哪一类专题？</li>
				</ul>				
				<div class="discuss_previ" id="scroll_comment">					
					<ul><?php $tag['name'] = 'comment';$tag['mid'] = '3';$tag['limit'] = '10'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): ++$i;$mod = ($i % 2 );?><li><?php echo (GetIpAddress($comment["ip"],'shi')); ?>网友:<?php echo (get_replace_html($comment["content"],0,50)); ?></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
					</ul>
				</div>
			</div>
		</div>
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
</div>
</body>
</html>
<script language="javascript">var SitePath='<?php echo ($webpath); ?>';var SiteMid='<?php echo ($mid); ?>';var SiteCid='<?php echo ($cid); ?>';var SitePid='<?php echo ($pid); ?>';var SiteId='<?php echo ($id); ?>';</script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/jquery.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/system.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/history.js"></script>
<script type="text/javascript" src="<?php echo ($webpath); ?>js/special.js"></script>
<script type="text/javascript" src="<?php echo ($webpath); ?>js/common.min.js"></script>
<script src="<?php echo ($webpath); ?>js/tips_history_lazy.min.js" charset="utf-8" ></script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/history.js"></script>