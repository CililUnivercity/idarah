<div class="pull-left">
  <h4><span class="glyphicon glyphicon-blackboard"></span> <b class="text-warning">Daftar program MASTER</b></h4>
</div>

<?php
    include("../connect.php");
    $sql = mysqli_query($con, "SELECT * FROM program");
?>
<br>
<table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <td align="center" width="10%"><b>BIL</b></td>
      <td align="center" width="20%"><b>KOD</b></td>
      <td align="center"><b>PROGRAM</b></td>
      <td align="center" width="10%"><b>AKSI</b></td>
    </tr>
  </thead>
  <tbody>
<?php 
      $i = 1;
      while ($rs = mysqli_fetch_array($sql)){
        $p_code = str_replace("\'", "&#39;", $rs['p_code']);
        $p_name = str_replace("\'", "&#39;", $rs['p_name']);
?>
    <tr>
      <td align="center"><?= $i ?></td>
      <td align="center"><?= $p_code ?></td>
      <td align="left"><?= $p_name ?></td>
      <td align="center"><a onclick="loadContent('masterDetail', 'register', '<?= $rs['p_id'] ?>')" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-th-list"></span> PERINCI</a></td>
    </tr>
<?php
        $i++;
      } 
?>
  </tbody>
</table> 