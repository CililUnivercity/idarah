<blockquote>
    <div id="content">
        <div class="pull-left">
            <h4>Hasil perkuliahan</h4>
        </div>
        
        <div class="pull-right">
            
        </div>
        
        <br>
        <hr>
        
        <form class="form-horizontal" name="classScheduleSearch" id="classScheduleSearch">
                
                <div class="form-group">
                    
                    <div class="col-lg-2">
                        
                    </div>
                    
                    <div class="col-lg-2">
                        <select class="form-control" name="class" id="class">
                            <option value="0">KELAS</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    
                    <div class="col-lg-2">
                        <select class="form-control" name="re_id" id="re_id">
                            <option value="0">Semister / Tahun</option>
                            <?php
                                //get data from register data
                                $register = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.p_id='0' ORDER BY re_id DESC");
                                while($registerResult = mysqli_fetch_array($register)){
                                    $re_id = $registerResult['re_id'];
                                    $term = $registerResult['term_id'];
                                    $year = $registerResult['year'];
                            ?>
                            <option value="<?= $registerResult['re_id'] ?>"><?= $term ?> / <?= $year ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    
                    <div class="col-lg-2">
                        <select name="ft_id" id="ft_id" class="form-control" onchange="facultySelect()">
                            <option value="0">Fakulti</option>
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
                    
                    <div class="col-lg-2">
                        <div id="departmentSelectAlert"></div>
                            <select name="dp_id" id="dp_id" class="form-control">
                                <option>Jurusan</option>
                            </select>
                        </div>
                </div>
                
            </form>
                
        <div align="center">
            <button class="btn btn-success btn-sm" onclick="classTimetableSearch_setting()"><span class="glyphicon glyphicon-search"></span> Cari</button>
        </div>
        
        <br>
        <div id="msg"></div>
        
    </div>
</blockquote>

