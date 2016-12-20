<?php
  $id = $_GET['id'];
?>

<div class="pull-left">
  <h4><span class="glyphicon glyphicon-plus-sign"></span> <b class="text-warning">Tambah program baru</b></h4>
  <p class="text-danger"><b>STEP 2</b></p>
</div><br><br><br><br>

<form class="form-horizontal" method="post" target="ifrm" enctype="multipart/form-data" action="content/register/fileSave.php">
    
    <div class="form-group">
      	<label for="inputEmail" class="col-lg-3 control-label">File MOU :</label>
      	<div class="col-lg-7">
            <input type="file" class="form-control" id="pf_mou" name="pf_mou[]" multiple required>
      	</div>
    </div>

    <div class="form-group">
      	<label for="inputEmail" class="col-lg-3 control-label">Dokument program :</label>
      	<div class="col-lg-7">
            <input type="file" class="form-control" id="pf_documents" name="pf_documents[]" multiple>
      	</div>
    </div>

    <input type="hidden" class="form-control" id="id" multiple name="id" value="<?php echo $id ?>">
	
	<p class="text-center">
		<button class="btn btn-success btn-sm" type="submit">UPLOAD</button>
		<div align="center" id="msg"></div>
	</p>

</form>
<div id="msg"></div>
<iframe name="ifrm" style="display:none;"></iframe>
