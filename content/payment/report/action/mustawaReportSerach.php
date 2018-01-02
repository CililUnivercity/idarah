<?php
    //header("content-type: text/javascript");
    
    include '../../../function/connect.php';
    include '../../../function/global.php';
    $mustawaData_id = mysqli_real_escape_string($con, $_POST['mustawaData_id']);
    $mustawaData_idText = addslashes($mustawaData_id);
    
    $group = mysqli_real_escape_string($con, $_POST['group']);
    $groupText = addslashes($group);
    
    $mustawaData = queryList("mustawadata", "mustawaData_id", "../../../function/connect.php");
    $level =  $mustawaData['level'];
    $year = $mustawaData['year'];
    
    $sql1 = mysqli_query($con, "SELECT * FROM mustawa_register WHERE mustawadata_id='$mustawaData_idText' AND learningGroup='$groupText'");//mustawa_register
    
    $response = <<<RS
            <h4>Nama mahasiswa yang daftar belajar mustawa $level tahun $year GRUP $groupText</h4>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <td align="center"><b>BIL</b></td>
                        <td align="center"><b>NAMA - NASAB</b></td>
                        <td align="center"><div id='subText'>نام<b> - نسب</b></div></td>
                        <td align="center"><b>FAKULTI & JURUSAN</b></td>
                        <td align="center"><b>TARIKH BAYAR</b></td>
                        <td align="center"><b>NO.RESIT</b></td>
                        <td align="center"><b>JUMLAH DUIT</b></td>
                    </tr>
                </thead>
                <tbody>
RS;
    $i = 1;
    $totalMoney = "";
    while($result1 = mysqli_fetch_array($sql1)){
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
        $ft_id = $result2['ft_id'];
        
        $sql3 = mysqli_query($con, "SELECT * FROM fakultys WHERE ft_id='$ft_id'");
        $result3 = mysqli_fetch_array($sql3);
        $ft_name = str_replace("\'", "&#39;", $result3["ft_name"]);
        
        $a1 = substr($year, 2);
        $a2 = str_pad($reciet, 3, "0", STR_PAD_LEFT);
        
        $tbody = <<<TBODY
            <tr>
                <td align="center">{$i}</td>
                <td>{$fname_rumi} - {$lname_rumi}</td>
                <td align="right"><div id="subText">{$fname_jawi} - {$lname_jawi}</div></td>
                <td align="left">{$ft_name}</td>
                <td align="center">{$register_date}</td>
                <td align="center">L{$a1}/{$a2}</td>
                <td align="center">{$payMoney} <b>฿</b></td>
            </tr>
TBODY;
        $response .= $tbody;
        $i++;
        $totalMoney = $totalMoney + $payMoney; 
        $totalMoneyText = number_format($totalMoney);
    }
        $footer = <<<FOOTER
            <tr>
                <td align="center" >TOTAL DUIT</td>
                <td align="left" colspan='6'>{$totalMoneyText} <b>฿</b></td>
            </tr>         
FOOTER;
        if(mysqli_num_rows($sql1)==0){
		$response = "<b>Tidak ada data";
	}
        $response .= $footer;
        $response .= "</tbody></table>";
        echo $response;
?>


