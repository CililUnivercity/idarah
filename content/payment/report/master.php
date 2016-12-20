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
            <a id="fromTo" href="#" onclick="formLoad('MasterFromTo', 'payment/report/form')" class="btn btn-success btn-sm">LAPORAN MENGIKUT MASA</a>
            <a id="fillByClass" href="#" onclick="formLoad('MasterFillByTerm', 'payment/report/form')" class="btn btn-success btn-sm">LAPORAN MENGIKUT SEMETER/TAHUN</a>
        </boxDiv2>    
        
        <hr>
        
        <div id="form" align="center">
            <form class="form-inline" id="masterSearchFromTo" role="form">
                <table>
                    <tr> 
                        <td>DARI - HINGGA : &nbsp;&nbsp;</td>
                        <td> <input type="date" class="form-control input-sm" id="fromDate"></td>&nbsp;&nbsp;
                        <td>&nbsp;&nbsp; - &nbsp;&nbsp;<input type="date" class="form-control input-sm" id="toDate"></td>
                        <td>
                            &nbsp;&nbsp; - &nbsp;&nbsp;
                            <select class="form-control input-sm" name="program" id="program">
                                <option value="1">PROGRAM</option>
                                <?php
                                    $masterDataProgram = masterDataProgram();
                                    while($row = mysqli_fetch_array($masterDataProgram)){
                                ?>
                                <option value="<?= $row['p_id'] ?>"><?= $row['p_name'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                </table>
            </form>
            <br>
            <table>
                <tr>
                    <td><button onclick="MasterSearchFromTo('masterSearchFromTo', 'payment/report/action')" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-search"></span> CARI</button></td></td>
                </tr>
            </table>
        </div>
            

        <div class="panel-body">
            
            <div id="lastStatement" align="center">
                
            </div>
  
        </div>
    </div>


