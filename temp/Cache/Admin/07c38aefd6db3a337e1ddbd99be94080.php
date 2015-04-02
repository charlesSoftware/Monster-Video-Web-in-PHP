<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>自定义采集节点项目-<?php echo C("web_name");?> </title>
<link rel='stylesheet' type='text/css' href='./views/css/admin_style.css'>
<link rel='stylesheet' type='text/css' href='./views/css/collect.css'>
<link rel='stylesheet' type='text/css' href='./views/css/dialog.css'>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/jquery.js"></script>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/admin_all.js"></script>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/collect.js"></script>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/dialog.js"></script>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/formvalidator.js"></script>

</head>

<body>

<script type="text/javascript">
$(document).ready(function() {			
	$.formValidator.initConfig({formid:"colform",autotip:true,onerror:function(msg,obj){art.dialog({content:msg,lock:true,width:'200',height:'50'})}});
	$("#name").formValidator({onshow:"",onfocus:"请输入名称"}).inputValidator({min:1,onerror:"请输入采集项目名称"});
	 if($("#fixed").attr("checked")==false){
		 //alert('#fixed unchecked.');
	}else{
		 //alert('#fixed checked.');
		 $("#pid").formValidator({onshow:"请选择栏目分类",onfocus:"请选择栏目分类",oncorrect:""}).inputValidator({min:1,onerror:"请选择栏目分类"})
	}
	
 });
function menucheck(){
   if($("#fixed").attr("checked")==false){
		 //alert('#fixed unchecked.');
		 //focus on $("#_desc")
		 $("#pid").formValidator({onshow:"请选择栏目分类",onfocus:"请选择栏目分类",oncorrect:""});
		 return false;
	}else{
		// alert('#fixed checked.');
		 $("#pid").formValidator({onshow:"请选择栏目分类",onfocus:"请选择栏目分类",oncorrect:""}).inputValidator({min:1,onerror:"请选择栏目分类"})
	}
}
</script>

<div class="main">
<table width="100%" border="0" cellpadding="5" cellspacing="1" class="table">
<tr>
  <td colspan="6" class="table_title">
  <ul>
  <li><a href="?s=Admin/CustomCollectDown/ListShow">资源采集节点管理</a> </li>
  <li><a href="?s=Admin/CustomCollectDown/Add">添加资源采集节点</a></li>
  <li><a href="?s=Admin/CustomCollectDown/Manage/action/import">导入资源采集规则</a></li>
  </ul>
  </td>
</tr>
</table>
<div class="nav clear"><ul><li id='set_1' class="now">第一步：基本参数填写</li><li id='set_2'>第二步：采集内容规则设置</li><li id='set_3'>第三步：在线模拟预览结果</li><li id='set_4'>完成并演示</li></ul></div>

<ul class="tab_menu">
<li class="on" id="tab_1" onclick="javascript:show_div('1')">基本规则</li>
<li id="tab_2"  onclick="javascript:show_div('2')">内容规则</li>
<li  id="tab_3"  onclick="javascript:show_div('3')" >模拟测试</li>

</ul>
<div class="clear"></div>
<div id="content">
<form name="colform" action="?s=Admin/CustomCollectDown/Add" method="post" id="colform">
<input type="hidden" name="data[nid]" value="<?php echo ($id); ?>" />
<div class="content pad-10" id="show_div_1" style="height:auto; display:block;" >
<div class="common-form">
<div id="result" class="none result" style="font-family:微软雅黑,Tahoma;letter-spacing:2px"></div>
<fieldset>
	<legend>节点基本信息</legend>
	<table width="90%" class="table_form" cellpadding="0" cellspacing="0" align="center">
		<tr>
			<td width="120" class="left">采集项目名：</td> 
			<td>
			<input type="text" name="data[name]" id="name"  class="input-text"  value="<?php echo ($name); ?>"></input><span id='title_result'></span>
			</td>
		</tr>
		<tr>
			<td width="120">采集目标页面编码：</td> 
			<td>
			<input type="radio" name="data[sourcecharset]" id="_gbk"  <?php if($sourcecharset == 'gbk' or $sourcecharset == ''): ?>checked<?php endif; ?> value="gbk"  class="radio"> GBK
            <input type="radio" name="data[sourcecharset]" id="_utf-8" <?php if(($sourcecharset)  ==  "utf-8"): ?>checked="checked"<?php endif; ?>  value="utf-8" class="radio"> UTF-8
            <input type="radio" name="data[sourcecharset]" id="_big5"  <?php if(($sourcecharset)  ==  "big5"): ?>checked="checked"<?php endif; ?> value="big5" class="radio"> BIG5			
            </td>
		</tr>
         <tr>
			<td width="120">采集方式：</td> 
			<td>
		<input type="checkbox" name="data[colmode]" id="_desc"  <?php if($colmode == 'desc'): ?>checked="checked"<?php endif; ?> value="desc" class="radio" >倒序采集
        <input type="checkbox" name="data[direct]" id="_direct"  <?php if($direct == '1'): ?>checked="checked"<?php endif; ?> value="1" class="radio" >采集完毕自动入库
           
            </td>
		</tr>
    
	</table>
</fieldset>
<fieldset>
	<legend>采集网址</legend>
	<table width="90%" class="table_form"  cellpadding="0" cellspacing="0" align="center">
        <tr>
			<td width="120">接口地址：</td> 
			<td>
			 <input type="text" name="urlpage1" id="urlpage_1" size="100" value="<?php echo ($urlpage); ?>"><br />
			 (如：http://www.xxx.com/?w=(*),关键字使用<a href="javascript:insertText('urlpage_1', '(*)')">(*)</a>做为通配符。<br />
			</td>
		</tr>
		<tr>
			<td width="120">通配符转码：</td> 
			<td>
			<input type="radio" name="data[keymode]" id="_0"  <?php if($keymode == '0' or $keymode == ''): ?>checked<?php endif; ?> value="0"  class="radio"> UTF-8
            <input type="radio" name="data[keymode]" id="_1" <?php if(($keymode)  ==  "1"): ?>checked="checked"<?php endif; ?>  value="1" class="radio"> GBK
			</td>
		</tr>
		<tr>
			<td width="120">采集地址：</td> 
			<td>
			网址中必须包含 <input type="text" name="data[url_contain]"  value="<?php echo ($url_contain); ?>"> 网址中不得包含  <input type="text" name="data[url_except]"  value="<?php echo ($url_except); ?>">
			</td>
		</tr>
		<tr>
			<td width="120">获取网址：</td> 
			<td>
			从采集目标页面中 <textarea rows="5"  cols="40" name="data[url_start]" ><?php echo ($url_start); ?></textarea> 到 <textarea rows="5" name="data[url_end]" cols="40"><?php echo ($url_end); ?></textarea> 结束			</td>
		</tr>

	</table>
</fieldset>
</div>
</div>

<div class="content pad-10" id="show_div_2" style="height:auto;display:none">

<div class="clear"></div>


<div class="note" >1、匹配规则请设置开始和结束符，具体内容使用“[内容]”做为通配符 。<BR>2、过滤选项格式为“要过滤的内容[|]替换值”，要过滤的内容支持正则表达式，每行一条。<BR></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
 <div id="col_tab"><strong>采集字段</strong>

<?php if(is_array($base)): $k = 0; $__LIST__ = $base;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$k;$mod = ($k % 2 )?><input type="checkbox" name="data[fields][]" value="<?php echo ($key); ?>"  class="radio"  id="field_<?php echo ($k); ?>"  <?php if(empty($fields)): ?>checked="checked"<?php else: ?><?php if(is_array($fields)): foreach($fields as $k2=>$fo): ?><?php if($fo == $key): ?>checked="checked";<?php endif; ?><?php endforeach; endif; ?><?php endif; ?>  onclick="show_switch(this,'baserule<?php echo ($k); ?>','show')"/><?php echo ($vo); ?><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
</td>
 <td>
 <div class="button_show clear"><input type="button" class="button" value="全部展开" onclick="$('#show_div_2').children('fieldset').children('.table_form').show()"> <input type="button" class="button" value="全部合上" onclick="$('#show_div_2').children('fieldset').children('.table_form').hide()"></div>
 </td>
  </tr>
</table>

<fieldset >
	<legend><a href="javascript:void(0)" onclick="$(this).parent().parent().children('table').toggle()">可选采集规则</a></legend>
	<table width="100%" class="table_form"  cellpadding="0"  cellspacing="0">
<?php if(is_array($base)): $k = 0; $__LIST__ = $base;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$k;$mod = ($k % 2 )?><tr id="baserule<?php echo ($k); ?>" <?php if(($picmode == '1' and $key == 'picurl') or ($menutype == '1' and $key == 'cname') ): ?>style="display:none;"<?php endif; ?> <?php if(!empty($fields)): ?><?php if(in_array($key,$fields)) {echo $key.'style=display:block';}else{echo 'style="display:none;"';} ?><?php endif; ?>>
			<td width="120"><?php echo ($vo); ?>规则：</td> 
			<td>
			<textarea rows="5" cols="30" name="data[<?php echo ($key); ?>_rule]" id="<?php echo ($key); ?>_rule"><?php if($k == 1): ?><?php echo (($title_rule)?($title_rule):"<title>[内容]</title>"); ?><?php else: ?><?php $a=$key.'_rule';echo $$a; ?><?php endif; ?></textarea> <span class='bottom'><a href="javascript:insertText('<?php echo ($key); ?>_rule', '[内容]')" title="点击使用'[内容]'通配符">[内容]</a>	</span> </td>
			<td width="60">过滤选项：</td> 
			<td>

			<textarea rows="5" cols="40" name="data[<?php echo ($key); ?>_filter]" id="<?php echo ($key); ?>_filter"><?php $b=$key.'_filter';echo $$b; ?></textarea>
			<input type="button"   value="常用规则" class="button bottom"  onclick="html_rule('data[<?php echo ($key); ?>_filter]')">
			</td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
</fieldset>
<fieldset>
	<legend><a href="javascript:void(0)" onclick="$(this).parent().parent().children('table').toggle()">资源地址规则</a></legend>
	<table width="100%" class="table_form"  cellpadding="0" cellspacing="0" >

		  <tr>
			<td width="120">资源列表范围：</td> 
			<td colspan="3" >
			<input type="radio" name="data[range]" onclick="show_switch(this,'field_plist','show')" id="_1"  value="1"  <?php if(($range)  ==  "1"): ?>checked="checked"<?php endif; ?>  class="radio"> 开启<input type="radio" name="data[range]"  onclick="show_switch(this,'field_plist','hide')" id="_2"  <?php if(($range)  !=  "1"): ?>checked="checked"<?php endif; ?> value="2" class="radio"> 关闭</td>
		  </tr>
            
           <tr id="field_plist" <?php if(($range)  !=  "1"): ?>style="display:none;"<?php endif; ?>>
			<td width="120">资源列表范围规则：</td> 
            <td colspan="3">
			从影片内容页面中 <textarea rows="5" cols="30" name="data[downlist_start]"><?php echo ($downlist_start); ?></textarea> 到 <textarea rows="5" name="data[downlist_end]" cols="40"><?php echo ($downlist_end); ?></textarea> 结束			            </td>
		   </tr>
           
		   <tr>
			<td width="120">获取资源地址方式：</td> 
			<td colspan="3" >
			<input type="radio" name="data[downmode]" onclick="show_switch(this,'field_downurl','show')" id="_1" <?php if(($downmode)  ==  "1"): ?>checked="checked"<?php endif; ?>  value="1" class="radio"> 资源页获取单个地址
            <input type="radio" name="data[downmode]" onclick="show_switch(this,'field_downurl','show')" id="_2" <?php if(($downmode)  ==  "2"): ?>checked="checked"<?php endif; ?> value="2" class="radio"> 资源页获取所有地址
            <input type="radio" name="data[downmode]" onclick="show_switch(this,'field_downurl','hide')" id="_3"  <?php if($downmode != '1' and $downmode  != '2'): ?>checked<?php endif; ?> value="3" class="radio"> 内容页直接获取地址</td>
		   </tr>
            
            <tr id="field_downurl"  <?php if($downmode == '3' or $downmode == ''): ?>style="display:none;"<?php endif; ?>>
			<td width="120">资源链接规则：</td> 
           <!-- <td>
		链接中必须包含 <input type="text" name="data[downlink_contain]"  value="<?php echo ($downlink_contain); ?>">不得包含  <input type="text" name="data[downlink_except]"  value="<?php echo ($downlink_except); ?>">
			</td>-->
			<td>
			<textarea rows="5" cols="30" name="data[downlink_rule]" id="downlink_rule"><?php echo ($downlink_rule); ?></textarea> <span class='bottom'><a href="javascript:insertText('downlink_rule', '[内容]')" title="点击使用'[内容]'通配符">[内容]</a>	</span> </td>
			<td width="60">过滤选项：</td> 
			<td>
			<textarea rows="5" cols="40" name="data[downlink_filter]" id="downlink_filter"><?php echo ($downlink_filter); ?></textarea>
			<input type="button"   value="常用规则" class="button bottom"  onclick="html_rule('data[downlink_filter]')">
			</td>
		</tr>
         <tr>
			<td width="120">资源地址范围：</td> 
			<td colspan="3" >
			<input type="radio" name="data[durl_range]" onclick="show_switch(this,'field_durllist','show')" id="_1"  value="1"  <?php if(($durl_range)  ==  "1"): ?>checked="checked"<?php endif; ?>  class="radio"> 开启<input type="radio" name="data[durl_range]"  onclick="show_switch(this,'field_durllist','hide')" id="_2"  <?php if(($durl_range)  !=  "1"): ?>checked="checked"<?php endif; ?> value="2" class="radio"> 关闭 (选择在资源页获取影片资源地址，该功能设置才有效)</td>
		  </tr>
            
           <tr id="field_durllist" <?php if(($durl_range)  !=  "1"): ?>style="display:none;"<?php endif; ?>>
			<td width="120">资源地址范围规则：</td> 
            <td colspan="3">
			从影片资源页面中 <textarea rows="5" cols="30" name="data[downurl_start]"><?php echo ($downurl_start); ?></textarea> 到 <textarea rows="5" name="data[downurl_end]" cols="40"><?php echo ($downurl_end); ?></textarea> 结束			            </td>
		   </tr>
          <tr >
			<td width="120">资源地址规则：</td> 
			<td>
			<textarea rows="5" cols="30" name="data[downurl_rule]" id="downurl_rule"><?php echo ($downurl_rule); ?></textarea> <span class='bottom'><a href="javascript:insertText('downurl_rule', '[内容]')" title="点击使用'[内容]'通配符">[内容]</a>	</span> </td>
			<td width="60">过滤选项：</td> 
			<td>
			<textarea rows="5" cols="40" name="data[downurl_filter]" id="downurl_filter"><?php echo ($downurl_filter); ?></textarea>
			<input type="button"   value="常用规则" class="button bottom"  onclick="html_rule('data[downurl_filter]')">
			</td>
		</tr>
        <tr>
			<td width="120">分集名称设置方式：</td> 
			<td colspan="3" >
			<input type="radio" name="data[vnamemode]"  id="_1"  <?php if(($vnamemode)  !=  "2"): ?>checked="checked"<?php endif; ?> value="1" class="radio" onclick="show_switch(this,'field_vname','hide')"> 系统默认设置<input type="radio" name="data[vnamemode]" onclick="show_switch(this,'field_vname','show')" <?php if(($vnamemode)  ==  "2"): ?>checked="checked"<?php endif; ?> id="_2"  value="2" class="radio"> 采集分集名称</td>
			</tr>
          <tr id="field_vname" <?php if(($vnamemode)  !=  "2"): ?>style="display:none;"<?php endif; ?>>
			<td width="120">分集名称规则：</td> 
			<td>
			<textarea rows="5" cols="30" name="data[vname_rule]" id="vname_rule"><?php echo ($vname_rule); ?></textarea> <span class='bottom'><a href="javascript:insertText('vname_rule', '[内容]')" title="点击使用'[内容]'通配符">[内容]</a>	</span> </td>
			<td width="60">过滤选项：</td> 
			<td>
			<textarea rows="5" cols="40" name="data[vname_filter]" id="vname_filter"><?php echo ($vname_filter); ?></textarea>
			<input type="button"   value="常用规则" class="button bottom"  onclick="html_rule('data[vname_filter]')">
			</td>
		</tr>
	</table>

</fieldset>
</div>

<div class="content pad-10" id="show_div_3" style="height:auto;display:none">
<table width="100%"  class="table_form"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2">测试采集结果预览</td>
  </tr>
    <tr>
    <td width="20%">确定要预览吗？<span class="red" id="curren_url"></span></td>
     <td  align="left"><input type="submit" id="test" value="预览" class="bginput"  onclick="colform.action='?s=Admin/CustomCollectDown/ColTest';"  ></td>
  </tr>

</table>


</div>

    <div class="clear"></div>
    <input name="dosubmit" type="submit" id="dosubmit" value="确认提交" class="button" style="margin-top:10px;">


</form>

</div>
</div>
<script type="text/javascript">
<!--
function html_rule(id, type) {
	art.dialog({id:'test_url',content:'<ul class="ib"><?php if(is_array($files)): $k = 0; $__LIST__ = $files;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fvo): ++$k;$mod = ($k % 2 )?><li><input type="checkbox" name="filter" id="_<?php echo ($k); ?>" class="radio" value="<?php echo ($fvo); ?>"> <?php echo ($key); ?></li><?php endforeach; endif; else: echo "" ;endif; ?><ul><div class="clear"></div><center><input type="button" value="全/反选" class="button"  onclick="selectall(1)" ></center>', width:'450', height:'120', lock: false}, function(){var old = $("textarea[name='"+id+"']").val();var str = '';$("input[name='filter']:checked").each(function(){str+=$(this).val()+"\n";});$((type == 1 ? "#"+id :"textarea[name='"+id+"']")).val((old ? old+"\n" : '')+str);}, function(){art.dialog({id:'test_url'}).close()});
}

-->
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