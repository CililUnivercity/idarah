<?php
    include '../../../function/connect.php';
    include("../../../function/global.php");
    header("content-type: text/plain");
    $mustawaData_id_a = $_POST['mustawaData_id_a'];
    
    //echo "alert('$mustawaData_id_a');";
    $sql = mysqli_query($con, "SELECT SUM(payMoney) AS totalMoney FROM mustawa_register WHERE mustawadata_id='$mustawaData_id_a'");
    $sqln = mysqli_query($con, "SELECT * FROM mustawa_register WHERE mustawadata_id='$mustawaData_id_a'");
    $ns = mysqli_num_rows($sqln);
    $res = mysqli_fetch_assoc($sql);
    $totalMoney = $res['totalMoney'];
    $totalMoneyText = number_format($totalMoney);
    
    $mustawaData = queryList("mustawadata", "mustawaData_id='$mustawaData_id_a'", "../../../connect.php");
    $level =  $mustawaData['level'];
    $year = $mustawaData['year'];
    
    $response = <<<RS
            <h4>Jumlah duit daftar belajar mustawa <b>$level</b> tahun <b>$year</b> : $totalMoneyText <b>฿</b></h4>
            <h4>Jumlah mahasiswa yang daftar : $ns orang</h4>
RS;
    echo $response;
    
    $responseTable = <<<TB
            <table class='table table-bordered table-hover table-striped'>
                <thead>
                    <tr>
                        <td align='center'>NIM</td>
                        <td align='center'>NAMA - NASAB</td>
                        <td align='center'><div id='subText'>نام  نسب</div></td>
                        <td align='center'>TARIKH BAYAR</td>
                        <td align='center'>NO.RESIT</td>
                        <td align='center'>JUMLAH DUIT</td>
                    </tr>
                </thead>
                <tbody>
TB;
    $mustawa_register = queryListInner("mustawa_register", "mustawadata_id='$mustawaData_id_a'", "../../../function/connect.php", "reciet");
    while($result1 = mysqli_fetch_array($mustawa_register)){
        $mustawa_register_id = $result1['mustawa_register_id'];
        $st_id = $result1['st_id'];
        $learningStatus = $result1['learningStatus'];
        $register_date = str_replace("\'", "&#39;", $result1["register_date"]);
        $reciet = str_replace("\'", "&#39;", $result1["reciet"]);
        $payMoney = str_replace("\'", "&#39;", $result1["payMoney"]);
        
        $sql2 = mysqli_query($con, "SELECT * FROM students WHERE st_id='$st_id'");
        $result2 = mysqli_fetch_array($sql2);
        
        $fname_rumi = str_replace("\'", "&#39;", $result2["firstname_rumi"]);
        $lname_rumi = str_replace("\'", "&#39;", $result2["lastname_rumi"]);
        $fname_jawi = str_replace("\'", "&#39;", $result2["firstname_jawi"]);
        $lname_jawi = str_replace("\'", "&#39;", $result2["lastname_jawi"]);
        $student_id = str_replace("\'", "&#39;", $result2["student_id"]);
        $ft_id = $result2['ft_id'];
        
        $sql3 = mysqli_query($con, "SELECT * FROM fakultys WHERE ft_id='$ft_id'");
        $result3 = mysqli_fetch_array($sql3);
        $ft_name = str_replace("\'", "&#39;", $result3["ft_name"]);
        
        $a1 = substr($year, 2);
        $a2 = str_pad($reciet, 3, "0", STR_PAD_LEFT);
        $TR = <<<TR
                    <tr>
                        <td align='center'>{$student_id}</td>
                        <td align='left'>{$fname_rumi} - {$lname_rumi}</td>
                        <td align='right'><div id='subText'>{$lname_jawi} - {$fname_jawi}</div></td>
                        <td align='center'>{$register_date}</td>
                        <td align='center'>L{$a1}/{$a2}</td>
                        <td align='center'>{$payMoney}</td>
                    </tr>
TR;
        $responseTable .= $TR;
    }
        $TBODY = "</tbody></table>";
        $responseTable .= $TBODY;
    echo $responseTable;
?>

