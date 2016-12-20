<style>
.center {
    text-align: center;
    border: 3px solid green;
}
</style>
<div class="panel panel-primary">
    <div class="panel-body">
        <div class="pull-left">
            <h4><span class="glyphicon glyphicon-flag"></span> PERSYARATAN</h4>
        </div>
        <div class="pull-right">
            
        </div>
        <br><br><hr>
        
            <?php
                include_once 'content/function/function_second.php';
            ?>
        
         <div class="col-lg-9 col-md-offset-4">
             
            <form class="form-horizontal" id="proofSearch">

                <div class="form-group center-block">
                    
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
                                    $faculty = faculty('content/function/connect.php');
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
                                    $department = department('content/function/connect.php');
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
  
        </div>
        
        <div align="center">
            <button onclick="proof()" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-search"></span> SEARCH</button>
        </div>   
        
            <br>
            
            <div id="proofContent" align="center"></div>
            
    </div>
        
</div>


