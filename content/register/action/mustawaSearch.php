<?php
    //header("content-type:tect/javascript");
    include '../../connect.php';
    
    $q = $_POST['q'];
    $qText = addslashes($q);
    
    $sql = mysqli_query($con, "SELECT * FROM mustawadata WHERE  year='$qText'");
    $num = mysqli_num_rows($sql);
    if($num < 1){
        echo "<b>Tidak ada data untuk pencarian :</b> $qText";
    }else{
?>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <td align="center"><b>TAHUN</b></td>
            <td align="center"><b>AWAL PENDAFTARAN</b></td>
            <td align="center"><b>AKHIR PENDAFTARAN</b></td>
            <td align="center"><b>HARGA DAFTAR</b></td>
            <td align="center"><b>LEVEL</b></td>
            <td align="center"><b>STATUS</b></td>
            <td align="center"><b>AKHIR PERUBAHAN</b></td>
            <td align="center"><b>AKSI</b></td>
        </tr>
    </thead>
<?php
    while($p=  mysqli_fetch_array($sql)){
        $mustawaData_id = $p['mustawaData_id'];
                  $year = $p['year'];
                  $startDate = $p['startDate'];
                  $endDate = $p['endDate'];
                  $prize = $p['prize'];
                  $level = $p['level'];
                  $status = $p['status'];
                  $editDate = $p['editDate'];
?>
      <tbody>
        <tr>
            <tr>
                <td align="center"><?= $year ?></td>
                <td align="center"><?= $startDate ?></td>
                <td align="center"><?= $endDate ?></td>
                <td align="center"><?= $prize ?></td>
                <td align="center"><?= $level ?></td>
                <td align="center"><?php if($status==1){echo 'Buka';}else{echo 'Tutup';} ?></td>
                <td align="center"><?= $editDate ?></td>
                <td align="center"><a onclick="loadContent('mustawaEdit', 'register', '<?= $mustawaData_id ?>')" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-edit"></span> UBAH</a></td>
            </tr>
        </tr>
        <?php
            }
        ?>
      </tbody>
    </table> 
<?php
    }
?>
