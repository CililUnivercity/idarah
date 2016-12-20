<?php
    include("../../connect.php");
?>

<h4><span class="glyphicon glyphicon-plus-sign"></span><b class="text-warning"> TAMBAH MAHASISWA BARU S2</b></h4>
<br>
    
        <form class="form-horizontal" enctype="multipart/form-data" name="addForm" id="addForm">
                            
                            <div class="form-group">
                                <label class="col-lg-3 control-label">No.Pokok :</label>
                                <div class="col-lg-3">
                                  <input type="text" class="form-control input-sm" placeholder="NOMOR POKOK" name="student_id" id="student_id">
                                </div>
                                <div class="col-lg-6">
                                    <span class="username_avail_result" id="username_avail_result"></span>
                                </div>
                            </div>
            
                            <?php
                                $program = mysqli_query($con, "SELECT * FROM program");
                            ?>
                            
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Program :</label>
                                <div class="col-lg-3">
                                    <select class="form-control input-sm" name="program" id="program">
                                        <option></option>
                                        <?php
                                            while($row = mysqli_fetch_array($program)){
                                                $p_name = $row['p_name'];
                                                $p_id = $row['p_id'];
                                        ?>
                                        <option value="<?= $p_id ?>"><?= $p_name ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            <?php
                                $sql_y = mysqli_query($con, "SELECT * FROM year ORDER BY year");
                            ?>
                        
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Tahun daftar :</label>
                                <div class="col-lg-3">
                                    <select class="form-control input-sm" name="income_year" id="income_year">
                                        <option></option>
                                        <?php
                                            while($row = mysqli_fetch_array($sql_y)){
                                                $year = $row['year'];
                                                $current_year = date('Y');
                                        ?>
                                        <option value="<?= $year ?>" <?php if($year==$current_year) { echo 'selected'; } ?>><?= $year ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                    <fieldset>
                        <legend>Bahagian 1 : Biodata</legend>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Nama - Nasab :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="firstname_rumi" placeholder="Nama" id="firstname_rumi">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="lastname_rumi" placeholder="Nasab" id="lastname_rumi">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">نام - نسب :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="firstname_jawi" placeholder="نام" id="firstname_jawi">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="lastname_jawi" placeholder="نسب" id="lastname_jawi">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Name - Lastname :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="firstname_eng" placeholder="Name" id="firstname_eng">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="lastname_eng" placeholder="Lastname" id="lastname_eng">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Jenis kelamin</label>
                            <div class="col-lg-3">
                                <select name="gender" class="form-control input-sm" id="gender">
                                    <option></option>
                                    <option value="Lelaki">Lelaki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">ID Kad :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="cityzen_id" placeholder="NO.Kad pengenalan" id="cityzen_id">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Tarihk Lahir :</label>
                            <div class="col-lg-3">
                                <input type="date" class="form-control input-sm" name="birdth_date" id="birdth_date">
                            </div>
                            <div class="col-lg-3">
                                <p class="text-danger">Contuh. 12/20/2530</p>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Penyakit pembawaan :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="disease" id="disease" placeholder="Penyakit pembawaan">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Nama - Nasab Bapa :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="father_name" id="father_name" placeholder="Nama">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="father_lastname" placeholder="Nasab" id="father_lastname">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Nama - Nasab Ibu :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="mother_name" placeholder="Nama" id="mother_name">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="mother_lastname" placeholder="Nasab" id="mother_lastname">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Pekerjaan :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="job" placeholder="Pekerjaan" id="job">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Hasil :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="income" id="income" placeholder="Hasil"> 
                            </div>
                            <div class="col-lg-3">
                                Bath./Bulan
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="email" id="email" placeholder="Email">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Telepon :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="telephone" placeholder="Telepon" id="telephone">
                            </div>
                        </div>
                     
                        
                    </fieldset>
                    
                    <fieldset>
                        <legend>Bahagian 2 : Sejarah pendidikan</legend>
                        <h4><b>Pendidikan agama :-</b></h4>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Ibtidai dari sekolah :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="ibtidai_graduate" id="ibtidai_graduate">
                            </div>
                            <label class="col-lg-1 control-label">Tahun</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" name="ibtidai_graduate_year" id="ibtidai_graduate_year" placeholder="Contoh : <?= date('Y')+543 ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Mutawassit dari sekolah :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="mutawasit_graduate" id="mutawasit_graduate">
                            </div>
                            <label class="col-lg-1 control-label">Tahun</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" name="mutawasit_graduate_year" id="mutawasit_graduate_year" placeholder="Contoh : <?= date('Y')+543 ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Sanawi dari sekolah :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="sanawi_graduate" id="sanawi_graduate">
                            </div>
                            <label class="col-lg-1 control-label">Tahun</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" name="sanawi_graduate_year" accept="sanawi_graduate_year" placeholder="Contoh : <?= date('Y')+543 ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Sarjana S1 :</label>
                            <div class="col-lg-6">
                                <textarea rows="3" class="form-control input-sm" name="bachelor_graduate" id="bachelor_graduate"></textarea>
                            </div>
                        </div>
                        
                    </fieldset>
                    
                    <fieldset>
                        <legend>Bahagian 3 : Pengetahuan bahasa</legend>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Bahasa melayu :</label>
                            <div class="radio">
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="melayu_lang_skill" value="Kurang" id="melayu_lang_skill"> Kurang
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="melayu_lang_skill" value="Cukup"  id="melayu_lang_skill"> Cukup
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="melayu_lang_skill" value="Lancar" id="melayu_lang_skill"> Lancar
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Bahasa arab :</label>
                            <div class="radio">
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="arab_lang_skill" value="Kurang" id="arab_lang_skill"> Kurang
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="arab_lang_skill" value="Cukup" id="arab_lang_skill"> Cukup
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="arab_lang_skill" value="Lancar" id="arab_lang_skill"> Lancar
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Bahasa engris :</label>
                            <div class="radio">
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="ingris_lang_skill" value="Kurang" id="ingris_lang_skill"> Kurang
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="ingris_lang_skill" value="Cukup" id="ingris_lang_skill"> Cukup
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="ingris_lang_skill" value="Lancar" id="ingris_lang_skill"> Lancar
                                </div>
                            </div>
                        </div>
 
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Bahasa thai :</label>
                            <div class="radio">
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="thai_lang_skill" value="Kurang" id="thai_lang_skill"> Kurang
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="thai_lang_skill" value="Cukup" id="thai_lang_skill"> Cukup
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="thai_lang_skill" value="Lancar" id="thai_lang_skill"> Lancar
                                </div>
                            </div>
                        </div>
                        
                    </fieldset>
            
                    <fieldset>
                        
                        <legend>Bahagian 4 : PASSWORD</legend>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Password :</label>
                            <div class="col-lg-3">
                                <input type="password" class="form-control input-sm" name="password" id="password">
                            </div>
                        </div>
                        
                    </fieldset>
                    
            </form>
    
            <p class="text-center">
                <button onclick="saveAddStudents2()" class="btn btn-success btn-sm">SIMPAN</button>
            <div align="center" id="msg"></div>
            </p>
