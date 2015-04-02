/*
This file is used specifically for video history
*/
	
	var hoverBackgroundColor = "#ffffff";
	var hoverTextColor = "#025196";
	
	function VSetCookie(name,value)
	{
		var Days = 30; //cookie 将被保存 30 天
		var exp  = new Date();   //new Date("December 31, 9998");
		exp.setTime(exp.getTime() + Days*24*60*60*1000);
		document.cookie = name + "="+ escape (value) + ";path=/;expires=" + exp.toGMTString();
	}
	function VgetCookie(name)//取cookies函数        
	{
		var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
		if(arr != null) return unescape(arr[2]); return null;
	}
	
	
	/*=============================================*/				
	function findPos(obj) 
	{
	  var curleft = curtop = 0;
	  if (obj.offsetParent) {
		  curleft = obj.offsetLeft;
		  curtop = obj.offsetTop+26;
		  while (obj = obj.offsetParent) {
			  curleft += obj.offsetLeft;
			  curtop += obj.offsetTop;
		  }
	  }
	  return [curleft,curtop];
	}
	
	function fnDisplayMenu(parent, mnuName)
	{
	  var mnuElem = document.getElementById(mnuName);
	  mnuElem.style.display = "block";
	  //mnuElem.style.top = fnGetMenuTopPosition();
 
		  if (mnuName == "mnuArtStyles" )
	  {
		  var placement = findPos(parent);
 		 mnuElem.style.left = placement[0] + "px";
		 mnuElem.style.top  = placement[1]+ "px";

	  }
	  fnHighlightTD(mnuName);
	
	}
	function fnDisplayMenu2(parent, mnuName)
	{
	  var mnuElem = document.getElementById(mnuName);
	      mnuElem.style.display = "block";
	  if (mnuName == "mnuArtStyles" )
	  {
		  var placement = findPos(parent);
		  mnuElem.style.left = placement[0] + "px";
		  mnuElem.style.top  = placement[1] + "px";

	  }
	  fnHighlightTD(mnuName);
	}
	
	function fnHideMenu(mnuName)
	{
	  var mnuElem = document.getElementById(mnuName);
	  mnuElem.style.display = "none";
	}
	
	function fnHighlightTD(mnuName)
	{
	  
	  var elem = document.getElementById(mnuName + "Link");
	  
	  elem.style.backgroundColor = hoverBackgroundColor;
	  elem.style.color = hoverTextColor;
	}
	
	function fnRemoveHighlight(mnuName)
	{
	  var elem = document.getElementById(mnuName + "Link");
	  elem.style.backgroundColor ='';// hoverBackgroundColor;
	  elem.style.color = "#025196"; //hoverBackgroundColor;
	}

	
	function getCookie(name)//取cookies函数        
	{
		var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
		 if(arr != null) return unescape(arr[2]); return null;
	
	}
	function delCookie(name)//删除cookie
	{
		var exp = new Date();
		exp.setTime(exp.getTime() - 1);
		var cval=getCookie(name);
		if(cval!=null) document.cookie = name + "="+cval+";path=/;expires="+exp.toGMTString();
		document.getElementById("view_history").innerHTML='<center>您的观看历史为空。</center>';
	}

   function CheckAdd(name,ckname,url,num){
        var result=VgetCookie(ckname);
        var str;
        if(result==null){
          result="";
        }
       if(num!=''){
          name=name+' '+num;
        }
        str=name+"ddd"+url+"ttt";
        if(result.indexOf(name)>=0){ //删除同片历史记录
              result= result.replace(str,"");
        }
          result=str+result;
          VSetCookie(ckname,result);
   }

   
   //$(document).ready(function(){
		if(document.getElementById("view_history")){					   
		var result=getCookie("gxhis");
		if(result==null)
		{
			document.getElementById("view_history").innerHTML='<center>您的观看历史为空。</center>';
		}
		else
		{
			var cc='';
			var arr=result.split("ttt");
			if(arr.length>6)
			{
				for(var i=5;i>-1;i--)
				{
					var act=arr[i].split('ddd');
					if(act[0]!="")
					{
						cc='<li><a href="'+act[1]+'" title="'+act[0]+'">'+act[0].substr(0,10)+'</a><span><a href="'+act[1]+'">继续观看</a></span></li>'+cc;
					}
				}
			}
			else
			{
				for(var i=arr.length-1;i>-1;i--)
				{
					var act=arr[i].split('ddd');
					if(act[0]!="")
					{
						cc='<li><a href="'+act[1]+'" title="'+act[0]+'">'+act[0].substr(0,10)+'</a><span><a href="'+act[1]+'">继续观看</a></span></li>'+cc;
					}
				}
			}
			cc='<ul class="histroylist">'+cc+'</ul>';
			document.getElementById("view_history").innerHTML=cc;
		}
		}
   //});