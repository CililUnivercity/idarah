<?php
    include '../../function/connect.php';
    include("../../function/global.php");
    header("content-type: text/plain");
    $mustawaData_id_a = $_POST['mustawaData_id_a'];
    
    //echo "alert('$mustawaData_id_a');";
    $sql = mysqli_query($con, "SELECT SUM(payMoney) AS totalMoney FROM mustawa_register WHERE mustawadata_id='$mustawaData_id_a'");
    $res = mysqli_fetch_assoc($sql);
    $totalMoney = $res['totalMoney'];
    $totalMoneyText = number_format($totalMoney);
    
    $mustawaData = queryList("mustawadata", "mustawaData_id='$mustawaData_id_a'", "../../connect.php");
    $level =  $mustawaData['level'];
    $year = $mustawaData['year'];
    
    $response = <<<RS
            <h4>Jumlah duit daftar belajar mustawa <b>$level</b> tahun <b>$year</b> : $totalMoneyText <b>฿</b></h4>
RS;
    echo $response;
?>

