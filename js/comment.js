function $(obj){
    return document.getElementById(obj);
}
function sp(){
    var tex = $('comment_content').value;
    var nun = tex.length;
    var spa = $('span');
    spa.innerHTML = 200-nun;
}