<div class="pull-left">
  <h4><span class="glyphicon glyphicon-pencil"></span> <b class="text-warning"> Ubah program</b></h4>
</div>

<div class="pull-right">
  <div class="btn-group">
    <button class="btn btn-success btn-sm" onclick="programList()"><span class="glyphicon glyphicon-list"></span> Daftar program</button>
  </div>
</div>

<br><br><br>

<?php
	include("../connect.php");
	$id = $_GET['id'];
	$query = mysqli_query($con , "SELECT * FROM program WHERE p_id='$id'");
	$row = mysqli_fetch_array($query);

	$p_name = str_replace("\'", "&#39;", $row['p_name']);
	$p_code = str_replace("\'", "&#39;", $row['p_code']);
	$p_semCount = str_replace("\'", "&#39;", $row['p_semCount']);
	$p_expense = str_replace("\'", "&#39;", $row['p_expense']);
	$p_admin = str_replace("\'", "&#39;", $row['p_admin']);
	$p_detail = str_replace("\'", "&#39;", $row['p_detail']);
?>

<form class="form-horizontal" id="program" name="program">
    
    <div class="form-group">
      	<label for="inputEmail" class="col-lg-3 control-label">Program :</label>
      	<div class="col-lg-7">
        	<input type="text" class="form-control" id="p_name" value="<?= $p_name ?>">
      	</div>
    </div>

    <div class="form-group">
      	<label for="inputEmail" class="col-lg-3 control-label">Kod :</label>
      	<div class="col-lg-7">
        	<input type="text" class="form-control" id="p_code" value="<?= $p_code ?>">
      	</div>
    </div>

    <div class="form-group">
      	<label for="inputEmail" class="col-lg-3 control-label">Jumlah semester kuliah :</label>
      	<div class="col-lg-7">
        	<input type="number" class="form-control" id="p_semCount" value="<?= $p_semCount ?>">
      	</div>
    </div>

    <div class="form-group">
      	<label for="inputEmail" class="col-lg-3 control-label">Bayaran :</label>
      	<div class="col-lg-7">
        	<textarea class="form-control" rows="5" id="p_expense"><?= $p_expense ?></textarea>
      	</div>
    </div>

    <div class="form-group">
      	<label for="inputEmail" class="col-lg-3 control-label">Pengurus :</label>
      	<div class="col-lg-7">
        	<textarea class="form-control" rows="5" id="p_admin"><?= $p_admin ?></textarea>
      	</div>
    </div>

    <div class="form-group">
      	<label for="inputEmail" class="col-lg-3 control-label">Detail :</label>
      	<div class="col-lg-7">
        	<textarea class="form-control" rows="5" id="p_detail"><?= $p_detail ?></textarea>
      	</div>
    </div>
 
</form>

<p class="text-center">
    <button class="btn btn-success btn-sm" onclick="saveEditProgram('<?= $id ?>')">SAVE</button>
    <div align="center" id="msg"></div>
</p>

<hr>

    
        <label for="inputEmail" class="col-lg-3 control-label">FILES :</label>

        <div class="col-lg-7">

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <td align="center">MOU</td>
                        <td align="center" width="40%">Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $mou = mysqli_query($con, "SELECT * FROM programfile WHERE p_id='$id' AND pf_documents=''");
                            $i = 1;
                        while($rowMou = mysqli_fetch_array($mou)){
                            $mouId = $rowMou['pf_id'];
                    ?>
                    <tr id="<?= $mouId ?>">
                        <td>File mou <?= $i ?></td>
                        <td align="center" width="40%">
                            <a href="content/register/downloadMou.php?id=<?= $mouId ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-cloud-download"></span> DOWNLOAD</a>
                            <a class="btn btn-warning btn-sm" onclick="deleteMou('<?= $mouId ?>')"><span class="glyphicon glyphicon-trash"></span> DELETE</a>
                        </td>
                    </tr>
                    <?php
                            $i++;
                        }
                    ?>
                    
                    <tr>
                        <td colspan="2" align="center">
  
                            <form class="form-horizontal" method="post" target="ifrm1" enctype="multipart/form-data" action="content/register/mouEdit.php">

                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-3 control-label"></label>
                                        <div class="col-lg-6">
                                            <input type="file" class="form-control" id="pf_mou" name="pf_mou[]" multiple required>
                                        </div>
                                    </div>

                                    <input type="hidden" class="form-control" id="id" multiple name="id" value="<?php echo $id ?>">

                                    <button class="btn btn-success btn-sm" type="submit">SAVE</button>
                                    <div align="center" id="msg"></div>

                            </form>
                            
                         </td>
                    </tr>
                    
                </tbody>
            </table>
         
            
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <td align="center">DOKUMEN</td>
                        <td align="center" width="40%">Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $doc = mysqli_query($con, "SELECT * FROM programfile WHERE p_id='$id' AND pf_documents!=''");
                        $i = 1;
                        while($rowDoc = mysqli_fetch_array($doc)){
                            $docId = $rowDoc['pf_id'];
                    ?>
                    <tr id="<?= $docId ?>">
                        <td>File dokument <?= $i ?></td>
                        <td align="center" width="40%">
                            <a href="content/register/downloadDocument.php?id=<?= $docId ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-cloud-download"></span> DOWNLOAD</a>
                            <a class="btn btn-warning btn-sm" onclick="deleteDoc('<?= $docId ?>')"><span class="glyphicon glyphicon-trash"></span> DELETE</a>
                        </td>
                    </tr>
                    <?php
                        $i++;
                        }
                    ?>
                    
                    <tr>
                        <td colspan="2" align="center">
  
                            <form class="form-horizontal" method="post" target="ifrm2" enctype="multipart/form-data" action="content/register/documentEdit.php">

                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-3 control-label"></label>
                                        <div class="col-lg-6">
                                            <input type="file" class="form-control" id="pf_documents" name="pf_documents[]" multiple required>
                                        </div>
                                    </div>

                                    <input type="hidden" class="form-control" id="id" multiple name="id" value="<?php echo $id ?>">

                                    <button class="btn btn-success btn-sm" type="submit">SAVE</button>
                                    <div align="center" id="msg"></div>

                            </form>
                            
                         </td>
                    </tr>
                    
                </tbody>
            </table>

        </div>
    

<iframe name="ifrm1" style="display:none;"></iframe>
<iframe name="ifrm2" style="display:none;"></iframe>




