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
                                    include '../function/function.php';
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