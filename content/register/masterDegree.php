<div class="pull-left">
  <h4><span class="glyphicon glyphicon-plus-sign"></span> <b class="text-warning">Tambah program baru</b></h4>
  <p class="text-danger"><b>STEP 1</b></p>
</div>

<div class="pull-right">
  <div class="btn-group">
    <button class="btn btn-success btn-sm" onclick="programList()"><span class="glyphicon glyphicon-list"></span> Daftar program</button>
  </div>
</div>

<br><br><br><br>

<form class="form-horizontal" id="program" name="program">
    
    <div class="form-group">
      	<label for="inputEmail" class="col-lg-3 control-label">Program :</label>
      	<div class="col-lg-7">
        	<input type="text" class="form-control" id="p_name">
      	</div>
    </div>

    <div class="form-group">
      	<label for="inputEmail" class="col-lg-3 control-label">Kod :</label>
      	<div class="col-lg-7">
        	<input type="text" class="form-control" id="p_code">
      	</div>
    </div>

    <div class="form-group">
      	<label for="inputEmail" class="col-lg-3 control-label">Jumlah semester kuliah :</label>
      	<div class="col-lg-7">
        	<input type="number" class="form-control" id="p_semCount">
      	</div>
    </div>

    <div class="form-group">
      	<label for="inputEmail" class="col-lg-3 control-label">Bayaran :</label>
      	<div class="col-lg-7">
        	<textarea class="form-control" rows="5" id="p_expense"></textarea>
      	</div>
    </div>

    <div class="form-group">
      	<label for="inputEmail" class="col-lg-3 control-label">Pengurus :</label>
      	<div class="col-lg-7">
        	<textarea class="form-control" rows="5" id="p_admin"></textarea>
      	</div>
    </div>

    <div class="form-group">
      	<label for="inputEmail" class="col-lg-3 control-label">Detail :</label>
      	<div class="col-lg-7">
        	<textarea class="form-control" rows="5" id="p_detail"></textarea>
      	</div>
    </div>

</form>

<p class="text-center">
	<button class="btn btn-success btn-sm" onclick="saveProgram()">SAVE</button>
	<div align="center" id="msg"></div>
</p>
   