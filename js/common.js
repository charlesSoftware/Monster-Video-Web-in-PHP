// JavaScript Document
var path=window.location.pathname;
var p=/type,(order|genre|area).*?\/(movie|teleplay|tv|anime|documentary),((rat|update|hits|jbd|qg|yx|ft|ymgx|yl|ss|ms|qc|caijing|lvyou|military|xfdh|jdcp|wjdh|jcova|sylive|zrpv)|(\d{1,4})).*?/g;
var G_LIST_MOVIESINFO=new Array();
if(path.match(p)){
	//alert(RegExp.$1+'----'+RegExp.$2+'----'+RegExp.$3);
	var nav_idx_suf=RegExp.$2;
	var nav_idx_pre=RegExp.$3;
	var nav_idx=nav_idx_suf+'_nav_'+nav_idx_pre;
	try{
		var nav_idx_obj=document.getElementById(nav_idx);
		if(nav_idx_obj){
			nav_idx_obj.className='on';
		}
	}catch(e){}
}
function switchTab(identify,index,count,cnon,cnout) {
 for(i=0;i<count;i++) {
	var CurTabObj = document.getElementById("Tab_"+identify+"_"+i) ;
	var CurListObj = document.getElementById("List_"+identify+"_"+i) ;
	if (i!=index) {
		CurTabObj.className=cnout ;
		CurListObj.style.display="none" ;
	}
	} 
	document.getElementById("Tab_"+identify+"_"+index).className=cnon;
	document.getElementById("List_"+identify+"_"+index).style.display="";
} 
function check(){a=document.getElementById("wd").value;a=a.replace(/(\/)|(\\)|(\")|(\')/g,"");if(a=="\u8bf7\u8f93\u5165\u89c6\u9891\u540d\u3001\u4e3b\u6f14\u6216\u5bfc\u6f14"||a==""){alert("\u8bf7\u8f93\u5165\u641c\u7d22\u5173\u952e\u5b57!");document.getElementById("wd").value="";document.getElementById("wd").focus();return false}}
function show_critea_area(){
	try{
		var obj=document.getElementById('all_critirea_issue');
		var bca=document.getElementById('btn_critea_area');
		if(obj){
			if(obj.style.display==''){
				obj.style.display='none';
				bca.innerHTML='展开全部';
				bca.className='on';
				save_critriea_area_status('hide');
			}else{
				obj.style.display='';
				bca.innerHTML='收起全部';
				bca.className='';
				save_critriea_area_status('show');
			}
		}
	}catch(e){}
}
//保存收起展开状态
function save_critriea_area_status(status){
	try{
		var ckey=channel_type+'cri_area_status';
		setCookieWithDomain_l(ckey,status,2,'www.xun.com');
	}catch(e){}
}
function get_critriea_area_status(){
	try{
		var ckey=channel_type+'cri_area_status';
		var value=getCookie_l(ckey);
		if(value){
			var obj=document.getElementById('all_critirea_issue');
			var bca=document.getElementById('btn_critea_area');
			if(value=='hide'){
				obj.style.display='none';
				bca.innerHTML='展开全部';
				bca.className='on';
			}else if(value=='show'){
				obj.style.display='';
				bca.className='';
				bca.innerHTML='收起全部';
			}			
		}
	}catch(e){}
}
function position(o){
	var p={Top:0,Left:0};
	while(!!o){
		p.Top+=o.offsetTop;
		p.Left+=o.offsetLeft;
		o=o.offsetParent;
	}	
	/*if(p.Left>=1000){
		p.Left-=220;
	}else{
		p.Left+=130;
	}*/
	var chk_width=document.body.offsetWidth;
	if((p.Left+126+221)<document.body.offsetWidth){
		p.Left=p.Left+128;
	}else{
		p.Left=p.Left-215;
	}
	/*if(chk_width<(p.Left+211+126)){
		p.Left-=(211-126);
	}*/
	return p;
}
function show_movie_info(img_id,type,title,rating,rating_people_num,area,genres,actors,director,year,play_times,kernel){	
	var img_obj=document.getElementById(img_id);
	if(img_obj){
		var pos=position(img_obj);		
	}
	var actors_text='主演';
    var director_text='导演';
	if(type=='tv'){
		actors_text='嘉宾';
		director_text='主持人';
	}else if(type=='anime'){
		actors_text='配音';
		director_text='作者';
	}
	var inner_html='<div class="bg_tm"></div>';
	inner_html+='<div class="win_content" id="div_tip_detail"><dl><dd>';
	inner_html+='<dt>'+title+'</dt>';
	var star_level=Math.floor(rating/2);
	inner_html+='<p class="p_1"><span class="star star'+star_level+'"><strong>'+rating+'</strong></span><em>['+rating_people_num+'评]</em></p>';
	
	inner_html+='<p>标签：<span>'+area+genres+'</span></p>';
	if(type!='documentary'){
		inner_html+='<p>'+actors_text+'：<span>'+(actors==''?'--':actors)+'</span></p>';
		inner_html+='<p>'+director_text+'：<span>'+(director==''?'--':director)+'</span></p>';
	}else{
		inner_html+='<p>要点：<span>'+(kernel==''?'--':kernel)+'</span></p>';
	}
	inner_html+='<p>年份：<span>'+(year==''?'':year)+'</span></p>';
	inner_html+='<p>播放：<span>'+(play_times==''?'--':play_times)+'</span></p>';
	inner_html+='</dd></dl></div>';
	try{
		var obj=document.getElementById('movie_info');
		if(obj){
			obj.innerHTML=inner_html;			
			obj.style.top=pos.Top+"px";
			obj.style.left=pos.Left+"px";
			obj.style.display='block';
		}
	}catch(e){}
}
function hide_movie_info(){
	try{
		var obj=document.getElementById('movie_info');
		if(obj){
			obj.style.display='none';
		}
	}catch(e){}
}
//保存浏览记录
function set_view_record(movieinfo){
	set_view_xlcookie_movieid(movieinfo);
	
}
function set_view_xlcookie_movieid(mid){
	var cookie_key = 'movie_id_viewed';
    var value = getCookie_l(cookie_key);
	var mid_s = mid.split('|');
	var movie_id = mid_s[0]+'\\|';
	var movie_id2 = mid_s[0]+'\\|.*?,';
    if(value){
		value=value+',';//给最后添加逗号
		if(value.search(movie_id)!=-1){
		var rere=new RegExp(movie_id2,"g");
		value=value.replace(rere,'');//去掉已经浏览的
		}
    	var tmp = value.split(",");    	
    	tmp.push(mid);
		try{
			while(tmp.length>10){
				var shift_mid=tmp.shift();
			}
		}catch(e){}
    	var ids = tmp.toString();
    	ids = ids.replace(/,{1,}/g,",");
    	ids = ids.replace(/(^,*)|(,*$)/g,"");		
    	setCookieWithDomain_l(cookie_key,ids,10*24,'www.xun.com');
    }else{		
    	setCookieWithDomain_l(cookie_key,mid,10*24,'www.xun.com');
    }
}
//保存收藏记录
function set_collect_xlcookie_movieid(mid){
	var uid=getCookie_l('userid');
	if(uid=='') return;
	
	var cookie_key = 'mic_'+uid;
    var value = getCookie_l(cookie_key);

    if(value){
		var reg=new RegExp(mid,"g");
		value=value.replace(reg,'');//去掉已经浏览的		
    	var tmp = value.split(",");    	
    	tmp.push(mid);    	
    	var ids = tmp.toString();
    	ids = ids.replace(/,{1,}/g,",");
    	ids = ids.replace(/(^,*)|(,*$)/g,"");		
    	setCookieWithDomain_l(cookie_key,ids,24*30,'www.xun.com');
    }else{		
    	setCookieWithDomain_l(cookie_key,mid,24*30,'www.xun.com');
    }
}
//判断是否收藏过
function is_movie_collected(mid){
	var uid=getCookie_l('userid');
	if(uid=='') return false;
	
	var cookie_key = 'mic_'+uid;
    var value = getCookie_l(cookie_key);
	if(value){
		var p=new RegExp(mid,"g");
		if(value.match(p)){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}
function __init_view_record(){
		
		var cookie_key = 'movie_id_viewed';
		
		var movie_ids = getCookie_l(cookie_key);
		if(movie_ids){
			setTimeout(__draw_view_record,2000);
			
		}
}
var vh_last_mid;
/*function __fetch_view_record(movie_ids){
	try{
		var movie_id_arr=movie_ids.split(',');
		
		var tmp_mi_url='';
		var tmp_mid=0;
		for(var ii=(movie_id_arr.length-1);ii>=0;ii--){			
			tmp_mid=movie_id_arr[ii];			
			tmp_mi_url='http://movie.xunlei.com/channel_list_mi/movies/'+Math.floor(tmp_mid/1000)+'/'+tmp_mid+'.js';
			
			loadJSData(tmp_mi_url);
		}
	}catch(e){}

}*/
function __draw_view_record(){
		var cookie_key = 'movie_id_viewed';
		var movie_ids = getCookie_l(cookie_key);
		var movie_id_arr=movie_ids.split(',');
		var i=0;
		var tmp;
		var mid=0;
		var inner_html='';
		for(var ii=(movie_id_arr.length-1);ii>=0;ii--){
			var movie_item = movie_id_arr[ii];
			var movie_item_s = movie_item.split('|');
			if(typeof(vh_last_mid)=='undefined') vh_last_mid=movie_item_s[0].replace("id=","");
			inner_html+='<li class="on" '+((i==0)?' style="display:block;" ':' style="display:none;" ')+' id="vh_detail_li_'+movie_item_s[0].replace("id=","")+'"><a href="'+movie_item_s[2]+'" title="'+movie_item_s[1]+'" class="pic" target="_blank"><img src="'+movie_item_s[3]+'" title="'+movie_item_s[1]+'" /></a><h3><a target="_blank" href="'+movie_item_s[2]+'" title="'+movie_item_s[1]+'">'+movie_item_s[1]+'</a></h3><div class="historylist_score"><span>'+movie_item_s[5]+'</span><a target="_blank" href="'+movie_item_s[2]+'" title="'+movie_item_s[1]+'" class="info">'+movie_item_s[1]+'</a></div>';
			inner_html+='<p>类型:'+movie_item_s[6]+'</p>';
			inner_html+='<p>年份:'+movie_item_s[4]+'年</p>';
			inner_html+='<span class="his_play"><a target="_blank" href="'+movie_item_s[7]+'" title="'+movie_item_s[1]+'">播放</a></span>';
			inner_html+='</div>';
			inner_html+='</li>';
			//片名区域
			inner_html+='<li '+((i==0)?' style="display:none;" ':' style="display:block;" ')+' id="vh_title_li_'+movie_item_s[0].replace("id=","")+'" onmouseover="switch_vh_show('+movie_item_s[0].replace("id=","")+');">'+movie_item_s[1]+'</li>';			
			i++;
		}
		document.getElementById('channel_historylist').innerHTML=inner_html;

}
function switch_vh_show(mid){
		document.getElementById('vh_detail_li_'+vh_last_mid).style.display='none';
		document.getElementById('vh_title_li_'+vh_last_mid).style.display='block';
		
		document.getElementById('vh_detail_li_'+mid).style.display='block';
		document.getElementById('vh_title_li_'+mid).style.display='none';
		
		vh_last_mid=mid;
}
function clear_movies_viewed(){
	try{
		delCookie_l2('movie_id_viewed');
		document.getElementById('channel_historylist').innerHTML='<p style="text-align:center;">暂无浏览记录！</p>';
	}catch(e){}
}
var cl_last_mid;
//通用函数
/*Array.prototype.inArray=function(val){
	var is_exist = false;
	for(var k in this){
		if(val == this[k]){
			is_exist = true;
			break;
		}
	}
	return is_exist;
}*/

function loadJSData(url,callback) { 
	var script = document.createElement('script');	
	script.type = 'text/javascript';
	if (callback) {
		script.onload = script.onreadystatechange = function() { 
			if (script.readyState && script.readyState != 'loaded' && script.readyState != 'complete') 
				return; 
			script.onreadystatechange = script.onload = null;
			try{
				eval(callback+'();');
			}catch(e){}
		}; 
	}
	script.src = url; 
	document.getElementsByTagName('head')[0].appendChild(script);
}
function xlAjax(url, pars, successFun){
	var aj = new Object();
	aj.url=url;
	aj.pars=pars;
	aj.resultHandle=successFun;
	aj.createXMLHttpRequest = function() {
	  var request = false;
	  if(window.XMLHttpRequest) {
	   request = new XMLHttpRequest();
	   if(request.overrideMimeType) {
		request.overrideMimeType('text/xml');
	   }
	  } else if(window.ActiveXObject) {
	   var versions = ['Microsoft.XMLHTTP', 'MSXML.XMLHTTP', 'Microsoft.XMLHTTP', 'Msxml2.XMLHTTP.7.0', 'Msxml2.XMLHTTP.6.0', 'Msxml2.XMLHTTP.5.0', 'Msxml2.XMLHTTP.4.0', 'MSXML2.XMLHTTP.3.0', 'MSXML2.XMLHTTP'];
	   for(var i=0; i<versions.length; i++) {
		try {
		 request = new ActiveXObject(versions[i]);
		 if(request) {
		  return request;
		 }
		} catch(e) {}
	   }
	  }
	  return request;
	}
	aj.XMLHttpRequest=aj.createXMLHttpRequest();
	aj.processHandle = function() {
		if(aj.XMLHttpRequest.readyState==4 && aj.XMLHttpRequest.status == 200) {
			aj.resultHandle(aj.XMLHttpRequest);
		}
	}
	aj.get = function() {
		try{
			aj.XMLHttpRequest.onreadystatechange = aj.processHandle;
			aj.XMLHttpRequest.open("GET",aj.url+"?"+aj.pars);
			aj.XMLHttpRequest.send(null);
		}catch(e){
			
		}
	}
	aj.post = function() {
		try{
		  aj.XMLHttpRequest.onreadystatechange = aj.processHandle;
		  aj.XMLHttpRequest.open('POST',aj.url,true);
		  aj.XMLHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
		  aj.XMLHttpRequest.send(aj.pars);
		}catch(e){
			alert(e);
		}
	}
  return aj;
}

function getCookie_l(name) {
	
	var value=(document.cookie.match(new RegExp('(^' + name + '| ' + name + ')=([^;]*)')) == null)?'':RegExp.$2;
	
	if(value!=''){
		return unescape(value);
	}
	return '';
}
function setCookieWithDomain_l(name, value, hours,domain) {
    var expire = "; path=/";
    if(hours != null) {
        expire = new Date((new Date()).getTime() + hours * 3600000);
        expire = "; expires=" + expire.toGMTString() + "; path=/";
    }
    document.cookie = name + "=" + escape(value)+';domain='+domain +';'+ expire;
}
function delCookie_l(name) {
	var expireDate=new Date(new Date().getTime());
	document.cookie = name + "= ; path=/; domain=www.xun.com; expires=" + expireDate.toGMTString();
}
function delCookie_l2(name) {
	var expireDate=new Date(new Date().getTime());
	document.cookie = name + "= ; path=/; domain=www.xun.com; expires=" + expireDate.toGMTString();
}
var EventUtil={};
EventUtil.addEventHandler=function(a,b,c){if(a.addEventListener)a.addEventListener(b,c,false);else if(a.attachEvent)a.attachEvent("on"+b,c);else a["on"+b]=c};EventUtil.removeEventHandler=function(a,b,c){if(a.removeEventListener)a.removeEventListener(b,c,false);else if(a.detachEvent)a.detachEvent("on"+b,c);else a["on"+b]=null};ScrollCrossLeft={interval:0,count:0,duration:0,step:0,srcObj:null,callback:null};
ScrollCrossLeft.doit=function(a,b,c,d){var e=ScrollCrossLeft,f=function(g,h,j,k){return j*((g=g/k-1)*g*g+1)+h}(e.count,b,c,d);a.style.marginLeft=f+"px";BigNews.currentBegin=f;e.count++;if(e.count==d){clearInterval(e.interval);e.count=0;a.style.marginLeft=b+c+"px";BigNews.currentBegin=b+c;e.callback()}};ScrollCrossLeft2={interval:0,count:0,duration:0,step:0,srcObj:null,callback:null};
ScrollCrossLeft2.doit_2=function(a,b,c,d){var e=ScrollCrossLeft2;a.style.marginLeft=function(f,g,h,j){return h*((f=f/j-1)*f*f+1)+g}(e.count,b,c,d)+"px";e.count++;if(e.count==d){clearInterval(e.interval);e.count=0;a.style.marginLeft=b+c+"px";e.callback()}};ScrollCrossLeft2.scroll=function(a,b,c,d,e,f){var g=ScrollCrossLeft2;g.duration=f;g.callback=e;g.interval=setInterval(function(){g.doit_2(a,d,b*c,f)},10)};
var B=BigNews={current:0,next:0,scrollInterval:0,autoScroller:0,s:{},f:{},t:{},OnScrolling:false,preCss:"",currentBegin:0};BigNews.turn=function(a,b){if(a==BigNews.current)return false;$("showDiv_"+a).style.zIndex++;if($("bigpic_"+a).src=="http://images.movie.xunlei.com/img_default.gif")try{setTimeout('$("bigpic_'+a+'").src = ScrollBigPic['+a+"] ;",50)}catch(c){}BigNews.fadeIn("showDiv_"+a,a,50,b);BigNews.scroll(a,b)};
BigNews.fadeIn=function(a,b,c,d){try{clearInterval(BigNews.f.interval)}catch(e){}var f=$(a),g=0;BigNews.f.interval=setInterval(function(){g+=20;f.style.filter="alpha(opacity="+g+")";f.style.cssText=f.style.cssText.replace(/;-moz-opacity:.*?;/gi,"")+";-moz-opacity:"+g*0.01;f.style.cssText=f.style.cssText.replace(/;opacity:.*?;/gi,"")+";opacity:"+g*0.01;f.style.display="block";if(g==100){for(var h=0;h<d.totalcount;h++){$("title_bg_"+h).style.cssText="position:absolute;left:0;top:269px;float:none;width:740px;height:40px;background:#000;filter:alpha(opacity=60);opacity:0.6;z-index:98;filter:alpha(opacity=0);-moz-opacity:0;opacity:0";
$("title_"+h).style.cssText="position:absolute;left:10px;top:282px;font-size:14px;color:#fff;font-weight:normal;z-index:99;filter:alpha(opacity=0);-moz-opacity:0;opacity:0";BigNews.showTitles(b,d);$("showDiv_"+h).style.cssText=BigNews.preCss;if(h==b)$("showDiv_"+h).style.display="block";else $("showDiv_"+h).style.display="none";$("showDiv_"+b).style.zIndex=0}BigNews.current=b;clearInterval(BigNews.f.interval)}},c)};
BigNews.showTitles=function(a){try{clearInterval(BigNews.t.interval)}catch(b){}var c=$("title_"+a),d=$("title_bg_"+a),e=0;BigNews.t.interval=setInterval(function(){e+=10;c.style.filter="alpha(opacity="+e+")";c.style.cssText=c.style.cssText.replace(/;-moz-opacity:.*?;/gi,"")+";-moz-opacity:"+e*0.01;c.style.cssText=c.style.cssText.replace(/;opacity:.*?;/gi,"")+";opacity:"+e*0.01;d.style.filter="alpha(opacity="+e*0.6+")";d.style.cssText=d.style.cssText.replace(/;-moz-opacity:.*?;/gi,"")+";-moz-opacity:"+
e*0.0060;d.style.cssText=d.style.cssText.replace(/;opacity:.*?;/gi,"")+";opacity:"+e*0.0060;e==100&&clearInterval(BigNews.t.interval)},50)};BigNews.scroll=function(a,b){var c=b.step;BigNews.next=a;try{clearInterval(BigNews.s.interval)}catch(d){}$(b.hover);BigNews.s.duration=16;BigNews.s.callback=function(){};var e=parseInt(BigNews.currentBegin),f=a*c-e;BigNews.s.interval=setInterval(function(){BigNews.s.doit($(b.hover),e,f,16)},8)};
BigNews.auto=function(a){clearInterval(BigNews.autoScroller);BigNews.autoScroller=setInterval(function(){BigNews.turn(BigNews.current==a.totalcount-1?0:BigNews.current+1,a)},a.autotimeintval)};BigNews.pauseSwitch=function(){clearTimeout(BigNews.autoScroller)};BigNews.showNext=function(a,b){if(a>=MovieRecom.totalcount-1)return false;else{BigNews.pauseSwitch();BigNews.turn(a+1,b);BigNews.auto(b)}};BigNews.showPre=function(a,b){if(a<=0)return false;else{BigNews.pauseSwitch();BigNews.turn(a-1,b);BigNews.auto(b)}};
BigNews.init=function(a){BigNews.s=ScrollCrossLeft;BigNews.preCss=a.css;EventUtil.addEventHandler($(a.bigpic),"mouseover",new Function("BigNews.pauseSwitch();"));EventUtil.addEventHandler($(a.bigpic),"mouseout",new Function("BigNews.auto("+a.objname+");"));for(i=0;i<a.totalcount;i++)if(a.smallpic!=null&&a.smallpic!=""){EventUtil.addEventHandler($(a.smallpic+"_"+i),"mouseover",new Function("BigNews.pauseSwitch();BigNews.turn("+i+","+a.objname+");return false;"));EventUtil.addEventHandler($(a.smallpic+
"_"+i),"mouseout",new Function("BigNews.auto("+a.objname+");"))}BigNews.showTitles(0,a);BigNews.auto(a)};