//效果函数
function switchItem(str,total,t){
	for(var i=0;i<total;i++){
		if(i==t){
			document.getElementById(str+"_L_"+i).style.display="";
			document.getElementById(str+"_S_"+i).style.display="none";
			try{
				if(document.getElementById(str+"_pic_"+i).getAttribute('src')!=document.getElementById(str+"_pic_"+i).getAttribute('_xsrc')){
					document.getElementById(str+"_pic_"+i).setAttribute("src",document.getElementById(str+"_pic_"+i).getAttribute('_xsrc'))
				}
			}catch(e){}
			
		}else{
			document.getElementById(str+"_L_"+i).style.display="none";
			document.getElementById(str+"_S_"+i).style.display="";
		}
	}
}
function switchTab2(identify,index,count,cnon,cnout) {
	for(i=0;i<count;i++) {
		var CurTabObj = document.getElementById("Tab_"+identify+"_"+i) ;
		var CurListObj = document.getElementById("List_"+identify+"_"+i) ;
		if (i != index) {
			try{CurTabObj.className=cnout}catch(e){};
			CurListObj.style.display="none" ;
		}
	}
	try {
		for (ind=0;ind<CachePic[identify][index].length ;ind++ ) {
			var picobj = document.getElementById(identify+"_pic_"+index+"_"+ind) ;
			//if (picobj.src == "http://images.movie.xunlei.com/img_default.gif") {
				picobj.src = CachePic[identify][index][ind] ;
			//}
		}
	}
	catch (e) {}
	
	try{document.getElementById("Tab_"+identify+"_"+index).className=cnon}catch(e){} ;
	document.getElementById("List_"+identify+"_"+index).style.display="";
}