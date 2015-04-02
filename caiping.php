<?php
header("Content-Type: text/html; charset=utf-8");
$var_array = require_once './config.php';  
extract($var_array, EXTR_PREFIX_SAME, "new");
//--------数据库类---------
$dbconn=mysql_connect($db_host,$db_user,$db_pwd);
mysql_query("SET NAMES utf8",$dbconn);
mysql_select_db($db_name);
//--------------------------
function curl_string ($url,$user_agent,$proxy){
	$ch = curl_init();
	curl_setopt ($ch, CURLOPT_PROXY, $proxy);
	curl_setopt ($ch, CURLOPT_URL, $url);
	curl_setopt ($ch, CURLOPT_USERAGENT, $user_agent);
	curl_setopt ($ch, CURLOPT_HEADER, 1);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt ($ch, CURLOPT_TIMEOUT, 120);
	$result = curl_exec ($ch);
	curl_close($ch);
return $result;
}
//---
		function steal($ZQQ_webfile,$start,$end,$lt,$gt){
			$str = explode($start,$ZQQ_webfile); $str = explode($end,$str[1]); $strs = $str[0];
			if($lt){ $strs = $start.$strs; } if($gt){ $strs = $strs.$end; }
			return($strs);
		}
//-------------------------------
$ip_long = array(
            array('607649792', '608174079'), //36.56.0.0-36.63.255.255
            array('1038614528', '1039007743'), //61.232.0.0-61.237.255.255
            array('1783627776', '1784676351'), //106.80.0.0-106.95.255.255
            array('2035023872', '2035154943'), //121.76.0.0-121.77.255.255
            array('2078801920', '2079064063'), //123.232.0.0-123.235.255.255
            array('-1950089216', '-1948778497'), //139.196.0.0-139.215.255.255
            array('-1425539072', '-1425014785'), //171.8.0.0-171.15.255.255
            array('-1236271104', '-1235419137'), //182.80.0.0-182.92.255.255
            array('-770113536', '-768606209'), //210.25.0.0-210.47.255.255
            array('-569376768', '-564133889'), //222.16.0.0-222.95.255.255
);
$rand_key = mt_rand(0, 9);
//$ip= long2ip(mt_rand($ip_long[$rand_key][0], $ip_long[$rand_key][1]));
$page=$_GET['page'];
if(!is_numeric($page)){
	$url_page = "http://www.mtime.com/review/shortcomment/index.html";
	$page = 1;
}else{
$url_page = "http://www.mtime.com/review/shortcomment/index-".$page.".html";
}
$user_agent = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.2; en) operea ";
$proxy = "";
$xhtml = curl_string($url_page,$user_agent,$proxy);

$xmain = steal($xhtml,'<!--评论列表-->	<ul>','</ul>',false,false);
if($xmain!="")
{
	$xlist = explode('</li>',$xmain);
	for($i = 0;$i< count($xlist)-1;$i++)
	{
	$pingcon = steal($xlist[$i],'<p class=" c_666">',"</p>",false,false);
	$pingtv = steal($xlist[$i],'target="_blank">《',"》",false,false);
	$pingtime = steal($xlist[$i],'<span class="fr c_666">',"</span>",false,false);
	$pingtime = $pingtime.':'.rand(00,60);
	$pingtime = ereg_replace("：",":",$pingtime);
	$pingtime = strtotime($pingtime); 
 $videoid=0;
 $result=mysql_query("select id,cid from ".$db_prefix."video where status=1 and title like '%".$pingtv."%'");
  while($rs=mysql_fetch_object($result))
  {
  $videoid=$rs->id;
  $videocid=$rs->cid;
	if($videocid > 7 && $videocid < 15){
	$videocid = 1;
	}
	if($videocid > 14 && $videocid < 22){
	$videocid = 2;
	}
  }
					$ok="<font color=red>跳过</font>";
		if($videoid>0)
			{
				$pingid=0;
				$pingresult=mysql_query("select id from ".$db_prefix."comment where did=".$videoid." and content='".$pingcon."'");
				while($rrs=mysql_fetch_object($pingresult))
				{
				$pingid=$rrs->id;
				}
					if($pingid==0)
					{
						mysql_query("insert into ".$db_prefix."comment (did,mid,uid,content,up,down,ip,addtime,status) values(".$videoid.",1,1,'".$pingcon."',".rand(0,20).",".rand(0,5).",'".long2ip(mt_rand($ip_long[$rand_key][0], $ip_long[$rand_key][1]))."','".$pingtime."',1)");
					$ok="<font color=blue>添加</font>";
					}
			}

	echo "[$pingtv (id=$videoid)] $pingcon $ok<br/>";
		
	}
if($page<10){
echo "3秒后采集第".($page + 1) ."页<script>setTimeout(\"lt()\",3000);</script>";
}
}
?> 
<script language="javascript">   
function lt(){
     window.location.href="?page=<?=$page+1?>";   
  }   
</script>