<?php
    //header("content-type: text/plain");
    include("../function/function.php");
    
    $year = $_POST['year'];
    $term = $_POST['term'];
    
    
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
    $sql = examReportByterm($year, $term);
    $i = 1 ;
    $repeatMoney = 0;
    while($fetchRow = mysqli_fetch_array($sql)){
        $fname = str_replace("\'", "&#39;", $fetchRow["firstname_rumi"]);
        $lname = str_replace("\'", "&#39;", $fetchRow["lastname_rumi"]);
        $repeatMoney = $fetchRow['money'] + $repeatMoney;
?>
        <tr>
            <td align='center'><?= $i ?></td>
            <td align='center'><?= $fetchRow['student_id'] ?></td>
            <td align='left'><?= $fname ?> - <?= $lname ?></td>
            <td align='center'><?= $fetchRow['rx_date'] ?></td>
            <td align='center'><?= $fetchRow['pay_date'] ?></td>
            <td align='center'><?= $fetchRow['money'] ?></td>
            <td align='center'><?= $fetchRow['reciet_code'] ?></td>
        </tr>
<?php
    $i++;
    }
?>
        <tr>
            <td>TOTAL DUIT</td>
            <td colspan="5"><?= number_format($repeatMoney) ?></td>
        </tr>
    </table>    

