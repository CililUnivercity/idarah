<h4><span class="glyphicon glyphicon-paperclip"></span> LOPORAN SEKOLAH CALON MAHASISWA</h4>
<hr>

<?php
    //Get all calon group by school 
    
    //Get year registration year
    /*
    $admYear = mysqli_query($con, "SELECT * FROM admissionregister WHERE ar_status='1'");
    */
    
    $admissionRegister = mysqli_query($con, "SELECT * FROM admissionRegister WHERE ar_status='1'");
    $admissionRegisterRow = mysqli_fetch_array($admissionRegister);
    $cyear1 = $admissionRegisterRow['ar_year'];
    
    $allStd = mysqli_query($con, "SELECT s.*,p.* FROM students s INNER JOIN pretest p ON s.st_id=p.st_id AND p.pre_register_year='$cyear1' GROUP BY sanawi_graduate");
?>

<table class="table table-striped table-hover">
    <tr>
        <td align="center"><div id="subText"><b>جمله چالون</b></div></td>
        <td align="right"><div id="subText"><b>سکوله</b></div></td>
        <td align="center"><div id="subText"><b>بيل</b></div></td>  
    </tr>
    <?php    
        $i = 1;
        while($rsStd = mysqli_fetch_array($allStd)){
            $school = str_replace("\'", "&#39;",$rsStd['sanawi_graduate']);
            $school2 = $rsStd['sanawi_graduate'];
            //$id = $school;
    ?>
    <tr>
        <td align="center">
                <?php
                    $numStd = mysqli_query($con, "SELECT s.*,p.* FROM students s INNER JOIN pretest p ON s.st_id=p.st_id WHERE sanawi_graduate='$school2'");
                    $numStdW = mysqli_query($con, "SELECT s.*,p.* FROM students s INNER JOIN pretest p ON s.st_id=p.st_id WHERE sanawi_graduate='$school2' AND gender='Perempuan'");
                    $numStdM = mysqli_query($con, "SELECT s.*,p.* FROM students s INNER JOIN pretest p ON s.st_id=p.st_id WHERE sanawi_graduate='$school2' AND gender='Lelaki'");
                    //$schoolMod = str_replace("\'", "&#39;",$rsStd['sanawi_graduate']);
                    $numRs = mysqli_num_rows($numStd);
                    $id = $i;
                ?>
                <a href="#" data-toggle="modal" data-target="#myModal<?php echo $id ?>">
                  <?= $numRs ?>
              </a> 
        </td>
        
                    <!-- Modal form -->
                        <div class="modal fade" id="myModal<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $id ?>">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel<?php echo $id ?>" align="center"> <div id="subText"><b> <?= $school ?> </b></div> </h4>
                                    </div>
                                    <div class="modal-body">

                                        <div class="panel panel-primary">                                       
                                            <div class="panel-body">
                                                <div class="pull-right">
                                                    <div id="subText"><b>فرمفوان</b></div>
                                                </div>
                                                <br><br>
                                                    <?php
                                                        $zw = 1;
                                                        while($allSchoolW = mysqli_fetch_array($numStdW)){
                                                            $fnameW = str_replace("\'", "&#39;",$allSchoolW['firstname_jawi']);
                                                            $lnameW = str_replace("\'", "&#39;",$allSchoolW['lastname_jawi']);
                                                            $telephoneW = $allSchoolW['telephone'];
                                                            $payStatusW = $allSchoolW['payStatus'];
                                                            $schoolW = str_replace("\'", "&#39;",$allSchoolW['sanawi_graduate']);
                                                            $villageW = str_replace("\'", "&#39;",$allSchoolW['sanawiVillage']);
                                                    ?>
                                                        <h4 align="right">
                                                            <?php
                                                                if($payStatusW == 1){
                                                                    $payIconW = "<a class='btn btn-success btn-sm'><span class='glyphicon glyphicon-ok'></span> CALON</a>";
                                                                }else{
                                                                    $payIconW = "<a class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-remove'></span> CALON</a>";
                                                                }
                                                            ?>
                                                            <div id="subText">
                                                                <?= $payIconW ?> / <?= $schoolW ?> , <?= $villageW ?> / +Tel <?= $telephoneW ?> / <?= $fnameW ?> - <?= $lnameW ?> 
                                                            </div>
                                                        <h4>
                                                        <hr>
                                                    <?php
                                                        $zw++;
                                                        }
                                                    ?>
                                                <div class="pull-right">
                                                    <div id="subText"><b>للاکي</b></div>
                                                </div>
                                                <br><br>      
                                                <?php
                                                        $zm = 1;
                                                        while($allSchoolM = mysqli_fetch_array($numStdM)){
                                                            $fnameM = str_replace("\'", "&#39;",$allSchoolM['firstname_jawi']);
                                                            $lnameM = str_replace("\'", "&#39;",$allSchoolM['lastname_jawi']);
                                                            $telephoneM = $allSchoolM['telephone'];
                                                            $payStatusM = $allSchoolM['payStatus'];
                                                            $schoolM = str_replace("\'", "&#39;",$allSchoolM['sanawi_graduate']);
                                                            $villageM = str_replace("\'", "&#39;",$allSchoolM['sanawiVillage']);
                                                    ?>
                                                        <h4 align="right">
                                                            <?php
                                                                if($payStatusM == 1){
                                                                    $payIconM = "<a class='btn btn-success btn-sm'><span class='glyphicon glyphicon-ok'></span> CALON</a>";
                                                                }else{
                                                                    $payIconM = "<a class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-remove'></span> CALON</a>";
                                                                }
                                                            ?>
                                                            <div id="subText">
                                                                <?= $payIconM ?> / <?= $schoolM ?> , <?= $villageM ?> / +Tel <?= $telephoneM ?> / <?= $fnameM ?> - <?= $lnameM ?> 
                                                            </div>
                                                        <h4>
                                                        <hr>
                                                    <?php
                                                        //$zM++;
                                                        }
                                                    ?> 
                                                        
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- /Modal showing -->
        
        <td align="right"><div id="subText"><?= $school ?></div></td>
        <td align="center"><?= $i ?></td>
    </tr>
    <?php
        $i++;
        }
    ?>
</table>