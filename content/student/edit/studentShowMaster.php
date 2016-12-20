<?php
    include("../../connect.php");
    $id = $_GET['id'];
    $sql = mysqli_query($con, "SELECT * FROM students WHERE st_id='$id'");
    $rs = mysqli_fetch_array($sql);
    
    $student_id = str_replace("\'", "&#39;", $rs['student_id']);
    $programId = $rs['program'];
    $firstname_rumi = str_replace("\'", "&#39;", $rs['firstname_rumi']);
    $lastname_rumi = str_replace("\'", "&#39;", $rs['lastname_rumi']);
    $firstname_jawi = str_replace("\'", "&#39;", $rs['firstname_jawi']);
    $lastname_jawi = str_replace("\'", "&#39;", $rs['lastname_jawi']);
    $firstname_eng = str_replace("\'", "&#39;", $rs['firstname_eng']);
    $lastname_eng = str_replace("\'", "&#39;", $rs['lastname_eng']);
    $cityzen_id = str_replace("\'", "&#39;", $rs['cityzen_id']);
    $birdth_date = str_replace("\'", "&#39;", $rs['birdth_date']);
    $telephone = str_replace("\'", "&#39;", $rs['telephone']);
    $class = str_replace("\'", "&#39;", $rs['class']);
    $disease = str_replace("\'", "&#39;", $rs['disease']);
    $father_name = str_replace("\'", "&#39;", $rs['father_name']);
    $father_lastname = str_replace("\'", "&#39;", $rs['father_lastname']);
    $father_job = str_replace("\'", "&#39;", $rs['father_job']);
    $mother_name = str_replace("\'", "&#39;", $rs['mother_name']);
    $mother_lastname = str_replace("\'", "&#39;", $rs['mother_lastname']);
    $mother_job = str_replace("\'", "&#39;", $rs['mother_job']);
    $email = str_replace("\'", "&#39;", $rs['email']);
    $ibtidai_graduate = str_replace("\'", "&#39;", $rs['ibtidai_graduate']);
    $ibtidai_graduate_year = str_replace("\'", "&#39;", $rs['ibtidai_graduate_year']);
    $mutawasit_graduate = str_replace("\'", "&#39;", $rs['mutawasit_graduate']);
    $mutawasit_graduate_year = str_replace("\'", "&#39;", $rs['mutawasit_graduate_year']);
    $sanawi_graduate = str_replace("\'", "&#39;", $rs['sanawi_graduate']);
    $sanawi_graduate_year = str_replace("\'", "&#39;", $rs['sanawi_graduate_year']);
    $down_graduate = str_replace("\'", "&#39;", $rs['down_graduate']);
    $down_graduate_year = str_replace("\'", "&#39;", $rs['down_graduate_year']);
    $first_highschool_graduate = str_replace("\'", "&#39;", $rs['first_highschool_graduate']);
    $first_highschool_graduate_year = str_replace("\'", "&#39;", $rs['first_highschool_graduate_year']);
    $second_highschool_graduate = str_replace("\'", "&#39;", $rs['second_highschool_graduate']);
    $second_highschool_graduate_year = str_replace("\'", "&#39;", $rs['second_highschool_graduate_year']);
    $password = str_replace("\'", "&#39;", $rs['password']);
    $t_studentname = str_replace("\'", "&#39;", $rs['t_studentname']);
    $t_studentlastname = str_replace("\'", "&#39;", $rs['t_studentlastname']);
    $t_fathername = str_replace("\'", "&#39;", $rs['t_fathername']);
    $t_fatherlastname = str_replace("\'", "&#39;", $rs['t_fatherlastname']);
    $t_mothername = str_replace("\'", "&#39;", $rs['t_mothername']);
    $t_motherlastname = str_replace("\'", "&#39;", $rs['t_motherlastname']);
    $t_province = str_replace("\'", "&#39;", $rs['t_province']);
    $t_village_name = str_replace("\'", "&#39;", $rs['t_village_name']);
    $t_subdistrict  = str_replace("\'", "&#39;", $rs['t_subdistrict']);
    $t_district = str_replace("\'", "&#39;", $rs['t_district']);
    $t_province_sec = str_replace("\'", "&#39;", $rs['t_province_sec']);
    $house_number = str_replace("\'", "&#39;", $rs['house_number']);
    $place = str_replace("\'", "&#39;", $rs['place']);
    $t_road = str_replace("\'", "&#39;", $rs['t_road']);
    $post = str_replace("\'", "&#39;", $rs['post']);
    $gender = str_replace("\'", "&#39;", $rs['gender']);
    $job = str_replace("\'", "&#39;", $rs['job']);
    $income = str_replace("\'", "&#39;", $rs['income']);
    $bachelorGraduate = str_replace("\'", "&#39;", $rs['bachelor_graduate']);
    
    $image = mysqli_query($con, "SELECT * FROM image WHERE id=(SELECT MAX(id) FROM image WHERE st_id='$id')");
    $imageRow = mysqli_fetch_array($image);
    
    if($imageRow[0]>0){
        $src = 'content/student/capture/images/'.$imageRow["images"].'.jpg';
        $picture = "<a target='_blank' href='content/student/capture/edit.php?st_id=$id'><img src='$src' class='img-thumbnail' width='200px' hiegth='250px'></a>";
    }else{
        $picture = "<a target='_blank' href='content/student/capture/index.php?st_id=$id'><img src='content/student/capture/images/add-user.png' class='img-thumbnail' width='200px' hiegth='250px'></a>";
    } 
?>

    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab" aria-expanded="true">Melayu</a></li>
        <li class=""><a href="#profile" data-toggle="tab" aria-expanded="false">Thai</a></li>
        <li class=""><a href="#class" data-toggle="tab" aria-expanded="false">Dokumen</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="home">
            <p>
                <form class="form-horizontal" name="editStudent" id="editStudent">
                    <table>
                        <tr>
                            <td width="80%">
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">No.Pokok :</label>
                                    <div class="col-lg-3">
                                        <input type="text" class="form-control input-sm" placeholder="Nama" name="student_id" value="<?= $student_id ?>">
                                    </div>
                                </div>

                                <?php
                                    $sql_y = mysqli_query($con, "SELECT * FROM year ORDER BY year");
                                    $sql_s = mysqli_query($con, "SELECT income_year FROM students WHERE st_id='$id'");
                                    $rs_s = mysqli_fetch_array($sql_s);
                                    $data = $rs_s['income_year'];
                                ?>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Tahun daftar :</label>
                                    <div class="col-lg-3">
                                        <select class="form-control input-sm" name="income_year">
                                            <?php
                                                while($row = mysqli_fetch_array($sql_y)){
                                                    $year = $row['year'];
                                            ?>
                                                <option value="<?= $year ?>" <?php if($data==$year){echo 'selected="selected" ';} ?> ><?= $year ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <?php
                                    $program = mysqli_query($con, "SELECT * FROM program");
                                ?>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Program :</label>
                                    <div class="col-lg-3">
                                        <select class="form-control input-sm" name="program" id="program">
                                            <?php
                                                while($row = mysqli_fetch_array($program)){
                                                    $p_name = $row['p_name'];
                                                    $p_id = $row['p_id'];
                                            ?>
                                            <option value="<?= $p_id ?>" <?php if($programId==$p_id){ echo 'selected'; }?>><?= $p_name ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <?= $picture ?>
                            </td>
                        </tr>
                    </table>

                    <fieldset>
                        <legend>Bahagian 1 : Biodata</legend>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Nama - Nasab :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $firstname_rumi ?>" name="firstname_rumi">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $lastname_rumi ?>" name="lastname_rumi">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">نام - نسب :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $firstname_jawi ?>" name="firstname_jawi">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $lastname_jawi ?>" name="lastname_jawi">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Name - Lastname :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $firstname_eng ?>" name="firstname_eng">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $lastname_eng ?>" name="lastname_eng">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Jenis kelamin</label>
                            <div class="col-lg-3">
                                <select class="form-control input-sm" placeholder="" required name="gender">
                                    <option <?=$gender == '' ? ' selected="selected"' : ''?>></option>
                                    <option value="Lelaki" <?=$gender == 'Lelaki' ? ' selected="selected"' : ''?>>Lelaki</option>
                                    <option value="Perempuan" <?=$gender == 'Perempuan' ? ' selected="selected"' : ''?>>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">ID Kad :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $cityzen_id ?>" name="cityzen_id">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Tarihk Lahir :</label>
                            <div class="col-lg-3">
                                <input type="date" class="form-control input-sm" value="<?= $birdth_date ?>" name="birdth_date">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Penyakit pembawaan :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $disease ?>" name="disease">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Nama - Nasab Bapa :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $father_name ?>" name="father_name">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $father_lastname ?>" name="father_lastname">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Nama - Nasab Ibu :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $mother_name ?>" name="mother_name">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $mother_lastname ?>" name="mother_lastname">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Pekerjaan :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="job" placeholder="Pekerjaan" id="job" value="<?= $job ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Hasil :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="income" id="income" placeholder="Hasil" value="<?= $income ?>"> 
                            </div>
                            <div class="col-lg-3">
                                Bath./Bulan
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $email ?>" name="email">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Telepon :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $telephone ?>" name="telephone">
                            </div>
                        </div>
                     
                        
                    </fieldset>
                    
                    <fieldset>
                        <legend>Bahagian 2 : Sejarah pendidikan</legend>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Ibtidai dari sekolah :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $ibtidai_graduate ?>" name="ibtidai_graduate">
                            </div>
                            <label class="col-lg-1 control-label">Tahun</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" value="<?= $ibtidai_graduate_year ?>" name="ibtidai_graduate_year">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Mutawassit dari sekolah :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $mutawasit_graduate ?>" name="mutawasit_graduate">
                            </div>
                            <label class="col-lg-1 control-label">Tahun</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" value="<?= $mutawasit_graduate_year ?>" name="mutawasit_graduate_year">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Mutawassit dari sekolah :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $sanawi_graduate ?>" name="sanawi_graduate">
                            </div>
                            <label class="col-lg-1 control-label">Tahun</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" value="<?= $sanawi_graduate_year ?>" name="sanawi_graduate_year">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Sarjana S1 :</label>
                            <div class="col-lg-6">
                                <textarea rows="3" class="form-control input-sm" name="bachelor_graduate" id="bachelor_graduate"><?= $bachelorGraduate ?></textarea>
                            </div>
                        </div>
                        
                    </fieldset>
                    
                    <fieldset>
                        <legend>Bahagian 3 : Pengetahuan bahasa</legend>
                        
                        <?php
                            $chk1 = array();
                            $chk1['Kurang'] = '';
                            $chk1['Cukup'] = '';
                            $chk1['Lancar'] = '';
                                if(isset($rs['melayu_lang_skill'])){
                                    if($rs['melayu_lang_skill']=='Kurang'){
                                        $chk1['Kurang'] = 'checked="checked"';
                                        $chk1['Cukup'] = '';
                                        $chk1['Lancar'] = '';
                                    }if($rs['melayu_lang_skill']=='Cukup'){
                                        $chk1['Kurang'] = '';
                                        $chk1['Cukup'] = 'checked="checked"';
                                        $chk1['Lancar'] = '';
                                    }if($rs['melayu_lang_skill']=='Lancar'){
                                        $chk1['Kurang'] = '';
                                        $chk1['Cukup'] = '';
                                        $chk1['Lancar'] = 'checked="checked"';
                                    }
                                }
			?>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Bahasa melayu :</label>
                            <div class="radio">
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="melayu_lang_skill" value="Kurang" <?= $chk1['Kurang']; ?> > Kurang
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="melayu_lang_skill" value="Cukup" <?= $chk1['Cukup']; ?> > Cukup
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="melayu_lang_skill" value="Lancar" <?= $chk1['Lancar']; ?> > Lancar
                                </div>
                            </div>
                        </div>
                        
                        <?php
                            $chk2 = array();
                            $chk2['Kurang'] = '';
                            $chk2['Cukup'] = '';
                            $chk2['Lancar'] = '';
                                if(isset($rs['arab_lang_skill'])){
                                    if($rs['arab_lang_skill']=='Kurang'){
                                        $chk2['Kurang'] = 'checked="checked"';
                                        $chk2['Cukup'] = '';
                                        $chk2['Lancar'] = '';
                                    }if($rs['arab_lang_skill']=='Cukup'){
                                        $chk2['Kurang'] = '';
                                        $chk2['Cukup'] = 'checked="checked"';
                                        $chk2['Lancar'] = '';
                                    }if($rs['arab_lang_skill']=='Lancar'){
                                        $chk2['Kurang'] = '';
                                        $chk2['Cukup'] = '';
                                        $chk2['Lancar'] = 'checked="checked"';
                                    }
                                }
			?>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Bahasa arab :</label>
                            <div class="radio">
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="arab_lang_skill" value="Kurang" <?= $chk2['Kurang']; ?> > Kurang
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="arab_lang_skill" value="Cukup" <?= $chk2['Cukup']; ?> > Cukup
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="arab_lang_skill" value="Lancar" <?= $chk2['Lancar']; ?> > Lancar
                                </div>
                            </div>
                        </div>
                        
                        <?php
                            $chk3 = array();
                            $chk3['Kurang'] = '';
                            $chk3['Cukup'] = '';
                            $chk3['Lancar'] = '';
                                if(isset($rs['ingris_lang_skill'])){
                                    if($rs['ingris_lang_skill']=='Kurang'){
                                        $chk3['Kurang'] = 'checked="checked"';
                                        $chk3['Cukup'] = '';
                                        $chk3['Lancar'] = '';
                                    }if($rs['ingris_lang_skill']=='Cukup'){
                                        $chk3['Kurang'] = '';
                                        $chk3['Cukup'] = 'checked="checked"';
                                        $chk3['Lancar'] = '';
                                    }if($rs['ingris_lang_skill']=='Lancar'){
                                        $chk3['Kurang'] = '';
                                        $chk3['Cukup'] = '';
                                        $chk3['Lancar'] = 'checked="checked"';
                                    }
                                }
			?>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Bahasa engris :</label>
                            <div class="radio">
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="ingris_lang_skill" value="Kurang" <?= $chk3['Kurang']; ?> > Kurang
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="ingris_lang_skill" value="Cukup" <?= $chk3['Cukup']; ?> > Cukup
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="ingris_lang_skill" value="Lancar" <?= $chk3['Lancar']; ?> > Lancar
                                </div>
                            </div>
                        </div>
                        
                        <?php
                            $chk4 = array();
                            $chk4['Kurang'] = '';
                            $chk4['Cukup'] = '';
                            $chk4['Lancar'] = '';
                                if(isset($rs['thai_lang_skill'])){
                                    if($rs['thai_lang_skill']=='Kurang'){
                                        $chk4['Kurang'] = 'checked="checked"';
                                        $chk4['Cukup'] = '';
                                        $chk4['Lancar'] = '';
                                    }if($rs['thai_lang_skill']=='Cukup'){
                                        $chk4['Kurang'] = '';
                                        $chk4['Cukup'] = 'checked="checked"';
                                        $chk4['Lancar'] = '';
                                    }if($rs['thai_lang_skill']=='Lancar'){
                                        $chk4['Kurang'] = '';
                                        $chk4['Cukup'] = '';
                                        $chk4['Lancar'] = 'checked="checked"';
                                    }
                                }
			?>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Bahasa thai :</label>
                            <div class="radio">
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="thai_lang_skill" value="Kurang" <?= $chk4['Kurang']; ?> > Kurang
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="thai_lang_skill" value="Cukup" <?= $chk4['Cukup']; ?> > Cukup
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="thai_lang_skill" value="Lancar" <?= $chk4['Lancar']; ?> > Lancar
                                </div>
                            </div>
                        </div>
                        
                    </fieldset>

                    <fieldset>
                        <legend>Bahagian 4 : PASSWORD</legend>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Password :</label>
                            <div class="col-lg-3">
                                <input type="password" class="form-control input-sm" value="<?= $password ?>" name="password">
                            </div>
                        </div>
                        
                    </fieldset>
                    <br>
                    <input type="hidden" name="id" id="id" value="<?= $id ?>">
            </form>
                    <p class="text-center">
                        <button onclick="saveEditMaster1()" class="btn btn-success btn-sm">SIMPAN</button>
                        <div align="center" id="msg"></div>
                    </p>
            </p>
        </div>
        <div class="tab-pane fade" id="profile">
            <p>
                <form class="form-horizontal" name="editStudentMaster2">
                    <fieldset>
                        <legend>ส่วนที่ 1 : ข้อมูลทั่วไป</legend>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">รหัสประจำตัว :</label>
                                <div class="col-lg-3">
                                  <input type="text" class="form-control input-sm" placeholder="Nama" name="student_id" value="<?= $student_id ?>" disabled>
                                </div>
                            </div>
                    
                            <div class="form-group">
                                <label class="col-lg-3 control-label">ชื่อ-นามสกุล :</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" name="t_studentname" id="t_studentname" value="<?= $t_studentname ?>">
                                </div>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" name="t_studentlastname" id="t_studentlastname" value="<?= $t_studentlastname ?>">
                                </div>
                            </div>
                    
                            <div class="form-group">
                                <label class="col-lg-3 control-label">เลขประจำตัวประชาชน :</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" name="cityzen_id" id="cityzen_id" value="<?= $cityzen_id ?>" disabled>
                                </div>
                            </div>
                    
                            <div class="form-group">
                                <label class="col-lg-3 control-label">สถานที่เกิด(จังหวัด) :</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" name="t_province" id="t_province" value="<?= $t_province ?>">
                                </div>
                            </div>
                    
                            <div class="form-group">
                                <label class="col-lg-3 control-label">ชื่อ-สกุล บิดา :</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" name="t_fathername" id="t_fathername" value="<?= $t_fathername ?>">
                                </div>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" name="t_fatherlastname" id="t_fatherlastname" value="<?= $t_fatherlastname ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-lg-3 control-label">ชื่อ-สกุล มารดา :</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" name="t_mothername" id="t_mothername" value="<?= $t_mothername ?>">
                                </div>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" name="t_motherlastname" id="t_motherlastname" value="<?= $t_motherlastname ?>">
                                </div>
                            </div>
                        
                    </fieldset>
                    
                    <fieldset>
                        <legend>ส่วนที่ 2 : ที่อยู่</legend>
                        
                            <div class="form-group">
                                <label class="col-lg-3 control-label">หมู่บ้าน :</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" name="t_village_name" id="t_village_name" value="<?= $t_village_name ?>">
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="col-lg-3 control-label">บ้านเลขที่ :</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" name="house_number" id="house_number" value="<?= $house_number ?>">
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="col-lg-3 control-label">หมู่ที่ :</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" name="place" id="place" value="<?= $place ?>">
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="col-lg-3 control-label">ถนน :</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" name="t_road" id="t_road" value="<?= $t_road ?>">
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="col-lg-3 control-label">ตำบล :</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" name="t_subdistrict" id="t_subdistrict" value="<?= $t_subdistrict ?>">
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="col-lg-3 control-label">อำเภอ :</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" name="t_district" id="t_district" value="<?= $t_district  ?>">
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="col-lg-3 control-label">จังหวัด :</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" name="t_province_sec" id="t_province_sec" value="<?= $t_province_sec   ?>">
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="col-lg-3 control-label">รหัสไปรษณีย์ :</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" name="post" id="post" value="<?= $post ?>">
                                </div>
                            </div>
                        
                    </fieldset>
                    <input type="hidden" name="id" value="<?= $id ?>"> 
                </form>
                <p class="text-center">
                    <button class="btn btn-success btn-sm" onclick="saveEditMaster2()">SAVE</button>
                    <div align="center" id="msg2"></div>
                </p>
            </p>
        </div>
        
        <div class="tab-pane fade" id="class">
        <br>
        
        <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <td align="center">DOKUMEN</td>
                        <td align="center" width="40%">Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $doc = mysqli_query($con, "SELECT * FROM studentfile WHERE st_id='$id'");
                        $i = 1;
                        while($rowDoc = mysqli_fetch_array($doc)){
                            $docId = $rowDoc['sf_id'];
                    ?>
                    <tr id="<?= $docId ?>">
                        <td>File dokument <?= $i ?></td>
                        <td align="center" width="40%">
                            <a href="content/student/action/downloadDocument.php?id=<?= $docId ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-cloud-download"></span> DOWNLOAD</a>
                            <a class="btn btn-warning btn-sm" onclick="deleteStudentDoc('<?= $docId ?>')"><span class="glyphicon glyphicon-trash"></span> DELETE</a>
                        </td>
                    </tr>
                    <?php
                        $i++;
                        }
                    ?>
                    
                    <tr>
                        <td colspan="2" align="center">
  
                            <form class="form-horizontal" method="post" target="ifrm" enctype="multipart/form-data" action="content/student/action/documentEdit.php">

                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-3 control-label"></label>
                                        <div class="col-lg-6">
                                            <input type="file" class="form-control" id="documents" name="documents[]" multiple required>
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
        
        <iframe name="ifrm" style="display:none;"></iframe>        
        </div>
    </div> 
    
