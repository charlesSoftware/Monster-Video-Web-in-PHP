var addre = document.location.toString();
var path = SitePath+'index.php?s=video/lists/reset/1/id/'+SiteCid;
//var hrefs =(/html/.test(addre)==false)?addre:path;   //动态或者伪静态时使用
var hrefs =(/php/.test(addre)==true)?addre:path;       //静态时使用
for(var i=0;i<3;i++){
	hrefd =hrefs.replace(/\/order\/\w+\//,'/');
	href =hrefd.replace(/\/order\/\w+/,'');
	$("#ord a").eq(i).attr("href",href+$("#ord a").eq(i).attr("href"));
}
//<dd id="yearhtml"></dd>
function showyear(){
	var $html='';
	var $year = $('#yearhtml').html()*1;
	var href =hrefs.replace(/\/year\/\d+/,'');
	$("#yearall").attr("href",href);
	for(i=2012;i>1999;i--){
		if($year==''){
			$('.taglist:eq(2) a:eq(0)').addClass("on");
		}
		if(i == $year){
			$html +='<a href="'+href+'/year/'+i+'" class="on">'+i+'</a> ';
		}else{
			$html +='<a href="'+href+'/year/'+i+'">'+i+'</a> ';
		}
	}
	$('#yearhtml').html($html);
}
//<dd id="areahtml"></dd>
function showarea(){
	var $html='';
	var hrefd =hrefs.replace(/\/area\/\S+\/year/,'/year');
	var href =hrefd.replace(/\/area\/\S+/,'');
	$("#areaall").attr("href",href);
	var $area=$('#areahtml').html();
	var array_str = ['内地','香港','台湾','韩国','日本','欧美','其它'];
	for (var key in array_str){
		if($area==''){
			$('.taglist:eq(1) a:eq(0)').addClass("on");
		}
		if($area==array_str[key]){
			$html+='<a href="'+href+'/area/'+encodeURIComponent(array_str[key])+'" class="on">'+array_str[key]+'</a>';
		}
		else{
			$html+='<a href="'+href+'/area/'+encodeURIComponent(array_str[key])+'">'+array_str[key]+'</a>';
		}
	}
	$('#areahtml').html($html);
}
if($("#areahtml").length>0){showarea();}
if($("#yearhtml").length>0){showyear();}