<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../../../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional theme -->
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> -->

    
    <title>LAPORAN YURAN</title>
    
    <style>
        body {
            height: 842px;
            width: 595px;
            /* to centre page on screen*/
            margin-left: auto;
            margin-right: auto;
        }
        table {
            border-collapse: collapse;
        }
        @font-face {
            font-family: "jawi";
            src: url(font/jawi.ttf);
        }

        #main{
            font:35px "jawi";
        }
        #subText{
            font: 20px "jawi";
        }
        #thai{
            font: 12px "jawi";
        }
    </style>
    
    <script language="javascript" type="text/javascript">
        function printDiv(printableArea) {
            var printContents = document.getElementById(printableArea).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>

    </head>
    
        <?php
              
        ?>
	<body>	
            
            <br><br>
            <div id="printableArea">
                
                <table width="100%">
                    <tr align="center">
                        <td align="center">
                            <div id="main">جامعة الشيخ داود الفطاني اﻹسلامية - جالا </div>
                            <div id="main">نام فنشرح </div>
                        </td>
                    </tr>
                </table>
                
                <table border="1px" width="100%">
                    <tr style=" line-height: 20px;">
                        <td align="center">BIL</td>
                        <td align="middle">Nama - Nasab</td>
                        <td align="middle">TEL</td>
                        <td align="center">JENIS KELAMIN</td>
                        <td align="center"><div id="main">نام - نسب</div></td>
                        <td align="center"><div id="main">بيل</div></td>
                    </tr>
                    <?php 
                        $i = 1;
                        include '../../../connect.php';
                        $sql = mysqli_query($con, "SELECT * FROM teachers");
                        while($result = mysqli_fetch_array($sql)){
                            $fname = str_replace("\'", "&#39;", $result['t_fnameRumi']);
                            $lname = str_replace("\'", "&#39;", $result['t_lnameRumi']);
                            $fname_jawi = str_replace("\'", "&#39;", $result['t_fnameArab']);
                            $lname_jawi = str_replace("\'", "&#39;", $result['t_lnameArab']);
                            $gender = $result['t_gender'];
                            $tel = $result['t_telephone'];  
                    ?>
                    <tr style=" line-height: 20px;">
                        <td align="center"><?= $i ?></td>
                        <td align="left"><?= $fname ?> - <?= $lname ?></td>
                        <td align="center"><?= $tel ?></td>
                        <td align="center"><?= $gender ?></td>
                        <td align="right"><div id="subText"><?= $fname_jawi ?> - <?= $lname_jawi ?></div></td>
                        <td align="center"><?= $i ?></td>
                    </tr>
                    <?php   
                        $i++;
                        }
                    ?>
                </table>
            </div>
            
            <div align="center">
                <button type="button" class="btn btn-success btn-sm" onclick="printDiv('printableArea')">Print <span class="glyphicon glyphicon-print"></span></button>
            </div>
            
    </body>
</html>
