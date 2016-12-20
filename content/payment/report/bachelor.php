<style>
boxDiv {
    width: 100px;
    padding: 8px;
    margin: 8px;
}
boxDiv2 {
    width: 100px;
    padding: 8px;
    margin: 8px;
    align:right;
}
</style>
<br>
<?php include 'function/function.php'; ?>


    <div class="panel panel-primary">

        <br>
        <boxDiv2>
            <a id="fromTo" href="#" onclick="formLoad('fromTo', 'payment/report/form')" class="btn btn-success btn-sm">LAPORAN MENGIKUT MASA</a>
            <a id="fillByClass" href="#" onclick="formLoad('fillByClass', 'payment/report/form')" class="btn btn-success btn-sm">LAPORAN MENGIKUT KELAS</a>
            <a id="fillByClass" href="#" onclick="formLoad('fillByTerm', 'payment/report/form')" class="btn btn-success btn-sm">LAPORAN MENGIKUT SEMETER/TAHUN</a>
        </boxDiv2>    
        
        <hr>
        
        <div id="form" align="center">
            <form class="form-inline" id="searchFromTo" role="form">
                <table>
                    <tr> 
                        <td>DARI - HINGGA : &nbsp;&nbsp;</td>
                        <td> <input type="date" class="form-control input-sm" id="fromDate"></td>&nbsp;&nbsp;
                        <td>&nbsp;&nbsp; - &nbsp;&nbsp;<input type="date" class="form-control input-sm" id="toDate"></td>
                    </tr>
                </table>
            </form>
            <br>
            <table>
                <tr>
                    <td><button onclick="searchFromTo('searchFromTo', 'payment/report/action')" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-search"></span> CARI</button></td></td>
                </tr>
            </table>
        </div>
            

        <div class="panel-body">
            
            <div id="lastStatement" align="center">
                <table class="table table-bordered table-hover table-striped">
                    <tr class="active">
                        <td align="center">TARIKH</td>
                        <td align="center">JUMLAH ORANG</td>
                        <td align="center">JUMLAH DUIT</td>
                    </tr>
                     <?php 
                    $sql = sumYuranMoney();
                    while ($result = mysqli_fetch_array($sql)){
                    ?>
                    <tr>
                        <td align="center"><?= $result['pay_date'] ?></td>
                        <td align="center"><?= $result['people'] ?></td>
                        <td align="center"><?= number_format($result['money']) ?>  ฿</td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
  
        </div>
    </div>


