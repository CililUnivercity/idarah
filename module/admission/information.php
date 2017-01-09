<h4><span class="glyphicon glyphicon-paperclip"></span> LAPORAN PENDAFTARAN CALON TAHUN 1</h4><HR>

<div class="col-lg-6">
    <div class="panel panel-primary">
        <div class="panel-heading">Lelaki</div>
        <div class="panel-body">
            <table class="table table-striped">
                <tr>
                    <td align="center">BILIK</td>
                    <td align="center">JUMLAH / ORANG</td>
                </tr>
            <?php
                //Admision yaer setting
                $admissionRegister = mysqli_query($con, "SELECT * FROM admissionRegister WHERE ar_status='1'");
                $admissionRegisterRow = mysqli_fetch_array($admissionRegister);
                $cyear1 = $admissionRegisterRow['ar_year'];

                $pretestMen = mysqli_query($con, "SELECT p.*,s.* FROM pretest p JOIN students s ON p.st_id=s.st_id WHERE gender='Lelaki' AND testClass!='0' AND p.pre_register_year='$cyear1' GROUP BY testClass ");
                while($rowPretestMen = mysqli_fetch_array($pretestMen)){
                    //$count = mysqli_num_rows($pretestMen);
            ?>
                <tr align="center">
                    <td align="center"><a href="?page=admissions&&admissionpage=reportInformation&&class=<?= $rowPretestMen['testClass'] ?>"><?= $rowPretestMen['testClass'] ?></a></td>
                    <td align="center">
                        <?php
                            $class = $rowPretestMen['testClass'];
                            $count = mysqli_query($con, "SELECT * FROM pretest WHERE testClass='$class' AND pre_register_year='$cyear1'");
                            $rowCount = mysqli_num_rows($count);
                        ?>
                        <?= $rowCount ?>
                    </td>
                </tr>
            <?php
                }
            ?>
            </table>
        </div>
    </div>
</div>
<div class="col-lg-6">
    <div class="panel panel-primary">
        <div class="panel-heading">Perempuan</div>
        <div class="panel-body">
            <table class="table table-striped">
                <tr>
                    <td align="center">BILIK</td>
                    <td align="center">JUMLAH / ORANG</td>
                </tr>
            <?php
                $pretestWomen = mysqli_query($con, "SELECT p.*,s.* FROM pretest p JOIN students s ON p.st_id=s.st_id WHERE gender='Perempuan' AND testClass!='0' AND p.pre_register_year='$cyear1' GROUP BY testClass ");
                while($rowPretestWomen = mysqli_fetch_array($pretestWomen)){
                    //$count = mysqli_num_rows($pretestMen);
            ?>
                <tr align="center">
                    <td align="center"><a href="?page=admissions&&admissionpage=reportInformation&&class=<?= $rowPretestWomen['testClass'] ?>"><?= $rowPretestWomen['testClass'] ?></a></td>
                    <td align="center">
                        <?php
                            $class2 = $rowPretestWomen['testClass'];
                            $count2 = mysqli_query($con, "SELECT * FROM pretest WHERE testClass='$class2' AND pre_register_year='$cyear1'");
                            $rowCount2 = mysqli_num_rows($count2);
                        ?>
                        <?= $rowCount2 ?>
                    </td>
                </tr>
            <?php
                }
            ?>
            </table>
        </div>
    </div>
</div>

