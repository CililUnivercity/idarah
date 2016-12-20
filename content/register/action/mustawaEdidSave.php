<?php
    include '../../connect.php';
    
    header("content-type:text/javascript");
    
    $mustawaData_id = $_POST['mustawaData_id'];
    
    $year = $_POST['year'];
    $yearText = addslashes($year);
    
    $startDate = $_POST['startDate'];
    $startDateText = addslashes($startDate);
    
    $endDate = $_POST['endDate'];
    $endDateText = addslashes($endDate);
    
    $prize = $_POST['prize'];
    $prizeText = addslashes($prize);
            
    $level = $_POST['level'];
    $levelText = addslashes($level);
    
    $status = $_POST['status'];
    $statusText = addslashes($status);
    
    $prize_thai = $_POST['prize_thai'];
    $prize_thaiText = addslashes($prize_thai);
    
    $group_number = $_POST['group_number'];
    $group_numberText = addslashes($group_number);
    
    $editDate = date('Y-m-d');
    
    $mustawaDataCount = mysqli_query($con, "SELECT * FROM mustawadata WHERE year='$yearText' AND level='$levelText' AND mustawaData_id!='$mustawaData_id'");
    $num = mysqli_num_rows($mustawaDataCount);
    
    if($num > 0){
        
        echo <<<JS
             document.getElementById('alertDataCount').focus();  
             document.getElementById('alertDataCount').innerHTML = "<font color='red'>Data sudah ada.</font>"; 
             document.getElementById('process').innerHTML = '';  
JS;
    }else{
        
       $update = mysqli_query($con, "UPDATE mustawadata
                             SET
                             year='$yearText',
                             startDate='$startDateText',
                             endDate='$endDateText',
                             prize='$prizeText',
                             prize_thai='$prize_thaiText',
                             group_number='$group_numberText',
                             level='$levelText',
                             status='$status',
                             editDate='$editDate'
                             WHERE mustawaData_id='$mustawaData_id'
                              ");
       echo "document.getElementById('process').innerHTML = '';";
       echo "alert('data berhasil di perbaharui');";
       echo "document.getElementById('alertDataCount').innerHTML = ''";
    }
?>
