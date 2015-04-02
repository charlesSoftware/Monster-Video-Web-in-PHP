<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>影片采集管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='./views/css/admin_style.css'>
<SCRIPT language="JavaScript"> 
if(self==top){
	alert ('你丫来这干嘛？好吧，你赢了！请默默的给我加一个链接【电影资源网：www.ziyuan5.com】，我将保持数据的纯洁！否则？反之！');
}
</SCRIPT>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/jquery.js"></script>
<script language="JavaScript">
$(document).ready(function(){	
	$('#xmllist').html($('#xml').html());
	$('#xml').html('');
});
var jumpurl = '<?php echo ($jumpurl); ?>';
</script>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><span id="xmllist">资源列表载入中……</span></td>
  </tr>
</table>
<table width="98%" border="0" cellpadding="5" cellspacing="1" class="table">
<tr class="table_title">
<td colspan="7"><span style="float:right">自有节点</span> </td>
</tr>
<tr class="tr">
<td >00、</td>
<td ><a href="?s=Admin/Collect/Gxcms/ziyuan/gx/fid/88/xmlurl/http:@@myzy.ziyuan5.com/reurl/http:@@myzy.ziyuan5.com@vod@">自有节点</a></td>
<td class="ct"><a href="?s=Admin/Collect/Gxcms/ziyuan/gx/fid/88/action/day/h/24/xmlurl/http:@@myzy.ziyuan5.com/reurl/http:@@myzy.ziyuan5.com@vod@?">采集当天</a></td>
<td class="ct"><a href="?s=Admin/Collect/Gxcms/ziyuan/gx/fid/88/action/day/h/98/xmlurl/http:@@myzy.ziyuan5.com/reurl/http:@@myzy.ziyuan5.com@vod@?">采集本周</a></td>
<td class="ct"><a href="?s=Admin/Collect/Gxcms/ziyuan/gx/fid/88/action/all/xmlurl/http:@@myzy.ziyuan5.com/reurl/http:@@myzy.ziyuan5.com@vod@?">采集所有</a></td>
<td class="ct"><a href="?s=Admin/Collect/Gxcms/ziyuan/gx/fid/88/action/all/pic/true/xmlurl/http:@@myzy.ziyuan5.com@/reurl/http:@@myzy.ziyuan5.com@vod@?" title="包括片名,图片,主演,分类等">重采资料</a></td>
<td class="ct"><a href="?s=Admin/Collect/Gxcms/ziyuan/a/fid/88/xmlurl/http:@@myzy.ziyuan5.com/reurl/http:@@myzy.ziyuan5.com@vod@?">绑定分类</a></td>
</tr>
</table>
<style>
#footer, #footer a:link, #footer a:visited {
	clear:both;
	color:#0072e3;
	font:12px/1.5 Arial;
	margin-top:10px;
	text-align:center;
	white-space:nowrap;
}
</style>
<div id="footer">程序版本：<?php echo C("cms_var");?>&nbsp;&nbsp;&nbsp;&nbsp;Copyright © 2010-2011 All rights reserved</div>
<span id="xml"><script language="JavaScript" charset="utf-8" type="text/javascript" src="http://union.gxcms.com/app/xml.js?20120604"></script></span>
</body>
</html>