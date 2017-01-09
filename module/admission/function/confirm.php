<?php

    $st_id = $_GET['id'];
    $gender = $_GET['gender'];
    
    //Admision yaer setting
    $admissionRegister = mysqli_query($con, "SELECT * FROM admissionRegister WHERE ar_status='1'");
    $admissionRegisterRow = mysqli_fetch_array($admissionRegister);
    $cyear1 = $admissionRegisterRow['ar_year'];
        
        //Class process 
        
        //If gender is male (A B C D E F)
        if($gender == 'Lelaki'){
            $sqlMaleA = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='A' AND pre_register_year='$cyear1'");
            $rsSqlMaleA = mysqli_fetch_array($sqlMaleA);
            $maleA = $rsSqlMaleA['max'];
            
            if($maleA == ''){
                $testClassSet = 'A';
                $testNumberSet = 1;
            }elseif($maleA <= 29){
                $testClassSet = 'A';
                $testNumberSet = $maleA+1;
            }else{
                $sqlMaleB = mysqli_query($con, "SELECT MAX(testNumber) as max,testClass FROM pretest WHERE testClass='B' AND pre_register_year='$cyear1'");
                $rsSqlMaleB = mysqli_fetch_array($sqlMaleB);
                $maleB = $rsSqlMaleB['max'];
                if($maleB == ''){
                    $testClassSet = 'B';
                    $testNumberSet = 1;
                }elseif($maleB <= 29){
                    $testClassSet = 'B';
                    $testNumberSet = $maleB+1;
                }else{
                    $sqlMaleC = mysqli_query($con, "SELECT MAX(testNumber) as max,testClass FROM pretest WHERE testClass='C' AND pre_register_year='$cyear1'");
                    $rsSqlMaleC = mysqli_fetch_array($sqlMaleC);
                    $maleC = $rsSqlMaleC['max'];
                    if($maleC == ''){
                        $testClassSet = 'C';
                        $testNumberSet = 1;
                    }elseif($maleC <= 29){
                        $testClassSet = 'C';
                        $testNumberSet = $maleC+1;
                    }else{
                        $sqlMaleD = mysqli_query($con, "SELECT MAX(testNumber) as max,testClass FROM pretest WHERE testClass='D' AND pre_register_year='$cyear1'");
                        $rsSqlMaleD = mysqli_fetch_array($sqlMaleD);
                        $maleD = $rsSqlMaleD['max'];
                        if($maleD == ''){
                            $testClassSet = 'D';
                            $testNumberSet = 1;
                            }elseif($maleD <= 29){
                                $testClassSet = 'D';
                                $testNumberSet = $maleD+1;
                        }else{
                            $sqlMaleE = mysqli_query($con, "SELECT MAX(testNumber) as max,testClass FROM pretest WHERE testClass='E' AND pre_register_year='$cyear1'");
                            $rsSqlMaleE = mysqli_fetch_array($sqlMaleE);
                            $maleE = $rsSqlMaleE['max'];
                            if($maleE == ''){
                                $testClassSet = 'E';
                                $testNumberSet = 1;
                                }elseif($maleE <= 29){
                                    $testClassSet = 'E';
                                    $testNumberSet = $maleE+1;
                            }else{
                                $sqlMaleF = mysqli_query($con, "SELECT MAX(testNumber) as max,testClass FROM pretest WHERE testClass='F' AND pre_register_year='$cyear1'");
                                $rsSqlMaleF = mysqli_fetch_array($sqlMaleF);
                                $maleF = $rsSqlMaleF['max'];
                                if($maleF == ''){
                                    $testClassSet = 'F';
                                    $testNumberSet = 1;
                                    }elseif($maleF <= 29){
                                        $testClassSet = 'F';
                                        $testNumberSet = $maleF+1;
                                }else{
?>
                                    <script>
                                        alert("Penuh quata");
                                    </script>
                                    <meta http-equiv="refresh" content="0; url=?page=admissions&&admissionpage=register&&id=<?= $st_id ?>">
<?php
                                }
                            }
                        }
                    }
                }
             }
             
            $odrMax = mysqli_query($con, "SELECT MAX(odrNumber) AS odrNumber FROM pretest WHERE pre_register_year='$cyear1'");
            $rsOdr = mysqli_fetch_array($odrMax);
            $maxOdr = $rsOdr['odrNumber'];
            $odrNumber = $maxOdr+1;
             //Update pretest data table
             $PRETEST = mysqli_query($con, "UPDATE pretest SET testClass='$testClassSet',testNumber='$testNumberSet',odrNumber='$odrNumber',payStatus='1' WHERE st_id='$st_id'");
?>
             <script>
                alert("Pendaftaran calon mahasiswa sudah sempurna, sila print kertas peperiksaan");
             </script>
             <meta http-equiv="refresh" content="0; url=?page=admissions&&admissionpage=register&&id=<?= $st_id ?>">      
<?php
        //break;
        //If gender is female    
        }else{
            $sqlFemaleG = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='G' AND pre_register_year='$cyear1'");
            $rsSqlFemaleG = mysqli_fetch_array($sqlFemaleG);
            $femaleG = $rsSqlFemaleG['max'];
            
            //Class G
            if($femaleG == ''){
                $testClassSet = 'G';
                $testNumberSet = 1;
                }elseif($femaleG <= 29){
                    $testClassSet = 'G';
                    $testNumberSet = $femaleG+1;
            // Class  H  
            }else{
            $sqlFemaleH = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='H' AND pre_register_year='$cyear1'");
            $rsSqlFemaleH = mysqli_fetch_array($sqlFemaleH);
            $femaleH = $rsSqlFemaleH['max'];
                if($femaleH == ''){
                    $testClassSet = 'H';
                    $testNumberSet = 1;
                    }elseif($femaleH <= 29){
                        $testClassSet = 'H';
                        $testNumberSet = $femaleH+1;
                //Class I
                }else{
                    $sqlFemaleI = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='I' AND pre_register_year='$cyear1'");
                    $rsSqlFemaleI = mysqli_fetch_array($sqlFemaleI);
                    $femaleI = $rsSqlFemaleI['max'];
                    if($femaleI == ''){
                        $testClassSet = 'I';
                        $testNumberSet = 1;
                        }elseif($femaleI <= 29){
                        $testClassSet = 'I';
                        $testNumberSet = $femaleI+1;
                    //Class I
                    }else{
                        $sqlFemaleJ = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='J' AND pre_register_year='$cyear1'");
                        $rsSqlFemaleJ = mysqli_fetch_array($sqlFemaleJ);
                        $femaleJ = $rsSqlFemaleJ['max'];
                        if($femaleJ == ''){
                            $testClassSet = 'J';
                            $testNumberSet = 1;
                            }elseif($femaleJ <= 29){
                            $testClassSet = 'J';
                            $testNumberSet = $femaleJ+1;
                        //Class K
                        }else{
                            $sqlFemaleK = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='K' AND pre_register_year='$cyear1'");
                            $rsSqlFemaleK = mysqli_fetch_array($sqlFemaleK);
                            $femaleK = $rsSqlFemaleK['max'];
                            if($femaleK == ''){
                                $testClassSet = 'K';
                                $testNumberSet = 1;
                                }elseif($femaleK <= 29){
                                $testClassSet = 'K';
                                $testNumberSet = $femaleK+1;
                            //Class K
                            }else{
                                $sqlFemaleL = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='L' AND pre_register_year='$cyear1'");
                                $rsSqlFemaleL = mysqli_fetch_array($sqlFemaleL);
                                $femaleL = $rsSqlFemaleL['max'];
                                if($femaleL == ''){
                                    $testClassSet = 'L';
                                    $testNumberSet = 1;
                                    }elseif($femaleL <= 29){
                                    $testClassSet = 'L';
                                    $testNumberSet = $femaleL+1;
                                //Class M
                                }else{
                                    $sqlFemaleM = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='M' AND pre_register_year='$cyear1'");
                                    $rsSqlFemaleM = mysqli_fetch_array($sqlFemaleM);
                                    $femaleM = $rsSqlFemaleM['max'];
                                    if($femaleM == ''){
                                        $testClassSet = 'M';
                                        $testNumberSet = 1;
                                        }elseif($femaleM <= 29){
                                        $testClassSet = 'M';
                                        $testNumberSet = $femaleM+1;
                                    //Class N
                                    }else{
                                        $sqlFemaleN = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='N' AND pre_register_year='$cyear1'");
                                        $rsSqlFemaleN = mysqli_fetch_array($sqlFemaleN);
                                        $femaleN = $rsSqlFemaleN['max'];
                                        if($femaleN == ''){
                                            $testClassSet = 'N';
                                            $testNumberSet = 1;
                                            }elseif($femaleN <= 29){
                                            $testClassSet = 'N';
                                            $testNumberSet = $femaleN+1;
                                        //Class O
                                        }else{
                                            $sqlFemaleO = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='O' AND pre_register_year='$cyear1'");
                                            $rsSqlFemaleO = mysqli_fetch_array($sqlFemaleO);
                                            $femaleO = $rsSqlFemaleO['max'];
                                            if($femaleO == ''){
                                                $testClassSet = 'O';
                                                $testNumberSet = 1;
                                                }elseif($femaleO <= 29){
                                                $testClassSet = 'O';
                                                $testNumberSet = $femaleO+1;
                                            //Class P
                                            }else{
                                                $sqlFemaleP = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='P' AND pre_register_year='$cyear1'");
                                                $rsSqlFemaleP = mysqli_fetch_array($sqlFemaleP);
                                                $femaleP = $rsSqlFemaleP['max'];
                                                if($femaleP == ''){
                                                    $testClassSet = 'P';
                                                    $testNumberSet = 1;
                                                    }elseif($femaleP <= 29){
                                                    $testClassSet = 'P';
                                                    $testNumberSet = $femaleP+1;
                                                //Class Q
                                                }else{
                                                    $sqlFemaleQ = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='Q' AND pre_register_year='$cyear1'");
                                                    $rsSqlFemaleQ = mysqli_fetch_array($sqlFemaleQ);
                                                    $femaleQ = $rsSqlFemaleQ['max'];
                                                    if($femaleQ == ''){
                                                        $testClassSet = 'Q';
                                                        $testNumberSet = 1;
                                                        }elseif($femaleQ <= 29){
                                                        $testClassSet = 'Q';
                                                        $testNumberSet = $femaleQ+1;
                                                    //Class R
                                                    }else{
                                                        $sqlFemaleR = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='R' AND pre_register_year='$cyear1'");
                                                        $rsSqlFemaleR = mysqli_fetch_array($sqlFemaleR);
                                                        $femaleR = $rsSqlFemaleR['max'];
                                                        if($femaleR == ''){
                                                            $testClassSet = 'R';
                                                            $testNumberSet = 1;
                                                            }elseif($femaleR <= 29){
                                                            $testClassSet = 'R';
                                                            $testNumberSet = $femaleR+1;
                                                        //Class S
                                                        }else{
                                                            $sqlFemaleS = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='S' AND pre_register_year='$cyear1'");
                                                            $rsSqlFemaleS = mysqli_fetch_array($sqlFemaleS);
                                                            $femaleS = $rsSqlFemaleS['max'];
                                                            if($femaleS == ''){
                                                                $testClassSet = 'S';
                                                                $testNumberSet = 1;
                                                                }elseif($femaleS <= 29){
                                                                $testClassSet = 'S';
                                                                $testNumberSet = $femaleS+1;
                                                            //Class T
                                                            }else{
                                                                $sqlFemaleT = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='T' AND pre_register_year='$cyear1'");
                                                                $rsSqlFemaleT = mysqli_fetch_array($sqlFemaleT);
                                                                $femaleT = $rsSqlFemaleT['max'];
                                                                if($femaleT == ''){
                                                                    $testClassSet = 'T';
                                                                    $testNumberSet = 1;
                                                                    }elseif($femaleT <= 29){
                                                                    $testClassSet = 'T';
                                                                    $testNumberSet = $femaleT+1;
                                                                //Class U
                                                                }else{
                                                                    $sqlFemaleU = mysqli_query($con, "SELECT MAX(testNumber) AS max,testClass FROM pretest WHERE testClass='U' AND pre_register_year='$cyear1'");
                                                                    $rsSqlFemaleU = mysqli_fetch_array($sqlFemaleU);
                                                                    $femaleU = $rsSqlFemaleU['max'];
                                                                    if($femaleU == ''){
                                                                        $testClassSet = 'U';
                                                                        $testNumberSet = 1;
                                                                        }elseif($femaleU <= 29){
                                                                        $testClassSet = 'U';
                                                                        $testNumberSet = $femaleU+1;
                                                                    }else{
?>
                                                                        <script>
                                                                            alert("Penuh quata");
                                                                        </script>
                                                                        <meta http-equiv="refresh" content="0; url=?page=admissions&&admissionpage=register&&id=<?= $st_id ?>">
<?php
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            $odrMax = mysqli_query($con, "SELECT MAX(odrNumber) AS odrNumber FROM pretest WHERE pre_register_year='$cyear1'");
            $rsOdr = mysqli_fetch_array($odrMax);
            $maxOdr = $rsOdr['odrNumber'];
            $odrNumber = $maxOdr+1;
            //Update pretest data table
            $PRETEST = mysqli_query($con, "UPDATE pretest SET
                                     testClass = '$testClassSet',
                                     testNumber = '$testNumberSet',
                                     payStatus = '1',
                                     odrNumber = '$odrNumber'
                                     WHERE st_id='$st_id'   
                                     ");
?>
             <script>
                alert("Pendaftaran calon mahasiswa sudah sempurna, sila print kertas peperiksaan");
             </script>
             <meta http-equiv="refresh" content="0; url=?page=admissions&&admissionpage=register&&id=<?= $st_id ?>">                                                                   
<?php                                                                        
        }
            
?>               
