<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>数据库批量替换</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='./views/css/admin_style.css'>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/jquery.js"></script>
</head>
<body>
<table width="98%" border="0" cellpadding="4" cellspacing="1" class="table">
<form action="?s=Admin/Data/Upfields" method="post" id="gxform">
<tr class="table_title">
  <td colspan="2">批量替换数据</td>
</tr>
<tr class="tr">
  <td width="120" class="rt">选择数据表与字段：</td>
  <td ><select name="exptable" id="exptable" size="10" style="height:150px; width:500px" onChange="showfields()">
  <?php if(is_array($list_table)): $i = 0; $__LIST__ = $list_table;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxcms): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($gxcms); ?>"><?php echo ($gxcms); ?> <?php echo (get_table_name($gxcms)); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select>
  <div id="fields"></div></td>
</tr>
 <tr class="tr">
  <td class="rt">要替换的字段：</td>
  <td><input name="rpfield" type="text" id="rpfield" style="width:500px;"/> *</td>
</tr>       
<tr class="tr">
  <td class="rt">被替换的内容：</td>
  <td><textarea name="rpstring" id="rpstring" style="width:500px;height:50px"></textarea> *</td>
</tr>
<tr class="tr">
   <td class="rt">替换为的内容：</td>
   <td><textarea name="tostring" id="tostring" class="alltxt" style="width:500px;height:50px"></textarea> *</td>
</tr>
 <tr class="tr">
   <td class="rt">选择替换条件：</td>
   <td><input name="condition" type="text" id="condition" style="width:500px;color:#696969;" title="为空全部替换 请遵循SQL的条件语句 如id=888 id&gt;888"/></td>
</tr>               
<tr class="tr">
  <td colspan="2"><input class="bginput" type="submit" name="submit" value="提交"onClick="return confirm('一旦执行后将无法恢复，请确定条件语句正确无误，或者备份好数据库以防万一!')"> <input class="bginput" type="reset" name="Input" value="重置" > 注:程序用于批量替换数据库中某字段的内容，此操作极为危险，请小心使用。
  </td>
</tr>
</form>
</table>
<script type="text/javascript">
function showfields(){
	var exptable = $('#exptable').val();
	$.ajax({
		url: '?s=Admin/Data/Ajaxfields/id/'+exptable+'',
		success: function(res){
			$('#fields').html(res);
		}
	});
} 
function rpfield(v){
	$('#rpfield').val(v); 
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