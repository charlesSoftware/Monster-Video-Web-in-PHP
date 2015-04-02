<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>《<?php echo ($title); ?>》<?php if(($serial == 0) and ($pid != 1)): ?>全集1-<?php echo ($count); ?><?php endif; ?><?php if(($serial != 0) and ($pid != 1)): ?>1-<?php echo ($serial); ?><?php endif; ?>百度影音在线观看/下载-<?php echo ($cname); ?>-<?php echo ($webname); ?></title>
<meta name="keywords" content="<?php echo ($title); ?>,<?php echo ($title); ?>在线观看,<?php echo ($title); ?>全集,<?php echo ($title); ?>下载">
<meta name="description" content="由<?php echo ($actor); ?>主演的<?php echo ($title); ?>高清全集百度影音在线观看和下载;<?php echo ($title); ?>剧情:<?php echo (get_replace_html($content,0,100,'utf-8',true)); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<link rel='stylesheet' type='text/css' href='<?php echo ($webpath); ?>css/content.css'>
<link rel='stylesheet' type='text/css' href='<?php echo ($webpath); ?>css/header.css'>
<script language="javascript">var SitePath='<?php echo ($webpath); ?>';var SiteMid='<?php echo ($mid); ?>';var SiteCid='<?php echo ($cid); ?>';var SitePid='<?php echo ($pid); ?>';var SiteId='<?php echo ($id); ?>';</script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/jquery.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/system.js"></script>
<script type="text/javascript" src="<?php echo ($webpath); ?>js/common.min.js"></script>
<script type="text/javascript" src="<?php echo ($webpath); ?>js/jquery-1.4.2.min.js"></script>
<script>
jQuery.noConflict();
document.domain="sfxsw.com";
typeof movieInfo == "undefined" && (movieInfo = {}),
movieInfo.movieid = <?php echo ($id); ?>,
movieInfo.hall_id = 12,
movieInfo.movie_title = '<?php echo ($title); ?>',
movieInfo.movie_type = 'teleplay',
movieInfo.vod_url = '<?php echo ($readurl); ?>',
movieInfo.vod_type = 'flv',
movieInfo.pre_url = '<?php echo ($palyurl_first); ?>',
movieInfo.play_type = 'vod',
movieInfo.has_items_for_pay='0',
<?php if($serial == 0): ?>movieInfo.version='1',<?php else: ?>movieInfo.version='',<?php endif; ?>
movieInfo.total_number=<?php echo ($count); ?>,
movieInfo._rating = <?php echo ($score); ?>,
movieInfo.rating_ = 6,
movieInfo.rating_num = '<?php echo ($scoreer); ?>人评'
</script>
<script type="text/javascript" src="/js/content_main.js"></script>
</head>
<body>
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
	<div class="bannerbox" style="margin-top:10px;">
			<?php echo get_cms_ads('detail_banner');?>
	</div>
	<div class="navigation">
		当前位置: <?php echo ($navtitle); ?>
	</div>
    <div class="main_detail">
		<div class="moviedteail H258">
			<div class="moviedteail_img">
				<a href="<?php echo ($playurl_first); ?>" target="_blank" title="<?php echo ($title); ?>" class="pic"><img src="<?php echo ($picurl); ?>" title="《<?php echo ($title); ?>》百度影音" alt="《<?php echo ($title); ?>》百度影音" /></a>
			</div>
			<div class="moviedteail_tt">
				<h1><a href="<?php echo ($readurl); ?>" title="《<?php echo ($title); ?>》百度影音"><?php echo ($title); ?></a></h1><span><span class="intro"><?php if(!empty($intro)): ?><?php echo ($intro); ?><?php endif; ?> <?php if(in_array(($cid), explode(',',"3,4,15,16,17,18,19,20,21,22"))): ?><?php if(!empty($serial)): ?>连载至<?php echo ($serial); ?><?php if(($pid)  ==  "4"): ?>期<?php else: ?>集<?php endif; ?><?php endif; ?></span><?php endif; ?></span>
            </div>
			<?php if(c(url_html) == 1): ?><div class="moviedteail_score" id="Scorenum" class="Scorenum"><STRONG><?php echo ($score); ?></STRONG>(<span id="Scoreer" class="Scoreer"><?php echo ($scoreer); ?></span>人评)</div>
			<?php else: ?>
			<div class="moviedteail_score" id="Scorenum"><STRONG><?php echo ($score); ?></STRONG>(<span id="Scoreer"><?php echo ($scoreer); ?></span>人评)</div><?php endif; ?>
			<ul class="moviedteail_list">
				<li>标签:<?php if(!empty($area)): ?><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/area/<?php echo (($area)?($area):'未知'); ?>"><?php echo (($area)?($area):'未知'); ?></a><?php else: ?><?php endif; ?><a href="<?php echo ($showurl); ?>" target="_blank" title="<?php echo ($cname); ?>"><?php echo ($cname); ?></a></li>
                <li>主演:<?php if(!empty($actor)): ?><?php echo (get_actor_url($actor)); ?><?php else: ?>未知<?php endif; ?></li>
                <li class="moviedteail_list_short">导演:<?php if(!empty($director)): ?><?php echo (get_actor_url($director)); ?><?php else: ?><span>未知</span><?php endif; ?></li>
                <li class="moviedteail_list_short">年份:<?php if(!empty($year)): ?><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/year/<?php echo (($year)?($year):'未知'); ?>"><?php echo ($year); ?></a><?php else: ?><span>未知</span><?php endif; ?></li>
				<li>类型:<span><a href="<?php echo ($showurl); ?>" target="_blank" title="<?php echo ($cname); ?>"><?php echo ($cname); ?></a></span></li>
                <li class="moviedteail_list_short">语言:<span><?php echo (($language)?($language):'未知'); ?></span></li>
				<li class="moviedteail_list_short">来源:<span>百度影音</span></li>
				<li>更新:<span><?php echo (get_color_date('Y-m-d',$addtime)); ?></span></li>
			</ul>
			<p class="moviedteail_p"><?php echo (get_replace_html($content,0,106,'utf-8',true)); ?><a href="#box_4" title="<?php echo ($title); ?>更多详情">更多详情</a></p>
			<div class="moviedteail_btn">
				<div id="PlayBtn" class="moviedteail_btn_OL"><a href="<?php echo ($playurl_first); ?>" title="《<?php echo ($title); ?>》百度影音在线观看">在线观看</a></div><div class="moviedteail_btn_dl"><a onclick="show_box('online',1,2);" title="<?php echo ($title); ?>立即下载">立即下载</a></div>
			</div>
			<div class="sharebox">
				<div class="sharebox_con"><?php echo get_cms_ads('baidu_share');?></div>
			</div><!--sharebox  END-->
			<div class="moviedetail_ad"><?php echo get_cms_ads('250250');?></div>
		</div><!--moviedteail 详情 END-->
		
	</div><!--mainend-->
	<div class="bannerbox">
			<?php echo get_cms_ads('banner');?>
	</div>
	<div class="main">
		<div class="box" id="box_online_intro">
			<div class="box_tt box_tt_tab">
				<h2 class="on" id="nav_online_0" onclick="show_box('online',0,2);">在线观看</h2>
				<h2 id="nav_online_1" onclick="show_box('online',1,2);">免费下载</h2>
			</div>
			<div class="box_con" style="padding:0 10px;" id="box_online_0">
				<div id="download_tab" class="download_tab download_tab_on"><span id="select_p"><strong><?php echo ($title); ?></strong> 在线观看</span><span id="down_tip">温馨提示：需要安装 <a href="<?php echo ($webpath); ?>player_down.php" title="百度影音播放器">百度影音播放器</a> 观看影片</span></div>
				<?php if(($pid != 1) and ($serial != 0)): ?><div class="onlinetips">
					<p class="latest_update"></p>
                <div class="dybox" sizcache="4" sizset="19"><a class=dybtn>更新通知我</a></div>
					<div id="option_resolution_language" class="option_resolution">
						<div class="option_resolution_tt"></div>
						<ul class="option_resolution_drop"></ul>
					</div>
				</div><!--onlinetips  END--><?php endif; ?>
				<?php if(($count)  >  "30"): ?><div class="control">
					<div class="fenjilist"><span id="fenji_tab"></span><a href="javascript:void(0);" class="fenjilist_ctrl" onclick="kkContent.fjList.reverseOrder();">反向排序</a></div>
					<div class="history" id="watch_history"></div>
				</div><!--control  END--><?php endif; ?>                
				<script>var fenji_json=[<?php if(is_array($playlist)): $i = 0; $__LIST__ = $playlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 )?><?php if(($i)  >  "1"): ?>,<?php endif; ?>"<?php echo ($i); ?>"<?php endforeach; endif; else: echo "" ;endif; ?>]
var latest_json=[["<?php echo ($count); ?>","第<?php echo ($serial); ?><?php if(($serial > 0) and ($cid == 4) and ($pid != 1)): ?>期<?php else: ?><?php if(($serial)  >  "0"): ?>集<?php endif; ?><?php endif; ?>","<?php echo ($playurl_last); ?>"]];var latest_number=<?php echo ($count); ?>;</script>
<div id="fenji_0_asc" class="fenji_div" style="display:block;">
<ul class="txtlist">
<?php if(is_array($playlist)): $i = 0; $__LIST__ = $playlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 )?><li><a href="<?php echo ($video["playurl"]); ?>"><?php echo ($video["playname"]); ?></a><h4></h4></li><?php if(is_int($i/30)): ?></ul>
</div><div id="fenji_<?php echo ($i/30); ?>_asc" class="fenji_div"><ul class="txtlist"><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
</ul></div>
<div id="fenji_0_desc" class="fenji_div">
<ul class="txtlist">
<?php krsort($playlist); ?>
<?php if(is_array($playlist)): $i = 0; $__LIST__ = $playlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 )?><li><a href="<?php echo ($video["playurl"]); ?>"><?php echo ($video["playname"]); ?></a><h4></h4></li><?php if(is_int($i/30)): ?></ul>
</div><div id="fenji_<?php echo ($i/30); ?>_desc" class="fenji_div"><ul class="txtlist"><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
</ul></div>
				<?php if(($pid != 1) and ($count > 30)): ?><div class="onlinetips onlinetips_bottom">
					<?php if(($serial)  !=  "0"): ?><p class="latest_update"></p><?php endif; ?>
					<div class="fenjilist" id="fenji_turn"></div>
				</div><!--onlinetips  END--><?php endif; ?>
				<script>kkContent.fjList.init();</script>
			</div>
			<div class="box_con box_con_download" id="box_online_1" style="display:none;">
			<div id="download_tab" class="download_tab download_tab_on"><span id="select_p"><strong><?php echo ($title); ?></strong> 免费下载</span><span id="down_tip">以下资源需要安装 <a href="<?php echo ($webpath); ?>xunlei_down.php" title="迅雷下载">迅雷</a>，可以直接点下面的链接下载或用迅雷看看播放</span></div>
			<div id="box_down_0">
			<div class="scrollbox scrollbox_show"><div id="scrollcontain_0" class="scrollcontain">
			<table width="100%" border="0" cellspacing="1" cellpadding="5">
			<script type="text/javascript" src="<?php echo ($webpath); ?>js/xmpdown.js"></script>						
			<?php if(is_array($downlist)): $i = 0; $__LIST__ = $downlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 )?><tr <?php if($i%2 == 0): ?>class="odd"<?php endif; ?>>
			<td width='85%' class='td_thunder'><input type='checkbox' name='checkbox' value='<?php echo ($video["downpath"]); ?>'/><a href='javascript:void(0)' onclick='return OnDownloadClick_Simple(this,1)' oncontextmenu='return ThunderNetwork_SetHref(this)'><?php echo ($video["downname"]); ?></a><td style='display:none'></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</table>
			</div></div>
			<table width="100%" border="0" cellspacing="1" cellpadding="5"><tr><td width=80><input type="checkbox" name="qx" id="qx" /><label for="qx">全选/反选</label></td><td><input type="submit" name="button" id="button" value="下载选中的文件" class="dl_all" onclick="zhongxz(1)"/>
			<script type="text/javascript">loadinge(1)</script></td></tr></table>
			</div>
			</div>
		</div><!--box  END-->
		<?php if($pid == 1): ?><div class="adbox">
			<?php echo get_cms_ads('detail_text');?>
		</div><?php endif; ?>
		<div class="box" id="box_3">
			<div class="box_tt box_tt_tab">
				<h2 class="on">相关推荐</h2>
			</div>
            <!--相关推荐-->
            	<div class="box_con">
            	<div class="feature">
					<ul class="movList">
						<?php $tag['name'] = 'video';$tag['cid'] = ''.$cid.'';$tag['limit'] = '5';$tag['order'] = 'weekhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank" class="pic" target="_blank"><img src="<?php echo ($video["picurlsmall"]); ?>" alt="<?php echo ($video["title"]); ?>" title="<?php echo ($video["title"]); ?>" /></a><p class="title"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo get_color_title(get_replace_html($video['title'],0,10),$video['color']);?></a></p></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
					</ul>
					<ul class="movList_txt">
						<?php $tag['name'] = 'video';$tag['cid'] = ''.$cid.'';$tag['limit'] = '6,20';$tag['order'] = 'weekhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li><span><?php if(($i)  >  "9"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?>.</span><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo get_color_title(get_replace_html($video['title'],0,8),$video['color']);?></a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
					</ul>
				</div>
				</div>
       </div><!--box  END-->
	   <div class="box" id="box_4">
			<div class="box_tt box_tt_tab">
				<h2 class="on">剧情介绍</h2>
			</div>
            <!--剧情简介-->
            	<div class="box_con">
            	<div class="feature">
					<strong><?php echo ($title); ?>剧情介绍</strong>
					<p><?php echo (get_replace_html(htmlspecialchars_decode($content),0,500,'utf-8',true)); ?></p>
					<p>温馨提示：您正在观看的《<?php echo ($title); ?>》的剧情介绍来自于[www.ziyuan5.com-电影资源网]，如果您喜欢本站，请推荐给您的朋友，谢谢您的支持!最后更新：<?php echo (get_color_date('Y年m月d日',$addtime)); ?></p>
				</div>
				</div>
       </div><!--box  END-->
<?php if(C('user_comment') == 1): ?><div>
	<div class="box_comment box_comment_input" id="inputCbox">
    <div class="box_comment_tt">
    <h3>影片评论</h3>
    <div class="box_comment_more" id="sendCm_more">游客可直接发表 (共<span id="comment_count">0</span>条评论)</div>
	</div>
    <div class="commenttip" id="successBox" style="display:none"></div><!--commenttip  END-->
    <div class="box_con" id="List_sendCm_0">
        <div class="inputcontain">
        <textarea name="content" id="comment_content" rows="5" onfocus="ss=setInterval(sp,200)" onblur="clearInterval(ss)" maxlength="200" class="textarea"></textarea>
        <input name="cid" id="cid" value="<?php echo (get_pid($cid)); ?>" type="hidden"/>
		<div class="textarea_bar">
        <span class="textarea_bar_error" id="errorS"></span><span class="textarea_bar_tip" id="tipS"><?php echo get_cms_ads('detail_c_tip');?></span>
        <input id="comment_button" onclick="CommentPost();" class="textarea_bar_btn" type="button" value="发表评论" onmouseover="this.className='textarea_bar_btn textarea_bar_btn_hover'" onmouseout="this.className='textarea_bar_btn'" style="border:none;"/>
        <p>还可以输入<span id="span">200</span>个字</p>
        </div>
        </div><!--inputcontain 输入 END-->
    </div>
    <div class="box_shortcomment" id="outerBoxS">
			<div class="box_tt">
				<h3><?php echo ($title); ?>的评论</h3><span class="viewcomment">全部<span id="comment_count2">0</span>条</span>
                <div class="tabcomment">
					<a id="Tab_shortbox_0" title="最新评论" class="on" onclick="cmSwitch('shortbox',0,2,'on','')">最新评论</a><span>|</span><a id="Tab_shortbox_1" title="热门评论" onclick="cmSwitch('shortbox',1,2,'on','')">热门评论</a>
				</div>
                <a href="javascript://" onclick="document.getElementById('comment_content').focus();" title="我也要发评论" class="postcomment">我也要说两句</a>
            </div>
			<div class="box_con" id="List_shortbox_0">
            <div id="Comments">
			<ul class="commentdetail commentdetail_short" id="commentStextBox_update">
			<?php echo (get_comment($id,30)); ?>
			</ul>
			</div>
            </div>
            <div class="box_con" id="List_shortbox_1" style="display:none;">
            <div id="Comments2"></div>
            </div>
		</div><!--box  END-->
<!--box  END-->
    </div>
</div><?php endif; ?>
</div><!--main  END-->
<div class="side">
    <div class="box box_tag H258">
	<div class="box_tt box_tt_tab">
		<h2 id="nav_tag_0" onclick="show_box('tag', 0, 4);">电影</h2>
		<h2 id="nav_tag_1" onclick="show_box('tag', 1, 4);">电视剧</h2>
		<h2 id="nav_tag_2" onclick="show_box('tag', 2, 4);">动漫</h2>
		<h2 id="nav_tag_3" onclick="show_box('tag', 3, 4);">综艺</h2>
	</div>
    <div class="box_con" id="box_tag_0">
    <dl class="taglist">
		<dt>按类型</dt><?php $tag['name'] = 'menu';$tag['ids'] = '1'; $__LIST__ = get_tag_gxmenu($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): ++$i;$mod = ($i % 2 );?><?php if(is_array($menu["son"])): $i = 0; $__LIST__ = $menu["son"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): ++$i;$mod = ($i % 2 )?><dd><a href="<?php echo ($menu["showurl"]); ?>" title="<?php echo ($menu["cname"]); ?>"><?php echo ($menu["cname"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
    </dl><dl class="taglist">
		<dt>按地区</dt><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/area/内地" title="内地">内地</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/area/香港" title="香港">香港</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/area/" title="台湾">台湾</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/area/韩国" title="韩国">韩国</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/area/日本" title="日本">日本</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/area/欧美" title="欧美">欧美</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/area/其它" title="其它">其它</a></dd>
    </dl><dl class="taglist">
		<dt>按年份</dt><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/year/2011" title="2011">2011</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/year/2010" title="2010">2010</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/year/2009" title="2009">2009</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/year/2008" title="2008">2008</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/year/2007" title="2007">2007</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/year/2006" title="2006">2006</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/year/2005" title="2005">2005</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/year/2004" title="2004">2004</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/year/2003" title="2003">2003</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1/year/2002" title="2002">2002</a></dd>
    </dl><p class="more"><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/1" target="_blank" title="更多电影分类">更多电影分类&gt;&gt;</a></p>
	</div>
    <div class="box_con" id="box_tag_1"><dl class="taglist">
		<dt>按类型</dt><?php $tag['name'] = 'menu';$tag['ids'] = '2'; $__LIST__ = get_tag_gxmenu($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): ++$i;$mod = ($i % 2 );?><?php if(is_array($menu["son"])): $i = 0; $__LIST__ = $menu["son"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): ++$i;$mod = ($i % 2 )?><dd><a href="<?php echo ($menu["showurl"]); ?>" title="<?php echo ($menu["cname"]); ?>"><?php echo ($menu["cname"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
    </dl><dl class="taglist">
		<dt>按年份</dt><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/year/2011" title="2011">2011</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/year/2010" title="2010">2010</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/year/2009" title="2009">2009</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/year/2008" title="2008">2008</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/year/2007" title="2007">2007</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/year/2006" title="2006">2006</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/year/2005" title="2005">2005</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/year/2004" title="2004">2004</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/year/2003" title="2003">2003</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2/year/2002" title="2002">2002</a></dd>
    </dl><dl class="taglist letter_dd">
		<dt>按拼音</dt><?php echo get_letter_url($cid,$letter,'video','<dd>','</dd>');?>
    </dl><p class="more"><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/2" target="_blank" title="更多动漫分类">更多电视剧分类&gt;&gt;</a></p>
	</div>
    <div class="box_con" id="box_tag_2"><dl class="taglist">
		<dt>按地区</dt><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/3/area/内地" title="内地">内地</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/3/area/香港" title="香港">香港</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/3/area/" title="台湾">台湾</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/3/area/韩国" title="韩国">韩国</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/3/area/日本" title="日本">日本</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/3/area/欧美" title="欧美">欧美</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/3/area/其它" title="其它">其它</a></dd>
    </dl><dl class="taglist">
		<dt>按年份</dt><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/3/year/2011" title="2011">2011</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/3/year/2010" title="2010">2010</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/3/year/2009" title="2009">2009</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/3/year/2008" title="2008">2008</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/3/year/2007" title="2007">2007</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/3/year/2006" title="2006">2006</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/3/year/2005" title="2005">2005</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/3/year/2004" title="2004">2004</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/3/year/2003" title="2003">2003</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/3/year/2002" title="2002">2002</a></dd>
    </dl><dl class="taglist letter_dd">
		<dt>按拼音</dt><?php echo get_letter_url($cid,$letter,'video','<dd>','</dd>');?>
    </dl><p class="more"><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/3" target="_blank" title="更多动漫分类">更多动漫分类&gt;&gt;</a></p>
	</div>
    <div class="box_con" id="box_tag_3"><dl class="taglist">
		<dt>按地区</dt><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/4/area/内地" title="内地">内地</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/4/area/香港" title="香港">香港</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/4/area/" title="台湾">台湾</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/4/area/韩国" title="韩国">韩国</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/4/area/日本" title="日本">日本</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/4/area/欧美" title="欧美">欧美</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/4/area/其它" title="其它">其它</a></dd>
    </dl><dl class="taglist">
		<dt>按年份</dt><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/4/year/2011" title="2011">2011</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/4/year/2010" title="2010">2010</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/4/year/2009" title="2009">2009</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/4/year/2008" title="2008">2008</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/4/year/2007" title="2007">2007</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/4/year/2006" title="2006">2006</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/4/year/2005" title="2005">2005</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/4/year/2004" title="2004">2004</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/4/year/2003" title="2003">2003</a></dd><dd><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/4/year/2002" title="2002">2002</a></dd>
    </dl><dl class="taglist letter_dd">
		<dt>按拼音</dt><?php echo get_letter_url($cid,$letter,'video','<dd>','</dd>');?>
    </dl><p class="more"><a href="<?php echo ($webpath); ?>index.php?s=video/lists/reset/1/id/4" target="_blank" title="更多动漫分类">更多综艺分类&gt;&gt;</a></p>
	</div>
    </div>
	<div class="box">
			<div class="box_tt">
				<h2><?php if(($pid)  ==  "1"): ?>电影<?php endif; ?><?php if(($pid)  ==  "2"): ?>电视剧<?php endif; ?><?php if(($cid)  ==  "3"): ?>动漫<?php endif; ?><?php if(($cid)  ==  "4"): ?>综艺<?php endif; ?>热播榜</h2>
			</div>
			<div class="box_con">
				<ol class="ranklist ranklist_dsj">
                <?php if(($pid)  !=  "0"): ?><?php $tag['name'] = 'video';$tag['cid'] = ''.$pid.'';$tag['limit'] = '10';$tag['order'] = 'hits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><em><?php if(($i)  >  "9"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?>.</em><p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo ($video["title"]); ?></a><strong class="type"><?php if($video["serial"] > 0): ?>至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(($pid)  ==  "1"): ?><?php echo (($video["intro"])?($video["intro"]):'DVD'); ?><?php endif; ?><?php if(($pid)  ==  "2"): ?>完结<?php endif; ?><?php endif; ?></strong></p><span class="score"><?php echo ($video["score"]); ?></span><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看/下载" class="info" target="_blank"><?php echo ($video["title"]); ?>在线观看/下载</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?><?php endif; ?>
				<?php if(($cid)  ==  "3"): ?><?php $tag['name'] = 'video';$tag['cid'] = '3';$tag['limit'] = '10';$tag['order'] = 'hits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><em><?php if(($i)  >  "9"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?>.</em><p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo ($video["title"]); ?></a><strong class="type"><?php if($video["serial"] > 0): ?>至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?></strong></p><span class="score"><?php echo ($video["score"]); ?></span><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看/下载" class="info" target="_blank"><?php echo ($video["title"]); ?>在线观看/下载</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?><?php endif; ?>
				<?php if(($cid)  ==  "4"): ?><?php $tag['name'] = 'video';$tag['cid'] = '4';$tag['limit'] = '10';$tag['order'] = 'hits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li><?php endif; ?><em><?php if(($i)  >  "9"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?>.</em><p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo ($video["title"]); ?></a><strong class="type"><?php if($video["serial"] > 0): ?>至<?php echo ($video["serial"]); ?>集<?php else: ?>完结<?php endif; ?></strong></p><span class="score"><?php echo ($video["score"]); ?></span><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>在线观看/下载" class="info" target="_blank"><?php echo ($video["title"]); ?>在线观看/下载</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?><?php endif; ?>
				</ol>
			</div>
		</div><!--box  END-->
		<div class="box" id="box_movie_caini_xihuan">
			<div class="box_tt">
				<h2>猜您喜欢看</h2>
			</div>
			<div class="box_con" id="box_con_caini_xihuan"><ul class="movList_cai"><?php $tag['name'] = 'video';$tag['cid'] = ''.$cid.'';$tag['limit'] = '4';$tag['order'] = 'dayhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li><a class="pic_cai" title="<?php echo ($video["title"]); ?>" href="<?php echo ($video["readurl"]); ?>"><img title="<?php echo ($video["title"]); ?>" alt="<?php echo ($video["title"]); ?>" src="<?php echo ($video["picurlsmall"]); ?>"></a><p class="title_cai"><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>"><?php echo get_color_title(get_replace_html($video['title'],0,8),$video['color']);?></a></p><p><?php echo (get_replace_html($video["actor"],0,8)); ?></p></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
			</ul></div>
		</div><!--box  END-->
</div>
<script>show_box('tag', <?php echo (get_pid_1($cid)); ?>, 4);</script>
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
<?php echo get_cms_ads('detail_yx_dl');?>
<script src="<?php echo ($webpath); ?>js/history_lazy.min.js" charset="utf-8" ></script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/history.js"></script>
</body>
</html>