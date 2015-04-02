jQuery.noConflict();
function show_box(target, index, count) {
	if(jQuery("#nav_"+target+"_"+index).length > 0 && jQuery("#box_"+target+"_"+index).length > 0) {
		for(var i = 0;i < count;i++) {
			try {
				jQuery("#nav_"+target+"_"+i).attr('className', 'xxxxxx');
				jQuery("#box_"+target+"_"+i).css('display','none');
			} catch(e) {}
		}
		
		try {
			jQuery("#nav_"+target+"_"+index).attr('className', 'on');
			jQuery("#box_"+target+"_"+index).css('display','block');
		} catch(e) {}
		
		try {
			jQuery("#box_"+target+"_"+index+">ul>li").each(function(i) {
				if (jQuery(this).children("a").children("img").length > 0 && jQuery(this).children("a").children("img").attr("src2")) {
					jQuery(this).children("a").children("img").attr("src", jQuery(this).children("a").children("img").attr("src2"));
				}
			});
		} catch(e) {}
	}
}

function getParameter(name){
	// 先取?
    var search = document.location.search;
    var pattern = new RegExp("[?&]"+name+"\=([^&]+)", "g");
    var matcher = pattern.exec(search);
    var items = null;
    if(null != matcher){
        items = decodeURIComponent(matcher[1]);
    } else {
		// 再取#
		search = document.location.hash;
    	pattern = new RegExp("#"+name, "g");
    	matcher = pattern.exec(search);
    	if(null != matcher){
			return true;
		}
	}
    return items;
}

function tab_q(type){
	var types=['new','hot'];
	for(i=0;i<=types.length-1;i++){
		try {
			var d_obj = document.getElementById('comment_'+types[i]);
			if(!d_obj)return ;
			d_obj.style.display = 'none';
	
			var t_obj = document.getElementById('tab_'+types[i]);
			t_obj.className='h3_tt_yp_a';
		} catch(e) {}
	}

	try {
		var d_obj = document.getElementById('comment_'+type);
		d_obj.style.display = '';
	
		var t_obj = document.getElementById('tab_'+type);
		t_obj.className='h3_tt_yp_a cureA';
		showUserPic(type) ;
	} catch(e) {}
}

var UserPic = [] ;
function showUserPic(type) {
	if (type == "new") {
		for (i=0;i<UserPic.length;i++) {
			if (document.getElementById(UserPic[i]['index']).innerHTML == "") {
				document.getElementById(UserPic[i]['index']).innerHTML = UserPic[i]['value'] ;
			}
		}
	}
}

function ipstat(srcid,clickmid){
	var url = "http://ipstat.kankan.xunlei.com:9090/morec?currmid="+srcid+'&clickmid='+clickmid+'&ts='+new Date();
	setTimeout(function(){
		var img = new Image(1,1);
		img.src = url;
	},1);
}

var dapCtrl = false;
try{
	if(getParameter("fromxmp")){
		dapCtrl = new ActiveXObject("DapCtrl.DapCtrl");
	
		if(dapCtrl){
			var dapCtrlVer = dapCtrl.GetThunderVer('KANKAN', 'INSTALL');
			var dapCtrlType = dapCtrl.Get('IXMPPACKAGETYPE');
			if(dapCtrlVer < 688 || dapCtrlType <= 2400){
				location.href='http://data.movie.xunlei.com/movie/'+movieid;
			}
		}
	}
}
catch(e){
	location.href='http://data.movie.xunlei.com/movie/'+movieid;
}

var downjs_data_gotten=false;
function showPlayBtn() {
	if(play_type == 'vod') {
		if (getParameter("fromxmp")) {
			try {
				document.getElementById("PlayBtn").className = "moviedteail_btn_xmp";
				document.getElementById("PlayBtn").innerHTML = '<a href="javascript://" onclick="playOnXmp();return false;" target="_self" title="'+movie_title+'立即播放">立即播放</a>' ;
			} catch(e) {}
		} else {
			try {
				var html = '';
				if(movie_vod_url_gy != '' && movie_vod_url_yy != ''){
					html += '<div class="moviedteail_btn_gy"><a href="'+movie_vod_url_gy+'" target="kankanWindow" onclick="jump_click('+movieid+', \'play\');" target="_blank" title="'+movie_title+'在线观看国语版">国语版</a></div>';
					html += '<div class="moviedteail_btn_yy"><a href="'+movie_vod_url_yy+'" target="kankanWindow" onclick="jump_click('+movieid+', \'play\');" target="_blank" title="'+movie_title+'在线观看粤语版">粤语版</a></div>';
				}
				if(html == ''){
					document.getElementById("PlayBtn").className = "moviedteail_btn_OL";
					html = '<a href="'+vod_url+'" target="kankanWindow" onclick="jump_click('+movieid+', \'play\');" target="_blank" title="'+movie_title+'在线观看">在线观看</a>';
				}
				document.getElementById("PlayBtn").innerHTML = html;
			} catch(e) {}
		}
		var downBtn=document.getElementById('downBtn');
		if(downBtn){
			try{
				downBtn.className = "moviedteail_btn_dl";
				downBtn.innerHTML='<a href="javascript:void(0);" onclick="quick_down_all(1);" title="立即下载">立即下载</a>';
			}catch(e){}
		}
	} else if(play_type == 'pre') {
		try {
			document.getElementById("PlayBtn").className = "moviedteail_btn_yg";
			document.getElementById("PlayBtn").innerHTML = '<a href="'+pre_url+'" target="_blank" title="预告片">预告片</a>' ;
		} catch(e) {}
	} else {
		try {
			document.getElementById("PlayBtn").className = "moviedteail_btn_none";
			document.getElementById("PlayBtn").innerHTML = '暂无点播' ;
		} catch(e) {}	
	}
}

function _PlaySub(submovieid){
	try{
		var _url= "/sname "+movie_title+" /imovieid "+hall_id+" /sopenfrom web";
		if(dapCtrl.GetThunderVer("KANKAN", "INSTALL")>=688){
			_url+=" /isubmovieid "+submovieid;
			dapCtrl.Put("sXmp4Arg",_url);
		}
	}catch(e){alert('抱歉，您当前使用的浏览器与迅雷看看不兼容，请使用IE浏览器');}
}

function loadScript(url, callback) { 
	var script = document.createElement('script'); 
	var now= new Date();
	url += '?v='+now.getMinutes();
	script.type = 'text/javascript';
	if (callback) {
		script.onload = script.onreadystatechange = function() { 
			if (script.readyState && script.readyState != 'loaded' && script.readyState != 'complete') 
				return; 
			script.onreadystatechange = script.onload = null;
			if(vod_url != '' && typeof(fenji_json) != 'undefined' &&  fenji_json != null) {
				callback();
			} else {
				deleteElement('box_online_down'); 
			}
		}; 
	}
	script.src = url; 
	document.getElementsByTagName('head')[0].appendChild(script);
}

function loadScript2(url, callback){
	var script = document.createElement('script'); 
	script.type = 'text/javascript';
	script.src = url;
	document.getElementsByTagName('head')[0].appendChild(script);
	if(callback){
		script.onload = script.onreadystatechange = function(){
			if(script.readyState && script.readyState != 'loaded' && script.readyState != 'complete'){
				return;
			}
			script.onreadystatechange = script.onload = null;
			try{
				eval(callback+'();');
			}catch(e){}
		};
	}
}

function in_array(str, arr) {
	for(var s=0;s<arr.length;s++) {
		if(arr[s] == str) {
			return true;
		}
	}
	return false;
}

function show_Latest() {
	if(latest_json != null && latest_json.length > 0) {
		var tipsHtml = '<strong class="fenji_tips_tt">更新提示:</strong>已更新至';
		
		for(var i=0;i<latest_json.length;i++) {
			if(i>0)
				tipsHtml += '、';
			
			if (getParameter("fromxmp")) {
				tipsHtml += '<a href="javascript:void(0);" onclick="_PlaySub('+latest_json[i][0]+');return false;" title="'+latest_json[i][1]+'"><strong>'+latest_json[i][1]+'</strong></a>';
			} else {
				tipsHtml += '<a href="'+latest_json[i][2]+'" target="_blank" title="'+latest_json[i][1]+'"><strong>'+latest_json[i][1]+'</strong></a>';
			}
		}
		
		try {
			document.getElementById('fenji_tips_tt').innerHTML = tipsHtml;
		} catch(e) {}
	}
}

var firstScreen = true;

function Do_Draw_List() {
	if(typeof(fenji_json)=='undefined' || fenji_json==null || fenji_json.length == 0) {
		return;
	}
	
	if (fenji_json[0].indexOf('_') != -1) {
		Draw_Tvlist(0, 1);
	} else {
		Draw_List(1);
	}
}

function Draw_Tvlist(curPage,offset) {
	if(typeof(fenji_json)=='undefined' || fenji_json==null){
		return;
	}
	var pageCount = fenji_json.length;
	// 统计数据
	var tv_Nav = new Array();
	var date;
	var date_str;
	var pos;
	var j = 0;
	for(var i=0;i<pageCount;i++) {
		date = fenji_json[i].split('_');
		date_str = date[0]+'_'+date[1];
		if(!in_array(date_str, tv_Nav)) {
			tv_Nav.push(date_str);
			if(curPage) {
				if(curPage == date_str)
					pos = j;
			}
			j++;
		}
	}

	if(curPage == 0) {
		curPage = date_str;
		pos = tv_Nav.length-1;
	}
	
	try {
		if(document.getElementById('fenji_imgcon_'+curPage) != null && document.getElementById('fenji_imgcon_'+curPage).childNodes[0].nodeName == 'UL') {
					
			var divEle = document.getElementById('fenji_imgcon_'+curPage);
			var lisEle = divEle.childNodes[0].childNodes;

			for(var i=0;i<lisEle.length;i++) {

				//var autoid = lisEle[i].childNodes[0].getAttribute("subid");
				//var submovieid = lisEle[i].childNodes[0].getAttribute("subid2");

				if (getParameter("fromxmp")) {
					try{
						if(vod_type == 'flv'){
							lisEle[i].childNodes[0].onclick = function(){_PlaySub(this.subid);return false;}
							lisEle[i].childNodes[1].onclick = function(){_PlaySub(this.subid);return false;}
						}
					}catch(e){}
					lisEle[i].childNodes[0].href = 'javascript:void(0);';
					lisEle[i].childNodes[0].removeAttribute("target");
					lisEle[i].childNodes[1].href = 'javascript:void(0);';
					lisEle[i].childNodes[1].removeAttribute("target");
				}
				if(lisEle[i].childNodes[0].childNodes[0].nodeName == "IMG" && lisEle[i].childNodes[0].childNodes[0].getAttribute("src2")) {
					lisEle[i].childNodes[0].childNodes[0].setAttribute("src", lisEle[i].childNodes[0].childNodes[0].getAttribute("src2"));	
				}
			}
		}
		
		// 生成TAB栏
		var pageStr = '';
		var start = (pos-offset-1)<0?0:(pos-offset-1);
		var end = ((pos-offset+1)>(tv_Nav.length-1))?(tv_Nav.length-1):(pos-offset+1);
		if(pos>0) {
			pageStr += '<a onclick="Draw_Tvlist(\''+tv_Nav[pos-1]+'\','+(offset>-1?(offset-1):-1)+');" href="#online_play" title="上一月" target="_self">&lt;&lt;上一月</a>';
		}
	
		for(var i=start;i<=end;i++) {
			date = tv_Nav[i].split('_');
			date_str = date[0]+'年'+date[1]+'月';
			if(tv_Nav[i] == curPage)
				pageStr += '<a onclick="Draw_Tvlist(\''+tv_Nav[i]+'\','+eval(i-start-1)+');" href="#online_play" title="'+date_str+'" target="_self" class="on">'+date_str+'</a>';
			else
				pageStr += '<a onclick="Draw_Tvlist(\''+tv_Nav[i]+'\','+eval(i-start-1)+');" href="#online_play" title="'+date_str+'" target="_self">'+date_str+'</a>';
				
			// 隐藏其他区域
			try {
				document.getElementById('fenji_imgcon_'+tv_Nav[i]).style.display = "none";
			} catch(e) {}
		}
		if(pos<(tv_Nav.length-1)) {
			pageStr += '<a onclick="Draw_Tvlist(\''+tv_Nav[pos+1]+'\','+(offset<1?(offset+1):1)+');" href="#online_play" title="下一月" target="_self">下一月&gt;&gt;</a>';
		}
		
		// 生成右下TAB
		var rbNav = '';
		if(pos>0) {
			rbNav += '<a onclick="Draw_Tvlist(\''+tv_Nav[pos-1]+'\','+(offset>-1?(offset-1):-1)+');" href="#online_play" title="前一月" target="_self">前一月</a>';
		}
		if(pos<(tv_Nav.length-1)) {
			rbNav += '<a onclick="Draw_Tvlist(\''+tv_Nav[pos+1]+'\','+(offset<1?(offset+1):1)+');" href="#online_play" title="后一月" target="_self" class="fenji_turn_right">后一月</a>';
		}
		
		document.getElementById("fenji_turn").innerHTML = rbNav;
		document.getElementById("fenji_tab").innerHTML = pageStr;
		document.getElementById('fenji_imgcon_'+curPage).style.display = "block";
	} catch(e) {}
	
	show_Latest();
	read_History();
}

function Draw_List(curPage) {
	if(typeof(fenji_json)=='undefined' || fenji_json==null){
		return;
	}
	var pageCount = fenji_json.length;
	var perPage = 30;
	var pageFrom = (curPage-1)*perPage+1;
	var pageTo = (curPage*perPage>pageCount)?pageCount:(curPage*perPage);
	var pageNum = Math.ceil(pageCount/perPage);
	// 统计数据
	var li_Nav = new Array(pageNum);
	for(var i=0;i<pageCount;i++) {
		var curNum = Math.ceil((i+1)/perPage);
		if(typeof(li_Nav[curNum-1]) == 'undefined')
			li_Nav[curNum-1] = 0;
		li_Nav[curNum-1]++;
	}

	try {
		
		if(document.getElementById('fenji_imgcon_'+eval(curPage-1)) != null && document.getElementById('fenji_imgcon_'+eval(curPage-1)).childNodes[0].nodeName == 'UL') {
					
			var divEle = document.getElementById('fenji_imgcon_'+eval(curPage-1));
			var lisEle = divEle.childNodes[0].childNodes;

			for(var i=0;i<lisEle.length;i++) {

				//var autoid = lisEle[i].childNodes[0].getAttribute("subid");
				//var submovieid = lisEle[i].childNodes[0].getAttribute("subid2");

				if (movieid==60832) {
					lisEle[i].childNodes[0].href = 'http://active.game.xunlei.com/wxkj/play.html?id='+movieid+'&setID='+lisEle[i].childNodes[0].getAttribute("subid");
					lisEle[i].childNodes[1].href = 'http://active.game.xunlei.com/wxkj/play.html?id='+movieid+'&setID='+lisEle[i].childNodes[0].getAttribute("subid");
				}
				if (getParameter("fromxmp")) {
					try{
						if(vod_type == 'flv'){
							lisEle[i].childNodes[0].onclick = function(){_PlaySub(this.subid);return false;}
							lisEle[i].childNodes[1].onclick = function(){_PlaySub(this.subid);return false;}
						}
					}catch(e){}
					lisEle[i].childNodes[0].href = 'javascript:void(0);';
					lisEle[i].childNodes[0].removeAttribute("target");
					lisEle[i].childNodes[1].href = 'javascript:void(0);';
					lisEle[i].childNodes[1].removeAttribute("target");
				}
				if(lisEle[i].childNodes[0].childNodes[0].nodeName == "IMG" && lisEle[i].childNodes[0].childNodes[0].getAttribute("src2")) {
					lisEle[i].childNodes[0].childNodes[0].setAttribute("src", lisEle[i].childNodes[0].childNodes[0].getAttribute("src2"));	
				}
			}
		}
		
		// 生成TAB栏
		var pageStr = '';
		for(var i=1;i<=pageNum;i++) {
			pageFrom = (i-1)*perPage+1;
			pageTo = (i*perPage>pageCount)?pageCount:(i*perPage);
			if(pageFrom<10) pageFrom = '0'+pageFrom;
			if(pageTo<10) pageTo = '0'+pageTo;
		
			if(i == curPage)
				pageStr += '<a onclick="Draw_List('+i+');" href="#online_play" title="'+pageFrom+'-'+pageTo+'" target="_self" class="on">'+pageFrom+'-'+pageTo+'</a>';
			else
				pageStr += '<a onclick="Draw_List('+i+');" href="#online_play" title="'+pageFrom+'-'+pageTo+'" target="_self">'+pageFrom+'-'+pageTo+'</a>';
				
			// 隐藏其他区域
			try {
				document.getElementById('fenji_imgcon_'+eval(i-1)).style.display = "none";
			} catch(e) {}
		}

		// 生成右下TAB
		var rbNav = '';
		if(curPage>1) {
			rbNav += '<a onclick="Draw_List('+eval(curPage-1)+');" href="#online_play" title="前'+li_Nav[curPage-2]+'集" target="_self">前'+li_Nav[curPage-2]+'集</a>';
		}
		if(curPage<pageNum) {
			rbNav += '<a onclick="Draw_List('+eval(curPage+1)+');" href="#online_play" title="后'+li_Nav[curPage]+'集" target="_self" class="fenji_turn_right">后'+li_Nav[curPage]+'集</a>';
		}
		
		document.getElementById("fenji_turn").innerHTML = rbNav;
		document.getElementById("fenji_tab").innerHTML = pageStr;
		document.getElementById('fenji_imgcon_'+eval(curPage-1)).style.display = "block";
	} catch(e) {}
	
	show_Latest();
	read_History();
}

function loadDownScript(url, callback) {
	var script = document.createElement('script'); 
	var now= new Date();
	url += '?v='+now.getMinutes();
	script.type = 'text/javascript';
	if (callback) {
		script.onload = script.onreadystatechange = function() { 
			if (script.readyState && script.readyState != 'loaded' && script.readyState != 'complete') 
				return; 
			script.onreadystatechange = script.onload = null;
			if(typeof(down_json) != 'undefined' && down_json != null && (down_json[0].length > 0 || down_json[1].length > 0 || down_json[2].length > 0)) {
				callback();
			} else if(typeof(fenji_json) != 'undefined' && fenji_json != null && fenji_json.length > 0) {
				deleteElement('nav_online_1'); 
				deleteElement('box_online_1');
				show_box('online', 0, 2);
			}else if(typeof(has_items_for_pay)!='undefined' && movie_type != 'documentary' && movieid != 60832){//此tab不论有无高清收费下载都显示
				try {
					document.getElementById('nav_online_2').className = "on";
					document.getElementById('box_online_2').style.display='block';
				} catch(e) {}
				if(typeof(down_json)=='undefined' || down_json==null||(down_json[0].length==0||down_json[1].length==0||down_json[2].length==0)){
					deleteElement('nav_online_1'); 
					deleteElement('box_online_1');
				}
				if(typeof(fenji_json)=='undefined'|| fenji_json==null||fenji_json.length==0){
					deleteElement('nav_online_0'); 
					deleteElement('box_online_0');
				}
			} else {
				deleteElement('box_online_down'); 
			}
		}; 
	}
	script.src = url; 
	document.getElementsByTagName('head')[0].appendChild(script); 
}

function Show_Down() {
	if(movie_type == 'movie')
		loadDownScript('http://movie.xunlei.com/down_js/'+(Math.floor(movieid/1000))+'\/'+movieid+'.js', function(){Draw_MovieDown();downjs_data_gotten=true;});
	else 
		loadDownScript('http://movie.xunlei.com/down_js/'+(Math.floor(movieid/1000))+'\/'+movieid+'.js', function(){Draw_Down();downjs_data_gotten=true;});
	
}

var down_array = new Array();

function Draw_Down() {
	
	var div_download_tab = document.createElement('div');
	div_download_tab.id = 'download_tab';
	div_download_tab.className = 'download_tab download_tab_on';
	div_download_tab.innerHTML = '<span id="select_p">请选择清晰度：</span><a href="javascript:void(0);" title="320P流畅" id="nav_down_0" onclick="show_box(\'down\', 0, 3);">320P流畅</a><a href="javascript:void(0);" title="480P标清" id="nav_down_1" onclick="show_box(\'down\', 1, 3);">480P标清</a><a href="javascript:void(0);" title="720P高清" id="nav_down_2" onclick="show_box(\'down\', 2, 3);">720P高清</a>';
				
	try {
		document.getElementById('box_online_1').appendChild(div_download_tab);
	} catch(e) {}
	var m=0;
	var text_p = new Array('320P流畅','480P标清','720P高清');
	for(var i=0;i<3;i++) {
		if(typeof(down_json[i]) != 'undefined' && down_json[i].length>0){			
			try {
				down_array[m] = new Array();
				var n = 0;	
				if(document.getElementById('box_down_'+m) == null) {
					
					var ul_down_list = document.createElement('ul');
					ul_down_list.id = 'download_list_'+m;
					ul_down_list.className = 'download_list';
					
					for(var j=0;j<down_json[i].length;j++) {
						var down_info = new Array();
						//cid, url, refer, name, stat
						
						down_info['cid'] = '';
						down_info['url'] = down_json[i][j][4];
						down_info['refer'] = '';
						down_info['name'] ='[迅雷免费高清下载].'+movie_title+'__'+down_json[i][j][0]+'__'+text_p[i] + '.xv';
						down_info['stat'] = '';
						
						down_array[m][n] = down_info;
						var liEle = document.createElement('li');
						if(n%2==0)
							liEle.className = 'odd';
						liEle.innerHTML = '<input type="checkbox" onclick="set_checked(this,'+m+','+n+');" /><a href="javascript:void(0);" onclick="down_one('+m+','+n+');" title="'+down_json[i][j][0]+'">'+movie_title+'['+down_json[i][j][0]+']</a><span>'+down_json[i][j][2]+'</span>';
						ul_down_list.appendChild(liEle);
						n++;
					}
					
					
					var div_scrollcontain = document.createElement('div');
					div_scrollcontain.id = 'scrollcontain_'+m;
					if(down_json[i].length > 20) {
						div_scrollcontain.className = 'scrollcontain';
					}
					div_scrollcontain.appendChild(ul_down_list);
					
					var div_scrollbox = document.createElement('div');
					if(down_json[i].length > 20) {
						div_scrollbox.className = 'scrollbox scrollbox_show';
					}else{
						div_scrollbox.className = 'scrollbox';
					}
					div_scrollbox.appendChild(div_scrollcontain);
					
					var div_box_down = document.createElement('div');
					div_box_down.id = 'box_down_'+m;
					div_box_down.appendChild(div_scrollbox);
					
					var div_download_oper = document.createElement('div');
					div_download_oper.className = 'download_oper';
					div_download_oper.innerHTML = ' <input type="checkbox" id="cb_all_bottom_'+m+'" onclick="set_allchecked(this,'+m+');" /><label>全选</label><a href="javascript:void(0);" onclick="down_checked('+m+');" title="下载选中文件" class="dl_all">下载选中文件</a><div class="download_tips"><a href="http://www.xunlei.com/help/index.html?15#faq15" target="_blank" title="无法下载？">无法下载？</a><a href="http://www.xunlei.com/help/index.html?16#faq16" target="_blank" title="下载完成后无法播放？">下载完成后无法播放？</a></div>';
					div_box_down.appendChild(div_download_oper);
					document.getElementById('box_online_1').appendChild(div_box_down);
					
					show_box('down',m,3);
					m++;
				}
				
			} catch(e) {}
		} else {
			deleteElement('nav_down_'+i);
		}
	}
}


function Draw_MovieDown() {
	var text_p = new Array('320P流畅','480P标清','720P高清');
	
	
	var div_scrollcontain;
	var ul_down_list;
	
	if(document.getElementById('box_down_0') == null) {

		ul_down_list = document.createElement('ul');
		ul_down_list.id = 'download_list_special';
		ul_down_list.className = 'download_list';
		var m=0;
		for(var i=0;i<3;i++) {			
			if(typeof(down_json[i]) != 'undefined' && down_json[i].length > 0) {
				try {
					down_array[m] = new Array();
					var n = 0;					
					for(var j=0;j<down_json[i].length;j++) {
						var down_info = new Array();
						//cid, url, refer, name, stat
						
						down_info['cid'] = '';
						down_info['url'] = down_json[i][j][4];
						down_info['refer'] = '';
						down_info['name'] ='[迅雷免费高清下载].'+movie_title+'__'+down_json[i][j][0]+'__'+text_p[i] + '.xv';
						down_info['stat'] = '';
						
						down_array[m][n] = down_info;
						
						var liEle = document.createElement('li');
						if(n % 2 == 0)
							liEle.className = 'odd';
						liEle.innerHTML = '<input type="checkbox" onclick="set_checked(this,'+m+', '+n+');" /><a href="javascript:void(0);" onclick="down_one('+m+','+n+');" title="'+movie_title+'（'+text_p[i]+'）">'+movie_title+'-'+down_json[i][j][0]+'（'+text_p[i]+'）</a><span>'+down_json[i][j][2]+'</span>';
						ul_down_list.appendChild(liEle);
						n++;
					}
					m++;
				}catch(e){}
			}
		}
		
		div_scrollcontain = document.createElement('div');
		div_scrollcontain.id = 'scrollcontain_0';
		if(n > 20) {
			div_scrollcontain.className = 'scrollcontain';
		}
		div_scrollcontain.appendChild(ul_down_list);
		
		var div_scrollbox = document.createElement('div');
		if(n > 20) {
			div_scrollbox.className = 'scrollbox scrollbox_show';
		}else{
			div_scrollbox.className = 'scrollbox';
		}
		div_scrollbox.appendChild(div_scrollcontain);
		
		var div_box_down = document.createElement('div');
		div_box_down.id = 'box_down_0';
		div_box_down.appendChild(div_scrollbox);
		
		var div_download_oper = document.createElement('div');
		div_download_oper.className = 'download_oper';
		div_download_oper.innerHTML = ' <input type="checkbox" id="cb_all_bottom_0" onclick="set_allchecked(this,\'special\');" /><label>全选</label><a href="javascript:void(0);" onclick="down_checked(\'special\');" title="下载选中文件" class="dl_all">下载选中文件</a><div class="download_tips"><a href="http://www.xunlei.com/help/index.html?15#faq15" target="_blank" title="无法下载？">无法下载？</a><a href="http://www.xunlei.com/help/index.html?16#faq16" target="_blank" title="下载完成后无法播放？">下载完成后无法播放？</a></div>';
		div_box_down.appendChild(div_download_oper);
		document.getElementById('box_online_1').appendChild(div_box_down);
		
		show_box('down', 0, 3);
	}
}

function set_checked(ele, i, j) {
	if(ele.checked) {
		down_array[i][j]['checked'] = true;
	} else {
		down_array[i][j]['checked'] = false;
	}
}

function set_allchecked(ele,i){
	var is_digi=/^\d+$/;
	var lis = document.getElementById('download_list_'+i).childNodes;
	
	if(is_digi.test(i)){		
		for(var j=0;j<lis.length;j++){
			if(ele.checked)
				down_array[i][j]['checked'] = true;
			else 
				down_array[i][j]['checked'] = false;
			
			if(lis[j].nodeName == 'LI') {
				lis[j].childNodes[0].checked = ele.checked;
			}
		}
	}else if(i=='special'){
		for(var k=0;k<down_array.length;k++){
			for(var ttt in down_array[k]){
				if(ele.checked)
					down_array[k][ttt]['checked'] = true;
				else 
					down_array[k][ttt]['checked'] = false;
				
			}
		}
		try{
			for(var j=0;j<lis.length;j++){				
				if(lis[j].nodeName == 'LI') {
					lis[j].childNodes[0].checked = ele.checked;
				}				
			}
		}catch(e){}
	}
}

var cur_eleName;

window.onresize = function(){
	document.getElementById("floatbg").style.height = document.body.scrollHeight;
	document.getElementById("floatbg").style.width = document.body.scrollWidth;
	if(document.getElementById(cur_eleName)) {
		document.getElementById(cur_eleName).style.top = document.documentElement.scrollTop + document.documentElement.clientHeight/2 + 'px';
		document.getElementById(cur_eleName).style.left = document.documentElement.scrollLeft + document.documentElement.clientWidth/2 + 'px';
	}
}

window.onscroll = function(){
	var browser=navigator.appName;
	var b_version=navigator.appVersion;
	var version=parseFloat(b_version);

	if (browser=="Microsoft Internet Explorer" && version>=4 && document.getElementById(cur_eleName)) {
		document.getElementById(cur_eleName).style.top = document.documentElement.scrollTop + document.documentElement.clientHeight/2;
		document.getElementById(cur_eleName).style.left = document.documentElement.scrollLeft + document.documentElement.clientWidth/2;
	}

}

function show_FloatBox(eleId) {
	cur_eleName = eleId;
	document.getElementById("floatbg").style.height = document.body.scrollHeight;
	document.getElementById("floatbg").style.width = document.body.scrollWidth;
	
	document.getElementById(cur_eleName).style.display = '';
	document.getElementById('floatbg').style.display = '';
	document.getElementById(cur_eleName).style.top = document.documentElement.scrollTop + document.documentElement.clientHeight/2;
	document.getElementById(cur_eleName).style.left = document.documentElement.scrollLeft + document.documentElement.clientWidth/2;
	
	if(eleId == 'floatbox_low_version' || eleId == 'floatbox_not_install') {
		var img = new Image(1,1);
		var mypeerid = getPeerID() ;
		img.src = 'http://kkpgv2.xunlei.com/?u=kk_download_alert&u1='+mypeerid+'&u2='+movieid+'&rd='+(Math.floor(Math.random()*999999)+1);	
	}
}

function close_Box(eleId) {
	document.getElementById(eleId).style.display = 'none';
	document.getElementById('floatbg').style.display = 'none';
}

function down_Xl7() {
	var img = new Image(1,1);
	var mypeerid = getPeerID() ;
	img.src = 'http://kkpgv2.xunlei.com/?u=kk_download_click&u1='+mypeerid+'&u2='+movieid+'&rd='+(Math.floor(Math.random()*999999)+1);
}

document.domain = 'xunlei.com';
function c_getCookie(sName){
	var sSearch = sName + "=";
	var iOffset = document.cookie.indexOf(sSearch);
	if (iOffset != -1) {
		iOffset += sSearch.length;
		var iEnd = document.cookie.indexOf(";", iOffset);
		if (iEnd == -1)
			iEnd = document.cookie.length;
		return unescape(document.cookie.substring(iOffset, iEnd));
	}else 
		return "";
}
function c_setCookie(sName,sValue,sHours){
	if(arguments.length>2){
		var expireDate=new Date(new Date().getTime()+sHours*3600000);
		document.cookie = sName + "=" + escape(sValue) + "; path=/; domain=xunlei.com; expires=" + expireDate.toGMTString();
	}else
		document.cookie = sName + "=" + escape(sValue) + "; path=/; domain=xunlei.com"; 
}

function check_Env() {
	var browser=navigator.appName;
	var b_version=navigator.appVersion;
	var version=parseFloat(b_version);

	if (!(browser=="Microsoft Internet Explorer" && version>=4)) {
		show_FloatBox('floatbox_not_support');
		return false;
	}
	
	// 初始化 sCookie 控件
	var G_DAPCTRL = null;
	var G_DAPCTRL_VER = 0;
	try{
		G_DAPCTRL = new ActiveXObject('DapCtrl.DapCtrl');
		G_DAPCTRL_VER = G_DAPCTRL.GetThunderVer("THUNDER59","INSTALL");
	}catch(e) {}
	
	if(G_DAPCTRL == null || G_DAPCTRL_VER == 0) {
		show_FloatBox('floatbox_not_install');
		return false;
	}

	if(G_DAPCTRL_VER < 2294) {
		show_FloatBox('floatbox_low_version');
		return false;
	}
	
	return true;
}

var global_down_fun = '';
var global_down_i = -1;
var global_down_j = -1;

// 首次弹出提示
function first_Notice(fCallback) {
	if (c_getCookie("movie_content_down_notice")) {
		return true;
	} else {
		show_FloatBox('floatbox_first_notice');
		return false;
	}
	setTimeout(function(){try{fCallback();}catch(e){}}, 30);
}

//继续下载
function continue_Down() {
	c_setCookie("movie_content_down_notice", 1, 24*365);
	if(global_down_fun != '') {
		if(global_down_fun == 'down_one' && global_down_i > -1 && global_down_j > -1) {
			down_one(global_down_i, global_down_j);
		}
		
		if((global_down_fun == 'down_checked') && (global_down_i > -1||global_down_i=='special')) {
			down_checked(global_down_i);
		}
		if(global_down_fun == 'quick_down_checked'&&(global_down_i > -1||global_down_i=='special')){
			quick_down_checked(global_down_i);
		}
	}
}

function down_one(i, j) {
	
	global_down_fun = 'down_one';
	global_down_i = i;
	global_down_j = j;

	if(check_Env() && first_Notice()) {
		show_start_thunder_notice();
		
		try {
			var _thunder=Thunder.getInstance();
			// cid,下载URL,引用页URL,文件名,统计
			_thunder.download(down_array[i][j]['cid'],down_array[i][j]['url'],down_array[i][j]['refer'],down_array[i][j]['name'],down_array[i][j]['stat']);
			var img = new Image(1,1);
			var mypeerid = getPeerID();
			img.src = 'http://kkpgv2.xunlei.com/?u=kk_download&u1='+mypeerid+'&u2='+movieid+'&u3=1&u4='+movie_type+'&rd='+(Math.floor(Math.random()*999999)+1);
			
		} catch(e) {}		
	}
}

function down_checked(i){	
	global_down_fun = 'down_checked';
	global_down_i = i;
	global_down_j = -1;
	
	var is_digi=/^\d+$/;
	
	var filelist = new Array();
	if(is_digi.test(i)){
		for(var j=0;j<down_array[i].length;j++) {
			if(down_array[i][j]['checked'])
				filelist.push(down_array[i][j]);
		}
	}else if(i=='special'){
		for(var yyyy in down_array){
			for(var zzzz in down_array[yyyy]){
				if(down_array[yyyy][zzzz]['checked'])
					filelist.push(down_array[yyyy][zzzz]);
			}
		}
	}
	
	if(filelist.length > 0) {
		if(check_Env() && first_Notice()) {
			show_start_thunder_notice();
			
			try {
				var _thunder=Thunder.getInstance();
				// cid,下载URL,引用页URL,文件名,统计
				_thunder.batchDownload(filelist,'http://www.kankan.com/');
				var img = new Image(1,1);
				var mypeerid = getPeerID() ;
				img.src = 'http://kkpgv2.xunlei.com/?u=kk_download&u1='+mypeerid+'&u2='+movieid+'&u3='+filelist.length+'&u4='+movie_type+'&rd='+(Math.floor(Math.random()*999999)+1);
			} catch(e){}
			
		}
	} else {
		alert('您还未勾选要下载的文件！');	
	}

}
function quick_down_checked(i){	
		
	global_down_fun = 'quick_down_checked';
	global_down_i = i;
	global_down_j = -1;
	
	var is_digi=/^\d+$/;
	
	var filelist = new Array();
	if(is_digi.test(i)){
		for(var j=0;j<quick_down_array[i].length;j++) {
			if(quick_down_array[i][j]['checked2'])
				filelist.push(quick_down_array[i][j]);
		}
	}else if(i=='special'){
		for(var yyyy in quick_down_array){
			for(var zzzz in quick_down_array[yyyy]){
				if(quick_down_array[yyyy][zzzz]['checked2'])
					filelist.push(quick_down_array[yyyy][zzzz]);
			}
		}
	}
	
	if(filelist.length > 0) {
		if(check_Env() && first_Notice()) {
			show_start_thunder_notice();
			
			try {
				var _thunder=Thunder.getInstance();
				// cid,下载URL,引用页URL,文件名,统计
				_thunder.batchDownload(filelist,'http://www.kankan.com/');
				var img = new Image(1,1);
				var mypeerid = getPeerID() ;
				img.src = 'http://kkpgv2.xunlei.com/?u=kk_download&u1='+mypeerid+'&u2='+movieid+'&u3='+filelist.length+'&u4='+movie_type+'&rd='+(Math.floor(Math.random()*999999)+1);
			} catch(e){}			
		}
	} else {
		alert('您还未勾选要下载的文件！');	
	}

}
var quick_down_clicked=false;
var quick_down_array=new Array();
function quick_down_all(invoke){
	if(!downjs_data_gotten){
		if(invoke==1&&quick_down_clicked){//prevent one more time click
			return;
		}
		quick_down_clicked=true;
		show_start_thunder_notice_quickdown();
		setTimeout(function(){quick_down_all(0);},1000);
		return;
	}else{
		close_start_thunder_notice_quickdown();
	}
	quick_down_array=new Array();
	
	if(down_array.length>0){
		var mmm=down_array.length-1;
		
		quick_down_array[mmm]=new Array();
		
		for(var kkk in down_array[mmm]){
			quick_down_array[mmm][kkk]=down_array[mmm][kkk];
			quick_down_array[mmm][kkk]['checked2']=true;			
		}
		quick_down_checked(mmm);		
	}	
}
function read_History() {
	var browser=navigator.appName;
	var b_version=navigator.appVersion;
	var version=parseFloat(b_version);
	
	if(browser=="Microsoft Internet Explorer" && version>=4) {
		var historyItems = G_CORE_HISTORY.getInfo();
		for(var s=0;s<historyItems.length;s++) {
			if(historyItems[s]['movieid'] == movieid) {
				var historyInfo = G_CORE_HISTORY.getOutputItem(historyItems[s]);
				if(historyInfo['url_continue'] == '') {
					var continue_url = historyInfo['url_this'];
				} else {
					var continue_url = historyInfo['url_continue'];
				}
				try {
					document.getElementById('last_history').innerHTML = '<span>您上次观看至：'+historyItems[s]['subname']+'&nbsp;第'+format_time(historyItems[s]['timing'])+'分钟</span><a id="continue_play" target="_blank" href="'+continue_url+'" title="继续观看" class="play">继续观看</a>';
				} catch(e) {}
				return;
			}
		}
	}
	
	if((document.getElementById('fenji_tips_tt') == null || document.getElementById('fenji_tips_tt').innerHTML == '')) {
		deleteElement('fenji_tips');
	}
}

function format_time(seconds) {
	if (seconds == 0)
		seconds = 1;
	return Math.ceil(seconds/60);
}

function change_first_down_btn(ele) {
	if(ele.checked) {
		document.getElementById('first_down_btn').innerHTML = '<a href="javascript:void(0);" onclick="continue_Down();close_Box(\'floatbox_first_notice\');" title="点击后启动下载" class="floatbox_btn">立即下载</a>';
	} else {
		document.getElementById('first_down_btn').innerHTML = '<div class="floatbox_btn_none" title="您还未勾选同意上述条款"></div>';
	}
}

function show_start_thunder_notice() {
	cur_eleName = 'startips';
	document.getElementById('startips').style.top = document.documentElement.scrollTop + document.documentElement.clientHeight/2;
	document.getElementById('startips').style.left = document.documentElement.scrollLeft + document.documentElement.clientWidth/2;
	document.getElementById('startips').style.display = 'block';
	
	setTimeout(function(){
		document.getElementById('startips').style.display = 'none';
	}, 3000);
}
function show_start_thunder_notice_quickdown() {
	cur_eleName = 'startips';
	var obj=document.getElementById('startips_quickdown');
	try{
		if(obj){
			obj.style.top = document.documentElement.scrollTop + document.documentElement.clientHeight/2;
			obj.style.left = document.documentElement.scrollLeft + document.documentElement.clientWidth/2;
			obj.style.display = 'block';
		}
		setTimeout(function(){document.getElementById('startips_quickdown').style.display = 'none';},10000);
	}catch(e){}
}
function close_start_thunder_notice_quickdown(){
	try{	document.getElementById('startips_quickdown').style.display = 'none';}catch(e){}
}
function change_Comment() {
	try {
		//document.getElementById("new_content_hot_comment_title").innerHTML = '该片';
		document.getElementById("new_content_hot_comment_title").innerHTML = movie_title;
		document.getElementById("new_content_hot_comment_add").innerHTML = '我来说两句&gt;&gt;';
	} catch(e) {}
}

function deleteElement(id) {
	try {
		var d = document.getElementById(id);
		var p = d.parentNode;
		if (p = d.parentNode) {
			p.removeChild(d);
		}
	} catch(e) {}
}   

function check_Display() {
	try {
		var all_empty = true;
		for(var i = 0;i < 3;i++) {
			try {
				if(/^\s*$/.test(document.getElementById('box_con_'+i).innerHTML)) {
					deleteElement('nav_con_'+i);
				} else {
					all_empty = false;	
				}
			} catch(e) {}
		}
		
		if(all_empty) {
			deleteElement('box_3');
		}

	} catch(e) {}
}

function check_Side() {
	
	try {		
		if(typeof(guess_like_empty)!='undefined'&& guess_like_empty==1){
			document.getElementById('box_movie_caini_xihuan').style.display='none';
		}
		if(/^\s*$/.test(document.getElementById('box_con_caini_xihuan').innerHTML)) {
			deleteElement('box_movie_caini_xihuan');
		}
		var all_empty = true;
		for(var i = 0;i < 2;i++) {
			try {
				if(/^\s*$/.test(document.getElementById('box_movie_correlation_'+i).innerHTML)) {
					deleteElement('nav_movie_correlation_'+i);
					deleteElement('box_movie_correlation_'+i);
				} else {
					all_empty = false;	
				}
			} catch(e) {}
		}
		
		if(all_empty) {
			deleteElement('box_movie_correlation');
		}
	} catch(e) {}
		
	show_box('movie_correlation', 1, 2);
	show_box('movie_correlation', 0, 2);	
}

function getScore_Callback() {
	if (typeof(xunlei_movie_data) != "undefined") {
		
		var score = xunlei_movie_data.rating.split('.');
		_rating = score[0];
		rating_ = score[1];
		
		if (parseInt(xunlei_movie_data.rating_people_num) < 11) {
			rating_num = '少于10评';
		} else {
			rating_num = xunlei_movie_data.rating_people_num + '人评';
		}
	}
	
	set_MovieScore();
}

function set_MovieScore() {
	document.getElementById('moviedteail_score').innerHTML = '<strong>'+_rating+'.<em>'+rating_+'</em></strong><span>('+rating_num+')</span>';
}

var kkl_dapctrl = null;
function pull_Kankanlite() {
	if (movie_type == 'teleplay' || movie_type == 'tv' || movie_type == 'anime') {
		kkl_dapctrl = getDapctrl();
		var mypeerid = getPeerID();
		var kkpgv_clickurl = "http://kkpgv2.xunlei.com/?u=content_pull_kankanlite&u1=" + mypeerid + "&u2=" + movieid;
		var u3='unknown';
		
		if (kkl_dapctrl != null) {	// DAPCTRL INSTALLED
			var kkver=0;
			try{
				kkver = kkl_dapctrl.GetThunderVer("KankanLite", "Install");
			}catch(e){
			}

			if (kkver > 0) {
				// KankanLite INSTALLED
				kkver=-1;
				try{
					kkver = kkl_dapctrl.GetThunderVer("KankanLite", "Running");
				}catch(e){
				}

				if (kkver > 0) {
					// KankanLite ALREADY RUNNING
					u3='kklite_running';
				} else if (kkver == 0) {
					try{
						kkl_dapctrl.Put("sRunThunder", "KankanLite");
						// Success
						u3='pull_success';
					}catch(e){
						// Failed
						u3='pull_failed';
					}
				} else {
					u3='miss_kklite';
				}
			} else {
				u3='miss_kklite';
			}
		} else {
			u3='miss_dapctrl';
		}
		kkpgv_clickurl+='&u3='+u3;
		var clickstattmp = new Image();
		clickstattmp.src = kkpgv_clickurl + "&rd="+parseInt(Math.random()*10000);
	}
}

function sendStatistic(url) {
	var _img = new Image();
	_img.src = url+'&rand='+(Math.floor(Math.random()*999999)+1);
}

function string_cut(str, len, suffix) {
	if (str.length > len) {
		return str.substr(0, len) + suffix;
	} else {
		return str;
	}
}

function fjupdate_start() {
	if (movie_type == 'teleplay') {
		setInterval("fenji_Update()",600000);
	}
}

function fenji_Update() {
	loadScript2('http://data.movie.xunlei.com/fenji_tips/'+(Math.floor(movieid/1000))+'\/'+movieid+'.js?v='+new Date().getTime(), "fjupdate_Callback");
}

window.origin_title = document.title;
window.fjupdate_interval = -1;
window.fjtips_statistic_url = 'http://kkpgv2.xunlei.com/?u=updatetips&u1=content&u3='+movieid;

if (typeof(latest_number) == 'undefined') window.latest_number=0;
function fjupdate_Callback() {
	if(typeof(fenji_tips) != 'undefined' &&  fenji_tips.length > 0) {
		var _tips_str = '';
		var _new_update = new Array();
					
		for (i=0;i<fenji_tips.length;i++) {
			if (fenji_tips[i][0] > latest_number) {
				_new_update.push(i);
				latest_number = fenji_tips[i][0];
			}
		}
		
		if (_new_update.length >= 3) {
			_tips_str = '<a href="http://kankan.xunlei.com/vod/mp4/'+(Math.floor(movieid/1000))+'/'+movieid+'/'+fenji_tips[_new_update[0]][2]+'.shtml" target="_blank" title="'+fenji_tips[_new_update[0]][1]+'" onclick="sendStatistic(\''+fjtips_statistic_url+'&u2=click\');">'+string_cut(fenji_tips[_new_update[0]][1], 9, '...')+'</a>至<a href="http://kankan.xunlei.com/vod/mp4/'+(Math.floor(movieid/1000))+'/'+movieid+'/'+fenji_tips[_new_update[_new_update.length-1]][2]+'.shtml" target="_blank" title="'+fenji_tips[_new_update[_new_update.length-1]][1]+'" onclick="sendStatistic(\''+fjtips_statistic_url+'&u2=click\');">'+string_cut(fenji_tips[_new_update[_new_update.length-1]][1], 9, '...')+'</a>';
		} else if (_new_update.length > 0) {
			for (i=0;i<_new_update.length;i++) {
				_tips_str += '<a href="http://kankan.xunlei.com/vod/mp4/'+(Math.floor(movieid/1000))+'/'+movieid+'/'+fenji_tips[_new_update[i]][2]+'.shtml" target="_blank" title="'+fenji_tips[_new_update[i]][1]+'" onclick="sendStatistic(\''+fjtips_statistic_url+'&u2=click\');">'+string_cut(fenji_tips[_new_update[i]][1], 9, '...')+'</a>';
			}
		} else {
			return;
		}
		
		if (_tips_str != '') {
			jQuery("#updatecontain").prepend('<div class="updatebox"><div class="updatebox_tt"><strong>本片有更新啦!</strong><a href="javascript:void(0);" onclick="fjupdate_Close(this);" title="关闭" class="updatebox_close">关闭</a></div><div class="updatebox_con"><p>《'+string_cut(movie_title, 7, '...')+'》刚刚更新了</p><div>'+_tips_str+'</div></div></div>');
			if (window.fjupdate_interval == -1) {
				window.fjupdate_interval = setInterval("fjupdate_Changetitle()",1000);
			}
			sendStatistic(fjtips_statistic_url+'&u2=show');
		}
	}
}

function fjupdate_Close(ele) {
	jQuery(ele).parent().parent().remove();
	if (jQuery("#updatecontain").children().length == 0) {
		clearInterval(window.fjupdate_interval);
		window.fjupdate_interval = -1;
		document.title = window.origin_title;
	}
	sendStatistic(fjtips_statistic_url+'&u2=shut');
}

function fjupdate_Changetitle() {
	document.title = ((new Date().getSeconds() % 2)?'【本片有更新】':'【 本片有更新 】') + window.origin_title;
}

function load_Dy() {
	var _mypeerid = getPeerID();
	if (_mypeerid != null) {
		jQuery.getScript('http://api.subscribe.kankan.xunlei.com/subscribe.php?action=list&peerid='+_mypeerid+'&r='+new Date().getTime(), function() {
			var _a = document.createElement("a");
			_a.href='http://movie.xunlei.com/subscribe/notify.html';
			_a.className='dy_top';
			_a.target='_blank';
			_a.innerHTML = '订阅';
			var _tmp = (G_SUBS_MOVIES_ID_STR!='' && (_tmp=G_SUBS_MOVIES_ID_STR.match(/:1/gm))!=null)?_tmp.length:0;
			
			if(_tmp!=0){
				_a.innerHTML += '<span>('+_tmp+')</span>';
				var _u3 = 'on';
			}else{
				_a.style.backgroundImage='url(http://img.kankan.xunlei.com/img/kankan/mp4/dy_4.png)';
				var _u3 = 'off';
			}
			
			if(window.attachEvent){
				_a.attachEvent('onclick',function(){sendStatistic("http://kkpgv2.xunlei.com?u=dingyue&u1=entry&u2=homepage&u3="+sta);});
			}else if(window.addEventListener){
				_a.addEventListener('click',function(){sendStatistic("http://kkpgv2.xunlei.com?u=dingyue&u1=entry&u2=homepage&u3="+sta);},false);
			}

			jQuery("#topdy").html(_a).show();
			delete _a;
		});
	}
}

if (getParameter("id")) {
	c_setCookie("qs_id", getParameter("id"));
}

window.onload = function(){
	var script = document.createElement('script'); 
	script.setAttribute('type', 'text/javascript');
	script.setAttribute('charset', 'utf-8');
	script.setAttribute('src', 'http://v1.jiathis.com/code/jia.js?uid=901384');
	document.getElementById('ckepop').appendChild(script); 
	
	var script = document.createElement('script'); 
	script.setAttribute('type', 'text/javascript');
	script.setAttribute('charset', 'utf-8');
	script.setAttribute('src', 'http://misc.web.xunlei.com/movie/js/replace_jiathis.js?v=1116');
	document.getElementById('ckepop').appendChild(script); 
	
	setTimeout(function(){
		if (document.getElementById('moviedteail_score').innerHTML == '') {
			set_MovieScore();
		}
	},5000);
	
	load_Dy();
}

document.onpropertychange = function () {
	//js 更换标题(去掉锚点产生的标题后缀)
	var title = document.title || '';
	if(title.indexOf('#')!=-1){
		var regx = /(\#.+)+/;
		title = title.replace(regx, '');
		document.title = title;
	}
}

function comment_movie_check_login(){
	try {

		var usrname =getCookie('usrname')?getCookie('usrname'):getCookie('usernewno');
		if (usrname == ""){
			global_login_frm_show(this,true,window.location.href,0,"list");
			return false;
		}else{
			return true;
		}
	} catch (e) {}

}
function comment_vote(cid, f) {
	try{
		if(comment_movie_check_login()) {
			var usrname =getCookie('usrname')?getCookie('usrname'):getCookie('usernewno');
			if (getCookie('comment_vote') == cid) {
				alert("您的意见已提交");
				return;
			}else{				
				setCookie('comment_vote', cid, 1);
				var tmp = new Image();
				tmp.src='http://rating.movie.xunlei.com/set_comment_vote.php?usrname='+usrname+'&cid='+cid+'&vote='+f+'&cache='+rand(9999999);
				if(f==1){
					//document.getElementById('vote_yes').innerHTML = parseInt(document.getElementById('movie_subject_').innerHTML)+1;
				}
				document.getElementById('movie_subject_'+cid).innerHTML = parseInt(document.getElementById('movie_subject_'+cid).innerHTML)+1;
				document.getElementById('vote_show').style.display = "inline-block";
				alert("谢谢您的参与，您的意见已提交");
			}
		}
	}catch (e){}
}
function rand(num){
	return Math.floor(Math.random()*num)+1; 
}