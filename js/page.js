document.domain="1314zb.com";
function $R2(element,hidden){
	setTimeout( function(){
		try{
			var parent = document.getElementById(element).parentNode;
			if(hidden){
				parent.style.display='none';
			}else{
				parent.style.display='';
			}
			//var child = document.getElementById(element);
			//parent.removeChild(child);
		}catch(e){};
	},0);
	return true;
}
/*
var kkPagePreDeploy = KankanObj.extend({
	init:function(){
		this._super();
		this.swf = null;
		this.container = null;
		this.callback = null;
		this.init2();
		this.url = null;
		this.start = 0;
	},
	init2:function(){
		this.container = document.createElement("DIV");
		this.container.id = 'preDeployContainer';
		document.body.appendChild(this.container);
		var so = new SWFObject("http://kankan.1314zb.com/vod/swf/loader.swf", "preDeployLoader", "1", "1");
		so.addParam("allowScriptAccess", "always");
		so.addParam("allowFullScreen", "false");
		so.write("preDeployContainer");
		this.swf = this.$('preDeployLoader');
	},
	doLoad:function(url,callback){
		this.url = url;
		if(callback){
			this.callback = callback;
		}else{
			this.callback = null;
		}
		this.start=parseInt(new Date().getTime()/1000);
		this.swf.object.CallFunction("<invoke name=\""+"AASX"+"\" returntype=\"javascript\"><arguments><string>"+'url:'+url+';callback:G_PAGE_PREDEPLOY.Pcallback(\''+url+'\');usecache:1'+"</string></arguments></invoke>");
	},
	Pcallback:function(url,callback){
		if(this.callback){
			try{
				G_PAGE_PREDEPLOY.callback.apply(this,argumentsToArray(arguments));
				G_PAGE_PREDEPLOY.callback = null;
			}catch(e){}
		}
	},
	doPreDownload:function(){
		if(G_AD_PREDOWNLOAD_URL!=''){
			 G_CORE_DEBUG.trace("===== PRE DOWNLOAD AD START(DownComplete):" + G_AD_PREDOWNLOAD_URL);
			 G_PAGE_PREDEPLOY.doLoad(G_AD_PREDOWNLOAD_URL, G_PAGE_PREDEPLOY.predownloadADFinish);
			 send_kkpgv("ad_predownload_"+G_AD_PREDOWNLOAD_URL);
			 G_AD_PREDOWNLOAD_URL='';
		}
	},
	predownloadADFinish:function(url){
		if(parseInt(new Date().getTime()/1000)-G_PAGE_PREDEPLOY.start>3){
			send_kkpgv("ad_predownload_finish_"+url);
		}else{
			send_kkpgv("ad_predownload_finish_short_"+url);
		}
		
		G_CORE_DEBUG.trace("===== PER DOWNLOAD AD FINISH:" + url);
		var filename = url.substring(url.lastIndexOf("/")+1);
		var farr = filename.split('.');
		var filename = farr[0];
		ioCtrl.ioWriter('kkad_'+filename,'1',24*7);

	}
});
*/

var kkPageSearch = KankanObj.extend({
	init:function(){
		this._super();
		this.$('sf').onsubmit= function(){
			G_PAGE_SEARCH.doGougouSearch();
			return false;
		}
		this.$('_keyword').onblur=function(){
			if(G_PAGE_SEARCH.$('_keyword').value==''){
				G_PAGE_SEARCH.$('_keyword').value='输入影片名或主演名';
				G_PAGE_SEARCH.$('_keyword').form._keyword.style.color='#D8D8D8'
			}
		
		}
		this.$('_keyword').onclick=function(){
			try{
				if(typeof searchTextTimer == 'number') {
					G_PAGE_SEARCH.$('_keyword').value='';
				}
				stopSearchTextTimer();
			}catch(e){}
			if(G_PAGE_SEARCH.$('_keyword').value=='输入影片名或主演名'){
				G_PAGE_SEARCH.$('_keyword').value='';
			}
			G_PAGE_SEARCH.$('_keyword').form._keyword.style.color='#000'
		}
		this.gougouShow.delayCall(1000,this);
	},
	gougouShow:function(){
		if(typeof(setupAC)=="function"){
			setupAC($("_keyword"),$("_sbtn"));
		}else{
			this.gougouShow.delayCall(1000,this);
		}
	},
	doGougouSearch:function(){
		var s_key = this.$("_keyword").value;
		if (s_key =="" || s_key == "输入影片名或主演名"){
			//alert("请输入搜索关键字!") ;
			this.$("_keyword").value = "" ;
			this.$("_keyword").focus();
			this.$('_keyword').form._keyword.style.color='#000';
			return false ;
		}
		s_key = encodeURIComponent(s_key);
		
		var url = "http://search.1314zb.com/search.php?keyword="+s_key+"" ;
		var d = new Date();
		var windowName = parseInt(d.getHours().toString() + d.getMinutes().toString() + d.getSeconds().toString()/3);
		window.open(url,"so_" + windowName);
	}
});
var kkPageAssistant = KankanObj.extend({
	init:function(){
		this._super();
		this.historyContainer = 'history_container';
		this.flashItems = [];
		this.playerPath = 'http://js.kankan.1314zb.com/player/mp4/VodHistory.swf';
		this.historySwf = '';
		this.mouseTimer = '';
		this.isMouseOn = false;
		this.currentPageFav = 0;
		this.currentPageHistory = 0;
		this.perPageFav = 2;
		this.perPageHistory = 5;
		this.historyArr = [];
		this.favArr = [];
		this.favFetchIndex = 0;
		this.favMovieids = null;
		this.processEvent();
		this.init2.delayCall(0,this);
		if(_ol_movie_type=='movie'||"#63571#63572#63578#63579#63808#60063#62153#61530#".indexOf('#'+G_MOVIEID+'#')!=-1){
			this.isWideScreen = true;
		}else{
			this.isWideScreen = false;
		}
		this.isTabAutoSwitch = false;
		this.isErrorReport = false;
		this.isLamuClosed = false;
		this.isLamuInit = false;
		this.isSpoilerShowed = false;
		//this.initMiniLamu.delayCall(0,this);
		this.uploadHisFromSwf = true;
		this.uploadHisCallbacked = true;
		this.uploadHisPlayingId = 0;
		this.hisFooterStat = false;
		this.hisPrePlayPos = 0;
	},
	init2:function(){
		this.initHistory.delayCall(200,this);
		$(this.historyContainer).style.top = '-1000px';
		$(this.historyContainer).style.left = '656px';
		//this.initFavorite.delayCall(200,this);
		//this.setTabAutoSwitch.delayCall(13000,this,0);
		try{
			$('tab_x').attachEvent("onmouseover",function(){G_PAGE_ASSISTANT.tabSwitch('turn_x_box');});
			$('tab_r').attachEvent("onmouseover",function(){G_PAGE_ASSISTANT.tabSwitch('turn_r_box');});
			$('tab_a').attachEvent("onmouseover",function(){G_PAGE_ASSISTANT.tabSwitch('turn_a_box');});
		}catch(e){};
		//if(G_CORE_INIT.isNoComponent){
		//	G_PAGE_ASSISTANT.hideMini();
		//}
		window.attachEvent("onresize",function(){$('lightoff_bg').style.width = document.body.scrollWidth;});
		window.attachEvent("onresize",function(){G_PAGE_ASSISTANT.miniLamuOnresize()});
		
		try{
			if ( ($('turn_r_marginId').childNodes.length>0&&navigator.userAgent.indexOf("MSIE")!=-1) || ($('turn_r_marginId').childNodes.length>1&&navigator.userAgent.indexOf("MSIE")==-1) ){
				$('tab_r_container').style.display='';
			}
			if ( ($('turn_a_marginId').childNodes.length>0&&navigator.userAgent.indexOf("MSIE")!=-1) || ($('turn_a_marginId').childNodes.length>1&&navigator.userAgent.indexOf("MSIE")==-1) ){
				$('tab_a_container').style.display='';
			}
			$('lightoff_bg').style.width = Math.max(document.body.scrollWidth,1005);
			$('feedback_href').attachEvent("onclick",function(){G_PAGE_ASSISTANT.feedback_onclick();});
		}catch(e){}
		try{
			this.setShareInfo();
		}catch(e){}
	},
	processEvent:function(){
		//G_CORE_CONTROL.attachEvent(G_CORE_CONTROL, "onFirstPlaying", G_PAGE_ASSISTANT.showMini);
		//G_CORE_CONTROL.attachEvent(G_CORE_CONTROL, "onStop", G_PAGE_ASSISTANT.hideMini);
		G_CORE_CONTROL.attachEvent(this, "onStop", this.lightOn);
		G_CORE_CONTROL.attachEvent(this, "onEnd", this.lightOn);
		//G_CORE_CONTROL.attachEvent(G_CORE_CONTROL, "onPreDownload", G_PAGE_PREDEPLOY.doPreDownload);
		//G_CORE_CONTROL.attachEvent(G_CORE_CONTROL, "onNoComponent", G_PAGE_ASSISTANT.hideMini);
		G_CORE_CONTROL.attachEvent(this, "onTerr", this.feedback_onTerror);
		G_CORE_CONTROL.attachEvent(this, "onTTerr", this.feedback_onTTerror);
		G_CORE_CONTROL.attachEvent(this, "onFullError", this.feedback_onFullError);
		G_CORE_STATIC.attachEvent(this, "durationError", this.feedback_onFullError);
		G_CORE_CONTROL.attachEvent(this, "onerr", this.feedback_onerror);
		G_CORE_CONTROL.attachEvent(this,'onScrollSmall',this.scrollSmall);
		G_CORE_CONTROL.attachEvent(this,'onScrollBig',this.scrollBig);
		G_CORE_CONTROL.attachEvent(this,'onLightOff',this.lightOff);
		G_CORE_CONTROL.attachEvent(this,'onLightOn',this.lightOn);
		G_CORE_CONTROL.attachEvent(this,'onNewWindow',this.openMini);
		G_CORE_CONTROL.attachEvent(this,'onCommonOpen',this.initMiniLamu);
		G_CORE_CONTROL.attachEvent(this,'onstartplayad',this.hideMiniLamu);
		G_CORE_CONTROL.attachEvent(this,'onCommonPlaying',this.showSpoiler);
		G_CORE_CONTROL.attachEvent(this,'onSetHisInfo',this.setHistory);
		G_CORE_CONTROL.attachEvent(this,'onCommonOpen',this.setShareInfo);
		G_CORE_STATIC.attachEvent(this,'onSeekEnd',function(){this.updateExistsHisInfo(true)});
	},
	sendkkpgv2:function(u){
		var img = new Image();
		var url = 'http://kkpgv2.1314zb.com/?u='+u;
		for(var i=1;i<arguments.length;i++){
			url+='&u'+i+'='+arguments[i];
		}
		img.src = url+'&r='+new Date().getTime();
	},
	initHistory:function(){
		if(typeof G_CORE_HISTORY=='undefined'||!G_CORE_HISTORY){
			this.initHistory.delayCall(200,this);
			return false;
		}
		this.printFlash(this.historyContainer,false,'100%','100%');
		//观看记录漫游
		var ifr = '';
		try{ifr=this.$C('<iframe name="historysend">')}catch(e){ifr=this.$C('iframe');ifr.name='historysend'}
		ifr.width=ifr.height=0;
		ifr.id='historysend';
		ifr.frameBorder='0';
		ifr.src = 'about:blank';
		ifr.scrolling='no';
		this.$P(ifr,document.getElementById(this.historyContainer));
		ifr = null;
		delete ifr;
		G_CORE_HISTORY.sendInfoOnlineBack = function(isOK){
			var that = G_PAGE_ASSISTANT;
			if(that.uploadHisCallbacked==true||that.uploadHisFromSwf==false){
				that.uploadHisFromSwf=true;
				return;
			}
			that.uploadHisCallbacked = true;
			var stat = isOK==1?'uploadSuccess':'uploadFailed';
			that.setHistoryFooter(stat);
		}
	},
	printFlash:function(container,random,width,height){
		if(typeof SWFObject=='undefined'){
			this.printObjectManually(container,random,width,height);
		}else{
			if(random){
				var so = new SWFObject(this.playerPath, "MovieHistory", width, height, "9", "#ffffff");
			}else{
				var so = new SWFObject(this.playerPath, "MovieHistory", width, height, "9", "#ffffff");
			}
			so.addParam("allowScriptAccess", "always");
			so.addParam("allowFullScreen", "false");
			so.addParam("quality", "high");
			so.skipDetect = false;
			if(!so.write(container)){
				var so = new SWFObject(this.playerPath, "MovieHistory", '1', '1', "9", "#ffffff");
				so.skipDetect = true;
				so.write(container);
				return false;
			}
		}
		this.checkPlayer.delayCall(50,this);
	},
	printObjectManually:function(container,random,width,height){
		if(this.isIE){
			var str = '';
			str += '<object width="'+width+'" height="'+height+'" id="MovieHistory" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codeBase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" >';
			str += '<PARAM NAME="_cx" VALUE="25664"><PARAM NAME="_cy" VALUE="13917"><PARAM NAME="FlashVars" VALUE="">';
			str += '<PARAM NAME="Movie" VALUE="'+this.playerPath+'"><PARAM NAME="Src" VALUE="'+this.playerPath+'"><PARAM NAME="WMode" VALUE="Window">';
			str += '<PARAM NAME="Play" VALUE="0"><PARAM NAME="Loop" VALUE="-1"><PARAM NAME="Quality" VALUE="High"><PARAM NAME="SAlign" VALUE="LT">';
			str += '<PARAM NAME="Menu" VALUE="0"><PARAM NAME="Base" VALUE=""><PARAM NAME="AllowScriptAccess" VALUE="always"><PARAM NAME="Scale" VALUE="NoScale">';
			str += '<PARAM NAME="DeviceFont" VALUE="0"><PARAM NAME="EmbedMovie" VALUE="0"><PARAM NAME="BGColor" VALUE="000000"><PARAM NAME="SWRemote" VALUE="">';
			str += '<PARAM NAME="MovieData" VALUE=""><PARAM NAME="SeamlessTabbing" VALUE="1"><PARAM NAME="Profile" VALUE="-1"><PARAM NAME="ProfileAddress" VALUE="">';
			str += '<PARAM NAME="ProfilePort" VALUE="830362444"><PARAM NAME="AllowNetworking" VALUE="all"><PARAM NAME="AllowFullScreen" VALUE="true">';
			str += '</object>';
			document.getElementById(container).innerHTML = str;
		}
	},
	setHistory:function(){
		var that = G_PAGE_ASSISTANT;
		if(that.historySwf==""){
			return false;
		}
		var items = G_CORE_HISTORY.getHistory();
		that.historyArr = items;
		that.flashItems = new Array();
		if(!items){
			that.updateSize();
			return false;
		}
		for(var i=0;i<that.historyArr.length&&i<20;i++){
			that.flashItems.push(G_CORE_HISTORY.getOutputItem(that.historyArr[i]));
		}
		that.historySwf.js_setHistoryItems(that.flashItems);
		that.updateSize();
		if(G_PAGE_USER.getUserInfo()){
			var playingSubid = G_MOVIE_DATA.subids[parseInt(G_CORE_CONTROL.currentIndex,10)];
			if(that.uploadHisPlayingId!=playingSubid){
				that.uploadHisPlayingId=playingSubid;
				that.uploadPlayingHis();
			}
		}
		return true;
	},
	checkPlayer:function(){
		this.checkPlayerTime++;
		var player = document.getElementById('MovieHistory');
		if(typeof player.js_setHistoryItems == 'undefined'){
			this.checkPlayer.delayCall(100,this);
		}else{
			this.historySwf = player;
			this.historySwf.js_setCurrentMovieID(G_HALLID);
			this.setHistory();
			document.getElementById('head_history').attachEvent("onmouseover",G_PAGE_ASSISTANT.showHistory);			
			document.getElementById('head_history').attachEvent("onmouseout",G_PAGE_ASSISTANT.checkIsMouseOut);
			this.historySwf.attachEvent("onmouseover",G_PAGE_ASSISTANT.showHistory);
			this.historySwf.attachEvent("onmouseout",G_PAGE_ASSISTANT.hideHistory);
		}
	},
	setHistoryFooter:function(stat){
		var hisobj = document.getElementById('MovieHistory');
		var that = G_PAGE_ASSISTANT;
		if(stat=='logined'||stat=='unLogin'){
			that.hisFooterStat = stat;
		}
		if(hisobj==null||!hisobj.js_setHistoryFooter){
			that.setHistoryFooter.delayCall(500,that,stat);
			return;
		}
		var arg2 = '';
		if(stat=='logined'&&G_PAGE_USER.getUserInfo()){
			arg2 = getCookie("usernick") || getCookie("usrname");
		}
		try{hisobj.js_setHistoryFooter(stat,arg2)}catch(e){}
		if(stat=='logined'){
			hisobj.js_showLoading();
			G_CORE_HISTORY.getInfoOnline(function(){that.setHistory();hisobj.js_showLoading(false)});
		}else if(stat=='unLogin'){
			G_CORE_HISTORY.dataOnline = [];
			that.setHistory();
		}
	},
	uploadHistory:function(){
		if(!this.uploadHisCallbacked){
			return;
		}
		this.uploadHisCallbacked=false;
		try{G_CORE_HISTORY.sendLocalData()}catch(e){}
		this.checkUploadHistoryCallback.delayCall(10000,this);
		this.sendkkpgv2('sum','vodrecord','vodpage','upload');
	},
	checkUploadHistoryCallback:function(){
		if(this.uploadHisCallbacked){
			return;
		}
		this.uploadHisCallbacked = true;
		this.setHistoryFooter('uploadFailed');
	},
	uploadPlayingHis:function(){
		G_PAGE_ASSISTANT.uploadHisFromSwf=false;
		var curIndex = G_CORE_CONTROL.currentIndex;
		var pagetype = '20';
		if(typeof G_CORE_CONTROL.mdata.pagetype!='undefined'&&typeof G_CORE_CONTROL.mdata.pagetype!='undefined'){
			pagetype = G_CORE_CONTROL.mdata.pagetype;
		}
		var data = [G_HALLID,new Date().getTime(),encodeURIComponent(G_MOVIE_TITLE),G_CP_DATA.cp_mul,'flv',pagetype,G_MOVIE_DATA.subids[curIndex],encodeURIComponent(G_MOVIE_DATA.subnames[curIndex]),G_MOVIE_DATA.subids[curIndex+1]||'NO',encodeURIComponent(G_MOVIE_DATA.subnames[curIndex+1])||'NO',G_MOVIEID,G_MOVIE_TYPE,G_MOVIE_DATA.subnames.length,0,G_MOVIE_DATA.subnames.length,0,G_MOVIE_DATA.subids[G_MOVIE_DATA.subids.length-1],G_MOVIE_DATA.subtype[curIndex],G_MOVIE_DATA.subtype[curIndex+1],G_CORE_CONTROL.currentQuality];
		G_CORE_HISTORY.sendInfoOnline([data]);
		G_PAGE_ASSISTANT.updateExistsHisInfo.delayCall(10000,G_PAGE_ASSISTANT);
	},
	updateExistsHisInfo:function(isSeek){
		if(!G_PAGE_USER.getUserInfo()){
			return
		}
		var nowPos = parseInt(G_PLAYER_INSTANCE.getPlayPosition(),10);
		var bet = Math.abs(nowPos-this.hisPrePlayPos);
		if(!isSeek){
			this.updateExistsHisInfo.delayCall(180000,this);
		}else if(bet<300){
			return;
		}
		if(bet>60){
			G_CORE_HISTORY.sendTiming(G_MOVIE_INFO.id,G_MOVIE_DATA.subids[parseInt(G_CORE_CONTROL.currentIndex,10)],nowPos);
			this.sendkkpgv2('vodact','sendhistiming');
		}
		this.hisPrePlayPos = nowPos;
	},
	updateSize:function(){
		var sizeObj = this.historySwf.js_getHistorySize();
		document.getElementById(G_PAGE_ASSISTANT.historyContainer).style.width = sizeObj.width + 'px';
		document.getElementById(G_PAGE_ASSISTANT.historyContainer).style.height = sizeObj.height + 'px';
	},
	checkIsMouseOut:function(){
		G_PAGE_ASSISTANT.isMouseOn = false;
		setTimeout(function(){
			if(G_PAGE_ASSISTANT.isMouseOn == false){
				G_PAGE_ASSISTANT.hideHistory();
			}else{
				return false;
			}
		},500);
	},
	showHistory:function(){
		G_PAGE_ASSISTANT.isMouseOn = true;
		document.getElementById(G_PAGE_ASSISTANT.historyContainer).style.top = G_PAGE_ASSISTANT.getOffsetTop(document.getElementById('head_history'),3) + 'px';
		var num = (document.documentElement.clientWidth - 1002)/2;
		document.getElementById(G_PAGE_ASSISTANT.historyContainer).style.left = ((num <= 0 ? 0 : num) + 656)+'px';
		if(G_PAGE_USER.getUserInfo()){
			document.getElementById('MovieHistory').js_onShowHistory(getCookie('userid'));
		}
	},
	hideHistory:function(isFromSwf){
		G_PAGE_ASSISTANT.isMouseOn = false;
		document.getElementById(G_PAGE_ASSISTANT.historyContainer).style.top = '-1000px';
		document.getElementById(G_PAGE_ASSISTANT.historyContainer).style.left = '656px';
		G_PAGE_ASSISTANT.historySwf.js_hideHistory();
		if(isFromSwf==1){
			G_PAGE_ASSISTANT.sendkkpgv2('sum','vodrecord','vodpage','shut');
		}
	},
	historySetEmpty:function(isFromSwf){
		G_CORE_HISTORY.setEmpty(true);
		this.historyArr = [];
		this.updateSize();
		//G_PAGE_ASSISTANT.fillHistory(0);
		if(isFromSwf==1){
			this.sendkkpgv2('sum','vodrecord','vodpage','clearall');
		}
	},
	removieHistory:function(movieid){
		G_CORE_HISTORY.removeSingleInfo(movieid);
		for(i=0;i<this.historyArr.length;i++){
			if(this.historyArr[i].movie_id==movieid){
				this.historyArr.splice(i,1);
			}
		}
		this.updateSize();
		//this.fillHistory(this.currentPageHistory);
		this.sendkkpgv2('sum','vodrecord','vodpage','delete');
	},
	getOffsetTop:function(obj,layer){
		var val = 0,top = 'offsetTop',height='offsetHeight';
		while(layer > 0 && obj){
			layer --;
			obj = obj.parentNode;
		}
		val = obj[top] + obj[height];
		return val;
	},
	timetipsClose:function(){
		$('timetipsDiv').style.display="none";
	},
	timetipsShow : function(item){
		this.subid = item.subid;
		this.timing = item.timing;
		if(G_CORE_HISTORY.lastItem&&item.timing>0){
			try{restoreDTLabel(item.subname);}catch(e){}
			$('timetipsDiv').style.display="";
			$('timetipsDiv').style.left=($('sub_'+item.subid).parentNode.offsetLeft+$('wrapperDiv').offsetLeft+55);
			$('timetipsDiv').style.top=($('sub_'+item.subid).parentNode.offsetTop+$('diversityDiv').offsetTop+50);
			if(parseInt(item.timing/60)!=0){
				$('timetipsMin').innerHTML=parseInt(item.timing/60)+'分钟';
			}else{
				$('timetipsMin').innerHTML=parseInt(item.timing%60)+'秒钟';
			}
			if(G_ISART){
				$('timetipsDiv').style.top=($('sub_'+item.subid).parentNode.offsetTop+$('diversityDiv').offsetTop+80);
			}
		}
		G_CORE_HISTORY.lastItem = null;
		this.timetipsClose.delayCall(15000,this);
	},
	timetipsPlay:function(){
		if(this.subid){
			_GS(_getSubIndex(this.subid),this.timing);
		}
		this.timetipsClose.delayCall(3000,this);
	},
	lightOff : function(){
		$('lightoff_bg').style.display = '';
		$('lighton_button').style.display = '';
		$('lightoff_bg').ondblclick=function(){G_PAGE_ASSISTANT.lightOn();}
		try{G_PLAYER_INSTANCE.flvExternalCommand('lightCmd','off')}catch(e){}
		if (navigator.userAgent.indexOf('MSIE') == -1) {
			//console.log($('lightoff_bg').style.zIndex);
			$('lightoff_bg').style.zIndex=3;
			//console.log($('lightoff_bg').style.zIndex);
		}
		try{$("player_wide_bg").className = 'player_widebg player_widebg_nobg';}catch(e){};
		try{$("navMore").style.zIndex=1;}catch(e){};
	},
	lightOn : function(){
		$('lightoff_bg').style.display = 'none';
		$('lighton_button').style.display = 'none';
		try{G_PLAYER_INSTANCE.flvExternalCommand('lightCmd','on')}catch(e){}
		try{$("player_wide_bg").className = 'player_widebg';}catch(e){};
		try{$("navMore").style.zIndex='';}catch(e){};
	},
	scrollSmall:function(){
		this.isWideScreen = false;
		document.body.className = G_MOVIE_TYPE!='movie'?'':'normalmode';
		$('player_container').className+=G_MOVIE_TYPE!='movie'?' playerTV':'';
		$('_player').className = 'playerbox';
		$("playad_5s_container").className = 'playad_5s';
		G_COMMERCIAL_COMMON.showLamu();
		this.hideMiniLamu();
	},
	scrollBig:function(){
		this.isWideScreen = true;
		document.body.className = 'widemode';
		$('_player').className = 'playerbox playerbox_wide';
		$('player_container').className='player';
		$("playad_5s_container").className = 'playad_5s playad_5s_wide';
	},
	/*wideScreen : function(){
		if(!this.isWideScreen){
			this.isWideScreen = true;
			$('wideScreenContainer').innerHTML = '标准模式';
			var height= $('_player').clientHeight;
			$('_player').className = 'playerbox_wide';
			if(height>0){
				$('_player').style.height = '538px';
				$('player_container').style.height = '538px';
				
			}
		}else{
			this.isWideScreen = false;
			$('wideScreenContainer').innerHTML = '宽屏模式';
			var height= $('_player').clientHeight;
			$('_player').className = 'playerbox';
			if(height>0){
				$('_player').style.height = '404px';
				$('player_container').style.height = '404px';
			}
			G_COMMERCIAL_COMMON.showLamu();
		}
	},
	wideScreenN : function(){
		if(!this.isWideScreen){
			this.isWideScreen = true;
			$('_player').className = 'playerbox playerbox_wide';
			document.body.className = 'widemode';
			$("playad_5s_container").className = 'playad_5s playad_5s_wide';
			
		}else{
			this.isWideScreen = false;
			$('_player').className = 'playerbox';
			document.body.className = 'normalmode';
			$("playad_5s_container").className = 'playad_5s';
			G_COMMERCIAL_COMMON.showLamu();
			this.hideMiniLamu();
			
		}
	},
	wideScreenRecover:function(){
		if(this.isWideScreen){
			this.wideScreenN();
		}
	},*/
	showMini:function(){if (navigator.userAgent.indexOf('MSIE') != -1) {
		$('ass_window_play').style.display = '';
		$('fgline_wp').style.display = '';
	}},
	hideMini:function(){
		$('ass_window_play').style.display = 'none';
		$('fgline_wp').style.display = 'none';
	},
	openMini:function(){
		var startposStr = '';
		if(typeof G_PLAYER_INSTANCE!='undefined'&&G_PLAYER_INSTANCE){
			var pos = G_PLAYER_INSTANCE.getPlayPosition();
			if(parseInt(pos)>0){
				startposStr = '&seekpos='+parseInt(pos);
			}
		}
		window.open('http://kankan.1314zb.com/vod/minikk/show_kkplayer.html?movieid='+G_MOVIEID+'&subid='+G_MOVIE_DATA.subids[parseInt(G_CORE_CONTROL.currentIndex)]+startposStr,'minikk','height=470,width=800,toolbar=no,menubar=no,resizable=yes,scrollbars=no,location=no,status=no');
		if(typeof G_PLAYER_INSTANCE!='undefined'&&G_PLAYER_INSTANCE){
			G_COMMERCIAL_COMMON.initAllPlaying();
			G_PLAYER_INSTANCE.close();
		}
	},
	tabSwitch:function(objstr){
		if(objstr){
			G_WEBKK_TAB.tab_x_t_for_later(objstr);
		}
		this.isTabAutoSwitch = false;
	},
	feedback_onclick:function(){
		if(!G_PAGE_ASSISTANT.isErrorReport&&G_PLAYER_ERROR.lastError!=''){
			G_PAGE_ASSISTANT.feedback_submit();
		}
	},
	feedback_onTerror:function(){
		//if(!G_PAGE_ASSISTANT.isErrorReport&&G_PLAYER_INSTANCE.rand(0,20)==19){
		if(!G_PAGE_ASSISTANT.isErrorReport&&G_CORE_INIT.verKanKanLite>=101&&G_PLAYER_INSTANCE.rand(0,100)==9&&G_CORE_INIT.verKanKanLite!=107){
			G_PAGE_ASSISTANT.feedback_submit();
		}
	},
	feedback_onTTerror:function(){
		//if(!G_PAGE_ASSISTANT.isErrorReport&&G_PLAYER_INSTANCE.rand(0,20)==19){
		if(!G_PAGE_ASSISTANT.isErrorReport&&G_CORE_INIT.verKanKanLite>=101&&G_PLAYER_INSTANCE.rand(0,100)==9&&G_CORE_INIT.verKanKanLite!=107){
			G_PAGE_ASSISTANT.feedback_submit();
		}
	},
	feedback_onFullError:function(){
		//if(!G_PAGE_ASSISTANT.isErrorReport&&G_PLAYER_INSTANCE.rand(0,20)==19){
		if(!G_PAGE_ASSISTANT.isErrorReport&&G_CORE_INIT.verKanKanLite>=101&&G_PLAYER_INSTANCE.rand(0,10)==9&&G_CORE_INIT.verKanKanLite!=107&&G_DAPCTRL_VER!=203364){
			G_PAGE_ASSISTANT.feedback_submit();
		}
	},
	feedback_onerror:function(){
		if(!G_PAGE_ASSISTANT.isErrorReport&&G_PLAYER_INSTANCE.rand(0,500)==499&&G_CORE_INIT.verKanKanLite!=107){
			G_PAGE_ASSISTANT.feedback_submit();
		}
	},
	feedback_submit:function(str){
		function addFormHiddenParam(form,key,value){
			var input=document.createElement("input");
			input.type='hidden';
			input.name=key;
			input.value=value;
			form.appendChild(input);
		}
		this.isErrorReport = true;
		var frame=document.createElement("<iframe name='_postFrame'>");
		frame.id = '_postFrame';
		//frame.name = '_postFrame';
		frame.style.display='none';
		$P(frame,document.body);
		var form=document.createElement("form");
		form.action='http://app11.kankan.1314zb.com/help/vod.php';
		form.method="POST";
		form.target="_postFrame";
		addFormHiddenParam(form,'uid',getCookie('KANKANWEBUID'));
		addFormHiddenParam(form,'content',G_PLAYER_ERROR.getDebugInfo());
		form.style.display="none";
		document.body.appendChild(form);
		form.submit();
	},
	initMiniLamu:function(){
		loadJSData("http://biz5.sandai.net/portal/008/A/cm1175.js", "G_PAGE_ASSISTANT.loadMiniLamu", [], true);
	
	},
	loadMiniLamu:function(){
		if($('cm1175')&&$('cm1175').innerHTML!=''){
			if(screen.width>=1280&&G_MOVIE_TYPE=='movie'&&!G_PAGE_ASSISTANT.isLamuClosed&&G_PAGE_ASSISTANT.isWideScreen&&document.body.scrollWidth>=1280){
				$('mlamu_container').style.display='';
				if(!G_PAGE_ASSISTANT.isLamuInit){
					//$('mlamu_l').attachEvent("onmouseover",function(){G_PAGE_ASSISTANT.showMiniLamu();});
					//$('mlamu_l').attachEvent("onmouseout",function(){G_PAGE_ASSISTANT.coverMiniLamu();});
					$('mlamu_rclose').attachEvent("onclick",function(){G_PAGE_ASSISTANT.hideMiniLamu();G_PAGE_ASSISTANT.isLamuClosed=true});
					$('mlamu_lclose').attachEvent("onclick",function(){G_PAGE_ASSISTANT.hideMiniLamu();G_PAGE_ASSISTANT.isLamuClosed=true});
					G_PAGE_ASSISTANT.isLamuInit = true;
				}
				
			}else{
				$('mlamu_container').style.display='none';
			}
		}
	},
	showMiniLamu:function(){
		$('mlamu_lcover').style.display='none';
	},
	coverMiniLamu:function(){
		$('mlamu_lcover').style.display='';
	},
	hideMiniLamu:function(){
		try{
			$('mlamu_container').style.display="none";
		}catch(e){}
		
	},
	miniLamuOnresize:function(){
		if(!G_PAGE_ASSISTANT.isLamuClosed&&G_PAGE_ASSISTANT.isLamuInit){
			if(document.body.scrollWidth<1280){
				G_PAGE_ASSISTANT.hideMiniLamu();
			}else{
				G_PAGE_ASSISTANT.showMiniLamu();
			}
		}
	},
	showSpoiler:function(){
		if(!G_PAGE_ASSISTANT.isSpoilerShowed){
			G_PAGE_ASSISTANT.isSpoilerShowed = true;;
			var showIndex = parseInt(getParameter('jutou'));
			if(showIndex>=0&&showIndex<=50){
				G_PLAYER_INSTANCE.flvExternalCommand('showSpoiler',showIndex);
			}
		}
	},
	setShareInfo:function(){
		var url = window.location.href;
		var title = document.title;
		var base_url = 'http://s.jiathis.com/?webid=';
		var shareObj = {
			tqq:base_url+'tqq&url='+encodeURIComponent(url)+'&title='+encodeURIComponent(title)+'&uid=901384&jtss=1',
			tsina:base_url+'tsina&url='+encodeURIComponent(url)+'&title='+encodeURIComponent(title)+'&uid=901384&jtss=1',
			renren:base_url+'renren&url='+encodeURIComponent(url)+'&title='+encodeURIComponent(title)+'&uid=901384&jtss=1',
			kaixin001:base_url+'kaixin001&url='+encodeURIComponent(url)+'&title='+encodeURIComponent(title)+'&uid=901384&jtss=1',
			qzone:base_url+'qzone&url='+encodeURIComponent(url)+'&title='+encodeURIComponent(title)+'&uid=901384&jtss=1',
			tsohu:base_url+'tsohu&url='+encodeURIComponent(url)+'&title='+encodeURIComponent(title)+'&uid=901384&jtss=1',
			douban:base_url+'douban&url='+encodeURIComponent(url)+'&title='+encodeURIComponent(title)+'&uid=901384&jtss=1'
		}
		if (window.location.href.indexOf('kankan.1314zb.com') != -1) {
			var title = document.title.replace('迅雷看看', '@xlkk0728');
		} else {
			var title = document.title;
		}
		shareObj.tqq = 'http://v.t.qq.com/share/share.php?url='+encodeURIComponent(window.location.href)+'&appkey=118cd1d635c44eab9a4840b2fbf8b0fb'+'&site='+encodeURIComponent('www.jiathis.com')+'&pic='+''+'&title='+encodeURIComponent(title);
		if (window.location.href.indexOf('yule.1314zb.com') != -1) {
			var l = window.location.href.replace('yule.1314zb.com', 'video.1314zb.com/yule');
		} else {
			var l = window.location.href;
		}
		shareObj.tsina = "http://service.t.sina.com.cn/share/share.php?url="+encodeURIComponent(l)+"&appkey=212641900&title="+encodeURIComponent(document.title)+"&pic=&ralateUid=1710335571&searchPic=true";
		if(this.$('replace_jiathis_tsina_trailer')){
			shareObj.tsina = $('replace_jiathis_tsina_trailer').href;
		}

		G_PLAYER_INSTANCE.flvExternalCommand('shareCmd',shareObj);
		
	}/*,
	
	initFavorite:function(){
		var favoriteBar = this.$C('DIV');
		favoriteBar.className = 'favorite';
		favoriteBar.id = 'top_tip_bar';
		favoriteBar.style.marginTop="-33px";
		favoriteBar.innerHTML = '<div class="favorite_con">将看看加入收藏或保存至桌面，畅享高清视频!<a href="javascript://" onclick="addFavourite(\'迅雷看看-免费高清影视在线观看与下载\', \'http://www.1314zb.com/?id=4001\');" title="加入收藏" class="favorite_btn" target="_self">加入收藏 </a><a href="http://movie.1314zb.com/xunlei_desktop.php" onclick="closeTip2()" title="保存至桌面" class="favorite_btn" target="_self">保存至桌面</a><a href="javascript:void(0)" onclick="closeTip()" title="不再提示" class="favorite_link" target="_self">不再提示</a><a href="javascript:void(0)" onclick="closeTip()" title="关闭" class="favorite_close" target="_self">关闭</a>	</div>';
		document.body.insertBefore(favoriteBar,document.body.childNodes[0])
		//this.$P(favoriteBar,false);
		this.loadFavoriteJs();
		 
	},
	loadFavoriteJs:function(){
		loadJSData("http://js.kankan.1314zb.com/js/addfav.js", "loadTopTip", [], true);
	}*/
});

var Page ={};
	Page.Tab=function(ids,gls,tid,option){
		var imgs=[],
		baseCss=option.css || "",
		onCss = option.onCss || "";
		for(var i=0;i<ids.length;i++){
			var obj=$(ids[i]);
			if(ids[i]==tid){
				obj.style.display='block';
				$(gls[i]).className=onCss;
				if(option.lazyImg){
					findImg(obj);
					showimgs();
				}
			}
			else{
				obj.style.display='none';
				$(gls[i]).className=baseCss;
			}
			if(option.cback){
				try{
					option.cback.call(this,tid);
				}
				catch(e){}
			}
		}
		function $(id){
			return document.getElementById(id);
		}
		function findImg(dom){
			if(dom.tagName=='IMG') return '';
			if(dom.childNodes.length==0) return '';
			for(var i=0;i<dom.childNodes.length;i++){
				if(dom.childNodes[i].tagName=='IMG' && dom.childNodes[i].getAttribute('tsrc') && dom.childNodes[i].getAttribute('tsrc')!=dom.childNodes[i].getAttribute('src')) imgs.push(dom.childNodes[i]);
				else findImg(dom.childNodes[i]);
			}
			return '';
		}
		function showimgs(current,per){
			for(var i=0;i<imgs.length;i++){
				if(true){
					var obj = imgs[i];
					var _src=obj.getAttribute('tsrc');
					if(_src&&obj.src!=_src){
						setTimeout((function(obj,_src){
							return function(){
								obj.src=_src;
							}
						})(obj,_src),1);
					}
				}
			}
		}
	}//Page.tab
	;

var G_PAGE_SEARCH = new kkPageSearch();
var G_PAGE_ASSISTANT = new kkPageAssistant();
//var G_PAGE_PREDEPLOY = new kkPagePreDeploy();

var G_WEBKK_TAB={
	tab_x_t:function(to){
		Page.Tab(['turn_x_box','turn_r_box','turn_a_box'],['tab_x','tab_r','tab_a'],to,{css:'',onCss:'on',cback:function(tid){
			var ids={turn_x_box:'trun_x_pager',turn_r_box:'trun_r_pager',turn_a_box:'trun_a_pager'};
			for(var i in ids){
				var obj=document.getElementById(ids[i]);
				if(i==tid) obj.style.display='';
				else {
					try{obj.style.display='none';}catch(e){};
				}
			}
		}});
	},
	tab_x_t_for_later:function(to){
		Page.Tab(['turn_x_box','turn_r_box','turn_a_box'],['tab_x','tab_r','tab_a'],to,{css:'',onCss:'on',cback:function(tid){
			var ids={turn_x_box:'trun_x_pager',turn_r_box:'trun_r_pager',turn_a_box:'trun_a_pager'};
			for(var i in ids){
				var obj=document.getElementById(ids[i]);
				if(i==tid){
					//obj.style.display='';
					G_WEBKK_TAB.laterImg(document.getElementById('turn_r_marginId'),1);
					G_WEBKK_TAB.laterImg(document.getElementById('turn_a_marginId'),1);
				}else {
					try{obj.style.display='none';}catch(e){};
				}
			}
		}});
	},
	laterImg:function(obj,n){
		if(obj.childNodes.length==0) return '';
		for(var i=0;i<obj.childNodes.length;i++){
			if(obj.childNodes[i].tagName=='IMG' && obj.childNodes[i].getAttribute('tsrc') && obj.childNodes[i].getAttribute('tsrc')!=obj.childNodes[i].getAttribute('src')) obj.childNodes[i].src=obj.childNodes[i].getAttribute('tsrc');
			else G_WEBKK_TAB.laterImg(obj.childNodes[i],n);
		}
		return '';
	},
	tab_comment:function(to){
		Page.Tab(['comment_hot','comment_new'],['tab_hot','tab_new'],to,{css:'h3_tt_yp_a',onCss:'h3_tt_yp_a cureA',lazyImg:true});
	}
};


var kkPageUser = KankanObj.extend({
	init : function(){
		this.getLoginInfo.delayCall(500,this);
		this.getLoginSave.delayCall(1000,this);
		this.BAW.delayCall(0,this);
		this.processEvent.delayCall(0,this);
		this.initCloseButton.delayCall(0,this);
		G_CORE_CONTROL.attachEvent(this,'onopen',this.setBooster);
	},
	processEvent :function(){
		G_CORE_CONTROL.attachEvent(this, "onStickSkip", G_PAGE_USER.f_onStickSkip);
		G_CORE_CONTROL.attachEvent(this, "onPauseSkip", G_PAGE_USER.f_onPauseSkip);
	},
	initCloseButton:function(){
		var closeR = this.$C('DIV');
		closeR.className = 'closebox';
		closeR.innerHTML = '<div></div><A title="" href="javascript:void(0);" target="_self" onclick="Login.ShowVip()">关闭</A>';
		if(this.$('lamu_container')){
			this.$P(closeR,this.$('lamu_container'));
		}
		var closeL = this.$C('DIV');
		closeL.className = 'closebox closebox_L';
		closeL.innerHTML = '<div></div><A title="" href="javascript:void(0);" target="_self" onclick="Login.ShowVip()">关闭</A>';
		if(this.$('lamu_container')){
			this.$P(closeL,this.$('lamu_container'));
		}
	},
	f_onStickSkip : function(){
		Login.ShowVip();
	},
	f_onPauseSkip : function(){
		Login.ShowVip();
	},
	logout : function(){
		setCookie("sessionid","");setCookie("usrname","");setCookie("usernewno","");setCookie("usernick","");setCookie("score","");setCookie("order","");setCookie("userid","");setCookie("luserid","");setCookie("lsessionid","");setCookie("isvip","");
		try{
			$('login_frame').src='';
		}catch(e){}
		this.getLoginInfo(1);
		try{
			G_CORE_STATIC.userStatus = 1;
			G_CORE_STATIC.setnStat('user_status',1,false);
		}catch(e){}
		try{G_PLAYER_INSTANCE.dapctrl.Put("sSessionID","");}catch(e){}
		G_PAGE_ASSISTANT.setHistoryFooter('unLogin');
	},
	getVipStatus:function(islogin){
		this.islogin = islogin;
		if(getCookie('userid')!=''&&getCookie('sessionid')!=''){
			var v_userinfo = ioCtrl.ioReader('v_userinfo2_'+getCookie('userid'));
			if(v_userinfo!=''&&!islogin){
				var items = v_userinfo.split("#");
				if(items.length==4){
					if(items[3]==(parseInt(items[0])+parseInt(items[1])+parseInt(getCookie('userid'))>>5)){
						G_ISVIP=parseInt(items[0]);
						G_VIPLEVEL=parseInt(items[1]);
						G_VIP_EXPIRE=items[2];
						this.showVipInfo();
						return true;
					}
				}
			}
			loadJSData("http://movie.1314zb.com/interface/vip_query.php?u="+getCookie('userid')+"&catchtime="+this.time(), "G_PAGE_USER.getVipStatusHandler", [], true);
			send_kkpgv('vip_query');
		}
	},
	showVipInfo:function(){
		if(G_ISVIP==0){
			try{
				$('userVipIcon').innerHTML='<a href="http://vip.1314zb.com/?referfrom=KKWEB_Header_NonVIPIcon" target="_blank" title="尚未成为迅雷会员"><img src="http://img.kankan.1314zb.com/img/kankan/5.1/vipicon/icon_vipgray0.gif" /></a>';
			}catch(e){};
		}else if(G_VIPLEVEL>=0&&G_VIPLEVEL<7){
			try{
				$('userVipIcon').innerHTML='<a href="http://vip.1314zb.com/?referfrom=KKWEB_Header_VIPIcon" target="_blank" title="迅雷会员"><img src="http://img.kankan.1314zb.com/img/kankan/5.1/vipicon/icon_vip'+G_VIPLEVEL+'.gif" /></a>';
			}catch(e){};
			try{
				if(G_CORE_STATIC.userStatus!=4){
					G_CORE_STATIC.userStatus = 3;
					G_CORE_STATIC.setnStat('user_status',3,false);
				}
			}catch(e){}
		}
	},
	getVipStatusHandler:function(){
		G_PAGE_USER.showVipInfo();
		G_PAGE_USER.refreshInfo();
		G_PAGE_USER.updateUserStatus(G_XLKKUSERINFO);
	},
	refreshInfo : function(){
		if(getCookie('userid')&&typeof G_ISVIP!='undefined'&& typeof G_VIPLEVEL!='undefined'){
			var wstr=G_ISVIP+'#'+G_VIPLEVEL+'#'+G_VIP_EXPIRE+'#'+(parseInt(G_ISVIP)+parseInt(G_VIPLEVEL)+parseInt(getCookie('userid'))>>5);
			ioCtrl.ioWriter('v_userinfo2_'+getCookie('userid'),wstr,24);
			return true;
		}
	},
	getLoginInfo : function(out){
		var tString ='<a href="javascript:void(0)" title="" onclick="Login.ShowVip();" blockid="2816" target="_self">去广告</a>';
		var tmp = '<a href="javascript:Login.Show();" class="kk_login" target="_self">登录</a><span>&nbsp;|&nbsp;</span><a href="http://i.1314zb.com/?redirecturl=regist&regfrom=KK_001" target="_blank" class="kk_login">注册</a>|'+tString;
		var userStatus = 1;
		if(this.getUserInfo()&&out!=1){
			var sUrsName=getCookie("usrname");
			var sNickName=getCookie("usernick") || sUrsName;
			var is_vip=getCookie("isvip");
			tmp = '<a href="http://i.1314zb.com" target="_blank" '+((is_vip>0&&is_vip<10)?'style="color:#ff0000"':'')+' id="uc_nickname">'+sNickName+'</a><span id="userVipIcon" ></span><a href="javascript:G_PAGE_USER.logout();" class="blue" target="_self">[退出]</a>|'+tString;
			userStatus = 2;
			if(G_PAGE_ASSISTANT.hisFooterStat!='logined'){
				G_PAGE_ASSISTANT.setHistoryFooter('logined');
			}
		}
		$("div_usr").innerHTML=tmp;
		try{
			if(getCookie('userid')){
				G_CORE_STATIC.setnStat('userid',getCookie('userid'),false);
				G_CORE_STATIC.userid = getCookie('userid');
			}else{
				G_CORE_STATIC.setnStat('userid',0,false);
				G_CORE_STATIC.userid = 0;
			}
		}catch(e){}
		try{
			if(G_CORE_STATIC.userStatus!=4){
				G_CORE_STATIC.userStatus = userStatus;
				G_CORE_STATIC.setnStat('user_status',userStatus,false);

			}
		}catch(e){}
	},
	getUserInfo : function(){
		return getCookie('sessionid');
	},
	getLoginSave : function(){
		setTimeout(function(){loadJSData('http://misc.web.1314zb.com/lib/iLogin.js', "G_PAGE_USER.getLoginSaveHandler", [], true,'utf-8');},0);
	},
	getLoginSaveHandler : function(){
		if(typeof iLogin!='undefined' && iLogin){
			iLogin.run({
				success:function(){
					Login.Check(false);
				},
				error:function(){
				}
			});
		}
	},
	BAWLamu : function(flag){
		this.trace('BAWLamu');
		if(flag!=false){
			flag=true;
		}
		try{$R2('lamushort',flag);} catch(e) {};
		try{$R2('lamu',flag);} catch(e) {};
		if(flag){
			G_PAGE_ASSISTANT.isLamuClosed = true;
			G_PAGE_ASSISTANT.hideMiniLamu();
		}else{
			G_PAGE_ASSISTANT.isLamuClosed = false;
		}
		try{
			if($('cm1128_parent')){
				$R2('cm1128',flag);
			}
		} catch(e) {};
		if(flag){send_kkpgv('vip_apply');}
	},
	setAdType:function(type){
		var domain = G_CORE_CONTROL.subDomain||'kankan.1314zb.com';
		if(type==1){
			setCookieWithDomain('stick_type','kk10', 24*365,domain);
		}else{
			setCookieWithDomain('stick_type','kk0', 24*365,domain);
			try{
				if(this.$('lamu')&&this.$('lamu').childNodes.length==0){
					G_COMMERCIAL_COMMON.loadLamuCpm();
					G_COMMERCIAL_COMMON.playLamuNormal.delayCall(1000,G_COMMERCIAL_COMMON);
					//G_COMMERCIAL_COMMON.showLamu('http://biz5.sandai.net/ad/kankan/newPreLamu.js');
				}
			}catch(e){}
		}
		this.BAW.delayCall(0,this);
	},
	updateUserStatus:function(obj){
		var domain = G_CORE_CONTROL.subDomain||'kankan.1314zb.com';
		if(parseInt(obj.isvip)>0){
			setCookieWithDomain('vod_vip',obj.userid, 24,domain);
		}else{
			setCookieWithDomain('vod_vip',-1, 24,domain);
		}
		this.BAW.delayCall(0,this);
	},
	BAW:function(obj){
		this.trace('BAW');
		if(G_CORE_CONTROL.getUStatus()){
			if(G_COMMERCIAL_COMMON.ADPlaying){
				G_COMMERCIAL_COMMON.initAllPlaying();
				G_CORE_CONTROL.playStick(null);
				try{G_CORE_STATIC.f_onstickover();}catch(e){};
				this.trace('BAW-apply');
			}
			this.BAWLamu();
			G_AD_TYPE=10;
			try{
				G_PLAYER_INSTANCE.setPauseADUrl('',G_CORE_COMMON.getPeerID());
			}catch(e){};
			try{
				G_PLAYER_INSTANCE.setMessageAD('')
			}catch(e){};
			
			try{
				G_PLAYER_INSTANCE.setCornerAD('');
				G_PLAYER_INSTANCE.closeCorner();
			}catch(e){};
			try{
				G_CORE_STATIC.userStatus = 4;
				G_CORE_STATIC.setnStat('user_status',4,false);
			}catch(e){}
			this.trace('BAW-set');
		}else{
			this.trace('BAW-unset');
			this.BAWLamu(false);
			G_AD_TYPE=0;
			try{
				G_COMMERCIAL_COMMON.setPauseAD();
			}catch(e){};
			try{
				if(typeof G_ISVIP!='undefined'&& G_ISVIP>0){
					G_CORE_STATIC.userStatus = 3;
					G_CORE_STATIC.setnStat('user_status',3,false);
				}
			}catch(e){}
		}
		this.setBooster();
	},
	setBooster:function(){ //speed up
		if(typeof G_ISVIP!='undefined'&&G_ISVIP>0){
			this.trace('BAW-booster');
			try{G_PLAYER_INSTANCE.dapctrl.Put('sPlayerOP','booster');}catch(e){};
		}
	}
});

var kkPagePlugin = KankanObj.extend({
	init:function(){
		this._super();
		this.tuanTitle ='';
		this.tuanUrl ='';
		this.isTuanShow = false;
		this.extrtnalAdLoaded = false;
		this.loadJS_1s.delayCall(1000,this);
		this.loadJS_3s.delayCall(3000,this);
		this.loadJS_5s.delayCall(5000,this);
		this.loadJS_7s.delayCall(7000,this);
		window.attachEvent('onscroll',this.f_onscroll);

	},
	loadJS_1s:function(){
		if(typeof G_IS_TRAILER=='undefined'||!G_IS_TRAILER){
			if(G_MOVIE_TYPE=='movie'||G_MOVIE_TYPE=='teleplay'&&this.$('info_download')){
				loadJSData('http://js.kankan.1314zb.com/5.2/js/download_main_v3.js', null, [], false);
			}
		}
	},
	loadJS_3s:function(){
		loadJSData('http://js.kankan.1314zb.com/js/dyData.js', null, [], false);
		loadJSData('http://biz5.sandai.net/kantuan/kantuan.js', "G_PAGE_PLUGIN.loadTuanConfigHandler", [], true);
		loadJSData('http://misc.web.1314zb.com/movie/js/rating/movie_rating_min.js?v=0816', null, [], false);
		loadJSData('http://v1.jiathis.com/code/jia.js?uid=901384', null, [], false,'utf-8');
	},
	loadJS_5s:function(){
		loadJSData('http://biz5.sandai.net/portal/008/A/cm1128.js', null, [], false);
		if(G_MOVIE_TYPE=='movie'){
			loadJSData('http://biz5.sandai.net/portal/008/A/cm1175.js', null, [], false);
		}
	},
	loadJS_7s:function(){
		loadJSData('http://js.kankan.1314zb.com/js/searchBar.js', null, [], false);
		loadJSData('http://movie.1314zb.com/js/search_content_gb2312.js', "G_PAGE_PLUGIN.loadSearchTipsHandler", [], true);
		loadJSData('http://biz5.sandai.net/portal/008/A/cm1165.js', null, [], false);
	},
	f_onscroll:function(){
		if(this.extrtnalAdLoaded){
			return false;
		}
		var top = document.body.scrollTop + document.documentElement.scrollTop
		if(top>300){
			loadJSData('http://biz5.sandai.net/portal/kankan/playpagebanner.js', null, [], false);
			loadJSData('http://biz5.sandai.net/portal/008/A/cm962.js', null, [], false);
			loadJSData('http://biz5.sandai.net/portal/008/A/cm1227.js', null, [], false);
			loadJSData('http://biz5.sandai.net/portal/008/A/cm1228.js', null, [], false);
			this.extrtnalAdLoaded = true
		}
	},
	loadTuanConfigHandler:function(){
		if(typeof var_kantuan!='undefined'){
			G_PAGE_PLUGIN.tuanTitle = var_kantuan.word;
			G_PAGE_PLUGIN.tuanUrl = var_kantuan.url;
			if(G_PAGE_PLUGIN.tuanTitle&&G_PAGE_PLUGIN.tuanUrl){
				try{
					this.$('tuan_span').innerHTML = '<a href="'+G_PAGE_PLUGIN.tuanUrl+'" class="tuan_link" blockid="7011" rel="nofollow" target="_blank">'+G_PAGE_PLUGIN.tuanTitle+'</a>'
				}catch(e){};
			}
		}
	},
	loadSearchTipsHandler:function(){
		if(G_PAGE_SEARCH.$('_keyword').value=='输入影片名或主演名') {
			try{setSearchInputContent(this.$("_keyword"));}catch(e){};
		}
	},
	showTuan:function(){
		if(!this.isTuanShow){
			$('tuan_iframe').src = G_PAGE_PLUGIN.tuanUrl;
			$('tuan_iframe').height='510px';
//			$('tuan_iframe').style.height='510px';
			$('player_container').className = 'player playerTV player_tuan';
			$('tuan_container').style.display = 'block';
			$('tuan_href').innerHTML = '返回';

			this.isTuanShow = true;
			
		}else{
			this.hideTuan();
		}
	},
	hideTuan:function(){
		$('player_container').className = 'player playerTV';
		$('tuan_container').style.display = 'none';
		$('tuan_href').innerHTML = G_PAGE_PLUGIN.tuanTitle;
		//+'<img src="http://img.kankan.1314zb.com/img/kankan/mp4/new.png" alt="" title="" />';
		this.isTuanShow = false;
	}
});
var G_PAGE_PLUGIN = new kkPagePlugin();
var G_PAGE_USER = new kkPageUser();

var kkPageNav = KankanObj.extend({
	init: function(){
		this.mouseOnNav = false;
		var navIF = $C('iframe');
		navIF.id='navMoreIF';
		navIF.style.top='-2000px';
		navIF.scrolling='no';
		navIF.frameBorder='no';
		navIF.className='morelink_iframe';
		this.$P(navIF,$('navMore'));
		delete navIF;
		try{
			this.$('navMore').attachEvent("onmouseout",this.isMouseOutNav);
			this.$('navMore').attachEvent("onmouseover",this.show);
			this.$('navMoreDIV').attachEvent("onmouseout",this.hide);
			this.$('navMoreDIV').attachEvent("onmouseover",this.show);
		}catch(e){};
	},
	show: function(){
		G_PAGE_NAV.mouseOnNav=true;
		G_PAGE_NAV.$('navMoreIF').style.top='24px';
		G_PAGE_NAV.$('navMoreDIV').style.display='';
	},
	hide: function(){
		G_PAGE_NAV.mouseOnNav=false;
		G_PAGE_NAV.$('navMoreIF').style.top='-2000px';
		G_PAGE_NAV.$('navMoreDIV').style.display='none';
	},
	isMouseOutNav: function(){
		G_PAGE_NAV.mouseOnNav=false;
		setTimeout(function(){
			if(!G_PAGE_NAV.mouseOnNav){
				G_PAGE_NAV.hide();
			}
		},500);
	}
});
var G_PAGE_NAV = new kkPageNav();

function turn_t_laterImg(n){
	G_WEBKK_TAB.laterImg(document.getElementById('turn_t_marginId'),n);
}

if(typeof Login!='undefined'&&typeof Login.CallBackStack!='undefined'){
	var tmp_login_stack = Login.CallBackStack;
}
var Login={};
Login.Show=function(isFromSwf){
	if(typeof global_login_frm_show=='function'){
		global_login_frm_show(this,true,'http://kankan.1314zb.com',0,'vod');
		G_CORE_CONTROL.hidePlayer();
	}
	if(isFromSwf==1){
		G_PAGE_ASSISTANT.sendkkpgv2('sum','vodrecord','vodpage','login');
	}
}
Login.ShowVip=function(){
	if(typeof global_login_frm_show=='function'){
		global_login_frm_show(this,true,'http://kankan.1314zb.com',0,'vodvip_v2');
		G_CORE_CONTROL.hidePlayer();
	}
}
Login.Check=function(iscallback){
	G_PAGE_USER.getLoginInfo();
	setTimeout(function(){G_PAGE_USER.getVipStatus(iscallback);},0);
}
Login.CallBackStack=[];
if(typeof tmp_login_stack!='undefined'){
	Login.CallBackStack = tmp_login_stack;
}
function login_success_callback(resObj){
	Login.Check(true);
	while(Login.CallBackStack.length>0){
		(Login.CallBackStack[0])();
		Login.CallBackStack.shift();
	}
	if(typeof resObj!='undefined'){
		G_PAGE_USER.updateUserStatus(resObj);
	}
}
function login_close_callback(){
	setTimeout(function(){Login.CallBackStack=[];},2000);
	G_CORE_CONTROL.showPlayer();
}
G_PAGE_LOAD_COMPLETE = 1;
//for kkpv
var stat_pageid = 93;
var stat_block0 = false;
var kkpgv_u2 = 'fvod';
var stat_refer =getCookie('vod_refer');
if(stat_refer){
	var domain = G_CORE_CONTROL.subDomain||'kankan.1314zb.com';
	var kkpgv_u9=encodeURIComponent(stat_refer);
	setCookieWithDomain('vod_refer','', 0,domain);
}
