<div class="pull-left">
  <h4><span class="glyphicon glyphicon-blackboard"></span> <b class="text-warning">Belajar</b></h4>
</div>

<div class="pull-right">
  <div class="btn-group">
    <button class="btn btn-success btn-sm" onclick="loadContent('s1study' ,'register', '')"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button>
  </div>
</div>


<?php
    include("../connect.php");
    $sql = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE p_id='0' ORDER BY re_id");
?>
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
      <td align="center"><a onclick="loadContent('studyEdit', 'register', '<?= $rs['re_id'] ?>')" class="btn btn-warning btn-sm" href="#"><span class="glyphicon glyphicon-edit"></span> EDIT</a> </td>
    </tr>
<?php
      } 
?>
  </tbody>
</table> 