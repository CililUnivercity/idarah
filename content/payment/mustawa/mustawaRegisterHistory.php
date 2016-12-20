<?php
    include '../../../connect.php';
    $st_id = $_POST['st_id'];
    
    $mustawa_register = mysqli_query($con, "SELECT * FROM mustawa_register WHERE st_id='$st_id' ORDER BY mustawa_register_id DESC");
    
?>
<table class="table table-hover">
    <tbody>
        <?php
        while($mustawa_register_result = mysqli_fetch_array($mustawa_register)){
            $mustawa_register_id = $mustawa_register_result['mustawa_register_id'];
            $register_date = $mustawa_register_result['register_date'];
            $payMoney = $mustawa_register_result['payMoney'];
            $reciet = $mustawa_register_result['reciet'];
            $leaningGroup = $mustawa_register_result['learningGroup'];
        ?>
        <tr>
            <td align="center"><?= $register_date ?></td>
            <td align="center"><?= $payMoney ?></td>
            <td align="center"><?= $reciet ?></td>
            <td align="center"><?= $leaningGroup ?></td>
            <td align="center"><a target="_blank" href="content/payment/mustawa/reciet.php?st_id=<?= $st_id ?>&mustawa_register_id=<?= $mustawa_register_id ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-print"></span> PRINT RESIT</a></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>