<?php
    include '../../../../connect.php';
    $q = $_POST['q'];
    $qText = addslashes($q);
    
    $sql = mysqli_query($con, "SELECT * FROM students WHERE student_id='$q' OR firstname_rumi LIKE '%$qText%' OR lastname_rumi LIKE '%$qText%' OR firstname_jawi LIKE '%$qText%' OR lastname_jawi LIKE '%$qText%'");
?>
<table class="table table-hover table-striped table-bordered">
    <thead>
        <tr>
            <td align="center"><b>NIM</b></td>
            <td align="center"><b>NAMA-NASAB</b></td>
            <td align="center"><b><div id="subText"><b>نام - نسب</b></div></b></td>
            <td align="center"><b>KAD PENGENALAN</b></td>
            <td align="center"><b>TELEPON</b></td>
        </tr>
    </thead>
    <tbody>
<?php
    while($row = mysqli_fetch_array($sql)){
        $st_id = $row['st_id'];
        $student_id = str_replace("\'", "&#39;", $row["student_id"]);
        $name_r = str_replace("\'", "&#39;", $row["firstname_rumi"]);
        $lastname_r = str_replace("\'", "&#39;", $row["lastname_rumi"]);
        $name_j = str_replace("\'", "&#39;", $row["firstname_jawi"]);
        $lastname_j = str_replace("\'", "&#39;", $row["lastname_jawi"]);
        $cityzen_id = $row['cityzen_id'];
        $telephone = $row['telephone'];
        if($student_id==""){
            $std_id = "CLICK";
        }else{
            $std_id = $student_id;
        }
?>
        <tr>
            <td align="center"><a href="#" onclick="mustawaPay('<?= $st_id ?>')"><?= $std_id ?></a></td>
            <td><?= $name_r ?> - <?= $lastname_r  ?></td>
            <td align="right"><div id="subText"><?= $name_j ?> - <?= $lastname_j ?></div></td>
            <td align="center"><?= $cityzen_id ?></td>
            <td align="center"><?= $telephone ?></td>
        </tr>
<?php
    }
?>
    </tbody>
</table>