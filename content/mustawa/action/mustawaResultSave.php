<?php
    header("content-type: text/javascript");
    include '../../connect.php';
    
    $mustawa_register_id = $_POST['mustawa_register_id'];
    $valueSet = $_POST['valueSet'];
    $savingAlert = $_POST['savingAlert'];
    
    $mr_id = substr($mustawa_register_id, 3);
    
    $alertId = "savingAler".$savingAlert;
    
    $UPDATE = mysqli_query($con, "UPDATE mustawa_register SET learningStatus='$valueSet' WHERE mustawa_register_id='$mr_id'");
    //echo "alert('savingAlert$savingAlert');";
    echo "document.getElementById('savingAlert$savingAlert').innerHTML = '<span class=\'glyphicon glyphicon-ok\'></span>';";
?>

