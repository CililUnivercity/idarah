<?php
    //include("connect.php");
    include("../function/function.php");
    
    $fromDate = $_POST['fromDate'];
    $fromDate_Text = addslashes($fromDate);
    
    $toDate = $_POST['toDate'];
    $toDate_Text = addslashes($toDate); 
    
    $program = $_POST['program'];
?>
    <table class="table table-bordered table-hover table-striped">
        <tr class="active">
            <td align="center">TARIKH</td>
            <td align="center">JUMLAH ORANG</td>
            <td align="center">JUMLAH DUIT</td>
        </tr>
        <?php 
            $sql = MasterSearchFromTo($fromDate_Text, $toDate_Text, $program);
            while ($result = mysqli_fetch_array($sql)){
        ?>
        <tr>
            <td align="center"><?= $result['pay_date'] ?></td>
            <td align="center"><?= $result['people'] ?></td>
            <td align="center"><?= number_format($result['money']) ?>  ฿</td>
        </tr>
        <?php
            }
        ?>
    </table>