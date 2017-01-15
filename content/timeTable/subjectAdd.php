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
        z-index: 18;
        overflow: scroll;
        height: 200px;
    }
    #subjectList{
        position: absolute;
        width: 550px;
        border: solid 1px black;
        background-color: #eeeeee;
        display: none;
        alignment-adjust: right;
        text-align: left;
        z-index: 18;
        overflow: scroll;
        height: 200px;
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
        <div class="col-lg-5">
            <select class="form-control" onchange="timeTableSelectProgram()" name="p_id" id="p_id">
                <option value="102">--Program--</option>
            <?php
                $program = mysqli_query($con, "SELECT * FROM program ORDER BY p_id DESC");
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
        <div class="col-lg-5">
            <select class="form-control" name="register" id="register">
                <option value="0">--Pilih--</option>
            </select>
        </div>
        <div class="col-lg-2">
            <div id="selectAlert"></div>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-4 control-label">Pensyarah : </label>
        <div class="col-lg-5">
            <input type="text" name="t_id" id="t_id" class="form-control" onkeyup="teachertAutoComp()">
            <div id="listbox"></div>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-4 control-label">Matakuliah : </label>
        <div class="col-lg-5">
            <input type="text" name="subject" id="subject" class="form-control" onkeyup="subjectAutoComp()">
            <div id="subjectList"></div>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-4 control-label">Fakulti : </label>
        <div class="col-lg-5">
            <select name="ft_id" id="ft_id" class="form-control" onchange="facultySelect()">
                <option value="0">--------------Pilih------------</option>
                <?php
                    $faculty = mysqli_query($con, "SELECT * FROM fakultys");
                    while($ft_result = mysqli_fetch_array($faculty)){
                        $ft_id = $ft_result['ft_id'];
                        $ft_name = $ft_result['ft_name'];
                ?>
                <option value="<?= $ft_id ?>"><?= $ft_name ?></option>
                <?php
                    }
                ?>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-4 control-label">Jurusan : </label>
        <div class="col-lg-5">
            <select name="dp_id" id="dp_id" class="form-control">
                <option>--------------Pilih------------</option>
            </select>
        </div>
        <div id="departmentSelectAlert"></div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-4 control-label">Kelas : </label>
        <div class="col-lg-5">
            <select name="rs_class" id="rs_class" class="form-control">
                <option value="0">--------------Pilih------------</option>
                <option value="1">1</option>
                <option value="1">2</option>
                <option value="1">3</option>
                <option value="1">4</option>
            </select>
        </div>
    </div>
    
    <input type="hidden" name="teacher" id="teacher" value=""> 
    <input type="hidden" name="s_id" id="s_id" value=""> 
    
    
</form>

<div align="center">
    <button class="btn btn-success btn-sm" onclick="subjectRegisterAddSave()"><span class="glyphicon glyphicon-floppy-disk"></span> SIMPAN</button>
</div>

<div id="msg" align='center'></div>


