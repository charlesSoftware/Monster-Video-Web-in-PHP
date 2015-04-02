<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title><?php echo ($title); ?>-<?php echo ($playname); ?>-百度影音高清在线观看/免费下载-<?php echo ($webname); ?></title>
<meta name="keywords" content="《<?php echo ($title); ?>》,<?php echo ($title); ?>-<?php echo ($playname); ?>在线观看/免费下载,<?php echo ($title); ?>百度影音,<?php echo ($title); ?>高清版">
<meta name="description" content="《<?php echo ($title); ?>》-<?php echo ($playname); ?>在线播放/免费下载,<?php echo (get_replace_html($content,0,100,'utf-8',true)); ?>">
<link rel='stylesheet' type='text/css' href='<?php echo ($webpath); ?>css/play.css'>
<link rel='stylesheet' type='text/css' href='<?php echo ($webpath); ?>css/header.css'>
<script language="javascript">var SitePath='<?php echo ($webpath); ?>';var SiteMid='<?php echo ($mid); ?>';var SiteCid='<?php echo ($cid); ?>';var SitePid='<?php echo ($pid); ?>';var SiteId='<?php echo ($id); ?>';</script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/jquery.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/system.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>js/template.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var name='<?php echo ($title); ?>';
	var num='<?php echo ($playname); ?>';
	var url=window.location.href;
	CheckAdd(name,'gxhis',url,num)
});
</script>
</head>
<body class="widemode">
<div class="topchannel">
	<div class="topchannel_con">
		<a href="<?php echo ($webpath); ?>" title="<?php echo ($webname); ?>" class="logo" target="_blank"><img src="<?php echo ($webpath); ?>css/images/logo.png" alt="<?php echo ($webname); ?>" title="<?php echo ($webname); ?>" /></a>
		<ul>
			<li class="nobg"><a href="<?php echo ($webpath); ?>">首页</a></li>
			<?php $tag['name'] = 'menu';$tag['ids'] = '1,2,3,4,7,22'; $__LIST__ = get_tag_gxmenu($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): ++$i;$mod = ($i % 2 );?><li><a href="<?php echo ($menu["showurl"]); ?>" ><?php echo ($menu["cname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
			<li><a href="<?php echo ($topurl); ?>">排行</a></li>
			<li><a href="<?php echo ($specialurl); ?>">专题</a></li>
			<li><a href="<?php echo ($webpath); ?>comment/">影评</a></li>
		</ul>
		<div class="topsearch">
			<form name="search" id="search" action="<?php echo ($webpath); ?>index.php?s=video/search" class="search" target="_blank" method="post">
				<input type="text"  value="输入影片名或主演名" id="wd" name="wd" autocomplete="off" maxlength="26" style="color:#D8D8D8" />
				<button type="submit" id="_sbtn">搜索</button>
			</form>
		</div>
		<div class="toplogon" id="topLogon"><a href="javascript:void(0)" title="" target="_self" id="head_history">我看过的</a></div>
	</div>
</div><!--topchannel 头部 END-->
<div class="">
	<div class="player_top">
		<div class="title">
			<div class="channel"><?php if(($pid)  ==  "1"): ?><a href="<?php echo get_channel_name(1,'showurl');?>" title="电影" target="_blank">电影</a><?php endif; ?><?php if(($pid)  ==  "2"): ?><a href="<?php echo get_channel_name(2,'showurl');?>" title="电视剧" target="_blank">电视剧</a><?php endif; ?><?php if(($cid)  ==  "3"): ?><a href="<?php echo get_channel_name(3,'showurl');?>" title="动漫" target="_blank">动漫</a><?php endif; ?><?php if(($cid)  ==  "4"): ?><a href="<?php echo get_channel_name(4,'showurl');?>" title="综艺" target="_blank">综艺</a><?php endif; ?>&gt;</div><h1 id="movieTitle"><a href="<?php echo ($readurl); ?>" target="_blank"><?php echo ($title); ?></a></h1><span><?php echo ($playname); ?></span><?php if(!empty($downurl)): ?><span id="info_download"><a href="#diversityDiv">免费下载</a></span><?php endif; ?>
			</div>
			<div class="topbanner"><?php echo get_cms_ads('topbanner');?></div>
	</div>
	<div class="banner" style="margin:0 auto;"><?php echo get_cms_ads('banner');?></div>
	<div class="player_widebg" id="player_wide_bg">
				<div class="player" id="player_container">
				<!--inputcontain 
				<div class="play_left"><?php echo get_cms_ads('play-left');?></div>
				输入 END-->
				<div class="player_con"><?php echo ($player); ?></div>
				<!--inputcontain
				<div class="play_right"><?php echo get_cms_ads('play-right');?></div>
				输入 END-->
				</div>
				
	</div>
</div>
<div class="adbox" style="width:960px;">
			<?php echo get_cms_ads('play_text');?>
</div>
<div class="diversity diversity_white" id="diversityDiv">
	<?php if(($serial)  >  "0"): ?><div id="dyTips" class="dybox_tips" style="display: none; "><strong>温馨提示:</strong><p>您确定要取消订阅《<?php echo ($title); ?>》吗?</p><div class="dybox_tips_btn"><a href="javascript:void(0)" onclick="DYData.doCancleDY();return false;">确定</a><a href="javascript:void(0)" onclick="DYData.$display('dyTips','none');">取消</a></div></div>
	<div id="dyCancle" class="dybox dybox_2" style="display: none;"><span>已订阅</span><a href="javascript:void(0)" onclick="DYData.$display('dyTips','');return false;">取消订阅</a>|<a href="" target="_blank">管理我的订阅</a></div>
	<div id="dyStat" class="dybox" style="display: none;"><span>正在处理中...</span></div>
	<div id="dySubmit" class="dybox" style=""><a class="dybtn" href="javascript:void(0)" onclick="DYData.doSubmitDY();return false;">更新通知我</a>
    	<span>(您订阅的影视,最新更新将会第一时间通知您)</span>
    </div><?php endif; ?>
	<dl id="dl_subList" class="diversity_white_dl diversity_white_dl_dsj">
    <?php if(($serial)  >  "0"): ?><dt style="display:;" id="dt_fenji">
    <span>更新至第<?php echo ($serial); ?>集</span>
	</dt><?php endif; ?>
	<div class="play_bdlink"><?php echo get_cms_ads('468_15');?></div>
    <dd><ul id="ul_subLabel" class="diversity_white_ul">
    <?php if(is_array($playlist)): $i = 0; $__LIST__ = $playlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 )?><li id="subli_<?php echo ($i); ?>" <?php if(($video["playname"])  ==  $playname): ?>class="selected"<?php endif; ?>><a href="<?php echo ($video["playurl"]); ?>" id="subhref_4" title="<?php echo ($video["playname"]); ?>"><?php echo ($video["playname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul></dd>
    </dl>
</div>
<?php if(!empty($downurl)): ?><div class="wrapper">
		<div class="box" style="padding:10px 20px;margin:10px auto 0 auto;">
			<div id="download_tab" class="download_tab download_tab_on"><span id="select_p"><strong><?php echo ($title); ?></strong> 免费下载</span><span id="down_tip">以下资源需要安装 <a href="<?php echo ($webpath); ?>xunlei_down.php" title="迅雷下载">迅雷</a>，可以直接点下面的链接下载或用迅雷看看播放</span></div>
			<div id="box_down_0">
			<div class="scrollbox scrollbox_show"><div id="scrollcontain_0" class="scrollcontain">
			<table width="100%" border="0" cellspacing="1" cellpadding="5">
			<script type="text/javascript" src="<?php echo ($webpath); ?>js/xmpdown.js"></script><?php if(is_array($downlist)): $i = 0; $__LIST__ = $downlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 )?><tr <?php if($i%2 == 0): ?>class="odd"<?php endif; ?>>
			<td class='td_thunder'><input type='checkbox' name='checkbox' value='<?php echo ($video["downpath"]); ?>'/><a href='javascript:void(0)' onclick='return OnDownloadClick_Simple(this,1)' oncontextmenu='return ThunderNetwork_SetHref(this)'><?php echo ($video["downname"]); ?></a><td style='display:none'></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</table>
			</div>
			</div>
			<table width="100%" border="0" cellspacing="1" cellpadding="5"><tr><td width=80><input type="checkbox" name="qx" id="qx" /><label for="qx">全选/反选</label></td><td><input type="submit" name="button" id="button" value="下载选中的文件" class="dl_all" onclick="zhongxz(1)"/>
			<script type="text/javascript">loadinge(1)</script></td></tr></table>
			</div>
		</div>
</div><?php endif; ?>
<div class="wrapper">
		<div class="main">		
			<div class="box">
				<div class="box_tt box_tt_tab2">
					<h3><a id="tab_container_0" onmouseover="abSwitch('container',0,3,'on','')" target="_self" class="on">可能还喜欢</a></h3>
				</div>
				<div class="box_con" id="tabboxContent">
					<div class="movList" id="List_container_0">
						<div id="turn_x_marginId">
							<ul class="imglist">
                            <span id="hot_video" href="<?php echo ($webpath); ?>index.php/my/show/id/hot_video/cid/<?php echo ($cid); ?>/limit/6">Loading...</span>
                            </ul><span class="bl"></span><span class="br"></span>
 						</div>
					</div>
				</div>
			</div>
			<div class="box">
<script>
function spreadD()
{
	try{
		var box=document.getElementById("djdzk_box");
		if(box.style.height=="215px")
		{
			document.getElementById("spreadButton").innerHTML="收起";
			document.getElementById("spreadButton").className="act act_close"
			document.getElementById("spreadButtonUnder").style.display="";
			try{
				for(var t=0;t<15;t++){
					var obj=document.getElementById("djdzk_pic_"+t);
					if(obj.src!=obj.getAttribute('fsrc'))
						obj.src=obj.getAttribute('fsrc')
				}
			}catch(e){}
			box.style.height="430px";}else{
			document.getElementById("spreadButton").innerHTML="查看更多";
			document.getElementById("spreadButton").className="act"
			document.getElementById("spreadButtonUnder").style.display="none";
			box.style.height="215px";
		}
	}catch(e){}}
</script>
<div class="box_tt djdzk"><h3>大家都在看</h3><a id="spreadButton" class="act" onclick="spreadD();return false">查看更多</a></div>
	<div class="box_con">
	<ul id="djdzk_box" class="movList movList_111x66" style="height:215px">
    <span id="everyone_video" href="<?php echo ($webpath); ?>index.php/my/show/id/everyone_video/ids/1,2,3,4/limit/10"/>Loading...</span>
    </ul>
<div class="box_tt"><a id="spreadButtonUnder" class="act act_close" onclick="spreadD();return false" style="display:none">收起</a></div>
</div>
			</div>
			<a name="vod_comment" id="vod_comment" ></a>
			<div>
				<div class="box_comment box_comment_input" id="inputCbox">
	<div class="box_comment_tt">
		<h3>影片评论</h3>
		<div class="box_comment_more" id="sendCm_more">(<a href="<?php echo ($webpath); ?>index.php/Comment/Show/wd/<?php echo ($id); ?>" target="_blank">共<span id="comment_count"><?php echo (get_comment_count($id)); ?></span>条评论</a>)</div>
	</div>
	<div class="commenttip" id="successBox" style="display:none">
	</div><!--commenttip  END--><div class="box_con" id="List_sendCm_0">
		<div class="inputcontain">
			<textarea name="content" id="comment_content" rows="5" onfocus="ss=setInterval(sp,200)" onblur="clearInterval(ss)" maxlength="200" class="textarea"></textarea>
			<div class="textarea_bar">
				<span class="textarea_bar_error" id="errorS"></span><span class="textarea_bar_tip" id="tipS"></span>
				<input id="comment_button" onclick="CommentPost();" class="textarea_bar_btn" type="button" value="发表评论" onmouseover="this.className='textarea_bar_btn textarea_bar_btn_hover'" onmouseout="this.className='textarea_bar_btn'" style="border:none;"/>
				<p id="tipsS">还可以输入<span id="span">200</span>个字</p>
			</div>
		</div><!--inputcontain 输入 END-->
		</form>
	</div>
	<div class="box_con" style="display:none" id="List_sendCm_1">
	</div>
		<div class="box_shortcomment" id="outerBoxS">
			<div class="box_tt">
				<h3><?php echo ($title); ?>的评论</h3><span class="viewcomment"><a href="<?php echo ($webpath); ?>index.php/Comment/Show/wd/<?php echo ($id); ?>" target="_blank">全部<span id="comment_count2"><?php echo (get_comment_count($id)); ?></span>条</a></span>
				<div class="tabcomment">
					<a id="Tab_shortbox_0" title="最新评论" class="on" onclick="cmSwitch('shortbox',0,2,'on','')">最新评论</a><span>|</span><a id="Tab_shortbox_1" title="热门评论" onclick="cmSwitch('shortbox',1,2,'on','')">热门评论</a>
				</div>
				<a href="javascript://" onclick="document.getElementById('comment_content').focus();" title="我也要发评论" class="postcomment">我也要说两句</a>
			</div>
			<div class="box_con" id="List_shortbox_0">
            <div id="Comments">
			<ul class="commentdetail commentdetail_short" id="commentStextBox_update">
			<?php echo (get_comment($id,30,'down desc')); ?>
			</ul>
			</div>
            </div>
			<div class="box_con" id="List_shortbox_1" style="display:none;">
            <div id="Comments2">
			<ul class="commentdetail commentdetail_short" id="commentStextBox_update">
			<?php echo (get_comment($id,30,'up desc')); ?>
			</ul>
			</div>
            </div>
		</div><!--box  END-->
</div>
			</div><!--box  END-->
		</div>
		<div class="side">
			<div class="box boxside">
			<div class="box_tt nobg"></div>
			<div class="starbox">
               <div class="play-rating">
					<div id="Scorebox">
    <?php if(C(url_html) == 1 && C(url_html_play) > 0): ?><span id="Score" class="Score"><?php echo ($score); ?></span> <span id="Scorenum" class="Scorenum"><?php echo ($score); ?></span> (<span id="Scoreer" class="Scoreer"><?php echo ($scoreer); ?></span>人评价) 
    <?php else: ?>
    <span id="Score"><?php echo ($score); ?></span> <span id="Scorenum"><?php echo ($score); ?></span> (<span id="Scoreer"><?php echo ($scoreer); ?></span>人评价)<?php endif; ?>   
</div>
               </div><!--ratebox  END-->
			</div><!--starbox end-->
				<div class="sharebox">
					<div class="sharebox_div">
						<span>一键分享:</span>
						<!-- Button BEGIN -->
						<div id="ckepop">
							<a target="_blank" href="http://share.v.t.qq.com/index.php?c=share&a=index&url=<?php echo http_url();?>&appkey=801082287&pic=&assname=ziyuan5&title=<?php echo (urlencode($title)); ?>-<?php echo urlencode('免费在线观看');?>"><img src="/views/images/home/qq_t.png" /></a>
                            <a target="_blank" href="http://service.t.sina.com.cn/share/share.php?url=<?php echo http_url();?>&appkey=3994589670&title=<?php echo (urlencode($title)); ?>-<?php echo urlencode('免费在线观看');?>&pic=&ralateUid=2519401067&searchPic=true"><img src="/views/images/home/sina.gif" /></a>
                            <a target="_blank" href="http://share.renren.com/share/buttonshare.do?link=<?php echo http_url();?>&title=<?php echo (urlencode($title)); ?>-<?php echo urlencode('免费在线观看');?>"><img src="/views/images/home/share-tinybtn.png" /></a>
                            <a target="_blank" href="http://www.kaixin001.com/repaste/share.php?rurl=<?php echo http_url();?>&rcontent=<?php echo (urlencode($title)); ?>-<?php echo urlencode('免费在线观看');?><?php echo http_url();?>&rtitle=<?php echo (urlencode($title)); ?>-<?php echo urlencode('免费在线观看');?>"><img src="/views/images/home/kaixin.gif" /></a>
                            <a target="_blank" href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=<?php echo urlencode(http_url());?>&title=<?php echo (urlencode($title)); ?>-<?php echo urlencode('免费在线观看');?>&pics=&summary="><img src="/views/images/home/qz_logo.png" /></a>
                            <a target="_blank" href="http://www.douban.com/recommend/?url=<?php echo http_url();?>&title=<?php echo (urlencode($title)); ?>-<?php echo urlencode('免费在线观看');?>"><img src="/views/images/home/douban.gif" /></a>
                            <a target="_blank" href="http://tieba.baidu.com/i/sys/share?link=<?php echo http_url();?>&type=video&title=<?php echo (urlencode($title)); ?><?php echo urlencode('免费在线观看');?>"><img src="/views/images/home/baidutieba.gif" /></a>
						</div>
						<!-- Button END -->
					</div>
					<div class="sharebox_div">
						<span>关注官方微博:</span>
						<div class="wbdiv"><iframe width="63" height="24" frameborder="0" allowtransparency="true" marginwidth="0" marginheight="0" scrolling="no" border="0" src="http://widget.weibo.com/relationship/followbutton.php?language=zh_cn&width=63&height=24&uid=2519401067&style=1&btn=light&dpc=1"></iframe></div>
						<div class="wbdiv"><a href="http://t.qq.com/ziyuan5" title="关注本站的腾讯微博" target="_blank"><img src="<?php echo ($webpath); ?>images/txwb.png" alt="腾讯微博" title="关注本站的腾讯微博"></a></div>
					</div>
                    <p><a href="<?php echo ($webpath); ?>index.php?s=guestbook/lists/id/<?php echo ($id); ?>" target="_blank">影片出错反馈</a>|<a href="http://movie.douban.com/subject_search?search_text=<?php echo ($title); ?>&cat=1002" target="_blank" title="<?php echo ($title); ?>的豆瓣影评">豆瓣影评</a></p>
				</div><!--sharebox  END-->
                <div class="box_con">
<div class="movieDetail">
	<strong class="movieDetail_tt"><a href="<?php echo ($readurl); ?>" title="<?php echo ($title); ?>"><?php echo ($title); ?></a></strong>
			<p><strong>上映:</strong><a href="<?php echo ($webpath); ?>index.php/video/lists/id/<?php echo (get_pid($cid)); ?>/year/<?php echo (($year)?($year):'未知'); ?>" title="<?php echo (($year)?($year):'未知'); ?>" target="_blank"><?php echo (($year)?($year):'未知'); ?></a></p>
		<p><strong>播放:</strong><span><?php echo ($hits); ?></span></p>
		<p><strong>导演:</strong><?php if(!empty($director)): ?><?php echo (get_actor_url($director)); ?><?php else: ?><span>未知</span><?php endif; ?></p>
		<p><strong>主演:</strong><?php if(!empty($actor)): ?><?php echo (get_actor_url($actor)); ?><?php else: ?><span>未知</span><?php endif; ?></p>
		<p><strong>地区:</strong><a href="<?php echo ($webpath); ?>index.php/video/lists/id/1/area/<?php echo (($area)?($area):'其它'); ?>"><?php echo (($area)?($area):'其它'); ?></a></p>
		<p><strong>类型:</strong><a href="<?php echo ($showurl); ?>" target="_blank" title="<?php echo ($cname); ?>"><?php echo ($cname); ?></a></p>
		<p><strong>语言:</strong><span><?php echo (($language)?($language):'未知'); ?></span></p>
		</div>
</div>
<div class="box_tt"><h3>剧情简介</h3></div>
<div class="box_con box_con_movieinfo">
	<p><?php echo (get_replace_html($content,0,150,'utf-8',true)); ?><a target="_blank" href="<?php echo ($readurl); ?>" title="<?php echo ($title); ?>剧情介绍">更多</a></p>
</div>
				<script type="text/javascript">
					function switchTab(identify,index,count,cnon,cnout) {
						 for(i=0;i<count;i++) {
							 var CurTabObj = document.getElementById("Tab_"+identify+"_"+i) ;
							 var CurListObj = document.getElementById("List_"+identify+"_"+i) ;
							 if (i != index) {
								 CurTabObj.className=cnout ;
								 CurListObj.style.display="none" ;
							 }
						 }						
						 document.getElementById("Tab_"+identify+"_"+index).className=cnon ;
						 document.getElementById("List_"+identify+"_"+index).style.display="";
					}
				</script>
				<div class="box_tt">
					<h3>热播榜</h3>
					<ul class="tabbox">
						<li onmouseover="switchTab('rebo',0,4,'on','');" class="on" id="Tab_rebo_0">电影</li>
						<li onmouseover="switchTab('rebo',1,4,'on','');" id="Tab_rebo_1">电视剧</li>
						<li onmouseover="switchTab('rebo',2,4,'on','');" id="Tab_rebo_2">动漫</li>
						<li onmouseover="switchTab('rebo',3,4,'on','');" id="Tab_rebo_3">综艺</li>						
					</ul>
				</div>
                <div id="List_rebo_0" >				
					<ol class="ranklist">
                    <?php $tag['name'] = 'video';$tag['cid'] = '1';$tag['limit'] = '10';$tag['order'] = 'dayhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li></eq><?php endif; ?><em><?php if(($i)  ==  "10"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?></em><p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo (get_replace_html($video["title"],0,14)); ?></a><strong class="type"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo ($video["intro"]); ?><?php else: ?>高清<?php endif; ?><?php endif; ?></strong></p><span class="score"><?php echo ($video["score"]); ?></span><a href="<?php echo ($video["readurl"]); ?>" title="点击查看影片信息" class="info" target="_blank">影片信息</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
                    </ol>
				</div>
				<div id="List_rebo_1" style="display:none;">
					<ol class="ranklist">
                    <?php $tag['name'] = 'video';$tag['cid'] = '2';$tag['limit'] = '10';$tag['order'] = 'dayhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li></eq><?php endif; ?><em><?php if(($i)  ==  "10"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?></em><p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo (get_replace_html($video["title"],0,10)); ?></a><strong class="type"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo ($video["intro"]); ?><?php else: ?>高清<?php endif; ?><?php endif; ?></strong></p><span class="score"><?php echo ($video["score"]); ?></span><a href="<?php echo ($video["readurl"]); ?>" title="点击查看影片信息" class="info" target="_blank">影片信息</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
                    </ol>
				</div>
				<div id="List_rebo_2" style="display:none;">
					<ol class="ranklist">
                    <?php $tag['name'] = 'video';$tag['cid'] = '3';$tag['limit'] = '10';$tag['order'] = 'dayhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li></eq><?php endif; ?><em><?php if(($i)  ==  "10"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?></em><p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo (get_replace_html($video["title"],0,10)); ?></a><strong class="type"><?php if($video["serial"] > 0): ?>更新至<?php echo ($video["serial"]); ?>集<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo ($video["intro"]); ?><?php else: ?>高清<?php endif; ?><?php endif; ?></strong></p><span class="score"><?php echo ($video["score"]); ?></span><a href="<?php echo ($video["readurl"]); ?>" title="点击查看影片信息" class="info" target="_blank">影片信息</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
                    </ol>
				</div>
				<div id="List_rebo_3" style="display:none;">
					<ol class="ranklist">
                    <?php $tag['name'] = 'video';$tag['cid'] = '4';$tag['limit'] = '10';$tag['order'] = 'dayhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "4"): ?><li class="top"><?php else: ?><li></eq><?php endif; ?><em><?php if(($i)  ==  "10"): ?><?php echo ($i); ?><?php else: ?>0<?php echo ($i); ?><?php endif; ?></em><p><a href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" target="_blank"><?php echo (get_replace_html($video["title"],0,10)); ?></a><strong class="type"><?php if($video["serial"] > 0): ?><?php echo ($video["serial"]); ?>期<?php else: ?><?php if(!empty($video["intro"])): ?><?php echo ($video["intro"]); ?><?php else: ?>高清<?php endif; ?><?php endif; ?></strong></p><span class="score"><?php echo ($video["score"]); ?></span><a href="<?php echo ($video["readurl"]); ?>" title="点击查看影片信息" class="info" target="_blank">影片信息</a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
                    </ol>
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
</body>
</html>
<script type="text/javascript" src="<?php echo ($webpath); ?>js/page.js"></script>
<script type="text/javascript" src="<?php echo ($webpath); ?>js/exm.js"></script>
<script type="text/javascript" src="<?php echo ($webpath); ?>js/common.min.js"></script>
<script src="<?php echo ($webpath); ?>js/tips_history_lazy.min.js" charset="utf-8" ></script>
<script type="text/javascript">LAZY.init();LAZY.run();</script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/history.js"></script>
<?php echo ($inserthits); ?>
<?php echo get_cms_ads('play_dl');?>