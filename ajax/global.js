function loadContent(content, folder, id){
	var URL = "content/" + folder + "/" + content + ".php?id=" + id  ;
	var data = null;
	ajaxLoadFrw('get', URL, data, "content");
	document.getElementById('content').innerHTML = "Loading....";
	document.getElementById('masterPagination').style.display = "none";
        document.getElementById('statistic').style.display = "none";
	alert(url);
	//Set timeout
	var t = 60000;
	timeoutF = setTimeout("ajaxTimeoutFrw()", t);
}
function load(path, id){
    var URL = path + "?id=" + id;
    var data = null;
    ajaxLoadFrw('get', URL, data, "content");
    document.getElementById('content').innerHTML = "Loading....";
    //Set timeout
    var t = 60000;
    timeoutF = setTimeout("ajaxTimeoutFrw()", t);
}



