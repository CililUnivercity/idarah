<?php
    include '../../../connect.php';
    //header("content-type: text/javascript");
    //sleep(1);
    $class = $_POST['class'];
    $re_id = $_POST['re_id'];
    $ft_id = $_POST['ft_id'];
    $dp_id = $_POST['dp_id'];
    
    $student_register = mysqli_query($con, "SELECT s.*,sr.* FROM students s INNER JOIN student_register sr ON s.st_id=sr.st_id WHERE s.ft_id='$ft_id' AND dp_id='$dp_id' AND sr.re_id='$re_id' AND s.class='$class' ORDER BY s.student_id
                        ");
    ?>
        <div class="pull-right"><a href="?page=studentCard" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-arrow-left"></span> back</a></div>
        <br><br>
        <form class='form-horizontal' method='post' name="examPay" id="examPay" action="content/card/printAll.php" target="_blank">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <td>PILIH</td>
                                <td align="center">NIM</td>
                                <td align="center">NAMA - NASAB</td>
                                <td align="center">FAKULTI</td>
                                <td align="center">JURUSAN</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        while($p = mysqli_fetch_array($student_register)){
                                            $student_id = $p['student_id'];
                                        $st_id = $p['st_id'];
                                        $ft_id = $p['ft_id'];
                                        $dp_id = $p['dp_id'];
                                        $student_id = $p['student_id'];
                                        $fname = str_replace("\'", "&#39;", $p["firstname_rumi"]);
                                        $lname = str_replace("\'", "&#39;", $p["lastname_rumi"]);
                                        $fname_j = str_replace("\'", "&#39;", $p["firstname_jawi"]);
                                        $lname_j = str_replace("\'", "&#39;", $p["lastname_jawi"]);
                                        $telephone = str_replace("\'", "&#39;", $p["telephone"]);
                                        $program = $p['program'];
                                        $cityzen_id = $p['cityzen_id'];

                                        $faculty = mysqli_query($con, "SELECT * FROM fakultys WHERE ft_id='$ft_id'");
                                        $ftResult = mysqli_fetch_array($faculty);
                                        $ft_name = $ftResult['ft_name'];

                                        $department = mysqli_query($con, "SELECT * FROM departments WHERE dp_id='$dp_id'");
                                        $dpResult = mysqli_fetch_array($department);
                                        $dp_name = $dpResult['dp_name'];
                                    ?>
                                    <tr>
                                        <td align="center"><input type="checkbox" name="select[<?= $i ?>]" value="1"></td>
                                        <input type="hidden" name="st_id[<?= $i ?>]" value="<?= $st_id ?>">
                                        <td align="center"><a href="content/card/printCard.php?st_id=<?=$st_id?>" target="_blank"><?= $student_id ?></a></td>
                                        <td align="left"><?= $fname ?> - <?= $fname ?></td>
                                        <td align="left"><?= $ft_name ?></td>
                                        <td align="left"><?= $dp_name ?></td>
                                    </tr>
                                    <?php
                                    $i++;
                                    }
                ?>
                    </tbody>
                </table>
            <button type="submit" class="btn btn-success btn-sm">PRINT</button>
        </form>

