<?php
        include("../../function/function.php");
        
        //Class setting
        $first = $cy; 
        $second = $cy-1;
        $third  = $cy-2;
        $fordth = $cy-3;
        
        //-------------------------------------------------------PAI-------------------------------------------------
        //PAI class 1 term 1 registered
        $pai11 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.dp_id='22' AND sr.term='1' AND s.class='$first' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $pai11Count = mysqli_num_rows($pai11);
        
        //PAI class 1 term 1 payed
        $pai11payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             INNER JOIN payments p ON sr.sr_id=p.sr_id
                             WHERE s.dp_id='22' AND sr.term='1' AND s.class='$first' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $pai11CountPayed = mysqli_num_rows($pai11payed);
        
        //PAI class 1 term 1 not pay
        $pai11notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.dp_id='22' AND sr.term='1' AND s.class='$first' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $pai11CountNotPay = mysqli_num_rows($pai11notPay);
        
        //PAI class 1 term 2 -----------------------------------------
        $pai12 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.dp_id='22' AND sr.term='2' AND s.class='$first' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $pai12Count = mysqli_num_rows($pai12);
        
        $pai12payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             INNER JOIN payments p ON sr.sr_id=p.sr_id
                             WHERE s.dp_id='22' AND sr.term='2' AND s.class='$first' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $pai12CountPayed = mysqli_num_rows($pai12payed);
        
        $pai12notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.dp_id='22' AND sr.term='2' AND s.class='$first' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $pai12CountNotPay = mysqli_num_rows($pai12notPay);
        
        //PAI class 2 term 1 payed-------------------------------------
        $pai21 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.dp_id='22' AND sr.term='1' AND s.class='$second' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $pai21Count = mysqli_num_rows($pai21);
        
        $pai21payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.dp_id='22' AND sr.term='1' AND s.class='$second' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $pai21CountPayed = mysqli_num_rows($pai21payed);
        
        $pai21notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.dp_id='22' AND sr.term='1' AND s.class='$second' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $pai21CountNotPay = mysqli_num_rows($pai21notPay);
        
        //PAI class 2 term 2------------------------------------------
        $pai22 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.dp_id='22' AND sr.term='2' AND s.class='$second' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $pai22Count = mysqli_num_rows($pai22);
        
        $pai22payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             INNER JOIN payments p ON sr.sr_id=p.sr_id
                             WHERE s.dp_id='22' AND sr.term='2' AND s.class='$second' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $pai22CountPayed = mysqli_num_rows($pai22payed);
        
        $pai22notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.dp_id='22' AND sr.term='2' AND s.class='$second' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $pai22CountNotPay = mysqli_num_rows($pai22notPay);
        
        //PAI class 3  term 1-----------------------------------------
        $pai31 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.dp_id='22' AND sr.term='1' AND s.class='$third' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $pai31Count = mysqli_num_rows($pai31);
        
        $pai31payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id                             
                            WHERE s.dp_id='22' AND sr.term='1' AND s.class='$third' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $pai31CountPayed = mysqli_num_rows($pai31payed);
        
        $pai31notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.dp_id='22' AND sr.term='1' AND s.class='$third' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $pai31CountNotPay = mysqli_num_rows($pai31notPay);
        
        //PAI class 3  term 2------------------------------------------
        $pai32 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.dp_id='22' AND sr.term='2' AND s.class='$third' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $pai32Count = mysqli_num_rows($pai32);
        
        $pai32payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.dp_id='22' AND sr.term='2' AND s.class='$third' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $pai32CountPayed = mysqli_num_rows($pai32payed);
        
        $pai32notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.dp_id='22' AND sr.term='2' AND s.class='$third' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $pai32CountNotPay = mysqli_num_rows($pai32notPay);
        
        //PAI class 4  term 1------------------------------------------
        $pai41 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.dp_id='22' AND sr.term='1' AND s.class='$fordth' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $pai41Count = mysqli_num_rows($pai41);
        
        $pai41payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.dp_id='22' AND sr.term='1' AND s.class='$fordth' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $pai41CountPayed = mysqli_num_rows($pai41payed);
        
        $pai41notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.dp_id='22' AND sr.term='1' AND s.class='$fordth' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $pai41CountNotPay = mysqli_num_rows($pai41notPay);
        
        //PAI class 4  term 2------------------------------------------
        $pai42 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.dp_id='22' AND sr.term='2' AND s.class='$fordth' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $pai42Count = mysqli_num_rows($pai42);
        
        $pai42payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.dp_id='22' AND sr.term='2' AND s.class='$fordth' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $pai42CountPayed = mysqli_num_rows($pai42payed);
        
        $pai42notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.dp_id='22' AND sr.term='2' AND s.class='$fordth' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $pai42CountNotPay = mysqli_num_rows($pai42notPay);
        
        //SUM PAI
        $sum_pai1_register = $pai11Count + $pai21Count + $pai31Count + $pai41Count;
        $sum_pai1_payed = $pai11CountPayed + $pai21CountPayed + $pai31CountPayed + $pai41CountPayed;
        $sum_pai1_notPayed = $pai11CountNotPay + $pai21CountNotPay + $pai31CountNotPay + $pai41CountNotPay;
        
        $sum_pai2_register = $pai12Count + $pai22Count + $pai32Count + $pai42Count;
        $sum_pai2_payed = $pai12CountPayed + $pai22CountPayed + $pai32CountPayed + $pai42CountPayed;
        $sum_pai2_notPayed = $pai12CountNotPay + $pai22CountNotPay + $pai32CountNotPay + $pai42CountNotPay;
        
        //-------------------------------------------------------PBSM-------------------------------------------------
        //PBSM class 1  term 1
        $pbsm11 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.dp_id='23' AND sr.term='1' AND s.class='$first' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $pbsm11Count = mysqli_num_rows($pbsm11);
        
        $pbsm11payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             INNER JOIN payments p ON sr.sr_id=p.sr_id
                             WHERE s.dp_id='23' AND sr.term='1' AND s.class='$first' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $pbsm11CountPayed = mysqli_num_rows($pbsm11payed);
        
        $pbsm11notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.dp_id='23' AND sr.term='1' AND s.class='$first' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $pbsm11CountNotPay = mysqli_num_rows($pbsm11notPay);
        
        //PBSM class 1  term 2--------------------------------------------------
        $pbsm12 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.dp_id='23' AND sr.term='2' AND s.class='$first' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $pbsm12Count = mysqli_num_rows($pbsm12);
        
        $pbsm12payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.dp_id='23' AND sr.term='2' AND s.class='$first' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $pbsm12CountPayed = mysqli_num_rows($pbsm12payed);
        
        $pbsm12notPay = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.dp_id='23' AND sr.term='2' AND s.class='$first' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $pbsm12CountNotPay = mysqli_num_rows($pbsm12notPay);
        
        //PBSM class 2  term 1--------------------------------------------------
        $pbsm21 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.dp_id='23' AND sr.term='1' AND s.class='$second' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $pbsm21Count = mysqli_num_rows($pbsm21);
        
        $pbsm21payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.dp_id='23' AND sr.term='1' AND s.class='$second' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $pbsm21CountPayed = mysqli_num_rows($pbsm21payed);
        
        $pbsm21notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.dp_id='23' AND sr.term='1' AND s.class='$second' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $pbsm21CountNotPay = mysqli_num_rows($pbsm21notPay);
        
        //PBSM class 2  term 2--------------------------------------------------
        $pbsm22 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.dp_id='23' AND sr.term='2' AND s.class='$second' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $pbsm22Count = mysqli_num_rows($pbsm22);
        
        $pbsm22payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.dp_id='23' AND sr.term='2' AND s.class='$second' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $pbsm22CountPayed = mysqli_num_rows($pbsm22payed);
        
        $pbsm22notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.dp_id='23' AND sr.term='2' AND s.class='$second' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $pbsm22CountNotPay = mysqli_num_rows($pbsm22notPay);
        
        //PBSM class 3  term 1--------------------------------------------------
        $pbsm31 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.dp_id='23' AND sr.term='1' AND s.class='$third' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $pbsm31Count = mysqli_num_rows($pbsm31);
        
        $pbsm31payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.dp_id='23' AND sr.term='1' AND s.class='$third' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $pbsm31CountPayed = mysqli_num_rows($pbsm31payed);
        
        $pbsm31notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.dp_id='23' AND sr.term='1' AND s.class='$third' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $pbsm31CountNotPay = mysqli_num_rows($pbsm31notPay);
        
        //PBSM class 3  term 2--------------------------------------------------
        $pbsm32 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.dp_id='23' AND sr.term='2' AND s.class='$third' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $pbsm32Count = mysqli_num_rows($pbsm32);
        
        $pbsm32payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.dp_id='23' AND sr.term='2' AND s.class='$third' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $pbsm32CountPayed = mysqli_num_rows($pbsm32payed);
        
        $pbsm32notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.dp_id='23' AND sr.term='2' AND s.class='$third' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $pbsm32CountNotPay = mysqli_num_rows($pbsm32notPay);
        
         //PBSM class 4  term 1-------------------------------------------------
        $pbsm41 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.dp_id='23' AND sr.term='1' AND s.class='$fordth' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $pbsm41Count = mysqli_num_rows($pbsm41);
        
        $pbsm41payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             INNER JOIN payments p ON sr.sr_id=p.sr_id
                             WHERE s.dp_id='23' AND sr.term='1' AND s.class='$fordth' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $pbsm41CountPayed = mysqli_num_rows($pbsm41payed);
        
        $pbsm41notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.dp_id='23' AND sr.term='1' AND s.class='$fordth' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $pbsm41CountNotPay = mysqli_num_rows($pbsm41notPay);
        
        //PBSM class 4  term 2--------------------------------------------------
        $pbsm42 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.dp_id='23' AND sr.term='2' AND s.class='$fordth' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $pbsm42Count = mysqli_num_rows($pbsm42);
        
        $pbsm42payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.dp_id='23' AND sr.term='2' AND s.class='$fordth' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $pbsm42CountPayed = mysqli_num_rows($pbsm42payed);
        
        $pbsm42notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.dp_id='23' AND sr.term='2' AND s.class='$fordth' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $pbsm42CountNotPay = mysqli_num_rows($pbsm42notPay);
        
        //SUM PBSM
        $sum_pbsm1_register = $pbsm11Count + $pbsm21Count + $pbsm31Count + $pbsm41Count;
        $sum_pbsm1_payed = $pbsm11CountPayed + $pbsm21CountPayed + $pbsm31CountPayed + $pbsm41CountPayed;
        $sum_pbsm1_notPayed = $pbsm11CountNotPay + $pbsm21CountNotPay + $pbsm31CountNotPay + $pbsm41CountNotPay;
        
        $sum_pbsm2_register = $pbsm12Count + $pbsm22Count + $pbsm32Count + $pbsm42Count;
        $sum_pbsm2_payed = $pbsm12CountPayed + $pbsm22CountPayed + $pbsm32CountPayed + $pbsm42CountPayed;
        $sum_pbsm2_notPayed = $pbsm12CountNotPay + $pbsm22CountNotPay + $pbsm32CountNotPay + $pbsm42CountNotPay;
        
        //-------------------------------------------------------SYARIAH-------------------------------------------------
        //SYARIAH class 1  term 1
        $sya11 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='122' AND sr.term='1' AND s.class='$first' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $sya11Count = mysqli_num_rows($sya11);
        
        $sya11payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.ft_id='122' AND sr.term='1' AND s.class='$first' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $sya11CountPayed = mysqli_num_rows($sya11payed);
        
        $sya11notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='122' AND sr.term='1' AND s.class='$first' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $sya11CountNotPay = mysqli_num_rows($sya11notPay);
        
        //SYARIAH class 1  term 2-----------------------------------------------
        $sya12 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='122' AND sr.term='2' AND s.class='$first' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $sya12Count = mysqli_num_rows($sya12);
        
        $sya12payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.ft_id='122' AND sr.term='2' AND s.class='$first' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $sya12CountPayed = mysqli_num_rows($sya12payed);
        
        $sya12notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='122' AND sr.term='2' AND s.class='$first' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $sya12CountNotPay = mysqli_num_rows($sya12notPay);
        
        //SYARIAH class 2  term 1-----------------------------------------------
        $sya21 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='122' AND sr.term='1' AND s.class='$second' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $sya21Count = mysqli_num_rows($sya21);
        
        $sya21payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.ft_id='122' AND sr.term='1' AND s.class='$second' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $sya21CountPayed = mysqli_num_rows($sya21payed);
        
        $sya21notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='122' AND sr.term='1' AND s.class='$second' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $sya21CountNotPay = mysqli_num_rows($sya21notPay);
        
        //SYARIAH class 2  term 2-----------------------------------------------
        $sya22 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='122' AND sr.term='2' AND s.class='$second' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $sya22Count = mysqli_num_rows($sya22);
        
        $sya22payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.ft_id='122' AND sr.term='2' AND s.class='$second' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $sya22CountPayed = mysqli_num_rows($sya22payed);
        
        $sya22notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='122' AND sr.term='2' AND s.class='$second' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $sya22CountNotPay = mysqli_num_rows($sya22notPay);
        
        //SYARIAH class 3  term 1-----------------------------------------------
        $sya31 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='122' AND sr.term='1' AND s.class='$third' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $sya31Count = mysqli_num_rows($sya31);
        
        $sya31payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.ft_id='122' AND sr.term='1' AND s.class='$third' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $sya31CountPayed = mysqli_num_rows($sya31payed);
        
        $sya31notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='122' AND sr.term='1' AND s.class='$third' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $sya31CountNotPay = mysqli_num_rows($sya31notPay);
        
        //SYARIAH class 3  term 2-----------------------------------------------
        $sya32 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='122' AND sr.term='2' AND s.class='$third' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $sya32Count = mysqli_num_rows($sya32);
        
        $sya32payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.ft_id='122' AND sr.term='2' AND s.class='$third' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $sya32CountPayed = mysqli_num_rows($sya32payed);
        
        $sya32notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='122' AND sr.term='2' AND s.class='$third' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $sya32CountNotPay = mysqli_num_rows($sya32notPay);
        
        //SYARIAH class 4  term 1-----------------------------------------------
        $sya41 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='122' AND sr.term='1' AND s.class='$fordth' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $sya41Count = mysqli_num_rows($sya41);
        
        $sya41payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.ft_id='122' AND sr.term='1' AND s.class='$fordth' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $sya41CountPayed = mysqli_num_rows($sya41payed);
        
        $sya41notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='122' AND sr.term='1' AND s.class='$fordth' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $sya41CountNotPay = mysqli_num_rows($sya41notPay);
        
        //SYARIAH class 4 term 2-------------------------------------------------
        $sya42 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='122' AND sr.term='2' AND s.class='$fordth' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $sya42Count = mysqli_num_rows($sya42);
        
        $sya42payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             INNER JOIN payments p ON sr.sr_id=p.sr_id
                             WHERE s.ft_id='122' AND sr.term='2' AND s.class='$fordth' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $sya42CountPayed = mysqli_num_rows($sya42payed);
        
        $sya42notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='122' AND sr.term='2' AND s.class='$fordth' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $sya42CountNotPay = mysqli_num_rows($sya42notPay);
        
        //SUM SYARIAH
        $sum_sya1_register = $sya11Count + $sya21Count + $sya31Count + $sya41Count;
        $sum_sya1_payed = $sya11CountPayed + $sya21CountPayed + $sya31CountPayed + $sya41CountPayed;
        $sum_sya1_notPayed = $sya11CountNotPay + $sya21CountNotPay + $sya31CountNotPay + $sya41CountNotPay;
        
        $sum_sya2_register = $sya12Count + $sya22Count + $sya32Count + $sya42Count;
        $sum_sya2_payed = $sya12CountPayed + $sya22CountPayed + $sya32CountPayed + $sya42CountPayed;
        $sum_sya2_notPayed = $sya12CountNotPay + $sya22CountNotPay + $sya32CountNotPay + $sya42CountNotPay;
        
        //-------------------------------------------------------USULUDDIN-------------------------------------------------
        //USULUDDIN class 1  term 1
        $usu11 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='123' AND sr.term='1' AND s.class='$first' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $usu11Count = mysqli_num_rows($usu11);
        
        $usu11payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.ft_id='123' AND sr.term='1' AND s.class='$first' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $usu11CountPayed = mysqli_num_rows($usu11payed);
        
        $usu11notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='123' AND sr.term='1' AND s.class='$first' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $usu11CountNotPay = mysqli_num_rows($usu11notPay);
        
        //USULUDDIN class 1  term 2---------------------------------------------
        $usu12 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='123' AND sr.term='2' AND s.class='$first' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $usu12Count = mysqli_num_rows($usu12);
        
        $usu12payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.ft_id='123' AND sr.term='2' AND s.class='$first' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $usu12CountPayed = mysqli_num_rows($usu12payed);
        
        $usu12notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='123' AND sr.term='2' AND s.class='$first' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $usu12CountNotPay = mysqli_num_rows($usu12notPay);
        
        //USULUDDIN class 2  term 1---------------------------------------------
        $usu21 = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.ft_id='123' AND sr.term='1' AND s.class='$second' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $usu21Count = mysqli_num_rows($usu21);
        
        $usu21payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.ft_id='123' AND sr.term='1' AND s.class='$second' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $usu21CountPayed = mysqli_num_rows($usu21payed);
        
        $usu21notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='123' AND sr.term='1' AND s.class='$second' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $usu21CountNotPay = mysqli_num_rows($usu21notPay);
        
        //USULUDDIN class 2  term 2---------------------------------------------
        $usu22 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='123' AND sr.term='2' AND s.class='$second' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $usu22Count = mysqli_num_rows($usu22);
        
        $usu22payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.ft_id='123' AND sr.term='2' AND s.class='$second' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $usu22CountPayed = mysqli_num_rows($usu22payed);
        
        $usu22notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='123' AND sr.term='2' AND s.class='$second' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $usu22CountNotPay = mysqli_num_rows($usu22notPay);
                
        //USULUDDIN class 3  term 1---------------------------------------------
        $usu31 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='123' AND sr.term='1' AND s.class='$third' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $usu31Count = mysqli_num_rows($usu31);
        
        $usu31payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.ft_id='123' AND sr.term='1' AND s.class='$third' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $usu31CountPayed = mysqli_num_rows($usu31payed);
        
        $usu31notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='123' AND sr.term='1' AND s.class='$third' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $usu31CountNotPay = mysqli_num_rows($usu31notPay);
        
        //USULUDDIN class 3  term 2---------------------------------------------
        $usu32 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='123' AND sr.term='2' AND s.class='$third' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $usu32Count = mysqli_num_rows($usu32);
        
        $usu32payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.ft_id='123' AND sr.term='2' AND s.class='$third' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $usu32CountPayed = mysqli_num_rows($usu32payed);
        
        $usu32notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='123' AND sr.term='2' AND s.class='$third' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $usu32CountNotPay = mysqli_num_rows($usu32notPay);
                
        //USULUDDIN class 4  term 1
        $usu41 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='123' AND sr.term='1' AND s.class='$fordth' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $usu41Count = mysqli_num_rows($usu41);
        
        $usu41payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             INNER JOIN payments p ON sr.sr_id=p.sr_id
                             WHERE s.ft_id='123' AND sr.term='1' AND s.class='$fordth' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $usu41CountPayed = mysqli_num_rows($usu41payed);
        
        $usu41notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='123' AND sr.term='1' AND s.class='$fordth' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $usu41CountNotPay = mysqli_num_rows($usu41notPay);
        
        //USULUDDIN class 4  term 2
        $usu42 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='123' AND sr.term='2' AND s.class='$fordth' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $usu42Count = mysqli_num_rows($usu42);
        
        $usu42payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.ft_id='123' AND sr.term='2' AND s.class='$fordth' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $usu42CountPayed = mysqli_num_rows($usu42payed);
        
        $usu42notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='123' AND sr.term='2' AND s.class='$fordth' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $usu42CountNotPay = mysqli_num_rows($usu42notPay);
        
        //SUM USULUDDIN
        $sum_usu1_register = $usu11Count + $usu21Count + $usu31Count + $usu41Count;
        $sum_usu1_payed = $usu11CountPayed + $usu21CountPayed + $usu31CountPayed + $usu41CountPayed;
        $sum_usu1_notPayed = $usu11CountNotPay + $usu21CountNotPay + $usu31CountNotPay + $usu41CountNotPay;
        
        $sum_usu2_register = $usu12Count + $usu22Count + $usu32Count + $usu42Count;
        $sum_usu2_payed = $usu12CountPayed + $usu22CountPayed + $usu32CountPayed + $usu42CountPayed;
        $sum_usu2_notPayed = $usu12CountNotPay + $usu22CountNotPay + $usu32CountNotPay + $usu42CountNotPay;
       
        //-------------------------------------------------------DIRASAT-------------------------------------------------
        //DIRASAT class 1  term 1
        $dir11 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='124' AND sr.term='1' AND s.class='$first' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $dir11Count = mysqli_num_rows($dir11);
        
        $dir11payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.ft_id='124' AND sr.term='1' AND s.class='$first' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $dir11CountPayed = mysqli_num_rows($dir11payed);
        
        $dir11notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='124' AND sr.term='1' AND s.class='$first' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $dir11CountNotPay = mysqli_num_rows($dir11notPay);
        
        //DIRASAT class 1  term 2-----------------------------------------------
        $dir12 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='124' AND sr.term='2' AND s.class='$first' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $dir12Count = mysqli_num_rows($dir12);
        
        $dir12payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.ft_id='124' AND sr.term='2' AND s.class='$first' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $dir12CountPayed = mysqli_num_rows($dir12payed);
        
        $dir12notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='124' AND sr.term='2' AND s.class='$first' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $dir12CountNotPay = mysqli_num_rows($dir12notPay);
        
        //DIRASAT class 2  term 1-----------------------------------------------
        $dir21 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='124' AND sr.term='1' AND s.class='$second' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $dir21Count = mysqli_num_rows($dir21);
        
        $dir21payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.ft_id='124' AND sr.term='1' AND s.class='$second' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $dir21CountPayed = mysqli_num_rows($dir21payed);
        
        $dir21notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='124' AND sr.term='1' AND s.class='$second' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $dir21CountNotPay = mysqli_num_rows($dir21notPay);
        
        //DIRASAT class 2  term 2-----------------------------------------------
        $dir22 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='124' AND sr.term='2' AND s.class='$second' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $dir22Count = mysqli_num_rows($dir22);
        
        $dir22payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.ft_id='124' AND sr.term='2' AND s.class='$second' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $dir22CountPayed = mysqli_num_rows($dir22payed);
        
        $dir22notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='124' AND sr.term='2' AND s.class='$second' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $dir22CountNotPay = mysqli_num_rows($dir22notPay);
        
        //DIRASAT class 3  term 1-----------------------------------------------
        $dir31 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='124' AND sr.term='1' AND s.class='$third' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $dir31Count = mysqli_num_rows($dir31);
        
        $dir31payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             INNER JOIN payments p ON sr.sr_id=p.sr_id
                             WHERE s.ft_id='124' AND sr.term='1' AND s.class='$third' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $dir31CountPayed = mysqli_num_rows($dir31payed);
        
        $dir31notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='124' AND sr.term='1' AND s.class='$third' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $dir31CountNotPay = mysqli_num_rows($dir31notPay);
        
        //DIRASAT class 3  term 2-----------------------------------------------
        $dir32 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='124' AND sr.term='2' AND s.class='$third' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $dir32Count = mysqli_num_rows($dir32);
        
        $dir32payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             INNER JOIN payments p ON sr.sr_id=p.sr_id
                             WHERE s.ft_id='124' AND sr.term='2' AND s.class='$third' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $dir32CountPayed = mysqli_num_rows($dir32payed);
        
        $dir32notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='124' AND sr.term='2' AND s.class='$third' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $dir32CountNotPay = mysqli_num_rows($dir32notPay);
        
        //DIRASAT class 4  term 1-----------------------------------------------
        $dir41 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='124' AND sr.term='1' AND s.class='$fordth' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $dir41Count = mysqli_num_rows($dir41);
        
        $dir41payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.ft_id='124' AND sr.term='1' AND s.class='$fordth' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $dir41CountPayed = mysqli_num_rows($dir41payed);
        
        $dir41notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='124' AND sr.term='1' AND s.class='$fordth' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $dir41CountNotPay = mysqli_num_rows($dir41notPay);
        
        //DIRASAT class 4  term 2-----------------------------------------------
        $dir42 = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='124' AND sr.term='2' AND s.class='$fordth' AND sr.academic_year='$cy' AND s.program='0'
                             ");
        $dir42Count = mysqli_num_rows($dir42);
        
        $dir42payed = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                            INNER JOIN payments p ON sr.sr_id=p.sr_id 
                            WHERE s.ft_id='124' AND sr.term='2' AND s.class='$fordth' AND sr.academic_year='$cy' AND (sr.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $dir42CountPayed = mysqli_num_rows($dir42payed);
        
        $dir42notPay = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id
                             WHERE s.ft_id='124' AND sr.term='2' AND s.class='$fordth' AND sr.academic_year='$cy' AND (sr.pay_status='BELUM LUNAS' OR sr.pay_status='Belum bayar') AND s.program='0'
                             ");
        $dir42CountNotPay = mysqli_num_rows($dir42notPay);
        
        //SUM DIRASAT
        $sum_dir1_register = $dir11Count + $dir21Count + $dir31Count + $dir41Count;
        $sum_dir1_payed = $dir11CountPayed + $dir21CountPayed + $dir31CountPayed + $dir41CountPayed;
        $sum_dir1_notPayed = $dir11CountNotPay + $dir21CountNotPay + $dir31CountNotPay + $dir41CountNotPay;
        
        $sum_dir2_register = $dir12Count + $dir22Count + $dir32Count + $dir42Count;
        $sum_dir2_payed = $dir12CountPayed + $dir22CountPayed + $dir32CountPayed + $dir42CountPayed;
        $sum_dir2_notPayed = $dir12CountNotPay + $dir22CountNotPay + $dir32CountNotPay + $dir42CountNotPay;

        //Exam report
        //-------------------------------------------------------PAI-------------------------------------------------
        //PAI class 1 term 1 registered
        $exam_pai11 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='1' AND s.class='$first' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_pai11Count = mysqli_num_rows($exam_pai11);
        
        //PAI class 1 term 1 payed
        $exam_pai11payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='1' AND s.class='$first' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_pai11CountPayed = mysqli_num_rows($exam_pai11payed);
        
        //PAI class 1 term 1 not pay
        $exam_pai11notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='1' AND s.class='$first' AND srx.year='$cy' AND (srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_pai11CountNotPay = mysqli_num_rows($exam_pai11notPay);
        
        //PAI class 1 term 2 -----------------------------------------
        $exam_pai12 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='2' AND s.class='$first' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_pai12Count = mysqli_num_rows($exam_pai12);
        
        $exam_pai12payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='2' AND s.class='$first' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_pai12CountPayed = mysqli_num_rows($exam_pai12payed);
        
        $exam_pai12notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='2' AND s.class='$first' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS') AND s.program='0'
                             ");
        $exam_pai12CountNotPay = mysqli_num_rows($exam_pai12notPay);
        
        //PAI class 2 term 1 payed-------------------------------------
        $exam_pai21 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='1' AND s.class='$second' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_pai21Count = mysqli_num_rows($exam_pai21);
        
        $exam_pai21payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='1' AND s.class='$second' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_pai21CountPayed = mysqli_num_rows($exam_pai21payed);
        
        $exam_pai21notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='1' AND s.class='$second' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_pai21countNotPay = mysqli_num_rows($exam_pai21notPay);
        
        //PAI class 2 term 2------------------------------------------
        $exam_pai22 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='2' AND s.class='$second' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_pai22Count = mysqli_num_rows($exam_pai22);
        
        $exam_pai22payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='2' AND s.class='$second' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_pai22CountPayed = mysqli_num_rows($exam_pai22payed);
        
        $exam_pai22notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='2' AND s.class='$second' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_pai22CountNotPay = mysqli_num_rows($exam_pai22notPay);
        
        //PAI class 3  term 1-----------------------------------------
        $exam_pai31 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='1' AND s.class='$third' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_pai31Count = mysqli_num_rows($exam_pai31);
        
        $exam_pai31payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='1' AND s.class='$third' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_pai31CountPayed = mysqli_num_rows($exam_pai31payed);
        
        $exam_pai31notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='1' AND s.class='$third' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_pai31CountNotPay = mysqli_num_rows($exam_pai31notPay);
        
        //PAI class 3  term 2------------------------------------------
        $exam_pai32 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='2' AND s.class='$third' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_pai32Count = mysqli_num_rows($exam_pai32);
        
        $exam_pai32payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='2' AND s.class='$third' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_pai32CountPayed = mysqli_num_rows($exam_pai32payed);
        
        $exam_pai32notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='2' AND s.class='$third' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_pai32CountNotPay = mysqli_num_rows($exam_pai32notPay);
        
        //PAI class 4  term 1------------------------------------------
        $exam_pai41 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='1' AND s.class='$fordth' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_pai41Count = mysqli_num_rows($exam_pai41);
        
        $exam_pai41payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='1' AND s.class='$fordth' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_pai41CountPayed = mysqli_num_rows($exam_pai41payed);
        
        $exam_pai41notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='1' AND s.class='$fordth' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_pai41CountNotPay = mysqli_num_rows($exam_pai41notPay);
        
        //PAI class 4  term 2------------------------------------------
        $exam_pai42 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='2' AND s.class='$fordth' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_pai42Count = mysqli_num_rows($exam_pai42);
        
        $exam_pai42payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='2' AND s.class='$fordth' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_pai42CountPayed = mysqli_num_rows($exam_pai42payed);
        
        $exam_pai42notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='2' AND s.class='$fordth' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_pai42CountNotPay = mysqli_num_rows($exam_pai42notPay);
        
        //SUM PAI
        $sumExam_pai1_register = $exam_pai11Count + $exam_pai21Count + $exam_pai31Count + $exam_pai41Count;
        $sumExam_pai1_payed = $exam_pai11CountPayed + $exam_pai21CountPayed + $exam_pai31CountPayed + $exam_pai41CountPayed;
        $sumExam_pai1_notPayed = $exam_pai11CountNotPay + $exam_pai21countNotPay + $exam_pai31CountNotPay + $exam_pai41CountNotPay;
        
        $sumExam_pai2_register = $exam_pai12Count + $exam_pai22Count + $exam_pai32Count + $exam_pai42Count;
        $sumExam_pai2_payed = $exam_pai12CountPayed + $exam_pai22CountPayed + $exam_pai32CountPayed + $exam_pai42CountPayed;
        $sumExam_pai2_notPayed = $exam_pai12CountNotPay + $exam_pai22CountNotPay + $exam_pai32CountNotPay + $exam_pai42CountNotPay;
        
        //-------------------------------------------------------PBSM-------------------------------------------------
        //PBSM class 1  term 1
        $exam_pbsm11 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='1' AND s.class='$first' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_pbsm11Count = mysqli_num_rows($exam_pbsm11);
        
        $exam_pbsm11payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='1' AND s.class='$first' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_pbsm11CountPayed = mysqli_num_rows($exam_pbsm11payed);
        
        $exam_pbsm11notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='1' AND s.class='$first' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_pbsm11CountNotPay = mysqli_num_rows($exam_pbsm11notPay);
        
        //PBSM class 1  term 2--------------------------------------------------
        $exam_pbsm12 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='2' AND s.class='$first' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_pbsm12Count = mysqli_num_rows($exam_pbsm12);
        
        $exam_pbsm12payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='2' AND s.class='$first' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_pbsm12CountPayed = mysqli_num_rows($exam_pbsm12payed);
        
        $exam_pbsm12notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='2' AND s.class='$first' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_pbsm12CountNotPay = mysqli_num_rows($exam_pbsm12notPay);
        
        //PBSM class 2  term 1--------------------------------------------------
        $exam_pbsm21 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='1' AND s.class='$second' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_pbsm21Count = mysqli_num_rows($exam_pbsm21);
        
        $exam_pbsm21payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='1' AND s.class='$second' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_pbsm21CountPayed = mysqli_num_rows($exam_pbsm21payed);
        
        $exam_pbsm21notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='1' AND s.class='$second' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_pbsm21CountNotPay = mysqli_num_rows($exam_pbsm21notPay);
        
        //PBSM class 2  term 2--------------------------------------------------
        $exam_pbsm22 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='2' AND s.class='$second' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_pbsm22Count = mysqli_num_rows($exam_pbsm22);
        
        $exam_pbsm22payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='2' AND s.class='$second' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_pbsm22CountPayed = mysqli_num_rows($exam_pbsm22payed);
        
        $exam_pbsm22notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='2' AND s.class='$second' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_pbsm22CountNotPay = mysqli_num_rows($exam_pbsm22notPay);
        
        //PBSM class 3  term 1--------------------------------------------------
        $exam_pbsm31 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='1' AND s.class='$third' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_pbsm31Count = mysqli_num_rows($exam_pbsm31);
        
        $exam_pbsm31payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='1' AND s.class='$third' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_pbsm31CountPayed = mysqli_num_rows($exam_pbsm31payed);
        
        $exam_pbsm31notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='1' AND s.class='$third' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_pbsm31CountNotPay = mysqli_num_rows($exam_pbsm31notPay);
        
        //PBSM class 3  term 2--------------------------------------------------
        $exam_pbsm32 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='2' AND s.class='$third' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_pbsm32Count = mysqli_num_rows($exam_pbsm32);
        
        $exam_pbsm32payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='2' AND s.class='$third' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_pbsm32CountPayed = mysqli_num_rows($exam_pbsm32payed);
        
        $exam_pbsm32notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='2' AND s.class='$third' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_pbsm32CountNotPay = mysqli_num_rows($exam_pbsm32notPay);
        
         //PBSM class 4  term 1-------------------------------------------------
        $exam_pbsm41 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='1' AND s.class='$fordth' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_pbsm41Count = mysqli_num_rows($exam_pbsm41);
        
        $exam_pbsm41payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='1' AND s.class='$fordth' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_pbsm41CountPayed = mysqli_num_rows($exam_pbsm41payed);
        
        $exam_pbsm41notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='1' AND s.class='$fordth' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_pbsm41CountNotPay = mysqli_num_rows($exam_pbsm41notPay);
        
        //PBSM class 4  term 2--------------------------------------------------
        $exam_pbsm42 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='2' AND s.class='$fordth' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_pbsm42Count = mysqli_num_rows($exam_pbsm42);
        
        $exam_pbsm42payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='2' AND s.class='$fordth' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_pbsm42CountPayed = mysqli_num_rows($exam_pbsm42payed);
        
        $exam_pbsm42notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='2' AND s.class='$fordth' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_pbsm42CountNotPay = mysqli_num_rows($exam_pbsm42notPay);
        
        //SUM PBSM
        $sumExam_pbsm1_register = $exam_pbsm11Count + $exam_pbsm21Count + $exam_pbsm31Count + $exam_pbsm41Count;
        $sumExam_pbsm1_payed = $exam_pbsm11CountPayed + $exam_pbsm21CountPayed + $exam_pbsm31CountPayed + $exam_pbsm41CountPayed;
        $sumExam_pbsm1_notPayed = $exam_pbsm11CountNotPay + $exam_pbsm21CountNotPay + $exam_pbsm31CountNotPay + $exam_pbsm41CountNotPay;
        
        $sumExam_pbsm2_register = $exam_pbsm12Count + $exam_pbsm22Count + $exam_pbsm32Count + $exam_pbsm42Count;
        $sumExam_pbsm2_payed = $exam_pbsm12CountPayed + $exam_pbsm22CountPayed + $exam_pbsm32CountPayed + $exam_pbsm42CountPayed;
        $sumExam_pbsm2_notPayed = $exam_pbsm12CountNotPay + $exam_pbsm22CountNotPay + $exam_pbsm32CountNotPay + $exam_pbsm42CountNotPay;
        
        //-------------------------------------------------------SYARIAH-------------------------------------------------
        //SYARIAH class 1  term 1
        $exam_sya11 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='1' AND s.class='$first' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_sya11Count = mysqli_num_rows($exam_sya11);
        
        $exam_sya11payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='1' AND s.class='$first' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_sya11CountPayed = mysqli_num_rows($exam_sya11payed);
        
        $exam_sya11notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='1' AND s.class='$first' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_sya11CountNotPay = mysqli_num_rows($exam_sya11notPay);
        
        //SYARIAH class 1  term 2-----------------------------------------------
        $exam_sya12 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='2' AND s.class='$first' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_sya12Count = mysqli_num_rows($exam_sya12);
        
        $exam_sya12payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='2' AND s.class='$first' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_sya12CountPayed = mysqli_num_rows($exam_sya12payed);
        
        $exam_sya12notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='2' AND s.class='$first' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_sya12CountNotPay = mysqli_num_rows($exam_sya12notPay);
        
        //SYARIAH class 2  term 1-----------------------------------------------
        $exam_sya21 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='1' AND s.class='$second' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_sya21Count = mysqli_num_rows($exam_sya21);
        
        $exam_sya21payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='1' AND s.class='$second' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_sya21CountPayed = mysqli_num_rows($exam_sya21payed);
        
        $exam_sya21notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='1' AND s.class='$second' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_sya21CountNotPay = mysqli_num_rows($exam_sya21notPay);
        
        //SYARIAH class 2  term 2-----------------------------------------------
        $exam_sya22 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='2' AND s.class='$second' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_sya22Count = mysqli_num_rows($exam_sya22);
        
        $exam_sya22payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='2' AND s.class='$second' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_sya22CountPayed = mysqli_num_rows($exam_sya22payed);
        
        $exam_sya22notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='2' AND s.class='$second' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_sya22CountNotPay = mysqli_num_rows($exam_sya22notPay);
        
        //SYARIAH class 3  term 1-----------------------------------------------
        $exam_sya31 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='1' AND s.class='$third' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_sya31Count = mysqli_num_rows($exam_sya31);
        
        $exam_sya31payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='1' AND s.class='$third' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_sya31CountPayed = mysqli_num_rows($exam_sya31payed);
        
        $exam_sya31notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='1' AND s.class='$third' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_sya31CountNotPay = mysqli_num_rows($exam_sya31notPay);
        
        //SYARIAH class 3  term 2-----------------------------------------------
        $exam_sya32 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='2' AND s.class='$third' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_sya32Count = mysqli_num_rows($exam_sya32);
        
        $exam_sya32payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='2' AND s.class='$third' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_sya32CountPayed = mysqli_num_rows($exam_sya32payed);
        
        $exam_sya32notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='2' AND s.class='$third' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_sya32CountNotPay = mysqli_num_rows($exam_sya32notPay);
        
        //SYARIAH class 4  term 1-----------------------------------------------
        $exam_sya41 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='1' AND s.class='$fordth' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_sya41Count = mysqli_num_rows($exam_sya41);
        
        $exam_sya41payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='1' AND s.class='$fordth' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_sya41CountPayed = mysqli_num_rows($exam_sya41payed);
        
        $exam_sya41notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='1' AND s.class='$fordth' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_sya41CountNotPay = mysqli_num_rows($exam_sya41notPay);
        
        //SYARIAH class 4 term 2-------------------------------------------------
        $exam_sya42 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='2' AND s.class='$fordth' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_sya42Count = mysqli_num_rows($exam_sya42);
        
        $exam_sya42payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='2' AND s.class='$fordth' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_sya42CountPayed = mysqli_num_rows($exam_sya42payed);
        
        $exam_sya42notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='2' AND s.class='$fordth' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_sya42CountNotPay = mysqli_num_rows($exam_sya42notPay);
        
        //SUM SYARIAH
        $sumExam_sya1_register = $exam_sya11Count + $exam_sya21Count + $exam_sya31Count + $exam_sya41Count;
        $sumExam_sya1_payed = $exam_sya11CountPayed + $exam_sya21CountPayed + $exam_sya31CountPayed + $exam_sya41CountPayed;
        $sumExam_sya1_notPayed = $exam_sya11CountNotPay + $exam_sya21CountNotPay + $exam_sya31CountNotPay + $exam_sya41CountNotPay;
        
        $sumExam_sya2_register = $exam_sya12Count + $exam_sya22Count + $exam_sya32Count + $exam_sya42Count;
        $sumExam_sya2_payed = $exam_sya12CountPayed + $exam_sya22CountPayed + $exam_sya32CountPayed + $exam_sya42CountPayed;
        $sumExam_sya2_notPayed = $exam_sya12CountNotPay + $exam_sya22CountNotPay + $exam_sya32CountNotPay + $exam_sya42CountNotPay;
        
        //-------------------------------------------------------USULUDDIN-------------------------------------------------
        //USULUDDIN class 1  term 1
        $exam_usu11 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='1' AND s.class='$first' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_usu11Count = mysqli_num_rows($exam_usu11);
        
        $exam_usu11payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='1' AND s.class='$first' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_usu11CountPayed = mysqli_num_rows($exam_usu11payed);
        
        $exam_usu11notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='1' AND s.class='$first' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_usu11CountNotPay = mysqli_num_rows($exam_usu11notPay);
        
        //USULUDDIN class 1  term 2---------------------------------------------
        $exam_usu12 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='2' AND s.class='$first' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_usu12Count = mysqli_num_rows($exam_usu12);
        
        $exam_usu12payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='2' AND s.class='$first' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_usu12CountPayed = mysqli_num_rows($exam_usu12payed);
        
        $exam_usu12notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='2' AND s.class='$first' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_usu12CountNotPay = mysqli_num_rows($exam_usu12notPay);
        
        //USULUDDIN class 2  term 1---------------------------------------------
        $exam_usu21 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='1' AND s.class='$second' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_usu21Count = mysqli_num_rows($exam_usu21);
        
        $exam_usu21payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='1' AND s.class='$second' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_usu21CountPayed = mysqli_num_rows($exam_usu21payed);
        
        $exam_usu21notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='1' AND s.class='$second' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_usu21CountNotPay = mysqli_num_rows($exam_usu21notPay);
        
        //USULUDDIN class 2  term 2---------------------------------------------
        $exam_usu22 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='2' AND s.class='$second' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_usu22Count = mysqli_num_rows($exam_usu22);
        
        $exam_usu22payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='2' AND s.class='$second' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_usu22CountPayed = mysqli_num_rows($exam_usu22payed);
        
        $exam_usu22notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='2' AND s.class='$second' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_usu22CountNotPay = mysqli_num_rows($exam_usu22notPay);
                
        //USULUDDIN class 3  term 1---------------------------------------------
        $exam_usu31 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='1' AND s.class='$third' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_usu31Count = mysqli_num_rows($exam_usu31);
        
        $exam_usu31payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='1' AND s.class='$third' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_usu31CountPayed = mysqli_num_rows($exam_usu31payed);
        
        $exam_usu31notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='1' AND s.class='$third' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_usu31CountNotPay = mysqli_num_rows($exam_usu31notPay);
        
        //USULUDDIN class 3  term 2---------------------------------------------
        $exam_usu32 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='2' AND s.class='$third' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_usu32Count = mysqli_num_rows($exam_usu32);
        
        $exam_usu32payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='2' AND s.class='$third' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_usu32CountPayed = mysqli_num_rows($exam_usu32payed);
        
        $exam_usu32notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='2' AND s.class='$third' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_usu32CountNotPay = mysqli_num_rows($exam_usu32notPay);
                
        //USULUDDIN class 4  term 1
        $exam_usu41 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='1' AND s.class='$fordth' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_usu41Count = mysqli_num_rows($exam_usu41);
        
        $exam_usu41payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='1' AND s.class='$fordth' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_usu41CountPayed = mysqli_num_rows($exam_usu41payed);
        
        $exam_usu41notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='1' AND s.class='$fordth' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_usu41CountNotPay = mysqli_num_rows($exam_usu41notPay);
        
        //USULUDDIN class 4  term 2
        $exam_usu42 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='2' AND s.class='$fordth' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_usu42Count = mysqli_num_rows($exam_usu42);
        
        $exam_usu42payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='2' AND s.class='$fordth' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_usu42CountPayed = mysqli_num_rows($exam_usu42payed);
        
        $exam_usu42notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='2' AND s.class='$fordth' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_usu42CountNotPay = mysqli_num_rows($exam_usu42notPay);
        
        //SUM USULUDDIN
        $sumExam_usu1_register = $exam_usu11Count + $exam_usu21Count + $exam_usu31Count + $exam_usu41Count;
        $sumExam_usu1_payed = $exam_usu11CountPayed + $exam_usu21CountPayed + $exam_usu31CountPayed + $exam_usu41CountPayed;
        $sumExam_usu1_notPayed = $exam_usu11CountNotPay + $exam_usu21CountNotPay + $exam_usu31CountNotPay + $exam_usu41CountNotPay;
        
        $sumExam_usu2_register = $exam_usu12Count + $exam_usu22Count + $exam_usu32Count + $exam_usu42Count;
        $sumExam_usu2_payed = $exam_usu12CountPayed + $exam_usu22CountPayed + $exam_usu32CountPayed + $exam_usu42CountPayed;
        $sumExam_usu2_notPayed = $exam_usu12CountNotPay + $exam_usu22CountNotPay + $exam_usu32CountNotPay + $exam_usu42CountNotPay;
       
        //-------------------------------------------------------DIRASAT-------------------------------------------------
        //DIRASAT class 1  term 1
        $exam_dir11 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='1' AND s.class='$first' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_dir11Count = mysqli_num_rows($exam_dir11);
        
        $exam_dir11payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='1' AND s.class='$first' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_dir11CountPayed = mysqli_num_rows($exam_dir11payed);
        
        $exam_dir11notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='1' AND s.class='$first' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_dir11CountNotPay = mysqli_num_rows($exam_dir11notPay);
        
        //DIRASAT class 1  term 2-----------------------------------------------
        $exam_dir12 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='2' AND s.class='$first' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_dir12Count = mysqli_num_rows($exam_dir12);
        
        $exam_dir12payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='2' AND s.class='$first' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_dir12CountPayed = mysqli_num_rows($exam_dir12payed);
        
        $exam_dir12notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='2' AND s.class='$first' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_dir12CountNotPay = mysqli_num_rows($exam_dir12notPay);
        
        //DIRASAT class 2  term 1-----------------------------------------------
        $exam_dir21 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='1' AND s.class='$second' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_dir21Count = mysqli_num_rows($exam_dir21);
        
        $exam_dir21payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='1' AND s.class='$second' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_dir21CountPayed = mysqli_num_rows($exam_dir21payed);
        
        $exam_dir21notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='1' AND s.class='$second' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_dir21CountNotPay = mysqli_num_rows($exam_dir21notPay);
        
        //DIRASAT class 2  term 2-----------------------------------------------
        $exam_dir22 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='2' AND s.class='$second' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_dir22Count = mysqli_num_rows($exam_dir22);
        
        $exam_dir22payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='2' AND s.class='$second' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_dir22CountPayed = mysqli_num_rows($exam_dir22payed);
        
        $exam_dir22notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='2' AND s.class='$second' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_dir22CountNotPay = mysqli_num_rows($exam_dir22notPay);
        
        //DIRASAT class 3  term 1-----------------------------------------------
        $exam_dir31 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='1' AND s.class='$third' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_dir31Count = mysqli_num_rows($exam_dir31);
        
        $exam_dir31payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='1' AND s.class='$third' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_dir31CountPayed = mysqli_num_rows($exam_dir31payed);
        
        $exam_dir31notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='1' AND s.class='$third' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_dir31CountNotPay = mysqli_num_rows($exam_dir31notPay);
        
        //DIRASAT class 3  term 2-----------------------------------------------
        $exam_dir32 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='2' AND s.class='$third' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_dir32Count = mysqli_num_rows($exam_dir32);
        
        $exam_dir32payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='2' AND s.class='$third' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_dir32CountPayed = mysqli_num_rows($exam_dir32payed);
        
        $exam_dir32notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='2' AND s.class='$third' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_dir32CountNotPay = mysqli_num_rows($exam_dir32notPay);
        
        //DIRASAT class 4  term 1-----------------------------------------------
        $exam_dir41 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='1' AND s.class='$fordth' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_dir41Count = mysqli_num_rows($exam_dir41);
        
        $exam_dir41payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='1' AND s.class='$fordth' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_dir41CountPayed = mysqli_num_rows($exam_dir41payed);
        
        $exam_dir41notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='1' AND s.class='$fordth' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_dir41CountNotPay = mysqli_num_rows($exam_dir41notPay);
        
        //DIRASAT class 4  term 2-----------------------------------------------
        $exam_dir42 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='2' AND s.class='$fordth' AND srx.year='$cy' AND s.program='0'
                             ");
        $exam_dir42Count = mysqli_num_rows($exam_dir42);
        
        $exam_dir42payed = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='2' AND s.class='$fordth' AND srx.year='$cy' AND (srx.pay_status='SUDAH LUNAS') AND s.program='0'
                             ");
        $exam_dir42CountPayed = mysqli_num_rows($exam_dir42payed);
        
        $exam_dir42notPay = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='2' AND s.class='$fordth' AND srx.year='$cy' AND (srx.pay_status='BELUM LUNAS' or srx.pay_status='Belum bayar') AND s.program='0'
                             ");
        $exam_dir42CountNotPay = mysqli_num_rows($exam_dir42notPay);
        
        //SUM DIRASAT
        $sumExam_dir1_register = $exam_dir11Count + $exam_dir21Count + $exam_dir31Count + $exam_dir41Count;
        $sumExam_dir1_payed = $exam_dir11CountPayed + $exam_dir21CountPayed + $exam_dir31CountPayed + $exam_dir41CountPayed;
        $sumExam_dir1_notPayed = $exam_dir11CountNotPay + $exam_dir21CountNotPay + $exam_dir31CountNotPay + $exam_dir41CountNotPay;
        
        $sumExam_dir2_register = $exam_dir12Count + $exam_dir22Count + $exam_dir32Count + $exam_dir42Count;
        $sumExam_dir2_payed = $exam_dir12CountPayed + $exam_dir22CountPayed + $exam_dir32CountPayed + $exam_dir42CountPayed;
        $sumExam_dir2_notPayed = $exam_dir12CountNotPay + $exam_dir22CountNotPay + $exam_dir32CountNotPay + $exam_dir42CountNotPay;

        //SUM MONEY ALL FACULTY
        $totalMoney1 = mysqli_query($con, "SELECT sum(p.money) AS totalMoney,sr.*,p.*,s.* FROM student_register sr
                                   INNER JOIN payments p ON sr.sr_id=p.sr_id 
                                   INNER JOIN students s ON sr.st_id=s.st_id
                                   WHERE sr.academic_year='$cy' AND sr.term='1' AND s.program='0'
                                   ");
        $rowTotalMoney1 = mysqli_fetch_array($totalMoney1);
        $resultTotalMoney1 = $rowTotalMoney1['totalMoney'];
        
        $totalMoney2 = mysqli_query($con, "SELECT sum(p.money) AS totalMoney,sr.*,p.*,s.* FROM student_register sr
                                   INNER JOIN payments p ON sr.sr_id=p.sr_id 
                                   INNER JOIN students s ON sr.st_id=s.st_id
                                   WHERE sr.academic_year='$cy' AND sr.term='2' AND s.program='0'
                                   ");
        $rowTotalMoney2 = mysqli_fetch_array($totalMoney2);
        $resultTotalMoney2 = $rowTotalMoney2['totalMoney'];
?>
