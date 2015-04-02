var searchTextArr=new Array();
searchTextArr[0]='一起来看流星雨';
searchTextArr[1]='中国达人秀';
searchTextArr[2]='天与地';
searchTextArr[3]='失恋33天';
searchTextArr[4]='青春失乐园';
searchTextArr[5]='海贼王';
searchTextArr[6]='死神来了5';
searchTextArr[7]='非诚勿扰';
searchTextArr[8]='倒霉熊';
searchTextArr[9]='美人天下';

var searchTextTimer = null;

function setSearchInputContent(obj){
        var searchTextTime = 0;
        if(obj&&!searchTextTimer){
                obj.value = searchTextArr[0];
                searchTextTimer = setInterval(function(){
                        obj.value = searchTextArr[searchTextTime%searchTextArr.length];
                        setTimeout(function(){obj.blur()},500);
                        //obj.blur();
                        searchTextTime++;
                },10000)
        }
}

function stopSearchTextTimer(){
        clearInterval(searchTextTimer);
        searchTextTimer = null;
}