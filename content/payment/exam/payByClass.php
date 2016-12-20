    <?php
        include("../../function/function.php");
        
        //Class setting
        $first = $cy; 
        $second = $cy-1;
        $third  = $cy-2;
        $fordth = $cy-3;
        
        //-------------------------------------------------------PAI-------------------------------------------------
        //PAI class 1 term 1 
        $pai11 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='1' AND s.class='$first' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $pai11Count = mysqli_num_rows($pai11);
        
        //PAI class 1 term 2
        $pai12 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='2' AND s.class='$first' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $pai12Count = mysqli_num_rows($pai12);
        
        //PAI class 2 term 1 
        $pai21 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='1' AND s.class='$second' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $pai21Count = mysqli_num_rows($pai21);
        
        //PAI class 2 term 2
        $pai22 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='2' AND s.class='$second' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $pai22Count = mysqli_num_rows($pai22);
        
        //PAI class 3  term 1
        $pai31 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='1' AND s.class='$third' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $pai31Count = mysqli_num_rows($pai31);
        
        //PAI class 3  term 2
        $pai32 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='2' AND s.class='$third' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $pai32Count = mysqli_num_rows($pai32);
        
        //PAI class 4  term 1
        $pai41 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='1' AND s.class='$fordth' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $pai41Count = mysqli_num_rows($pai41);
        
        //PAI class 4  term 2
        $pai42 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='22' AND srx.term='2' AND s.class='$fordth' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $pai42Count = mysqli_num_rows($pai42);
        
        //-------------------------------------------------------PBSM-------------------------------------------------
        //PBSM class 1  term 1
        $pbsm11 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='1' AND s.class='$first' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $pbsm11Count = mysqli_num_rows($pbsm11);
        
        //PBSM class 1  term 2
        $pbsm12 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='2' AND s.class='$first' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $pbsm12Count = mysqli_num_rows($pbsm12);
        
        //PBSM class 2  term 1
        $pbsm21 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='1' AND s.class='$second' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $pbsm21Count = mysqli_num_rows($pbsm21);
        
        //PBSM class 2  term 2
        $pbsm22 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='2' AND s.class='$second' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $pbsm22Count = mysqli_num_rows($pbsm22);
        
        //PBSM class 3  term 1
        $pbsm31 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='1' AND s.class='$third' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $pbsm31Count = mysqli_num_rows($pbsm31);
        
        //PBSM class 3  term 2
        $pbsm32 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='2' AND s.class='$third' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $pbsm32Count = mysqli_num_rows($pbsm32);
        
         //PBSM class 4  term 1
        $pbsm41 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='1' AND s.class='$fordth' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $pbsm41Count = mysqli_num_rows($pbsm41);
        
        //PBSM class 4  term 2
        $pbsm42 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.dp_id='23' AND srx.term='2' AND s.class='$fordth' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $pbsm42Count = mysqli_num_rows($pbsm42);
        
        //-------------------------------------------------------SYARIAH-------------------------------------------------
        //SYARIAH class 1  term 1
        $sya11 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='1' AND s.class='$first' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $sya11Count = mysqli_num_rows($sya11);
        
        //SYARIAH class 1  term 2
        $sya12 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='2' AND s.class='$first' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $sya12Count = mysqli_num_rows($sya12);
        
        //SYARIAH class 2  term 1
        $sya21 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='1' AND s.class='$second' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $sya21Count = mysqli_num_rows($sya21);
        
        //SYARIAH class 2  term 2
        $sya22 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='2' AND s.class='$second' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $sya22Count = mysqli_num_rows($sya22);
        
        //SYARIAH class 2  term 1
        $sya31 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='1' AND s.class='$third' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $sya31Count = mysqli_num_rows($sya31);
        
        //SYARIAH class 2  term 2
        $sya32 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='2' AND s.class='$third' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $sya32Count = mysqli_num_rows($sya32);
        
        //SYARIAH class 2  term 1
        $sya41 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='1' AND s.class='$fordth' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $sya41Count = mysqli_num_rows($sya41);
        
        //SYARIAH class 2  term 2
        $sya42 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='122' AND srx.term='2' AND s.class='$fordth' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $sya42Count = mysqli_num_rows($sya42);
        
        //-------------------------------------------------------USULUDDIN-------------------------------------------------
        //USULUDDIN class 1  term 1
        $usu11 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='1' AND s.class='$first' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $usu11Count = mysqli_num_rows($usu11);
        
        //USULUDDIN class 1  term 2
        $usu12 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='2' AND s.class='$first' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $usu12Count = mysqli_num_rows($usu12);
        
        //USULUDDIN class 2  term 1
        $usu21 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='1' AND s.class='$second' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $usu21Count = mysqli_num_rows($usu21);
        
        //USULUDDIN class 2  term 2
        $usu22 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='2' AND s.class='$second' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $usu22Count = mysqli_num_rows($usu22);
                
        //USULUDDIN class 3  term 1
        $usu31 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='1' AND s.class='$third' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $usu31Count = mysqli_num_rows($usu31);
        
        //USULUDDIN class 3  term 2
        $usu32 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='2' AND s.class='$third' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $usu32Count = mysqli_num_rows($usu32);
                
        //USULUDDIN class 4  term 1
        $usu41 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='1' AND s.class='$fordth' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $usu41Count = mysqli_num_rows($usu41);
        
        //USULUDDIN class 4  term 2
        $usu42 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='123' AND srx.term='2' AND s.class='$fordth' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $usu42Count = mysqli_num_rows($usu42);
       
        //-------------------------------------------------------DIRASAT-------------------------------------------------
        //DIRASAT class 1  term 1
        $dir11 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='1' AND s.class='$first' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $dir11Count = mysqli_num_rows($dir11);
        
        //DIRASAT class 1  term 2
        $dir12 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='2' AND s.class='$first' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $dir12Count = mysqli_num_rows($dir12);
        
        //DIRASAT class 2  term 1
        $dir21 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='1' AND s.class='$second' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $dir21Count = mysqli_num_rows($dir21);
        
        //DIRASAT class 2  term 2
        $dir22 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='2' AND s.class='$second' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $dir22Count = mysqli_num_rows($dir22);
        
        //DIRASAT class 3  term 1
        $dir31 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='1' AND s.class='$third' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $dir31Count = mysqli_num_rows($dir31);
        
        //DIRASAT class 3  term 2
        $dir32 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='2' AND s.class='$third' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $dir32Count = mysqli_num_rows($dir32);
        
        //DIRASAT class 4  term 1
        $dir41 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='1' AND s.class='$fordth' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $dir41Count = mysqli_num_rows($dir41);
        
        //DIRASAT class 4  term 2
        $dir42 = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                             WHERE s.ft_id='124' AND srx.term='2' AND s.class='$fordth' AND srx.year='$cy' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS')
                             ");
        $dir42Count = mysqli_num_rows($dir42);
    ?>

    <h4><span class="glyphicon glyphicon-usd"></span> BAYAR UJIAN MENGIKUT KELAS</h4>
    <hr>
    <div class="panel panel-primary">
        <div class="panel-heading">1/<?= $cy ?></div>
        <div class="panel-body">
            <table class="table table-striped table-bordered">
                <tr>
                    <td align="center">Kelas</td>
                    <td align="center">PAI</td>
                    <td align="center">PBSM</td>
                    <td align="center">SYARIAH</td>
                    <td align="center">USULUDDIN</td>
                    <td align="center">DIRASAT</td>
                </tr>
                
                <tr align="center">
                    <td align="center">1</td>
                    <td align="center"><a href="#" onclick="examPayByClass('1', '<?= $cy ?>', '<?= $first ?>', '121', '22')"><?= $pai11Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('1', '<?= $cy ?>', '<?= $first ?>', '121', '23')"><?= $pbsm11Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('1', '<?= $cy ?>', '<?= $first ?>', '122', '')"><?= $sya11Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('1', '<?= $cy ?>', '<?= $first ?>', '123', '')"><?= $usu11Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('1', '<?= $cy ?>', '<?= $first ?>', '124', '')"><?= $dir11Count ?></a></td>
                </tr>
            
                <tr align="center">
                    <td align="center">2</td>
                    <td align="center"><a href="#" onclick="examPayByClass('1', '<?= $cy ?>', '<?= $second ?>', '121', '22')"><?= $pai21Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('1', '<?= $cy ?>', '<?= $second ?>', '121', '23')"><?= $pbsm21Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('1', '<?= $cy ?>', '<?= $second ?>', '122', '')"><?= $sya21Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('1', '<?= $cy ?>', '<?= $second ?>', '123', '')"><?= $usu21Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('1', '<?= $cy ?>', '<?= $second ?>', '124', '')"><?= $dir21Count ?></a></td>
                </tr>
                
                <tr align="center">
                    <td align="center">3</td>
                    <td align="center"><a href="#" onclick="examPayByClass('1', '<?= $cy ?>', '<?= $third ?>', '121', '22')"><?= $pai31Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('1', '<?= $cy ?>', '<?= $third ?>', '121', '23')"><?= $pbsm31Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('1', '<?= $cy ?>', '<?= $third ?>', '122', '')"><?= $sya31Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('1', '<?= $cy ?>', '<?= $third ?>', '123', '')"><?= $usu31Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('1', '<?= $cy ?>', '<?= $third ?>', '124', '')"><?= $dir31Count ?></a></td>
                </tr>
                
                <tr align="center">
                    <td align="center">4</td>
                    <td align="center"><a href="#" onclick="examPayByClass('1', '<?= $cy ?>', '<?= $fordth ?>', '121', '22')"><?= $pai41Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('1', '<?= $cy ?>', '<?= $fordth ?>', '121', '23')"><?= $pbsm41Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('1', '<?= $cy ?>', '<?= $fordth ?>', '122', '')"><?= $sya41Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('1', '<?= $cy ?>', '<?= $fordth ?>', '123', '')"><?= $usu41Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('1', '<?= $cy ?>', '<?= $fordth ?>', '124', '')"><?= $dir41Count ?></a></td>
                </tr>
                
            </table>
        </div>
    </div>
    
    <div class="panel panel-primary">
        <div class="panel-heading">2/<?= $cy ?></div>
        <div class="panel-body">
            <table class="table table-striped table-bordered">
                <tr>
                    <td align="center">Kelas</td>
                    <td align="center">PAI</td>
                    <td align="center">PBSM</td>
                    <td align="center">SYARIAH</td>
                    <td align="center">USULUDDIN</td>
                    <td align="center">DIRASAT</td>
                </tr>
                
                <tr align="center">
                    <td align="center">1</td>
                    <td align="center"><a href="#" onclick="examPayByClass('2', '<?= $cy ?>', '<?= $first ?>', '121', '22')"><?= $pai12Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('2', '<?= $cy ?>', '<?= $first ?>', '121', '23')"><?= $pbsm12Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('2', '<?= $cy ?>', '<?= $first ?>', '122', '')"><?= $sya12Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('2', '<?= $cy ?>', '<?= $first ?>', '123', '')"><?= $usu12Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('2', '<?= $cy ?>', '<?= $first ?>', '124', '')"><?= $dir12Count ?></a></td>
                </tr>
            
                <tr align="center">
                    <td align="center">2</td>
                    <td align="center"><a href="#" onclick="examPayByClass('2', '<?= $cy ?>', '<?= $second ?>', '121', '22')"><?= $pai22Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('2', '<?= $cy ?>', '<?= $second ?>', '121', '23')"><?= $pbsm22Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('2', '<?= $cy ?>', '<?= $second ?>', '122', '')"><?= $sya22Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('2', '<?= $cy ?>', '<?= $second ?>', '123', '')"><?= $usu22Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('2', '<?= $cy ?>', '<?= $second ?>', '124', '')"><?= $dir22Count ?></a></td>
                </tr>
                
                <tr align="center">
                    <td align="center">3</td>
                    <td align="center"><a href="#" onclick="examPayByClass('2', '<?= $cy ?>', '<?= $third ?>', '121', '22')"><?= $pai32Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('2', '<?= $cy ?>', '<?= $third ?>', '121', '23')"><?= $pbsm32Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('2', '<?= $cy ?>', '<?= $third ?>', '122', '')"><?= $sya32Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('2', '<?= $cy ?>', '<?= $third ?>', '123', '')"><?= $usu32Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('2', '<?= $cy ?>', '<?= $third ?>', '124', '')"><?= $dir32Count ?></a></td>
                </tr>
                
                <tr align="center">
                    <td align="center">4</td>
                    <td align="center"><a href="#" onclick="examPayByClass('2', '<?= $cy ?>', '<?= $fordth ?>', '121', '22')"><?= $pai42Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('2', '<?= $cy ?>', '<?= $fordth ?>', '121', '23')"><?= $pbsm42Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('2', '<?= $cy ?>', '<?= $fordth ?>', '122', '')"><?= $sya42Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('2', '<?= $cy ?>', '<?= $fordth ?>', '123', '')"><?= $usu42Count ?></a></td>
                    <td align="center"><a href="#" onclick="examPayByClass('2', '<?= $cy ?>', '<?= $fordth ?>', '124', '')"><?= $dir42Count ?></a></td>
                </tr>
                
            </table>
        </div>
    </div>

