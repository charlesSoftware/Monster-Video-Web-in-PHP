<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>采集节点项目管理-<?php echo C("web_name");?></title>
<link rel='stylesheet' type='text/css' href='./views/css/admin_style.css'>
<link rel='stylesheet' type='text/css' href='./views/css/collect.css'>
<link rel='stylesheet' type='text/css' href='./views/css/dialog.css'>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/jquery.js"></script>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/admin_all.js"></script>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/collect.js"></script>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/dialog.js"></script>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/formvalidator.js"></script>
<script type="text/javascript">
<!--
function ColOne(nid)
{ 
	var chk_stype = document.getElementsByName('stype_'+nid);
	var chk_snull = document.getElementById('snull'+nid);
	var length = chk_stype.length;
	if(chk_snull.checked){
		snullvalue = 1;
	}else{
		snullvalue = 0;
	}
	for (var i=0;i<length;i++){
		if(chk_stype[i].checked){
			var svalue = chk_stype[i].value;
			if (svalue == 1)
			{
				location = "?s=Admin/CustomCollectDown/ColRun/action/real/type/all/stime/"+encodeURI(document.getElementById('stime'+nid).value)+"/snull/"+snullvalue+"/nid/"+nid+"/day/"+encodeURI(document.getElementById('day'+nid).value);
			} 
			else if (svalue == 2)
			{
				location = "?s=Admin/CustomCollectDown/ColRun/action/real/type/all/stime/"+encodeURI(document.getElementById('stime'+nid).value)+"/snull/"+snullvalue+"/nid/"+nid+"/qid/"+encodeURI(document.getElementById('qid'+nid).value)+"/jid/"+encodeURI(document.getElementById('jid'+nid).value);
			}
			else if (svalue == 3)
			{
				location = "?s=Admin/CustomCollectDown/ColRun/action/real/type/all/stime/"+encodeURI(document.getElementById('stime'+nid).value)+"/snull/"+snullvalue+"/nid/"+nid+"/scid/"+encodeURI(document.getElementById('scid'+nid).value);
			}
		}
	}
}
function show_stype(id,obj) {
	var num = 3;
	for (var i=1; i<=num; i++){
		if (obj==i){ 
			$('#stype_'+id+'_'+i).show();
		} else {
			$('#stype_'+id+'_'+i).hide();
		}
	}
}
-->
</script>
<style type="text/css">
<!--
.tr strong a{color:#f30;}
-->
</style>
</head>
<body>
<table width="98%" border="0" cellpadding="5" cellspacing="1" class="table">
<tr>
  <td colspan="6" class="table_title">
  <ul>
  <li><a  href="?s=Admin/CustomCollectDown/ListShow">资源采集节点管理</a> </li>
  <li><a href="?s=Admin/CustomCollectDown/Add">添加资源采集节点</a></li>
  <li><a href="?s=Admin/CustomCollectDown/Manage/action/import">导入资源采集规则</a></li>
  </ul>
  </td>
</tr>
<?php if(!empty($cache)): ?><tr class="tr"><td colspan="6"><strong><a href="<?php echo ($cache); ?>">上次有采集任务没有完成，是否接着采集?</a></strong></td></tr><?php endif; ?>
<form action="" method="post" id="gxform" name="gxform">
<tr align="center" class="list_head">
<td width="2%"></td>
<td width='5%'>ID</td>
<td width='15%'>节点项目名称</td>
<td width='15%'>最后采集时间</td>
<td width=''>操作</td>
</tr>
<?php if(is_array($ArrList)): $i = 0; $__LIST__ = $ArrList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><tr class="tr" align="center">
<td  width="2%"><input name='ids[]' type='checkbox' value='<?php echo ($vo["id"]); ?>' class="noborder"></td>
<td  width='5%'><?php echo ($vo["id"]); ?></td>
<td align="left"><?php echo ($vo["name"]); ?></td>
<td class="td"><?php if($vo['lastdate'] == 0): ?>从未采集过<?php else: ?><?php echo (date('Y-m-d H:i:s',$vo["lastdate"])); ?><?php endif; ?></td>
<td class="td" id='action'><span style="color:#333;">间隔 <input type="text" id="stime<?php echo ($vo["id"]); ?>" name="stime" value="3"  style="width:10px;height:16px;line-height:16px;"/> s</span>
<span style="color:#333;"><input type="radio" name="stype_<?php echo ($vo["id"]); ?>" onclick="show_stype(<?php echo ($vo["id"]); ?>,1)" id="_<?php echo ($vo["id"]); ?>_1" value="1" class="radio" checked>按天数</span>
<span style="color:#333;"><input type="radio" name="stype_<?php echo ($vo["id"]); ?>" onclick="show_stype(<?php echo ($vo["id"]); ?>,2)" id="_<?php echo ($vo["id"]); ?>_2" value="2" class="radio">按影片ID</span>
<span style="color:#333;"><input type="radio" name="stype_<?php echo ($vo["id"]); ?>" onclick="show_stype(<?php echo ($vo["id"]); ?>,3)" id="_<?php echo ($vo["id"]); ?>_3" value="3" class="radio">按影片栏目</span>
<span style="color:#333;"><input type="checkbox" name="snull" id="snull<?php echo ($vo["id"]); ?>" value="1" class="noborder">下载地址为空</span>
<a href="javascript:ColOne(<?php echo ($vo["id"]); ?>);">采集</a>|<a href="?s=Admin/CustomCollectDown/ColRun/action/demo/type/all/nid/<?php echo ($vo["id"]); ?>">预览</a>|<a href="?s=Admin/CustomCollectDown/Add/nid/<?php echo ($vo["id"]); ?>">编辑</a><!--|<a  href="javascript:void(0)"  onclick="copy_spider(<?php echo ($vo["id"]); ?>)">复制</a>-->|<a  href="?s=Admin/CustomCollectDown/Manage/action/copy/nid/<?php echo ($vo["id"]); ?>">复制</a>|<a href="?s=Admin/CustomCollectDown/Manage/action/export/nid/<?php echo ($vo["id"]); ?>">导出</a>|<a href="?s=Admin/CustomCollectDown/Manage/action/del/nid/<?php echo ($vo["id"]); ?>" onClick="return confirm('确定删除该节点吗?')" title="点击删除节点">删除</a>
<div style="text-algin:left;">
<div style="color:#333;" id="stype_<?php echo ($vo["id"]); ?>_1">采集 <input type="text" id="day<?php echo ($vo["id"]); ?>" name="day" value="1" style="width:100px;height:16px;line-height:16px;"/> 天 （填写0则采集所有）</div>
<div style="color:#333;display:none;" id="stype_<?php echo ($vo["id"]); ?>_2">起始ID <input type="text" id="qid<?php echo ($vo["id"]); ?>" name="qid" value="1"  style="width:100px;height:16px;line-height:16px;"/> 结束ID <input type="text" id="jid<?php echo ($vo["id"]); ?>" name="jid" value="0" style="width:100px;height:16px;line-height:16px;"/> （结束ID为0时采集到当前影片最大ID）</div>
<div style="color:#333;display:none;" id="stype_<?php echo ($vo["id"]); ?>_3">影片栏目 <select name="scid" id="scid<?php echo ($vo["id"]); ?>" style="width:132px">
              <option value="0" >选择栏目分类</option><?php if(is_array($channel_tree)): $i = 0; $__LIST__ = $channel_tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxcms): ++$i;$mod = ($i % 2 )?><?php if(($gxcms["status"])  >  "0"): ?><option value="<?php echo ($gxcms["id"]); ?>" <?php if(($gxcms["id"])  ==  $cid): ?>selected<?php endif; ?>>├─<?php echo ($gxcms["cname"]); ?></option>
              <?php if(is_array($gxcms['son'])): $i = 0; $__LIST__ = $gxcms['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxcms): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($gxcms["id"]); ?>" <?php if(($gxcms["id"])  ==  $cid): ?>selected<?php endif; ?>>├──<?php echo ($gxcms["cname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?></select></div>
</div>
</td>
</tr><?php endforeach; endif; else: echo "" ;endif; ?>

<tr class="tr"><td colspan="8" class="pages"><?php echo ($pagelist['listpages']); ?></td></tr>
<tr class="tr"><td colspan="8"><span><input type="button" id="checkall" value="全/反选" class="bginput"></span><span><input type="button" value="导入采集规则" class="bginput" onClick="gxform.action='?s=Admin/Video/Statusall/sid/0';" /></span><span><input type="button" value="采集选中节点" class="bginput" onClick="gxform.action='?s=Admin/Video/Statusall/sid/0';" /></span><span><input type="submit" value="批量删除" onClick="if(confirm('删除后将无法还原,确定要删除吗?')){gxform.action='?s=Admin/CustomCollectDown/Manage/action/delall';}else{return false}" class="bginput"/></span></td>
</tr>
</form>
</table>
<!--连载框 -->
<div id="msg_tbc" class="tbc-block"></div>
<!--浮动层 -->

<style>#dia_title{height:25px;line-height:25px}.jqmWindow{height:300px;width:500px;}</style>
<script language="JavaScript" type="text/javascript">
function copy_spider(id) {
	art.dialog({id:'test'}).close();
	art.dialog({lock: true,title:'复制采集节点',id:'test',content:'<input type="text" name="data[name]" >',iframe:'?s=Admin/CustomCollectDown/Manage/action/copy/nid/'+id,width:'350',height:'125'}, function(){var d = art.dialog({id:'test'}).data.iframe;var form = d.document.getElementById('dosubmit');form.click();return false;}, function(){art.dialog({id:'test'}).close()});
}

</script>
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
</body>
</html>