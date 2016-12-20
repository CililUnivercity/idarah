<?php
    //header("content-type: text/plain");
    include("../function/function.php");
    
    $year = $_POST['year'];
    $term = $_POST['term'];
    $program = $_POST['program'];
   
    
?>         
    <table class='table table-bordered table-hover table-striped'>
        <tr>
            <td align='center'>BIL</td>
            <td align='center'>NIM</td>
            <td align='center'>NAMA - NASAB</td>
            <td align='center'>TARIHK DAFTAR</td>
            <td align='center'>TARIHK BAYAR</td>
            <td align='center'>JUMLAH DUIT</td>
            <td align='center'>NO RESIT</td>
        </tr>
<?php
    $totalTermMoney = totalTermMoney($year, $term);
    $resultTotalTermMoney = mysqli_fetch_array($totalTermMoney);
    $ok = $resultTotalTermMoney['totalMoney'];
    $sql = masterYuranReportByterm($year, $term, $program);
    $i = 1 ;
    $sumMoney = 0;
    //$repeatMoney = 0;
    while($fetchRow = mysqli_fetch_array($sql)){
        $fname = str_replace("\'", "&#39;", $fetchRow["firstname_rumi"]);
        $lname = str_replace("\'", "&#39;", $fetchRow["lastname_rumi"]);
        //$repeatMoney = $fetchRow['money'] + $repeatMoney;
?>
        <tr>
            <td align='center'><?= $i ?></td>
            <td align='center'><?= $fetchRow['student_id'] ?></td>
            <td align='left'><?= $fname ?> - <?= $lname ?></td>
            <td align='center'><?= $fetchRow['rs_date'] ?></td>
            <td align='center'><?= $fetchRow['pay_date'] ?></td>
            <td align='center'><?= $fetchRow['money'] ?></td>
            <td align='center'><?= $fetchRow['reciet_code'] ?></td>
        </tr>
<?php
    $i++;
    $sumMoney = $sumMoney + $fetchRow['money'];
    }
?>
        <tr>
            <td>TOTAL DUIT</td>
            <td colspan="5"><?= number_format($sumMoney) ?></td>
        </tr>
    </table>    



