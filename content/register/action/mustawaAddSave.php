<?php
    header("content-type:text/javascript");
    include("../../connect.php");
    
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
    
    $editDate = date('Y-m-d');
    
    $prize_thai = $_POST['prize_thai'];
    $prize_thaiText = addslashes($prize_thai);
    
    $group = $_POST['group_number'];
    
    $mustawaDataCount = mysqli_query($con, "SELECT * FROM mustawadata WHERE year='$yearText' AND level='$levelText'");
    $num = mysqli_num_rows($mustawaDataCount);

            
    if($num > 0){
        
        echo <<<JS
             document.getElementById('alertDataCount').focus();  
             document.getElementById('alertDataCount').innerHTML = "<font color='red'>Data sudah ada.</font>"; 
             document.getElementById('process').innerHTML = '';  
JS;
    }else{
        
       $insert = mysqli_query($con, "INSERT INTO mustawadata
                (year,startDate,endDate,prize,level,status,editDate,prize_thai,group_number)
                VALUES
                ('$yearText','$startDateText','$endDateText','$prizeText','$levelText','$statusText','$editDate','$prize_thaiText','$group')");
       echo "document.getElementById('process').innerHTML = '';";
       echo "alert('data berhasil di tambah');";
       echo "loadContent('mustawa', 'register', '');";
    }
?>
