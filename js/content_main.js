document.domain = 'www.xun.com';

var _e = function () {};
typeof console != "undefined" && (_e = function (a) {
    console.log(a)
}), 

function (m, w, $) {
	typeof w.kkContent == "undefined" && (w.kkContent = {}),
	
	kkContent.dapCtrl = false;
	kkContent.peerId = false;
	kkContent.fboxId = null;
	
	kkContent.changeTab = function (target, index, count) {
		if($("#nav_"+target+"_"+index).length > 0 && $("#box_"+target+"_"+index).length > 0) {
			for(var i = 0;i < count;i++) {
				try {
					$("#nav_"+target+"_"+i).attr('className', '');
					$("#box_"+target+"_"+i).hide();
				} catch(e) {}
			}
			
			try {
				$("#nav_"+target+"_"+index).attr('className', 'on');
				$("#box_"+target+"_"+index).show();
			} catch(e) {}
			
			try {
				$("#box_"+target+"_"+index+">ul>li>a>img").each(function(i) {
					if ($(this).attr("src2")) {
						var _this = this;
						setTimeout(function(){$(_this).attr("src", $(_this).attr("src2"));}, 0);
					}
				});
			} catch(e) {}
		}
	},
	
	// 未获取时为false，未找到为null
	kkContent.getDapctrl = function () {
		if (this.dapCtrl === false) {
			try {
				if ($.browser.msie) {
					this.dapCtrl =  new ActiveXObject("DapCtrl.DapCtrl");
				} else {
					this.dapCtrl = document.getElementById('dapctrl');
				}
			} catch(e) {
				this.dapCtrl = null;
			}
		}
		return this.dapCtrl;
	},
	
	// 未获取时为false，未找到为null
	kkContent.getPeerid = function () {
		var _dapctrl = this.getDapctrl();
		if (_dapctrl === null) {
			return null;
		}
		
		if (this.peerId === false) {
			try {
				this.peerId = _dapctrl.Get("sPeerID") || null;
			} catch (e) {
				this.peerId = null;
			} finally {
				_dapctrl = null;
			}
		}
		return this.peerId;
	},
	
	kkContent.getParameter = function (name) {
		var _search = document.location.search;
		var _pattern = new RegExp("[?&]"+name+"\=([^&]+)", "g");
		var _matcher = _pattern.exec(_search);
		var _items = null;
		if (null != _matcher) {
			_items = decodeURIComponent(_matcher[1]);
		} else {
			_search = document.location.hash;
			_pattern = new RegExp("#"+name, "g");
			_matcher = _pattern.exec(_search);
			if(null != _matcher){
				return true;
			}
		}
		return _items;
	},
	
	kkContent.sendStatistic = function (url) {
		var _img = new Image();
		_img.src = url+'&rand='+(Math.floor(Math.random()*999999)+1);
	},
	
	kkContent.checkCondition = function () {
		if (!$.browser.msie) {
			this.displayFloatbox('floatbox_not_support');
			return false;
		}
		
		var _dapctrl = this.getDapctrl();
		var _dapctrl_ver = 0;
		try {
			_dapctrl_ver = _dapctrl.GetThunderVer("THUNDER59","INSTALL");
		} catch(e) {}
		
		if(_dapctrl === null || _dapctrl_ver == 0) {
			this.displayFloatbox('floatbox_not_install');
			return false;
		}
		
		if(_dapctrl_ver < 2294) {
			this.displayFloatbox('floatbox_low_version');
			return false;
		}
		
		return true;
	},
	
	kkContent.getCookie = function (name) {
		var _search = name + "=";
		var _offset = document.cookie.indexOf(_search);
		if (_offset != -1) {
			_offset += _search.length;
			var _end = document.cookie.indexOf(";", _offset);
			if (_end == -1)
				_end = document.cookie.length;
			return unescape(document.cookie.substring(_offset, _end));
		} else 
			return "";
	},
	
	kkContent.setCookie = function (name,value,hours) {
		if (arguments.length>2) {
			var _expireDate=new Date(new Date().getTime()+hours*3600000);
			document.cookie = name + "=" + escape(value) + "; path=/; domain=www.xun.com; expires=" + _expireDate.toGMTString();
		} else
			document.cookie = name + "=" + escape(value) + "; path=/; domain=www.xun.com"; 
	},
	
	kkContent.showLatest = function () {
		var _tipsBox = '';
		var _tipsHtml = '';
		if (m.total_number > 0) {
			//_tipsHtml = '共'+m.total_number+'集 ';
		}
		_tipsHtml += '已更新至';
		if (m.version != '' && typeof fenji_json != 'undefined') {
			var _subid = fenji_json[0];
			if (this.getParameter("fromxmp")) {
				_tipsBox = '<a href="javascript:void(0);" onclick="kkContent.playSub('+_subid+');return false;" title="'+m.version+'">'+m.version+'</a>';
			} else {
				_tipsBox = '<a href="'+m.vod_url.replace('.shtml', '/'+_subid+'.shtml')+'" target="_blank" title="'+m.version+'">'+m.version+'</a>';
			}

			_tipsHtml = m.version.replace('全','完');
			$("#play_link").attr("href", m.vod_url.replace('.shtml', '/'+_subid+'.shtml'));
		} else if (latest_json != null && latest_json.length > 0) {
			if (latest_json.length == 2) {
				if (this.getParameter("fromxmp")) {
					_tipsBox = '<a href="javascript:void(0);" onclick="kkContent.playSub('+latest_json[1][0]+');return false;" title="更新至'+latest_json[0][1].replace('第','').replace('集','')+'、'+latest_json[1][1].replace('第','').replace('期','')+'">更新至'+latest_json[0][1].replace('第','').replace('集','')+'、'+latest_json[1][1].replace('第','').replace('期','')+'</a>';
					_tipsHtml += '<a href="javascript:void(0);" onclick="kkContent.playSub('+latest_json[0][0]+');return false;" title="'+latest_json[0][1]+'">'+latest_json[0][1]+'</a>、<a href="javascript:void(0);" onclick="kkContent.playSub('+latest_json[1][0]+');return false;" title="'+latest_json[1][1]+'">'+latest_json[1][1]+'</a>';
				} else {
					_tipsBox = '<a href="'+latest_json[1][2]+'" target="_blank" title="更新至'+latest_json[0][1].replace('第','').replace('集','')+'、'+latest_json[1][1].replace('第','').replace('期','')+'">更新至'+latest_json[0][1].replace('第','').replace('集','')+'、'+latest_json[1][1].replace('第','').replace('期','')+'</a>';
					_tipsHtml += '<a href="'+latest_json[0][2]+'" target="_blank" title="'+latest_json[0][1]+'">'+latest_json[0][1]+'</a>、<a href="'+latest_json[1][2]+'" target="_blank" title="'+latest_json[1][1]+'">'+latest_json[1][1]+'</a>';
				}
				$("#play_link").attr("href", latest_json[1][2]);
			} else {
				if (this.getParameter("fromxmp")) {
					_tipsBox = '<a href="javascript:void(0);" onclick="kkContent.playSub('+latest_json[0][0]+');return false;" title="更新至'+latest_json[0][1].replace('第','').replace('期','')+'">更新至'+latest_json[0][1].replace('第','').replace('期','')+'</a>';
					_tipsHtml += '<a href="javascript:void(0);" onclick="kkContent.playSub('+latest_json[0][0]+');return false;" title="'+latest_json[0][1]+'">'+latest_json[0][1]+'</a>';
				} else {
					_tipsBox = '<a href="'+latest_json[0][2]+'" target="_blank" title="更新至'+latest_json[0][1].replace('第','').replace('期','')+'">更新至'+latest_json[0][1].replace('第','').replace('期','')+'</a>';
					_tipsHtml += '<a href="'+latest_json[0][2]+'" target="_blank" title="'+latest_json[0][1]+'">'+latest_json[0][1]+'</a>';
				}
				$("#play_link").attr("href", latest_json[0][2]);
			}
		}
		$('#playbox').html(_tipsBox);
		$('.latest_update').html(_tipsHtml);
	},
	
	kkContent.fjList = {
		pageIndex : 0,
		pageCount : 0,
		pageEvery : 30,
		pageNum : 0,
		pageNav : new Array(),
		pageSector : 0,
		pageSectorLen : 0,
		pageOrder : 'asc',
		
		init : function () {
			if (typeof fenji_json == 'undefined' || fenji_json == null || fenji_json.length == 0) {
				return;
			} else {
				this.pageCount = fenji_json.length;
				if (m.version == '') {
					this.pageOrder = 'desc';
				} else {
					this.pageOrder = 'asc';
				}
			}
			if (this.getType() == 'tv') {
				this.pageSectorLen = 2;
				$(".fenjilist_ctrl").remove();
			} else {
				this.pageSectorLen = 3;
			}
			this.drawList();
			kkContent.showLatest();
			kkContent.readHistory();
		},
		getType : function () {
			if (fenji_json[0].indexOf('_') != -1) {
				return 'tv';
			} else {
				return 'movie';
			}
		},
		reverseOrder : function () {
			if (this.pageOrder == 'asc') {
				this.pageOrder = 'desc';
			} else {
				this.pageOrder = 'asc';
			}
			this.drawList();
		},
		drawList : function () {
			this.pageIndex = -1;
			if (this.getType() == 'tv') {
				this.draw_Tvfenji();
			} else {
				this.draw_Fenji();
			}
		},
		draw_Fenji : function () {
			this.pageNum = Math.ceil(this.pageCount/this.pageEvery);
			
			var _pageStr = '';
			if (this.pageNum>this.pageSectorLen) _pageStr += '<a id="fj_page_prev" onclick="kkContent.fjList.jumpPage(\'prev\',true);" href="javascript:void(0);" title="上一组" target="_self">&lt;&lt;上一组</a>';
			for(var i=1;i<=this.pageNum;i++) {
				var _pageFrom = (i-1)*this.pageEvery+1;
				var _pageTo = (i*this.pageEvery>this.pageCount)?this.pageCount:(i*this.pageEvery);
				if (this.pageOrder == 'desc') {
					_pageFrom = this.pageCount - _pageFrom + 1;
					_pageTo = this.pageCount - _pageTo + 1;
				}
				if(_pageFrom<10) _pageFrom = '0'+_pageFrom;
				if(_pageTo<10) _pageTo = '0'+_pageTo;
			
				_pageStr += '<a id="fj_page_'+(i-1)+'"'+((i>=this.pageSectorLen)?' style="display:none;"':'')+' onclick="kkContent.fjList.jumpPage('+(i-1)+',true);" href="javascript:void(0);" title="'+_pageFrom+'-'+_pageTo+'" target="_self">'+_pageFrom+'-'+_pageTo+'</a>';
			}
			if (this.pageNum>this.pageSectorLen) _pageStr += '<a id="fj_page_next" onclick="kkContent.fjList.jumpPage(\'next\',true);" href="javascript:void(0);" title="下一组" target="_self">下一组&gt;&gt;</a>';
			
			$("#fenji_tab").html(_pageStr);
			$(".fenji_div").hide();
			this.jumpPage(0, false);
		},
		jumpPage : function (page, anchor) {
			var _oldIndex = this.pageIndex;
			if (page == 'prev') {
				this.pageIndex = (this.pageIndex <= 0)?0:(this.pageIndex-1);
			} else if (page == 'next') {
				this.pageIndex = (this.pageIndex >= this.pageNum-1)?(this.pageNum-1):(this.pageIndex+1);
			} else {
				this.pageIndex = (page >= 0 && page <= this.pageNum-1)?page:this.pageIndex;
			}
			if (_oldIndex == this.pageIndex) return;
			
			if (this.getType() == 'tv') {
			} else {
				$("#fj_page_"+_oldIndex).attr('className', '');
				$("#fenji_"+_oldIndex+"_"+this.pageOrder).hide();
				
				for (var i=this.pageSector;i<=this.sectorEnd(this.pageSectorLen);i++) {
					$("#fj_page_"+i).hide();
				}
				if (this.pageIndex < this.pageSector || this.pageIndex > this.sectorEnd()) {
					if (this.pageIndex < this.pageSector) {// 在当前区间左侧
						this.pageSector = this.pageIndex;
					}
					if (this.pageIndex > this.sectorEnd()) {// 在当前区间右侧
						this.pageSector += this.pageIndex - this.sectorEnd();
					}
				}
				for (var i=this.pageSector;i<=this.sectorEnd();i++) {
					$("#fj_page_"+i).show();
				}

				var _rbNav = '';
				if (this.pageIndex > 0) {
					_rbNav += '<a onclick="kkContent.fjList.jumpPage(\'prev\',true);" href="javascript:void(0);" title="前'+this.pageEvery+'集" target="_self" class="fenjilist_l">前'+this.pageEvery+'集</a>';
					$("#fj_page_prev").removeClass("disabled");
				} else {
					$("#fj_page_prev").addClass("disabled");
				}
				
				if (this.pageIndex < this.pageNum-1) {
					if (this.pageIndex == this.pageNum-2) {
						var _nextNum = this.pageCount - (this.pageIndex + 1) * this.pageEvery;
					} else {
						var _nextNum = this.pageEvery;
					}
					
					_rbNav += '<a onclick="kkContent.fjList.jumpPage(\'next\',true);" href="javascript:void(0);" title="后'+_nextNum+'集" target="_self" class="fenjilist_r">后'+_nextNum+'集</a>';
					$("#fj_page_next").removeClass("disabled");
				} else {
					$("#fj_page_next").addClass("disabled");
				}
				
				$("#fenji_"+this.pageIndex+"_"+this.pageOrder).show();
				$("#fenji_"+this.pageIndex+"_"+this.pageOrder+">ul>li>a>img").each(function(i) {
					if ($(this).attr("src2")) {
						var _this = this;
						setTimeout(function(){$(_this).attr("src", $(_this).attr("src2"));}, 0);
					}
				});
			}
			$("#fj_page_"+this.pageIndex).attr('className', 'on');
			$("#fenji_turn").html(_rbNav);
			kkContent.bitrateList.update();
			
			if (anchor)
				kkContent.jumpAnchor('box');
		},
		sectorEnd : function() {
			return ((this.pageSector + this.pageSectorLen - 1) >= this.pageNum-1)?(this.pageNum-1):(this.pageSector + this.pageSectorLen - 1);
		}
	},
	
	kkContent.checkMaintab = function () {
		var _all_empty = true;
		var _first_tab = 0;
		
		for (var i=3;i>=2;i--) {
			if ($("#box_main_"+i).children().length == 0) {
				$("#nav_main_"+i).remove();
				$("#box_main_"+i).remove();
			} else {
				_all_empty = false;
				_first_tab = i;
			}
		}
		
		if (typeof down_json == 'undefined' || down_json == null || (down_json[0].length == 0 && down_json[1].length == 0 && down_json[2].length == 0)) {
			$("#nav_main_1").remove();
			$("#box_main_1").remove();
		} else {
			_all_empty = false;
			_first_tab = 1;
		}
		
		if (typeof fenji_json == 'undefined' || fenji_json.length == 0) {
			$("#nav_main_0").remove();
			$("#box_main_0").remove();
		} else {
			_all_empty = false;
			_first_tab = 0;
		}

		if (_all_empty)
			$("#box").remove();
		else {
			if (this.getParameter("down")) {
				this.changeTab('main', 1, 6);
				this.jumpAnchor('nav_main_1');
			} else {
				this.changeTab('main', _first_tab, 6);
			}
		}
	},
	

	
	kkContent.checkTabdisplay = function (id, count, parent) {
		var _idx = -1;
		var _empty = true;
		for (var i=count-1;i>=0;i--) {
			if($('#box_'+id+'_'+i).children().length == 0) {
				$('#nav_'+id+'_'+i).remove();
				$('#box_'+id+'_'+i).remove();
			} else {
				_idx = i;
				_empty = false;
			}
		}
		if(_idx>-1) this.changeTab(id, _idx, count);
		if(_empty) $('#'+parent).remove();
	},
	
	kkContent.bitrateList = {
		bitrateText : new Array('320P流畅','480P标清','720P高清'),
		bitrateArray : new Array(),
		bitrateCurrent : 0,
		
		init : function (bitrate) {
			this.bitrateArray = bitrate.split(",");
			if (bitrate.length == 0)
				$("#option_resolution").remove();
			else
				this.draw(this.bitrateArray[0]);
		},
		draw : function (index) {
			this.bitrateCurrent = index;
			$("#option_resolution_tt").html(this.bitrateText[this.bitrateCurrent]);
			var _bitrateHtml = '';
			for (var i=0;i<this.bitrateArray.length;i++) {
				if (this.bitrateArray[i] != this.bitrateCurrent || this.bitrateArray.length == 1) {
					 _bitrateHtml += '<li><a href="javascript:void(0);" onclick="kkContent.bitrateList.draw('+this.bitrateArray[i]+');">'+this.bitrateText[this.bitrateArray[i]]+'</a></li>';
				}
			}
			$("#option_resolution_drop").html(_bitrateHtml);
			this.hide();
			this.update();
		},
		show : function () {
			$("#option_resolution").addClass("option_resolution_on");
			$("#option_resolution_drop").show();
		},
		hide : function () {
			$("#option_resolution").removeClass("option_resolution_on");
			$("#option_resolution_drop").hide();
		},
		update : function () {
			var _bitrateText = this.bitrateText[this.bitrateCurrent];
			var _bitrateSplit = _bitrateText.split("P");
			var _this = this;
			$(".fenji_div:visible>ul>li>a>span").attr("className", "res res_"+_bitrateSplit[0]).html(_bitrateSplit[1]);
			$(".fenji_div:visible>ul>li a").each(function() {
				if ($(this).attr("href") != 'javascript:void(0);')
					$(this).attr("href", $(this).attr("href").replace(/\?quality=.+?$/, ''));
			});
		}
	},
	


	
	kkContent.hideGotop = function () {
		var _st = $(document).scrollTop(),_wh = $(w).height(), _ww = $(w).width();

		if ($.browser.msie && $.browser.version == '6.0') {
			$("#gotop").css("top", _st + _wh - 214);
		}
		
		if (_st > 0 && _ww >= 1080) {
			$("#gotop").show();
		} else {
			$("#gotop").hide();
		}
	},
	
	kkContent.strCut = function(str, len, suffix) {
		if (str.length > len) {
			return str.substr(0, len) + suffix;
		} else {
			return str;
		}
	},
	
	kkContent.demoList = {
		pageData : new Array(),
		
		init : function(type, count) {
			this.pageData[type] = new Array();
			this.pageData[type]['index'] = 1;
			this.pageData[type]['count'] = count;
		},
		jumpPage : function (type, index) {
			var _oldIndex = this.pageData[type]['index'];
			if (index == 'prev') {
				this.pageData[type]['index'] = (this.pageData[type]['index'] <= 1)?1:(this.pageData[type]['index']-1);
			} else if (index == 'next') {
				this.pageData[type]['index'] = (this.pageData[type]['index'] >= this.pageData[type]['count'])?this.pageData[type]['count']:(this.pageData[type]['index']+1);
			} else {
				this.pageData[type]['index'] = (index >= 1 && index <= this.pageData[type]['count'])?index:this.pageData[type]['index'];
			}
			
			if (this.pageData[type]['index'] == _oldIndex) return;
			if (this.pageData[type]['index'] == 1) {
				$("#demoPgup_"+type).addClass("compageturn_none");
			} else {
				$("#demoPgup_"+type).removeClass("compageturn_none");
			}
			if (this.pageData[type]['index'] == this.pageData[type]['count']) {
				$("#demoPgDn_"+type).addClass("compageturn_none");
			} else {
				$("#demoPgDn_"+type).removeClass("compageturn_none");
			}
			
			$("#demo_"+type+"_"+(_oldIndex-1)).hide();
			$("#demo_"+type+"_"+(this.pageData[type]['index']-1)).show();
			$("#demoPgnum_"+type).html(this.pageData[type]['index']);
			
			$("#demo_"+type+"_"+(this.pageData[type]['index']-1)+">li>a>img").each(function(i) {
				if ($(this).attr("src3")) {
					var _this = this;
					setTimeout(function(){$(_this).attr("src", $(_this).attr("src3"));}, 0);
				}
			});
		}
	}
}(movieInfo, window, jQuery),

function (m, w, $) {
	w.show_box = function (target, index, count) {
		if($("#nav_"+target+"_"+index).length > 0 && $("#box_"+target+"_"+index).length > 0) {
			for(var i = 0;i < count;i++) {
				try {
					$("#nav_"+target+"_"+i).attr('className', '');
					$("#box_"+target+"_"+i).hide();
				} catch(e) {}
			}
			
			try {
				$("#nav_"+target+"_"+index).attr('className', 'on');
				$("#box_"+target+"_"+index).show();
			} catch(e) {}
			
			try {
				$("#box_"+target+"_"+index+">ul>li>a>img").each(function(i) {
					if ($(this).attr("src2")) {
						var _this = this;
						setTimeout(function(){$(_this).attr("src", $(_this).attr("src2"));}, 0);
					}
				});
			} catch(e) {}
		}
	};
}(movieInfo, window, jQuery)

function cmSwitch(identify,index,count,cnon,cnout)
{
	try{
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
		try{
			eval('document.getElementById("'+identify+'_more").innerHTML=G_'+identify+"_text"+index);
		}catch(e){}
	}catch (ee) {}
}