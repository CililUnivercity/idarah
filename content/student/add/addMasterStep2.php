<?php
    $id = $_GET['id'];
?>
<h4><span class="glyphicon glyphicon-plus-sign"></span><b class="text-warning"> TAMBAH MAHASISWA BARU S2</b></h4>
<br>
<form class="form-horizontal" method="post" target="ifrm" enctype="multipart/form-data" action="content/student/action/saveFile.php">
    <fieldset>
        <legend>Bahagian 5 : PASSWORD</legend>                
            <div class="form-group">
                <label class="col-lg-3 control-label">Password :</label>
                <div class="col-lg-3">
                    <input type="file" class="form-control input-sm" name="documents[]" id="documents" multiple required>
                </div>
            </div>
    </fieldset>
    
    <input type="hidden" class="form-control" id="id" multiple name="id" value="<?php echo $id ?>">
    
    <p class="text-center">
        <button class="btn btn-success btn-sm" type="submit">UPLOAD</button>
        <button class="btn btn-success btn-sm" onclick="loadContent('master', 'student', '')" >SKIP >></button>
    </p>
    
</form>

<iframe name="ifrm" style="display:none;"></iframe>
