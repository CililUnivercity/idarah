function update_mustawa(path, formId, ir, ic){
    var URL = path + "?dummy=" + Math.random();
    var data = getFrmData(formId);
    ajaxLoadFrw('post', URL, data, 'mustawaList');
}
//payment->mustawa
function changeMustawaGroup(id, savingAlert){
    var valueSet = document.getElementById(id).value;
    var URL = "content/payment/mustawa/action/mustawaChangeGroupSave.php?dummy=" + Math.random();
    var data = "&mustawa_register_id=" + id + "&valueSet=" + valueSet + "&savingAlert=" + savingAlert;
    var savingAlertText = "savingAlert" + savingAlert;
    document.getElementById(savingAlertText).innerHTML = "Processing...";
    ajaxLoadFrw('post', URL, data, 'content');
}
//Report->mustawa
function filterSelection(id){
    var id = id;
    if(id=='1'){
        document.getElementById('filterSelection1').style.display = 'block';
        document.getElementById('filterSelection2').style.display = 'none';
    }else{
        document.getElementById('filterSelection1').style.display = 'none';
        document.getElementById('filterSelection2').style.display = 'block';
    }
}
function mustawaReportSerach(path, contentId){
    var mustawaData_id = document.getElementById('mustawaData_id').value;
    var group = document.getElementById('group').value;
    if(mustawaData_id=='0'){
        document.getElementById('mustawaData_id').focus();
    }else if(group=='0'){
        document.getElementById('group').focus();
    }else{
        var URL = path+ "?dummy=" + Math.random();
        var data = getFrmData('mustawaSearch');
        document.getElementById(contentId).innerHTML = "Processing...";
        ajaxLoadFrw('post', URL, data, contentId);
    }
}
function mustawaReportSerachByYear(path, contentId){
    //var mustawaData_id_a = document.getElementById('mustawaData_id_a').value;
    var URL = path + "?dummy=" + Math.random();
    var data = getFrmData('mustawaSearchByYear');
    //alert(URL);
    document.getElementById(contentId).innerHTML = "Processing...";
    ajaxLoadFrw('post', URL, data, contentId);
}