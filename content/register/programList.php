<div class="pull-left">
  <h4><span class="glyphicon glyphicon-folder-open"></span> <b class="text-warning"> Program kuliah</b></h4>
</div>

<div class="pull-right">
  <div class="btn-group">
    <button class="btn btn-success btn-sm" onclick="loadContent('masterDegree', 'register', '')"><span class="glyphicon glyphicon-plus-sign"></span> Tambah program</button>
  </div>
  <div class="btn-group">
    <button class="btn btn-success btn-sm" onclick="programList()"><span class="glyphicon glyphicon-list"></span> Daftar program</button>
  </div>
</div>

<table class="table table-hover table-striped table-bordered">
	<thead>
		<tr>
			<td align="center" width="15%"><b>KOD PROGRAM</b></td>
			<td align="center"><b>PROGRAM</b></td>
			<td align="center" width="10%"><b>JUMLAH SEMESTER</b></td>
			<td align="center" width="20%"><b>Aksi</b></td>
		</tr>
	</thead>
	<tbody>
<?php
	include('../connect.php');
 	$query = mysqli_query($con, "SELECT * FROM program");
 	while($row = mysqli_fetch_array($query)){
 		$p_code = str_replace("\'", "&#39;", $row['p_code']);
 		$p_name = str_replace("\'", "&#39;", $row['p_name']);
 		$p_semCount = str_replace("\'", "&#39;", $row['p_semCount']);
 		$p_code = str_replace("\'", "&#39;", $row['p_code']);
?>
		<tr id="<?= $row['p_id'] ?>">
			<td><?= $p_code ?></td>
			<td><?= $p_name ?></td>
			<td align="center"><?= $p_semCount ?></td>
                        <td align="center"><a class="btn btn-sm btn-warning" href="#" onclick="loadRegisterContent('editProgram', 'register', <?= $row['p_id'] ?>)"><span class="glyphicon glyphicon-pencil"></span> Edit</a> <a class="btn btn-sm btn-warning" href="#" onclick="deleteProgram(<?= $row['p_id'] ?>)"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
		</tr>
<?php
	}
?>
	</tbody>
</table>