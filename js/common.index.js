function switchTab(a,b,c,d,e){try{for(i=0;i<c;i++){var f=document.getElementById("Tab_"+a+"_"+i),g=document.getElementById("List_"+a+"_"+i);if(i!=b){f.className=e;g.style.display="none"}}try{for(ind=0;ind<CachePic[a][b].length;ind++)document.getElementById(a+"_pic_"+b+"_"+ind).src=CachePic[a][b][ind]}catch(h){}document.getElementById("Tab_"+a+"_"+b).className=d;document.getElementById("List_"+a+"_"+b).style.display=""}catch(j){}}
function check(){a=document.getElementById("wd").value;a=a.replace(/(\/)|(\\)|(\")|(\')/g,"");if(a=="\u8bf7\u8f93\u5165\u89c6\u9891\u540d\u3001\u4e3b\u6f14\u6216\u5bfc\u6f14"||a==""){alert("\u8bf7\u8f93\u5165\u641c\u7d22\u5173\u952e\u5b57!");document.getElementById("wd").value="";document.getElementById("wd").focus();return false}}
function check_last(){a=document.getElementById("keyword_last").value;a=a.replace(/(\/)|(\\)|(\")|(\')/g,"");if(a=="\u8bf7\u8f93\u5165\u89c6\u9891\u540d\u3001\u4e3b\u6f14\u6216\u5bfc\u6f14"||a==""){alert("\u8bf7\u8f93\u5165\u641c\u7d22\u5173\u952e\u5b57!");document.getElementById("keyword_last").value="";document.getElementById("keyword_last").focus();return false}}
function $(a){return document.getElementById(a)}
var EventUtil={};
EventUtil.addEventHandler=function(a,b,c){if(a.addEventListener)a.addEventListener(b,c,false);else if(a.attachEvent)a.attachEvent("on"+b,c);else a["on"+b]=c};EventUtil.removeEventHandler=function(a,b,c){if(a.removeEventListener)a.removeEventListener(b,c,false);else if(a.detachEvent)a.detachEvent("on"+b,c);else a["on"+b]=null};ScrollCrossLeft={interval:0,count:0,duration:0,step:0,srcObj:null,callback:null};
ScrollCrossLeft.doit=function(a,b,c,d){var e=ScrollCrossLeft,f=function(g,h,j,k){return j*((g=g/k-1)*g*g+1)+h}(e.count,b,c,d);a.style.marginLeft=f+"px";BigNews.currentBegin=f;e.count++;if(e.count==d){clearInterval(e.interval);e.count=0;a.style.marginLeft=b+c+"px";BigNews.currentBegin=b+c;e.callback()}};ScrollCrossLeft2={interval:0,count:0,duration:0,step:0,srcObj:null,callback:null};
ScrollCrossLeft2.doit_2=function(a,b,c,d){var e=ScrollCrossLeft2;a.style.marginLeft=function(f,g,h,j){return h*((f=f/j-1)*f*f+1)+g}(e.count,b,c,d)+"px";e.count++;if(e.count==d){clearInterval(e.interval);e.count=0;a.style.marginLeft=b+c+"px";e.callback()}};ScrollCrossLeft2.scroll=function(a,b,c,d,e,f){var g=ScrollCrossLeft2;g.duration=f;g.callback=e;g.interval=setInterval(function(){g.doit_2(a,d,b*c,f)},10)};
var B=BigNews={current:0,next:0,scrollInterval:0,autoScroller:0,s:{},f:{},t:{},OnScrolling:false,preCss:"",currentBegin:0};BigNews.turn=function(a,b){if(a==BigNews.current)return false;$("showDiv_"+a).style.zIndex++;if($("bigpic_"+a).src=="/images/img_default.gif")try{setTimeout('$("bigpic_'+a+'").src = ScrollBigPic['+a+"] ;",50)}catch(c){}BigNews.fadeIn("showDiv_"+a,a,50,b);BigNews.scroll(a,b)};
BigNews.fadeIn=function(a,b,c,d){try{clearInterval(BigNews.f.interval)}catch(e){}var f=$(a),g=0;BigNews.f.interval=setInterval(function(){g+=20;f.style.filter="alpha(opacity="+g+")";f.style.cssText=f.style.cssText.replace(/;-moz-opacity:.*?;/gi,"")+";-moz-opacity:"+g*0.01;f.style.cssText=f.style.cssText.replace(/;opacity:.*?;/gi,"")+";opacity:"+g*0.01;f.style.display="block";if(g==100){for(var h=0;h<d.totalcount;h++){$("title_bg_"+h).style.cssText="position:absolute;left:0;top:269px;float:none;width:740px;height:40px;background:#000;filter:alpha(opacity=60);opacity:0.6;z-index:98;filter:alpha(opacity=0);-moz-opacity:0;opacity:0";
$("title_"+h).style.cssText="position:absolute;left:10px;top:282px;font-size:14px;color:#fff;font-weight:normal;z-index:99;filter:alpha(opacity=0);-moz-opacity:0;opacity:0";BigNews.showTitles(b,d);$("showDiv_"+h).style.cssText=BigNews.preCss;if(h==b)$("showDiv_"+h).style.display="block";else $("showDiv_"+h).style.display="none";$("showDiv_"+b).style.zIndex=0}BigNews.current=b;clearInterval(BigNews.f.interval)}},c)};
BigNews.showTitles=function(a){try{clearInterval(BigNews.t.interval)}catch(b){}var c=$("title_"+a),d=$("title_bg_"+a),e=0;BigNews.t.interval=setInterval(function(){e+=10;c.style.filter="alpha(opacity="+e+")";c.style.cssText=c.style.cssText.replace(/;-moz-opacity:.*?;/gi,"")+";-moz-opacity:"+e*0.01;c.style.cssText=c.style.cssText.replace(/;opacity:.*?;/gi,"")+";opacity:"+e*0.01;d.style.filter="alpha(opacity="+e*0.6+")";d.style.cssText=d.style.cssText.replace(/;-moz-opacity:.*?;/gi,"")+";-moz-opacity:"+
e*0.0060;d.style.cssText=d.style.cssText.replace(/;opacity:.*?;/gi,"")+";opacity:"+e*0.0060;e==100&&clearInterval(BigNews.t.interval)},50)};BigNews.scroll=function(a,b){var c=b.step;BigNews.next=a;try{clearInterval(BigNews.s.interval)}catch(d){}$(b.hover);BigNews.s.duration=16;BigNews.s.callback=function(){};var e=parseInt(BigNews.currentBegin),f=a*c-e;BigNews.s.interval=setInterval(function(){BigNews.s.doit($(b.hover),e,f,16)},8)};
BigNews.auto=function(a){clearInterval(BigNews.autoScroller);BigNews.autoScroller=setInterval(function(){BigNews.turn(BigNews.current==a.totalcount-1?0:BigNews.current+1,a)},a.autotimeintval)};BigNews.pauseSwitch=function(){clearTimeout(BigNews.autoScroller)};BigNews.showNext=function(a,b){if(a>=MovieRecom.totalcount-1)return false;else{BigNews.pauseSwitch();BigNews.turn(a+1,b);BigNews.auto(b)}};BigNews.showPre=function(a,b){if(a<=0)return false;else{BigNews.pauseSwitch();BigNews.turn(a-1,b);BigNews.auto(b)}};
BigNews.init=function(a){BigNews.s=ScrollCrossLeft;BigNews.preCss=a.css;EventUtil.addEventHandler($(a.bigpic),"mouseover",new Function("BigNews.pauseSwitch();"));EventUtil.addEventHandler($(a.bigpic),"mouseout",new Function("BigNews.auto("+a.objname+");"));for(i=0;i<a.totalcount;i++)if(a.smallpic!=null&&a.smallpic!=""){EventUtil.addEventHandler($(a.smallpic+"_"+i),"mouseover",new Function("BigNews.pauseSwitch();BigNews.turn("+i+","+a.objname+");return false;"));EventUtil.addEventHandler($(a.smallpic+
"_"+i),"mouseout",new Function("BigNews.auto("+a.objname+");"))}BigNews.showTitles(0,a);BigNews.auto(a)};
window.onerror=function(){return true;}
window.onerror = ResumeError;