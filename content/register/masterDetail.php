<?php
    include("../connect.php");
    $p_id = $_GET['id'];
    $program = mysqli_query($con, "SELECT p_name FROM program WHERE p_id='$p_id'");
    $rowPgr = mysqli_fetch_array($program);
    $p_nameTitle = str_replace("\'", "&#39;", $rowPgr['p_name']);
?>

<div class="pull-left">
  <h4><span class="glyphicon glyphicon-blackboard"></span> <b class="text-warning">Program : <?= $p_nameTitle ?></b></h4>
</div>

<div class="pull-right">
  <div class="btn-group">
    <button class="btn btn-success btn-sm" onclick="loadContent('masterList' ,'register', '')"><span class="glyphicon glyphicon-arrow-left"></span> Back</button>
  </div>
  <div class="btn-group">
    <button class="btn btn-success btn-sm" onclick="loadContent('m1study' ,'register', '<?= $p_id ?>')"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button>
  </div>
</div>

<br>
<table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <td align="center"><b>TAHUN</b></td>
      <td align="center"><b>SEMESTER</b></td>
      <td align="center"><b>AWAL DAFTAR</b></td>
      <td align="center"><b>AKHIR DAFTAR</b></td>
      <td align="center"><b>STATUS</b></td>
      <td align="center"><b>AKSI</b></td>
    </tr>
  </thead>
  <tbody>
<?php 
    $sql = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE p_id='$p_id' ORDER BY re_id");
    $i = 1;
    while ($rs = mysqli_fetch_array($sql)){
?>
    <tr id="<?= $rs['re_id'] ?>">
      <td align="center"><?= $rs['year'] ?></td>
      <td align="center"><?= $rs['term_id'] ?></td>
      <td align="center"><?= $rs['start_date'] ?></td>
      <td align="center"><?= $rs['end_date'] ?></td>     
<?php      
    $status = $rs['tu_id'];
    if($status==1){
        $publish = 'Buka';
    }else{
        $publish = 'Tutub';
    }
?> 
      <td align="center"><?= $publish ?></td>
      <td align="center"><a onclick="loadContent('masterEdit', 'register', '<?= $rs['re_id'] ?>')" class="btn btn-warning btn-sm" href="#"><span class="glyphicon glyphicon-edit"></span> EDIT</a> <a onclick="deleteStudy('<?= $rs['re_id'] ?>')" class="btn btn-warning btn-sm" href="#"><span class="glyphicon glyphicon-trash"></span> DELETE</a></td>
    </tr>
<?php
      } 
?>
  </tbody>
</table> 