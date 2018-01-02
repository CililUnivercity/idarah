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
                    <td align="center">DAKWAH</td>
                    <td align="center">TOTAL</td>
                </tr>
                
                <tr align="center">
                    <td align="center">1</td>
                    <td align="center"><font color="orange"><?= $pai11Count ?></font> | <font color="green"><?= $pai11CountPayed ?></font> | <font color="red"><?= $pai11CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $pbsm11Count ?></font> | <font color="green"><?= $pbsm11CountPayed ?></font> | <font color="red"><?= $pbsm11Count - $pbsm11CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sya11Count ?></font> | <font color="green"><?= $sya11CountPayed ?></font> | <font color="red"><?= $sya11CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $usu11Count ?></font> | <font color="green"><?= $usu11CountPayed ?></font> | <font color="red"><?= $usu11CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $dir11Count ?></font> | <font color="green"><?= $dir11CountPayed ?></font> | <font color="red"><?= $dir11CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $dak11Count ?></font> | <font color="green"><?= $dak11CountPayed ?></font> | <font color="red"><?= $dak11CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $pai11Count + $pbsm11Count + $sya11Count + $usu11Count + $dir11Count + $dak11Count ?></font> | <font color="green"><?= $pai11CountPayed + $pbsm11CountPayed + $sya11CountPayed +$usu11CountPayed + $dir11CountPayed + $dak11CountPayed ?></font> | <font color="red"><?= ($pai11Count + $pbsm11Count + $sya11Count + $usu11Count + $dir11Count + $dak11Count)-($pai11CountPayed + $pbsm11CountPayed + $sya11CountPayed +$usu11CountPayed + $dir11CountPayed + $dak11CountPayed)  ?></font></td>
                </tr>
            
                <tr align="center">
                    <td align="center">2</td>
                    <td align="center"><font color="orange"><?= $pai21Count ?></font> | <font color="green"><?= $pai21CountPayed ?></font> | <font color="red"><?= $pai21Count - $pai21CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $pbsm21Count ?></font> | <font color="green"><?= $pbsm21CountPayed ?></font> | <font color="red"><?= $pbsm21CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $sya21Count ?></font> | <font color="green"><?= $sya21CountPayed ?></font> | <font color="red"><?= $sya21Count - $sya21CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $usu21Count ?></font> | <font color="green"><?= $usu21CountPayed ?></font> | <font color="red"><?= $usu21Count - $usu21CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $dir21Count ?></font> | <font color="green"><?= $dir21CountPayed ?></font> | <font color="red"><?= $dir21CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $dak21Count ?></font> | <font color="green"><?= $dak21CountPayed ?></font> | <font color="red"><?= $dak21CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $pai21Count + $pbsm21Count + $sya21Count + $usu21Count + $dir21Count + $dak21Count ?></font> | <font color="green"><?= $pai21CountPayed + $pbsm21CountPayed + $sya21CountPayed +$usu21CountPayed +$dir21CountPayed + $dak21CountPayed ?></font> | <font color="red"><?= ($pai21Count + $pbsm21Count + $sya21Count + $usu21Count + $dir21Count + $dak21Count)-($pai21CountPayed + $pbsm21CountPayed + $sya21CountPayed +$usu21CountPayed +$dir21CountPayed + $dak21CountPayed) ?></font></td>
                </tr>
                
                <tr align="center">
                    <td align="center">3</td>
                    <td align="center"><font color="orange"><?= $pai31Count ?></font> | <font color="green"><?= $pai31CountPayed ?></font> | <font color="red"><?= $pai31CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $pbsm31Count ?></font> | <font color="green"><?= $pbsm31CountPayed ?></font> | <font color="red"><?= $pbsm31CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $sya31Count ?></font> | <font color="green"><?= $sya31CountPayed ?></font> | <font color="red"><?= $sya31CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $usu31Count ?></font> | <font color="green"><?= $usu31CountPayed ?></font> | <font color="red"><?= $usu31CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $dir31Count ?></font> | <font color="green"><?= $dir31CountPayed ?></font> | <font color="red"><?= $dir31CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $dak31Count ?></font> | <font color="green"><?= $dak31CountPayed ?></font> | <font color="red"><?= $dak31CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $pai31Count + $pbsm31Count + $sya31Count + $usu31Count + $dir31Count + $dak31Count ?></font> | <font color="green"><?= $pai31CountPayed + $pbsm31CountPayed + $sya31CountPayed + $usu31CountPayed + $dir31CountPayed + $dak31CountPayed ?></font> | <font color="red"><?= $pai31CountNotPay +  $pbsm31CountNotPay + $sya31CountNotPay + $usu31CountNotPay + $dir31CountNotPay + $dak31CountNotPay ?></font></td>
                </tr>
                
                <tr align="center">
                    <td align="center">4</td>
                    <td align="center"><font color="orange"><?= $pai41Count ?></font> | <font color="green"><?= $pai41CountPayed ?></font> | <font color="red"><?= $pai41Count - $pai41CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $pbsm41Count ?></font> | <font color="green"><?= $pbsm41CountPayed ?></font> | <font color="red"><?= $pbsm41CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $sya41Count ?></font> | <font color="green"><?= $sya41CountPayed ?></font> | <font color="red"><?= $sya41CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $usu41Count ?></font> | <font color="green"><?= $usu41CountPayed ?></font> | <font color="red"><?= $usu41CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $dir41Count ?></font> | <font color="green"><?= $dir41CountPayed ?></font> | <font color="red"><?= $dir41CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $dak41Count ?></font> | <font color="green"><?= $dak41CountPayed ?></font> | <font color="red"><?= $dak41CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $pai41Count + $pbsm41Count + $sya41Count + $usu41Count + $dir41Count + $dak41Count ?></font> | <font color="green"><?= $pai41CountPayed + $pbsm41CountPayed + $sya41CountPayed +$usu41CountPayed +$dir41CountPayed + $dak41CountPayed ?></font> | <font color="red"><?= ($pai41Count + $pbsm41Count + $sya41Count + $usu41Count + $dir41Count + $dak41Count)-($pai41CountPayed + $pbsm41CountPayed + $sya41CountPayed +$usu41CountPayed +$dir41CountPayed + $dak41CountPayed) ?></font></td>
                </tr>
                
                <tr align="center">
                    <td align="center">TOTAL</td>
                    <td align="center"><font color="orange"><?= $sum_pai1_register ?></font> | <font color="green"><?= $sum_pai1_payed ?></font> | <font color="red"><?= $sum_pai1_register - $sum_pai1_payed ?></font></td>
                    <td align="center"><font color="orange"><?= $sum_pbsm1_register ?></font> | <font color="green"><?= $sum_pbsm1_payed ?></font> | <font color="red"><?= $sum_pbsm1_register - $sum_pbsm1_payed ?></font></td>
                    <td align="center"><font color="orange"><?= $sum_sya1_register ?></font> | <font color="green"><?= $sum_sya1_payed ?></font> | <font color="red"><?= $sum_sya1_register - $sum_sya1_payed ?></font></td>
                    <td align="center"><font color="orange"><?= $sum_usu1_register ?></font> | <font color="green"><?= $sum_usu1_payed ?></font> | <font color="red"><?= $sum_usu1_register - $sum_usu1_payed ?></font></td>
                    <td align="center"><font color="orange"><?= $sum_dir1_register ?></font> | <font color="green"><?= $sum_dir1_payed ?></font> | <font color="red"><?= $sum_dir1_register - $sum_dir1_payed ?></font></td>
                    <td align="center"><font color="orange"><?= $sum_dak1_register ?></font> | <font color="green"><?= $sum_dak1_payed ?></font> | <font color="red"><?= $sum_dak1_register - $sum_dak1_payed ?></font></td>
                    <td align="center"><font color="orange"><?= $tsrsyt1 ?></font> | <font color="green"><?= $tsrsyt1payed ?></font> | <font color="red"><?= $tsrsyt1 - $tsrsyt1payed ?></font></td>
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
                    <td align="center">DAKWAH</td>
                    <td align="center">TOTAL</td>
                </tr>
                
                <tr align="center">
                    <td align="center">1</td>
                    <td align="center"><font color="orange"><?= $pai12Count ?></font> | <font color="green"><?= $pai12CountPayed ?></font> | <font color="red"><?= $pai12Count - $pai12CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $pbsm12Count ?></font> | <font color="green"><?= $pbsm12CountPayed ?></font> | <font color="red"><?= $pbsm12Count - $pbsm12CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sya12Count ?></font> | <font color="green"><?= $sya12CountPayed ?></font> | <font color="red"><?= $sya12Count - $sya12CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $usu12Count ?></font> | <font color="green"><?= $usu12CountPayed ?></font> | <font color="red"><?= $usu12Count - $usu12CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $dir12Count ?></font> | <font color="green"><?= $dir12CountPayed ?></font> | <font color="red"><?= $dir12Count - $dir12CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $dak12Count ?></font> | <font color="green"><?= $dak12CountPayed ?></font> | <font color="red"><?= $dak12Count - $dak12CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $pai12Count + $pbsm12Count + $sya12Count + $usu12Count + $dir12Count ?></font> | <font color="green"><?= $pai12CountPayed + $pbsm12CountPayed + $sya12CountPayed + $usu12CountPayed + $dir12CountPayed ?></font> | <font color="red"><?= ($pai12Count - $pai12CountPayed) + ($pbsm12Count - $pbsm12CountPayed) + ($sya12Count - $sya12CountPayed) + ($usu12Count - $usu12CountPayed) + ($dir12Count - $dir12CountPayed) ?></font></td>
                </tr>
            
                <tr align="center">
                    <td align="center">2</td>
                    <td align="center"><font color="orange"><?= $pai22Count ?></font> | <font color="green"><?= $pai22CountPayed ?></font> | <font color="red"><?= $pai22Count - $pai22CountPayed ?></font></td></td>
                    <td align="center"><font color="orange"><?= $pbsm22Count ?></font> | <font color="green"><?= $pbsm22CountPayed ?></font> | <font color="red"><?= $pbsm22Count - $pbsm22CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sya22Count ?></font> | <font color="green"><?= $sya22CountPayed ?></font> | <font color="red"><?= $sya22Count -  $sya22CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $usu22Count ?></font> | <font color="green"><?= $usu22CountPayed ?></font> | <font color="red"><?= $usu22Count - $usu22CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $dir22Count ?></font> | <font color="green"><?= $dir22CountPayed ?></font> | <font color="red"><?= $dir22Count -  $dir22CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $dak22Count ?></font> | <font color="green"><?= $dak22CountPayed ?></font> | <font color="red"><?= $dak22Count -  $dak22CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $pai22Count + $pbsm22Count + $sya22Count + $usu22Count + $dir22Count + $dak22Count ?></font> | <font color="green"><?= $pai22CountPayed + $pbsm22CountPayed + $sya22CountPayed + $usu22CountPayed + $dir22CountPayed + $dak22CountPayed ?></font> | <font color="red"><?= ($pai22Count - $pai22CountPayed) + ($pbsm22Count - $pbsm22CountPayed) + ($sya22Count - $sya22CountPayed) + ($usu22Count - $usu22CountPayed) + ($dir22Count - $dir22CountPayed) + ($dak22Count - $dak22CountPayed) ?></font></td>
                </tr>
                
                <tr align="center">
                    <td align="center">3</td>
                    <td align="center"><font color="orange"><?= $pai32Count ?></font> | <font color="green"><?= $pai32CountPayed ?></font> | <font color="red"><?= $pai32Count - $pai32CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $pbsm32Count ?></font> | <font color="green"><?= $pbsm32CountPayed ?></font> | <font color="red"><?= $pbsm32Count - $pbsm32CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sya32Count ?></font> | <font color="green"><?= $sya32CountPayed ?></font> | <font color="red"><?= $sya32Count - $sya32CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $usu32Count ?></font> | <font color="green"><?= $usu32CountPayed ?></font> | <font color="red"><?= $usu32Count - $usu32CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $dir32Count ?></font> | <font color="green"><?= $dir32CountPayed ?></font> | <font color="red"><?= $dir32Count - $dir32CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $dak32Count ?></font> | <font color="green"><?= $dak32CountPayed ?></font> | <font color="red"><?= $dak32Count - $dak32CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $pai32Count + $pbsm32Count + $sya32Count + $usu32Count + $dir32Count + $dak32Count ?></font> | <font color="green"><?= $pai32CountPayed + $pbsm32CountPayed + $sya32CountPayed + $usu32CountPayed + $dir32CountPayed + $dak32CountPayed ?></font> | <font color="red"><?= ($pai32Count - $pai32CountPayed) + ($pbsm32Count - $pbsm32CountPayed) + ($sya32Count - $sya32CountPayed) + ($usu32Count - $usu32CountPayed) + ($dir32Count - $dir32CountPayed) + ($dak32Count - $dak32CountPayed) ?></font></td>
                </tr>
                
                <tr align="center">
                    <td align="center">4</td>
                    <td align="center"><font color="orange"><?= $pai42Count ?></font> | <font color="green"><?= $pai42CountPayed ?></font> | <font color="red"><?= $pai42Count - $pai42CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $pbsm42Count ?></font> | <font color="green"><?= $pbsm42CountPayed ?></font> | <font color="red"><?= $pbsm42Count - $pbsm42CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sya42Count ?></font> | <font color="green"><?= $sya42CountPayed ?></font> | <font color="red"><?= $sya42Count - $sya42CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $usu42Count ?></font> | <font color="green"><?= $usu42CountPayed ?></font> | <font color="red"><?= $usu42Count - $usu42CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $dir42Count ?></font> | <font color="green"><?= $dir42CountPayed ?></font> | <font color="red"><?= $dir42Count - $dir42CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $dak42Count ?></font> | <font color="green"><?= $dak42CountPayed ?></font> | <font color="red"><?= $dak42Count - $dak42CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $pai42Count + $pbsm42Count + $sya42Count + $usu42Count + $dir42Count + $dak42Count ?></font> | <font color="green"><?= $pai42CountPayed + $pbsm42CountPayed + $sya42CountPayed + $usu42CountPayed + $dir42CountPayed + $dak42CountPayed ?></font> | <font color="red"><?= ($pai42Count - $pai42CountPayed) + ($pbsm42Count - $pbsm42CountPayed) + ($sya42Count - $sya42CountPayed) + ($usu42Count - $usu42CountPayed) + ($dir42Count - $dir42CountPayed) + ($dak42Count - $dak42CountPayed) ?></font></td>
                </tr>
                
                <tr align="center">
                    <td align="center">TOTAL</td>
                    <td align="center"><font color="orange"><?= $sum_pai2_register ?></font> | <font color="green"><?= $sum_pai2_payed ?></font> | <font color="red"><?= $sum_pai2_notPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sum_pbsm2_register ?></font> | <font color="green"><?= $sum_pbsm2_payed ?></font> | <font color="red"><?= $sum_pbsm2_notPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sum_sya2_register ?></font> | <font color="green"><?= $sum_sya2_payed ?></font> | <font color="red"><?= $sum_sya2_notPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sum_usu2_register ?></font> | <font color="green"><?= $sum_usu2_payed ?></font> | <font color="red"><?= $sum_usu2_notPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sum_dir2_register ?></font> | <font color="green"><?= $sum_dir2_payed ?></font> | <font color="red"><?= $sum_dir2_notPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sum_dak2_register ?></font> | <font color="green"><?= $sum_dak2_payed ?></font> | <font color="red"><?= $sum_dak2_notPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sum_pai2_register + $sum_pbsm2_register + $sum_sya2_register + $sum_usu2_register + $sum_dir2_register + $sum_dak2_register  ?></font> | <font color="green"><?= $sum_pai2_payed + $sum_pbsm2_payed + $sum_sya2_payed + $sum_usu2_payed + $sum_dir2_payed + $sum_dak2_payed  ?></font> | <font color="red"><?= $sum_pai2_notPayed + $sum_pbsm2_notPayed + $sum_sya2_notPayed + $sum_usu2_notPayed + $sum_dir2_notPayed + $sum_dak2_notPayed  ?></font></td>
                </tr>
                
                <tr align="center">
                    <td align="center">TOTAL DUIT</td>
                    <td colspan="6" align="left"><?= number_format($resultTotalMoney2) ?> ฿</td>
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
                    <td align="center">DAKWAH</td>
                    <td align="center">TOTAL</td>
                </tr>
                
                <tr align="center">
                    <td align="center">1</td>
                    <td align="center"><font color="orange"><?= $exam_pai11Count ?></font> | <font color="green"><?= $exam_pai11CountPayed ?></font> | <font color="red"><?= $exam_pai11CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_pbsm11Count ?></font> | <font color="green"><?= $exam_pbsm11CountPayed ?></font> | <font color="red"><?= $exam_pbsm11CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_sya11Count ?></font> | <font color="green"><?= $exam_sya11CountPayed ?></font> | <font color="red"><?= $exam_sya11CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $usu11Count ?></font> | <font color="green"><?= $exam_usu11CountPayed ?></font> | <font color="red"><?= $usu11CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_dir11Count ?></font> | <font color="green"><?= $exam_dir11CountPayed ?></font> | <font color="red"><?= $exam_dir11CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_dak11Count ?></font> | <font color="green"><?= $exam_dak11CountPayed ?></font> | <font color="red"><?= $exam_dak11Count - $exam_dak11CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_pai11Count + $exam_pbsm11Count + $usu11Count + $exam_dir11Count + $exam_dak11Count ?></font> | <font color="green"><?= $exam_pai11CountPayed + $exam_pbsm11CountPayed + $exam_sya11CountPayed + $exam_usu11CountPayed + $exam_dir11CountPayed + $exam_dak11CountPayed ?></font> | <font color="red"><?= ($exam_pai11Count + $exam_pbsm11Count + $usu11Count + $exam_dir11Count + $exam_dak11Count)-($exam_pai11CountPayed + $exam_pbsm11CountPayed + $exam_sya11CountPayed + $exam_usu11CountPayed + $exam_dir11CountPayed + $exam_dak11CountPayed) ?></font></td>
                </tr>
            
                <tr align="center">
                    <td align="center">2</td>
                    <td align="center"><font color="orange"><?= $exam_pai21Count ?></font> | <font color="green"><?= $exam_pai21CountPayed ?></font> | <font color="red"><?= $exam_pai21countNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_pbsm21Count ?></font> | <font color="green"><?= $exam_pbsm21CountPayed ?></font> | <font color="red"><?= $exam_pbsm21CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_sya21Count ?></font> | <font color="green"><?= $exam_sya21CountPayed ?></font> | <font color="red"><?= $exam_sya21CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_usu21Count ?></font> | <font color="green"><?= $exam_usu21CountPayed ?></font> | <font color="red"><?= $exam_usu21CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_dir21Count ?></font> | <font color="green"><?= $exam_dir21CountPayed ?></font> | <font color="red"><?= $exam_dir21CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_dak21Count ?></font> | <font color="green"><?= $exam_dak21CountPayed ?></font> | <font color="red"><?= $exam_dak21Count - $exam_dak21CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_pai21Count + $exam_pbsm21Count + $exam_sya21Count + $exam_usu21Count + $exam_dir21Count + $exam_dak21Count ?></font> | <font color="green"><?= $exam_pai21CountPayed + $exam_pbsm21CountPayed + $exam_sya21CountPayed + $exam_usu21CountPayed + $exam_dir21CountPayed + $exam_dak21CountPayed ?></font> | <font color="red"><?= ($exam_pai21Count + $exam_pbsm21Count + $exam_sya21Count + $exam_usu21Count + $exam_dir21Count + $exam_dak21Count)-($exam_pai21CountPayed + $exam_pbsm21CountPayed + $exam_sya21CountPayed + $exam_usu21CountPayed + $exam_dir21CountPayed + $exam_dak21CountPayed) ?></font></td>
                </tr>
                
                <tr align="center">
                    <td align="center">3</td>
                    <td align="center"><font color="orange"><?= $exam_pai31Count ?></font> | <font color="green"><?= $exam_pai31CountPayed ?></font> | <font color="red"><?= $exam_pai31CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_pbsm31Count ?></font> | <font color="green"><?= $exam_pbsm31CountPayed ?></font> | <font color="red"><?= $exam_pbsm31CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_sya31Count ?></font> | <font color="green"><?= $exam_sya31CountPayed ?></font> | <font color="red"><?= $exam_sya31CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_usu31Count ?></font> | <font color="green"><?= $exam_usu31CountPayed ?></font> | <font color="red"><?= $exam_usu31CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_dir31Count ?></font> | <font color="green"><?= $exam_dir31CountPayed ?></font> | <font color="red"><?= $exam_dir31CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_dak31Count ?></font> | <font color="green"><?= $exam_dak31CountPayed ?></font> | <font color="red"><?= $exam_dak31Count - $exam_dak31CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_pai31Count + $exam_pbsm31Count + $exam_sya31Count + $exam_usu31Count + $exam_dir31Count + $exam_dak31Count ?></font> | <font color="green"><?= $exam_pai31CountPayed + $exam_pbsm31CountPayed + $exam_sya31CountPayed + $exam_usu31CountPayed + $exam_dir31CountPayed + $exam_dak31CountPayed ?></font> | <font color="red"><?= ($exam_pai31Count + $exam_pbsm31Count + $exam_sya31Count + $exam_usu31Count + $exam_dir31Count + $exam_dak31Count)-($exam_pai31CountPayed + $exam_pbsm31CountPayed + $exam_sya31CountPayed + $exam_usu31CountPayed + $exam_dir31CountPayed + $exam_dak31CountPayed) ?></font></td>
                </tr>
                
                <tr align="center">
                    <td align="center">4</td>
                    <td align="center"><font color="orange"><?= $exam_pai41Count ?></font> | <font color="green"><?= $exam_pai41CountPayed ?></font> | <font color="red"><?= $exam_pai41CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_pbsm41Count ?></font> | <font color="green"><?= $exam_pbsm41CountPayed ?></font> | <font color="red"><?= $exam_pbsm41CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_sya41Count ?></font> | <font color="green"><?= $exam_sya41CountPayed ?></font> | <font color="red"><?= $exam_sya41CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_usu41Count ?></font> | <font color="green"><?= $exam_usu41CountPayed ?></font> | <font color="red"><?= $exam_usu41CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_dir41Count ?></font> | <font color="green"><?= $exam_dir41CountPayed ?></font> | <font color="red"><?= $exam_dir41CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_dak41Count ?></font> | <font color="green"><?= $exam_dak41CountPayed ?></font> | <font color="red"><?= $exam_dak41Count - $exam_dak41CountPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_pai41Count - $exam_pbsm41Count + $exam_sya41Count + $exam_usu41Count + $exam_dir41Count + $exam_dak41Count ?></font> | <font color="green"><?= $exam_pai41CountPayed + $exam_pbsm41CountPayed + $exam_sya41CountPayed + $exam_usu41CountPayed + $exam_dir41CountPayed + $exam_dak41CountPayed ?></font> | <font color="red"><?= ($exam_pai41Count - $exam_pbsm41Count + $exam_sya41Count + $exam_usu41Count + $exam_dir41Count + $exam_dak41Count)-($exam_pai41CountPayed + $exam_pbsm41CountPayed + $exam_sya41CountPayed + $exam_usu41CountPayed + $exam_dir41CountPayed + $exam_dak41CountPayed) ?></font></td>
                </tr>
                
                <tr align="center">
                    <td align="center">TOTAL</td>
                    <td align="center"><font color="orange"><?= $sumExam_pai1_register ?></font> | <font color="green"><?= $sumExam_pai1_payed ?></font> | <font color="red"><?= $sumExam_pai1_notPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sumExam_pbsm1_register ?></font> | <font color="green"><?= $sumExam_pbsm1_payed ?></font> | <font color="red"><?= $sumExam_pbsm1_notPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sumExam_sya1_register ?></font> | <font color="green"><?= $sumExam_sya1_payed ?></font> | <font color="red"><?= $sumExam_sya1_notPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sumExam_usu1_register ?></font> | <font color="green"><?= $sumExam_usu1_payed ?></font> | <font color="red"><?= $sumExam_usu1_notPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sumExam_dir1_register ?></font> | <font color="green"><?= $sumExam_dir1_payed ?></font> | <font color="red"><?= $sumExam_dir1_notPayed ?></font></td>
                    <td align="center"><font color="orange"><?= $sumExam_dak1_register ?></font> | <font color="green"><?= $sumExam_dak1_payed ?></font> | <font color="red"><?= $sumExam_dak1_register - $sumExam_dak1_payed ?></font></td>
                    <td align="center"><font color="orange"><?= $sumExam_dak1_register + $sumExam_dir1_register + $sumExam_usu1_register + $sumExam_sya1_register + $sumExam_pbsm1_register + $sumExam_pai1_register ?></font> | <font color="green"><?= $sumExam_dak1_payed + $sumExam_dir1_payed + $sumExam_usu1_payed + $sumExam_sya1_payed + $sumExam_pbsm1_payed + $sumExam_pai1_payed ?></font> | <font color="red"><?= ($sumExam_dak1_register + $sumExam_dir1_register + $sumExam_usu1_register + $sumExam_sya1_register + $sumExam_pbsm1_register + $sumExam_pai1_register)-($sumExam_dak1_payed + $sumExam_dir1_payed + $sumExam_usu1_payed + $sumExam_sya1_payed + $sumExam_pbsm1_payed + $sumExam_pai1_payed) ?></font></td>
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
                    <td align="center">DAKWAH</td>
                </tr>
                
                <tr align="center">
                    <td align="center">1</td>
                    <td align="center"><font color="orange"><?= $exam_pai12Count ?></font> | <font color="green"><?= $exam_pai12CountPayed ?></font> | <font color="red"><?= $exam_pai12CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_pbsm12Count ?></font> | <font color="green"><?= $exam_pbsm12CountPayed ?></font> | <font color="red"><?= $exam_pbsm12CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_sya12Count ?></font> | <font color="green"><?= $exam_sya12CountPayed ?></font> | <font color="red"><?= $exam_sya12CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $usu12Count ?></font> | <font color="green"><?= $usu12CountPayed ?></font> | <font color="red"><?= $usu12CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_dir12Count ?></font> | <font color="green"><?= $exam_dir12CountPayed ?></font> | <font color="red"><?= $exam_dir12CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_dak12Count ?></font> | <font color="green"><?= $exam_dak12CountPayed ?></font> | <font color="red"><?= $exam_dak12Count - $exam_dak12CountPayed ?></font></td>
                </tr>
            
                <tr align="center">
                    <td align="center">2</td>
                    <td align="center"><font color="orange"><?= $exam_pai22Count ?></font> | <font color="green"><?= $exam_pai22CountPayed ?></font> | <font color="red"><?= $exam_pai22CountNotPay ?></font></td></td>
                    <td align="center"><font color="orange"><?= $exam_pbsm22Count ?></font> | <font color="green"><?= $exam_pbsm22CountPayed ?></font> | <font color="red"><?= $exam_pbsm22CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_sya22Count ?></font> | <font color="green"><?= $exam_sya22CountPayed ?></font> | <font color="red"><?= $exam_sya22CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_usu22Count ?></font> | <font color="green"><?= $exam_usu22CountPayed ?></font> | <font color="red"><?= $exam_usu22CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_dir22Count ?></font> | <font color="green"><?= $exam_dir22CountPayed ?></font> | <font color="red"><?= $exam_dir22CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_dak22Count ?></font> | <font color="green"><?= $exam_dak22CountPayed ?></font> | <font color="red"><?= $exam_dak22Count - $exam_dak22CountPayed ?></font></td>
                </tr>
                
                <tr align="center">
                    <td align="center">3</td>
                    <td align="center"><font color="orange"><?= $exam_pai32Count ?></font> | <font color="green"><?= $exam_pai32CountPayed ?></font> | <font color="red"><?= $exam_pai32CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_pbsm32Count ?></font> | <font color="green"><?= $exam_pbsm32CountPayed ?></font> | <font color="red"><?= $exam_pbsm32CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_sya12Count ?></font> | <font color="green"><?= $exam_sya32CountPayed ?></font> | <font color="red"><?= $exam_sya32CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $usu12Count ?></font> | <font color="green"><?= $exam_usu32CountPayed ?></font> | <font color="red"><?= $exam_usu32CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_dak12Count ?></font> | <font color="green"><?= $exam_dak32CountPayed ?></font> | <font color="red"><?= $exam_dak12Count - $exam_dak32CountPayed ?></font></td>
                </tr>
                
                <tr align="center">
                    <td align="center">4</td>
                    <td align="center"><font color="orange"><?= $exam_pai42Count ?></font> | <font color="green"><?= $exam_pai42CountPayed ?></font> | <font color="red"><?= $exam_pai42CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_pbsm42Count ?></font> | <font color="green"><?= $exam_pbsm42CountPayed ?></font> | <font color="red"><?= $exam_pbsm42CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_sya42Count ?></font> | <font color="green"><?= $exam_sya42CountPayed ?></font> | <font color="red"><?= $exam_sya42CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_usu42Count ?></font> | <font color="green"><?= $exam_usu42CountPayed ?></font> | <font color="red"><?= $exam_usu42CountNotPay ?></font></td>
                    <td align="center"><font color="orange"><?= $exam_dak42Count ?></font> | <font color="green"><?= $exam_dak42CountPayed ?></font> | <font color="red"><?= $exam_dak42Count - $exam_dak42CountPayed ?></font></td>
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


