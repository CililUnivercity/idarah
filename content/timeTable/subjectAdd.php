<?php
    include '../../connect.php';
?>
<style>
    #listbox{
        position: absolute;
        width: 250px;
        border: solid 1px black;
        background-color: #eeeeee;
        display: none;
        alignment-adjust: right;
        text-align: left;
    }
</style>
<div class="pull-left">
    <h4>Tambah mata kuliah</h4>
</div>
        
<div class="pull-right">
    <a href="?page=setting&&settingpage=timeTable" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-arrow-left"></span> TAMBAH</a>
    <a onclick="load('content/timeTable/subjectAdd.php', '')" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
</div>
        
<br>
<hr>

<form class="form-horizontal" name="timeTable" id="timeTable">
    
    <div class="form-group">
        <label class="col-lg-4 control-label">Program :</label>
        <div class="col-lg-3">
            <select class="form-control" onchange="timeTableSelectProgram()" name="p_id" id="p_id">
                <option value="102">--Program--</option>
            <?php
                $program = mysqli_query($con, "SELECT * FROM program");
                while($program_result = mysqli_fetch_array($program)){
            ?>
                <option value="<?= $program_result['p_id'] ?>"><?= $program_result['p_name'] ?></option>
            <?php
                }
            ?>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-4 control-label">Tahun penga jian & semeter :</label>
        <div class="col-lg-3">
            <select class="form-control" name="register" id="register">
                <option value="0">--Pilih--</option>
            </select>
        </div>
        <div class="col-lg-3">
            <div id="selectAlert"></div>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-4 control-label">Pensyarah : </label>
        <div class="col-lg-3">
            <input type="text" name="t_id" id="t_id" class="form-control" onkeyup="teachertAutoComp()">
            <div id="listbox"></div>
        </div>
    </div>
    
    <input type="hidden" name="teacher" id="teacher" value=""> 
    
</form>
<div id="msg"></div>

