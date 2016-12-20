<h4><span class="glyphicon glyphicon-cd"></span> Bidata mahasiswa</h4>
<hr>

<?php
    include_once '../function/function_second.php';
?>
<form class="form-horizontal" id="biodataSearchForm">
    <div class="form-group">
        <div class="col-lg-3"></div>
            <div class="col-lg-2">
                <select class="form-control input-sm" name="class" id="class">
                    <option value="0">KELAS</option>
                    <option value="<?= $c1 ?>">1</option>
                    <option value="<?= $c2 ?>">2</option>
                    <option value="<?= $c3 ?>">3</option>
                    <option value="<?= $c4 ?>">4</option>
                </select>
            </div>
            <div class="col-lg-2">
                <select class="form-control input-sm" name="faculty" id="faculty">
                    <option value="0">FAKULTI</option>
                        <?php
                            $faculty = faculty('../../connect.php');
                            while($rs_fakulty = mysqli_fetch_array($faculty)){
                        ?> 
                            <option value="<?= $rs_fakulty['ft_id'] ?>"><?= $rs_fakulty['ft_name'] ?></option>
                        <?php
                            }
                        ?>
                </select>
            </div>
            <div class="col-lg-2">
                <select class="form-control input-sm" name="department" id="department">
                    <option value="0">JURUSAN</option>
                        <?php
                            $department = department('../../connect.php');
                            while($rs_department = mysqli_fetch_array($department)){
                        ?>
                            <option value="<?= $rs_department['dp_id']; ?>"><?= $rs_department['dp_name']; ?></option>
                        <?php
                            }
                        ?>
                </select>
            </div>
    </div>
</form>

<div align="center">
    <button onclick="biodataByClassSearch()" class="btn btn-success btn-sm" name="save"><span class="glyphicon glyphicon-search"></span> SEARCH</button>
</div>
<br>

<div id="biodataByclassContent" align="center"></div>




