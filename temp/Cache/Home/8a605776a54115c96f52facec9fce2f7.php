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
<?php if($banner != null): ?><div class="focus" style="height:auto;"><img src="<?php echo ($banner); ?>" title="<?php echo ($title); ?>" width=730 border="0"/></div><?php else: ?><?php endif; ?>
	<div class="areabox topTab side">
		<div class="area_head"><h2>热门专题排行</h2></div>
		<div class="area_cont">
			<ol><?php $tag['name'] = 'special';$tag['limit'] = '10';$tag['order'] = 'hits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$special): ++$i;$mod = ($i % 2 );?><li><a href="<?php echo ($special["readurl"]); ?>"><?php echo (get_replace_html($special["title"],0,12)); ?></a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
			</ol>
		</div> <!--人气榜 -->
	</div>
	<div class="primary">
		<div class="areabox">
			<div class="area_cont" id="List_rank_0">
<div id="page_0_0">
<div class="item_previ" style="padding-top:10px;margin-top:0px;text-align:center;">
					<h3 style="padding:0;margin:0;"><?php echo ($title); ?></h3>
					<p style="padding:5px;margin:0;border-bottom:1px dashed #DDDDDD;"><span><?php echo (date('Y-m-d',$addtime)); ?></span> | <span>相关视频 <?php echo (count(explode(',',$mids))); ?> 部</span></p>
					<div class="previ_intro" style="padding:10px;margin:0;text-align:left;text-indent:2em;"><?php echo ($content); ?></div>
</div>
<div class="item_previ"><h3 style="padding:0;margin:0;">相关视频列表</h3>
<ul class="mov_pic_list" style="float:left;text-align:center;">
        <?php $tag['name'] = 'video';$tag['ids'] = ''.$mids.'';$tag['limit'] = '100'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li>
          <div class="pic"><a href="<?php echo ($video["readurl"]); ?>" target="_blank"><img src="<?php echo ($video["picurl"]); ?>" title="<?php echo ($video["title"]); ?>" onerror="this.src='<?php echo ($webpath); ?>views/images/nophoto.jpg'" width="98" height="140" border="0"/></a></div>
          <div class="mid_title"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo (get_replace_html($video["title"],0,7)); ?></a></div>
        </li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
      </ul>
</div>
</div>
			</div>
</div>
<?php if(C('user_comment') == 1): ?><div style="margin-top:10px;">
	<div class="box_comment box_comment_input" id="inputCbox">
    <div class="box_comment_tt">
    <h3><?php echo ($title); ?> 专题评论</h3>
    <div class="box_comment_more" id="sendCm_more">(共<?php echo (get_comment_count($id)); ?>条评论)</div>
	</div>
    <div class="commenttip" id="successBox" style="display:none"></div><!--commenttip  END-->
    <div class="box_con" id="List_sendCm_0">
        <div class="inputcontain">
        <textarea name="content" id="comment_content" rows="5" onfocus="ss=setInterval(sp,200)" onblur="clearInterval(ss)" maxlength="200" class="textarea"></textarea>
		<div class="textarea_bar">
        <span class="textarea_bar_error" id="errorS"></span><span class="textarea_bar_tip" id="tipS"></span>
        <input id="comment_button" onclick="CommentPost();" class="textarea_bar_btn" type="button" value="发表评论" onmouseover="this.className='textarea_bar_btn textarea_bar_btn_hover'" onmouseout="this.className='textarea_bar_btn'" style="border:none;"/>
        <p>还可以输入<span id="span">200</span>个字</p>
        </div>
        </div><!--inputcontain 输入 END-->
    </div>
<!--box  END-->
    </div>
</div><?php endif; ?>
</div>
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
<?php echo ($inserthits); ?>
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
<script language="javascript">var SiteMid='3';</script>
<script type="text/javascript" src="<?php echo ($webpath); ?>js/common.min.js"></script>
<script src="<?php echo ($webpath); ?>js/tips_history_lazy.min.js" charset="utf-8" ></script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/history.js"></script>