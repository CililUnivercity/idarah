<?php
    header("content-type:text/javascript");
    include '../../../function/global.php';
    
    $st_id = $_POST['st_id'];
    //$mustawa_register_id = $_POST['mustawa_register_id'];
    //$i = $_POST['ic'];
    
    //$cot_name = "register_date"."$ic";
    //$cot_money = "learningGroup"."$ic";
    
    echo "alert('OK');";
    
    /*
    $form_data = array(
        'sgender' => addslashes($_POST['sgender']),
    );
        
    dbRowUpdate('staff', $form_data, "WHERE staff_id = '$staff_id'", "../../connect.php");
    //echo "document.getElementById('successAlert').style.display = 'block';";
    echo "document.getElementById('process').innerHTML = '';";
    //echo "$('html, body').animate({scrollTop:0}, 'slow');";
    echo "formLoad('module/staff/staffAdd2.php', '$staff_id', '$operator');";
    */
    
    echo "hideModal();";
   echo "mustawaPay($st_id);";
?>
