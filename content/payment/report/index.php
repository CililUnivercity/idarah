<div class="pull-left">
    <h4><b><span class="glyphicon glyphicon-file"></span> LAPORAN TERKINI</b></h4>
</div>
<div class="pull-right">
    <a onclick="loadContent('all','payment/report','')" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-file"></span> LAPORAN TAHUNAN</b></a>
</div>
<br>
    <?php
        include("statisticData.php");
    ?>
    <hr>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <a href="#" class="btn btn-success btn-sm">YURAN 1/<?= $cy ?></a> 
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered">
                <tr>
                    <td align="center">Kelas</td>
                    <td align="center">PAI</td>
                    <td align="center">PBSM</td>
                    <td align="center">SYARIAH</td>
                    <td align="center">USULUDDIN</td>
                    <td align="center">DIRASAT</td>
                    <td align="center">TOTAL</td>
                </tr>
                
                <tr align="center">
                    <td align="center">1</td>
                    <td align="center"><font color="orange"><?= $pai11Count ?></font> | <font color="green"><?= $pai11CountPayed ?></font> | <font color="red"><?= $pai11CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $pbsm11Count ?></font> | <font color="green"><?= $pbsm11CountPayed ?></font> | <font color="red"><?= $pbsm11CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $sya11Count ?></font> | <font color="green"><?= $sya11CountPayed ?></font> | <font color="red"><?= $sya11CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $usu11Count ?></font> | <font color="green"><?= $usu11CountPayed ?></font> | <font color="red"><?= $usu11CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $dir11Count ?></font> | <font color="green"><?= $dir11CountPayed ?></font> | <font color="red"><?= $dir11CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $pai11Count + $pbsm11Count + $sya11Count + $usu11Count + $dir11Count ?></font> | <font color="green"><?= $pai11CountPayed + $pbsm11CountPayed + $sya11CountPayed +$usu11CountPayed + $dir11CountPayed ?></font> | <font color="red"><?= $pai11CountNotPay +  $pbsm11CountNotPay + $sya11CountNotPay + $usu11CountNotPay + $dir11CountNotPay ?></font></td>
                </tr>
            
                <tr align="center">
                    <td align="center">2</td>
                    <td align="center"><font color="orange"><?= $pai21Count ?></font> | <font color="green"><?= $pai21CountPayed ?></font> | <font color="red"><?= $pai21CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $pbsm21Count ?></font> | <font color="green"><?= $pbsm21CountPayed ?></font> | <font color="red"><?= $pbsm21CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $sya21Count ?></font> | <font color="green"><?= $sya21CountPayed ?></font> | <font color="red"><?= $sya21CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $usu21Count ?></font> | <font color="green"><?= $usu21CountPayed ?></font> | <font color="red"><?= $usu21CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $dir21Count ?></font> | <font color="green"><?= $dir21CountPayed ?></font> | <font color="red"><?= $dir21CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $pai21Count + $pbsm21Count + $sya21Count + $usu21Count + $dir21Count ?></font> | <font color="green"><?= $pai21CountPayed + $pbsm21CountPayed + $sya21CountPayed +$usu21CountPayed +$dir21CountPayed ?></font> | <font color="red"><?= $pai21CountNotPay +  $pbsm21CountNotPay + $sya21CountNotPay + $usu21CountNotPay + $dir21CountNotPay ?></font></td>
                </tr>
                
                <tr align="center">
                    <td align="center">3</td>
                    <td align="center"><font color="orange"><?= $pai31Count ?></font> | <font color="green"><?= $pai31CountPayed ?></font> | <font color="red"><?= $pai31CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $pbsm31Count ?></font> | <font color="green"><?= $pbsm31CountPayed ?></font> | <font color="red"><?= $pbsm31CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $sya31Count ?></font> | <font color="green"><?= $sya31CountPayed ?></font> | <font color="red"><?= $sya31CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $usu31Count ?></font> | <font color="green"><?= $usu31CountPayed ?></font> | <font color="red"><?= $usu31CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $dir31Count ?></font> | <font color="green"><?= $dir31CountPayed ?></font> | <font color="red"><?= $dir31CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $pai31Count + $pbsm31Count + $sya31Count + $usu31Count + $dir31Count ?></font> | <font color="green"><?= $pai31CountPayed + $pbsm31CountPayed + $sya31CountPayed + $usu31CountPayed + $dir31CountPayed ?></font> | <font color="red"><?= $pai31CountNotPay +  $pbsm31CountNotPay + $sya31CountNotPay + $usu31CountNotPay + $dir31CountNotPay ?></font></td>
                </tr>
                
                <tr align="center">
                    <td align="center">4</td>
                    <td align="center"><font color="orange"><?= $pai41Count ?></font> | <font color="green"><?= $pai41CountPayed ?></font> | <font color="red"><?= $pai41CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $pbsm41Count ?></font> | <font color="green"><?= $pbsm41CountPayed ?></font> | <font color="red"><?= $pbsm41CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $sya41Count ?></font> | <font color="green"><?= $sya41CountPayed ?></font> | <font color="red"><?= $sya41CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $usu41Count ?></font> | <font color="green"><?= $usu41CountPayed ?></font> | <font color="red"><?= $usu41CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $dir41Count ?></font> | <font color="green"><?= $dir41CountPayed ?></font> | <font color="red"><?= $dir41CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $pai41Count + $pbsm41Count + $sya41Count + $usu41Count + $dir41Count ?></font> | <font color="green"><?= $pai41CountPayed + $pbsm41CountPayed + $sya41CountPayed +$usu41CountPayed +$dir41CountPayed ?></font> | <font color="red"><?= $pai41CountNotPay +  $pbsm41CountNotPay + $sya41CountNotPay + $usu41CountNotPay + $dir41CountNotPay ?></font></td>
                </tr>
                
                <tr align="center">
                    <td align="center">TOTAL</td>
                    <td align="center"><font color="orange"><?= $sum_pai1_register ?></font> | <font color="green"><?= $sum_pai1_payed ?></font> | <font color="red"><?= $sum_pai1_notPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sum_pbsm1_register ?></font> | <font color="green"><?= $sum_pbsm1_payed ?></font> | <font color="red"><?= $sum_pbsm1_notPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sum_sya1_register ?></font> | <font color="green"><?= $sum_sya1_payed ?></font> | <font color="red"><?= $sum_sya1_notPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sum_usu1_register ?></font> | <font color="green"><?= $sum_usu1_payed ?></font> | <font color="red"><?= $sum_usu1_notPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sum_dir1_register ?></font> | <font color="green"><?= $sum_dir1_payed ?></font> | <font color="red"><?= $sum_dir1_notPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sum_pai1_register + $sum_pbsm1_register + $sum_sya1_register + $sum_usu1_register + $sum_dir1_register ?></font> | <font color="green"><?= $sum_pai1_payed + $sum_pbsm1_payed + $sum_sya1_payed + $sum_usu1_payed + $sum_dir1_payed ?></font> | <font color="red"><?= $sum_pai1_notPayed +  $sum_pbsm1_notPayed + $sum_sya1_notPayed + $sum_usu1_notPayed + $sum_dir1_notPayed ?></font></td>
                </tr>
                
                <tr align="center">
                    <td align="center">TOTAL DUIT</td>
                    <td colspan="6" align="left"><?= number_format($resultTotalMoney1) ?> ฿</td>
                </tr>
                
            </table>
        </div>
    </div>
    
    <div class="panel panel-primary">
        <div class="panel-heading">
            <a href="#" class="btn btn-success btn-sm">YURAN 2/<?= $cy ?></a> 
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered">
                <tr>
                    <td align="center">Kelas</td>
                    <td align="center">PAI</td>
                    <td align="center">PBSM</td>
                    <td align="center">SYARIAH</td>
                    <td align="center">USULUDDIN</td>
                    <td align="center">DIRASAT</td>
                    <td align="center">TOTAL</td>
                </tr>
                
                <tr align="center">
                    <td align="center">1</td>
                    <td align="center"><font color="orange"><?= $pai12Count ?></font> | <font color="green"><?= $pai12CountPayed ?></font> | <font color="red"><?= $pai12CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $pbsm12Count ?></font> | <font color="green"><?= $pbsm12CountPayed ?></font> | <font color="red"><?= $pbsm12CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $sya12Count ?></font> | <font color="green"><?= $sya12CountPayed ?></font> | <font color="red"><?= $sya12CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $usu12Count ?></font> | <font color="green"><?= $usu12CountPayed ?></font> | <font color="red"><?= $usu12CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $dir12Count ?></font> | <font color="green"><?= $dir12CountPayed ?></font> | <font color="red"><?= $dir12CountNotPay ?></font></td>
                </tr>
            
                <tr align="center">
                    <td align="center">2</td>
                    <td align="center"><font color="orange"><?= $pai22Count ?></font> | <font color="green"><?= $pai22CountPayed ?></font> | <font color="red"><?= $pai22CountNotPay ?></font></td></td>
                    <td align="center"><font color="orange"><?= $pbsm22Count ?></font> | <font color="green"><?= $pbsm22CountPayed ?></font> | <font color="red"><?= $pbsm22CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $sya22Count ?></font> | <font color="green"><?= $sya22CountPayed ?></font> | <font color="red"><?= $sya22CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $usu22Count ?></font> | <font color="green"><?= $usu22CountPayed ?></font> | <font color="red"><?= $usu22CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $dir22Count ?></font> | <font color="green"><?= $dir22CountPayed ?></font> | <font color="red"><?= $dir22CountNotPay ?></font></td>
                </tr>
                
                <tr align="center">
                    <td align="center">3</td>
                    <td align="center"><font color="orange"><?= $pai32Count ?></font> | <font color="green"><?= $pai32CountPayed ?></font> | <font color="red"><?= $pai32CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $pbsm32Count ?></font> | <font color="green"><?= $pbsm32CountPayed ?></font> | <font color="red"><?= $pbsm32CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $sya12Count ?></font> | <font color="green"><?= $sya32CountPayed ?></font> | <font color="red"><?= $sya32CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $usu12Count ?></font> | <font color="green"><?= $usu32CountPayed ?></font> | <font color="red"><?= $usu32CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $dir12Count ?></font> | <font color="green"><?= $dir32CountPayed ?></font> | <font color="red"><?= $dir32CountNotPay ?></font></td>
                </tr>
                
                <tr align="center">
                    <td align="center">4</td>
                    <td align="center"><font color="orange"><?= $pai42Count ?></font> | <font color="green"><?= $pai42CountPayed ?></font> | <font color="red"><?= $pai42CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $pbsm42Count ?></font> | <font color="green"><?= $pbsm42CountPayed ?></font> | <font color="red"><?= $pbsm42CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $sya42Count ?></font> | <font color="green"><?= $sya42CountPayed ?></font> | <font color="red"><?= $sya42CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $usu42Count ?></font> | <font color="green"><?= $usu42CountPayed ?></font> | <font color="red"><?= $usu42CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $dir42Count ?></font> | <font color="green"><?= $dir42CountPayed ?></font> | <font color="red"><?= $dir42CountNotPay ?></font></td>
                </tr>
                
                <tr align="center">
                    <td align="center">TOTAL</td>
                    <td align="center"><font color="orange"><?= $sum_pai2_register ?></font> | <font color="green"><?= $sum_pai2_payed ?></font> | <font color="red"><?= $sum_pai2_notPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sum_pbsm2_register ?></font> | <font color="green"><?= $sum_pbsm2_payed ?></font> | <font color="red"><?= $sum_pbsm2_notPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sum_sya2_register ?></font> | <font color="green"><?= $sum_sya2_payed ?></font> | <font color="red"><?= $sum_sya2_notPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sum_usu2_register ?></font> | <font color="green"><?= $sum_usu2_payed ?></font> | <font color="red"><?= $sum_usu2_notPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sum_dir2_register ?></font> | <font color="green"><?= $sum_dir2_payed ?></font> | <font color="red"><?= $sum_dir2_notPayed ?></font></td>
                </tr>
                
            </table>
        </div>
    </div>

    
    <div class="panel panel-primary">
        <div class="panel-heading">
            <a href="#" class="btn btn-success btn-sm">UJIAN 1/<?= $cy ?></a> 
        </div>
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
                    <td align="center"><font color="orange"><?= $exam_pai11Count ?></font> | <font color="green"><?= $exam_pai11CountPayed ?></font> | <font color="red"><?= $exam_pai11CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_pbsm11Count ?></font> | <font color="green"><?= $exam_pbsm11CountPayed ?></font> | <font color="red"><?= $exam_pbsm11CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_sya11Count ?></font> | <font color="green"><?= $exam_sya11CountPayed ?></font> | <font color="red"><?= $exam_sya11CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $usu11Count ?></font> | <font color="green"><?= $exam_usu11CountPayed ?></font> | <font color="red"><?= $usu11CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_dir11Count ?></font> | <font color="green"><?= $exam_dir11CountPayed ?></font> | <font color="red"><?= $exam_dir11CountNotPay ?></font></td>
                </tr>
            
                <tr align="center">
                    <td align="center">2</td>
                    <td align="center"><font color="orange"><?= $exam_pai21Count ?></font> | <font color="green"><?= $exam_pai21CountPayed ?></font> | <font color="red"><?= $exam_pai21countNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_pbsm21Count ?></font> | <font color="green"><?= $exam_pbsm21CountPayed ?></font> | <font color="red"><?= $exam_pbsm21CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_sya21Count ?></font> | <font color="green"><?= $exam_sya21CountPayed ?></font> | <font color="red"><?= $exam_sya21CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_usu21Count ?></font> | <font color="green"><?= $exam_usu21CountPayed ?></font> | <font color="red"><?= $exam_usu21CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_dir21Count ?></font> | <font color="green"><?= $exam_dir21CountPayed ?></font> | <font color="red"><?= $exam_dir21CountNotPay ?></font></td>
                </tr>
                
                <tr align="center">
                    <td align="center">3</td>
                    <td align="center"><font color="orange"><?= $exam_pai31Count ?></font> | <font color="green"><?= $exam_pai31CountPayed ?></font> | <font color="red"><?= $exam_pai31CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_pbsm31Count ?></font> | <font color="green"><?= $exam_pbsm31CountPayed ?></font> | <font color="red"><?= $exam_pbsm31CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_sya31Count ?></font> | <font color="green"><?= $exam_sya31CountPayed ?></font> | <font color="red"><?= $exam_sya31CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_usu31Count ?></font> | <font color="green"><?= $exam_usu31CountPayed ?></font> | <font color="red"><?= $exam_usu31CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_dir31Count ?></font> | <font color="green"><?= $exam_dir31CountPayed ?></font> | <font color="red"><?= $exam_dir31CountNotPay ?></font></td>
                </tr>
                
                <tr align="center">
                    <td align="center">4</td>
                    <td align="center"><font color="orange"><?= $exam_pai41Count ?></font> | <font color="green"><?= $exam_pai41CountPayed ?></font> | <font color="red"><?= $exam_pai41CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_pbsm41Count ?></font> | <font color="green"><?= $exam_pbsm41CountPayed ?></font> | <font color="red"><?= $exam_pbsm41CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_sya41Count ?></font> | <font color="green"><?= $exam_sya41CountPayed ?></font> | <font color="red"><?= $exam_sya41CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_usu41Count ?></font> | <font color="green"><?= $exam_usu41CountPayed ?></font> | <font color="red"><?= $exam_usu41CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_dir41Count ?></font> | <font color="green"><?= $exam_dir41CountPayed ?></font> | <font color="red"><?= $exam_dir41CountNotPay ?></font></td>
                </tr>
                
                <tr align="center">
                    <td align="center">TOTAL</td>
                    <td align="center"><font color="orange"><?= $sumExam_pai1_register ?></font> | <font color="green"><?= $sumExam_pai1_payed ?></font> | <font color="red"><?= $sumExam_pai1_notPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sumExam_pbsm1_register ?></font> | <font color="green"><?= $sumExam_pbsm1_payed ?></font> | <font color="red"><?= $sumExam_pbsm1_notPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sumExam_sya1_register ?></font> | <font color="green"><?= $sumExam_sya1_payed ?></font> | <font color="red"><?= $sumExam_sya1_notPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sumExam_usu1_register ?></font> | <font color="green"><?= $sumExam_usu1_payed ?></font> | <font color="red"><?= $sumExam_usu1_notPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sumExam_dir1_register ?></font> | <font color="green"><?= $sumExam_dir1_payed ?></font> | <font color="red"><?= $sumExam_dir1_notPayed ?></font></td>
                </tr>
                
            </table>
        </div>
    </div>
    
    <div class="panel panel-primary">
        <div class="panel-heading">
            <a href="#" class="btn btn-success btn-sm">UJIAN 2/<?= $cy ?></a> 
        </div>
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
                    <td align="center"><font color="orange"><?= $exam_pai12Count ?></font> | <font color="green"><?= $exam_pai12CountPayed ?></font> | <font color="red"><?= $exam_pai12CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_pbsm12Count ?></font> | <font color="green"><?= $exam_pbsm12CountPayed ?></font> | <font color="red"><?= $exam_pbsm12CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_sya12Count ?></font> | <font color="green"><?= $exam_sya12CountPayed ?></font> | <font color="red"><?= $exam_sya12CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $usu12Count ?></font> | <font color="green"><?= $usu12CountPayed ?></font> | <font color="red"><?= $usu12CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_dir12Count ?></font> | <font color="green"><?= $exam_dir12CountPayed ?></font> | <font color="red"><?= $exam_dir12CountNotPay ?></font></td>
                </tr>
            
                <tr align="center">
                    <td align="center">2</td>
                    <td align="center"><font color="orange"><?= $exam_pai22Count ?></font> | <font color="green"><?= $exam_pai22CountPayed ?></font> | <font color="red"><?= $exam_pai22CountNotPay ?></font></td></td>
                    <td align="center"><font color="orange"><?= $exam_pbsm22Count ?></font> | <font color="green"><?= $exam_pbsm22CountPayed ?></font> | <font color="red"><?= $exam_pbsm22CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_sya22Count ?></font> | <font color="green"><?= $exam_sya22CountPayed ?></font> | <font color="red"><?= $exam_sya22CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_usu22Count ?></font> | <font color="green"><?= $exam_usu22CountPayed ?></font> | <font color="red"><?= $exam_usu22CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_dir22Count ?></font> | <font color="green"><?= $exam_dir22CountPayed ?></font> | <font color="red"><?= $exam_dir22CountNotPay ?></font></td>
                </tr>
                
                <tr align="center">
                    <td align="center">3</td>
                    <td align="center"><font color="orange"><?= $exam_pai32Count ?></font> | <font color="green"><?= $exam_pai32CountPayed ?></font> | <font color="red"><?= $exam_pai32CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_pbsm32Count ?></font> | <font color="green"><?= $exam_pbsm32CountPayed ?></font> | <font color="red"><?= $exam_pbsm32CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_sya12Count ?></font> | <font color="green"><?= $exam_sya32CountPayed ?></font> | <font color="red"><?= $exam_sya32CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $usu12Count ?></font> | <font color="green"><?= $exam_usu32CountPayed ?></font> | <font color="red"><?= $exam_usu32CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_dir12Count ?></font> | <font color="green"><?= $exam_dir32CountPayed ?></font> | <font color="red"><?= $exam_dir32CountNotPay ?></font></td>
                </tr>
                
                <tr align="center">
                    <td align="center">4</td>
                    <td align="center"><font color="orange"><?= $exam_pai42Count ?></font> | <font color="green"><?= $exam_pai42CountPayed ?></font> | <font color="red"><?= $exam_pai42CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_pbsm42Count ?></font> | <font color="green"><?= $exam_pbsm42CountPayed ?></font> | <font color="red"><?= $exam_pbsm42CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_sya42Count ?></font> | <font color="green"><?= $exam_sya42CountPayed ?></font> | <font color="red"><?= $exam_sya42CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_usu42Count ?></font> | <font color="green"><?= $exam_usu42CountPayed ?></font> | <font color="red"><?= $exam_usu42CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_dir42Count ?></font> | <font color="green"><?= $exam_dir42CountPayed ?></font> | <font color="red"><?= $exam_dir42CountNotPay ?></font></td>
                </tr>
                
                <tr align="center">
                    <td align="center">TOTAL</td>
                    <td align="center"><font color="orange"><?= $sumExam_pai2_register ?></font> | <font color="green"><?= $sumExam_pai2_payed ?></font> | <font color="red"><?= $sumExam_pai2_notPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sumExam_pbsm2_register ?></font> | <font color="green"><?= $sumExam_pbsm2_payed ?></font> | <font color="red"><?= $sumExam_pbsm2_notPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sumExam_sya2_register ?></font> | <font color="green"><?= $sumExam_sya2_payed ?></font> | <font color="red"><?= $sumExam_sya2_notPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sumExam_usu2_register ?></font> | <font color="green"><?= $sumExam_usu2_payed ?></font> | <font color="red"><?= $sumExam_usu2_notPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sumExam_dir2_register ?></font> | <font color="green"><?= $sumExam_dir2_payed ?></font> | <font color="red"><?= $sumExam_dir2_notPayed ?></font></td>
                </tr>
                
            </table>
        </div>
    </div>


