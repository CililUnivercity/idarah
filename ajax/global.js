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
//---------------------------------------Auto complete---------------------------------------------------------------
function msOverList(el){
    el.style.backgroundColor = '#ffffcc';
    el.style.cursor = 'pointer';
}
function msOutList(el){
    el.style.backgroundColor = '#eeeeee';
}
function hideList(){
    document.getElementById('listbox').style.display = 'none';
}
//---------------------------------------print content----------------------------------------------------------------
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
//--------------------------------------Data insert--------------------------------------
function dataAdd(path, formId){
    var URL = path + "?dummy=" + Math.random();
    var data = getFrmData(formId);
    document.getElementById('process').innerHTML = "กำลังประมวลผล...";
    ajaxLoadFrw('post', URL, data, 'content');
} 
//--------------------------------------Data update--------------------------------------
function dataUpdate(path, formId){
    var URL = path + "?dummy=" + Math.random();
    var data = getFrmData(formId);
    alert(data);
    //ajaxLoadFrw('post', URL, data, 'content');
}
//--------------------------------------Data update--------------------------------------
function hideModal(){
    $("#myModal").removeClass("in");
    $(".modal-backdrop").remove();
    $("#myModal").hide();
}
//--------------------------------------student search--------------------------------------
function isPressEnterStudent(path, formId){
    if(event.keyCode==13){
        student_Search(path, formId);
        return false;
    }
}
function student_Search(path, formId){
    if(document.getElementById('q').value == ""){
        document.getElementById('q').focus();
    }else{
        var URL = path + "?dummy=" + Math.random();
        var data = getFrmData(formId);
        ajaxLoadFrw('post', URL, data, 'subcontent');
        document.getElementById('subcontent').innerHTML = "Sedang cari...";
    }
}
function filterSearch(){
    var setting = document.getElementById('filter').style.display;
    if(setting=='none'){
        document.getElementById('filter').style.display = 'block';
    }else{
        document.getElementById('filter').style.display = 'none';
    }
}
function classroom1(path, formId){
    var URL = path + "?dummy=" + Math.random();
    var data = getFrmData(formId);
    ajaxLoadFrw('post', URL, data, 'subcontent');
    document.getElementById('subcontent').innerHTML = "Sedang cari...";
}


