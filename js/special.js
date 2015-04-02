
	//列表切换switchTab_special('rank',0,4,'on','')
	function switchTab_special(identify,index,count,cnon,cnout,blockid) {
		try{
			for(i=0;i<count;i++) {
				var CurTabObj = document.getElementById("Tab_"+identify+"_"+i) ;
				var CurListObj = document.getElementById("List_"+identify+"_"+i) ;
				if (i != index) {
					CurTabObj.className=cnout ;
					CurListObj.style.display="none" ;
				}
			}
			page_show(blockid, 1, -1);	//转到第一页
			document.getElementById("Tab_"+identify+"_"+index).className=cnon ;
			document.getElementById("List_"+identify+"_"+index).style.display="";
		}catch (ee) {}
	}
	
	//分页导航
	pages_cur_index = new Array();
	pages_cur_index["3698"] = 1;
	pages_cur_index["3732"] = 1;
	pages_cur_index["3733"] = 1;
	function page_show(block_id, page_index, page_count)
	{
		var block_id = block_id.toString();

		if(page_count == -1)	//转到第一页
		{
			if(pages_cur_index[block_id] == 1) return;

			var pageObj = document.getElementById("page_" + block_id + "_" + (pages_cur_index[block_id]-1));
			pageObj.style.display="none";
			pageObj = document.getElementById("page_" + block_id + "_0");
			pageObj.style.display="";

			var divPageObj = document.getElementById("div_page_" + block_id + "_" + pages_cur_index[block_id]);
			divPageObj.className = "";
			divPageObj = document.getElementById("div_page_" + block_id + "_1");
			divPageObj.className = "page_on";

			pages_cur_index[block_id] = 1;
			return;
		}
		
		if(page_index == 0) {	//上一页
			if(pages_cur_index[block_id] == 1) {
				return;
			}
			else {
				pages_cur_index[block_id] --; 
			}
		}			
		else if(page_index == -1) {	//下一页		
			if(pages_cur_index[block_id] == page_count)	{
					return;
			}
			else {
					pages_cur_index[block_id] ++; 
			}
		}
		else {
			if(pages_cur_index[block_id] == page_index) {
				return;
			}
			
			pages_cur_index[block_id] = page_index;
		}
		
		for(i = 1; i <= page_count; i ++) {
			var pageObj = document.getElementById("page_" + block_id + "_" + (i-1));
			//if(pageObj == null) {
			//	return;
			//}		
			
			if (i != pages_cur_index[block_id]) {
				pageObj.style.display="none";
			}
			else {
				pageObj.style.display="";
			}
		}
		
		//<a href="#" class="page_first">上一页</a>
		//<a href="#" class="page_on">1</a>
		//<a href="#">2</a>
		//<a href="#">3</a>
		//<a href="#" class="page_last">下一页</a>
		var divPagePreObj = document.getElementById("div_page_" + block_id + "_0");
		var divPageNextObj = document.getElementById("div_page_" + block_id + "_");
		//if(divPagePreObj == null || divPageNextObj == null) {
		//	return;
		//}
		if(pages_cur_index[block_id] == 1) {
			//divPagePreObj.className = "page_on";
			//divPageNextObj.className = "";
		}
		else if(pages_cur_index[block_id] == page_count) {
			//divPagePreObj.className = "";
			//divPageNextObj.className = "page_on";
		}
				
		for(i = 1; i <= page_count; i ++) {
			var divPageObj = document.getElementById("div_page_" + block_id + "_" + i);
			//if(divPageObj == null) {
			//	return;
			//}
			
			if (i != pages_cur_index[block_id]) {
				divPageObj.className = "";
			}
			else {
				try {
					divPageObj.className = "page_on";
				} catch (e) {
					divPageObj.setAttribute("class", "page_on");
				}
			}			
		}
	}