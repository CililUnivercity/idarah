<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>ADMIN | Kartu mahasiswa</title>
    
    <style>
        body {
            height: 842px;
            width: 595px;
            /* to centre page on screen*/
            margin-left: auto;
            margin-right: auto;
        }
        table{
            border-collapse: collapse;
            background-color: #a4b9ce;
        }
        @font-face {
            font-family: "jawi";
            src: url(font/jawi.ttf);
        }
        #main{
            font:25px "jawi";
        }
        #subText{
            font: 15px "jawi";
        }
        #head{
            font: 10px "jawi";
        }
        #text{
            font: 14px "jawi";
        }
        #eng{
            font: 10px "jawi";
        }
        f1 {
            font-size: 10px;
        }

        f2 {
            font-size: 20px;
        }

        f3 {
            font-size: 30%;
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
    
	<body>
            <h4 align="center">Kartu mahasiswa</h4>
            <div id="printableArea">
            <?php
                include '../../content/function/connect.php';
                //cout all student in page
                $size = count($_POST['st_id']);
                
                $i = 1;
                $rowCount = 1;
                while ($i <= $size) {
                    $select = $_POST['select'][$i];
                    if($select==""){
                        $rowCount = $rowCount - 1;
                    }
                    if($select != ""){
                        
                        $st_id = $_POST['st_id'][$i];
                        
                        $sql = mysqli_query($con, "SELECT * FROM students WHERE st_id='$st_id'");
                        $result = mysqli_fetch_array($sql);
                        $student_id = $result['student_id'];
                        $fname = str_replace("\'", "&#39;", $result["firstname_rumi"]);
                        $lname = str_replace("\'", "&#39;", $result["lastname_rumi"]);
                        $fnamej = str_replace("\'", "&#39;", $result["firstname_jawi"]);
                        $lnamej = str_replace("\'", "&#39;", $result["lastname_jawi"]);
                        $email = str_replace("\'", "&#39;", $result["email"]);
                        $ft_id = $result['ft_id'];
                        //bio data
                        $image = mysqli_query($con, "SELECT * FROM image WHERE st_id='$st_id'");
                        $imageRs = mysqli_fetch_array($image);
                        $imageName = $imageRs['images'];
                        //faculty
                        $faculty = mysqli_query($con, "SELECT * FROM fakultys WHERE ft_id='$ft_id'");
                        $ft_result = mysqli_fetch_array($faculty);
                        $ftName = $ft_result['ft_name'];
                ?>
                        <table border="1">
                             <tr>
                                    <td width="50%">
                                        <table border="0" style="background-image:url(image/membercard_background.jpg);width:100%; height: 100%">

                                        <tr>
                                            <td></td>
                                            <td valign="top"><img src="image/LOGO JISDA.png" width="60px" height="70px"><br></td>
                                            <td></td>
                                            <td valign="top">
                                                <div id="subText" align="center"><b>جامعة الشيخ داود الفطاني الإسلامية </b></div>
                                                <div id="head" align="center"><b>JAMIAH ISLAM SYIEKH DAUD AL-FATHANI</b></div>
                                                <div align="center"><f1>NIM : <?= $student_id ?></f1></div>
                                                <div align="center"><f1><?= ucfirst($fname) ?> <?= ucfirst($lname) ?></f1></div>
                                                <div align="center" id="text"><?= $fnamej ?>&nbsp;&nbsp;<?= $lnamej ?></div></div>
                                                <div align="center"><f1><?= ucfirst($ftName) ?></f1></div>
                                                <div align="center"><f1>J &nbsp;&nbsp;&nbsp; I &nbsp;&nbsp;&nbsp; S &nbsp;&nbsp;&nbsp; D &nbsp;&nbsp;&nbsp; A</f1></div>
                                            </td>
                                            <td></td>
                                            <td valign="top"><img src="../../content/student/capture/images/<?= $imageName ?>.jpg" width="70px" height="80px"></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><td></td></td>
                                            <td></td>
                                            <td valign="top" align="center">
                                                <img align="center" src="../../content/function/barcode.php?text=JD<?= $student_id ?>" width="130px" height="40px" />
                                                JD<?= $student_id ?>
                                            </td>
                                            <td></td>
                                            <td width="30"></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </td>

                                <td width="50%" >
                                    <table border="0" style="background-image:url(image/membercard_background.jpg);width:100%; height: 100%">
                                        <tr>
                                            <td>&nbsp;&nbsp;</td>
                                            <td valign="top">
                                                    <div id="subText" align="center"><b>جامعة الشيخ داود الفطاني الإسلامية </b></div>
                                                    <div id="head" align="center"><b>JAMIAH ISLAM SYIEKH DAUD AL-FATHANI</b></div>
                                                    <hr>
                                                    <div align="center"><f1>KARTU MAHASISWA JISDA</f1></div>
                                                    <div align="left"><f1>- Kartu ini di keluar oleh JISDA</f1></div>
                                                    <div align="left"><f1>- Harap di kembalikan kepada pemilik jika di temui</f1></div>
                                            </td>
                                            <td>&nbsp;&nbsp;</td>
                                            <td valign="top"></td>
                                            <td>&nbsp;&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><br><br><br><br></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>  
                            </table>
               <?php
                            if($select==""){
                                $rowCount = $rowCount - 1;
                            }else{
                                if($rowCount==5){
                                    $rowCount=0;
                                    echo '<table><tr><td><br><br><br><br><br><br><br></td></tr></table>';
                                } 
                            }
                        
                    }else{

                    }
                    ++$i;
                    $rowCount++;
                    
                }
                ?>
            </div>
            
            <br>
            <div align="center">
                <button type="button" class="btn btn-success" onclick="printDiv('printableArea')">Print <span class="glyphicon glyphicon-print"></span></button>
            </div>
            
    </body>
</html>


<!--
    crhome extend for print background
    https://chrome.google.com/webstore/detail/print-background-colors/gjecpgdgnlanljjdacjdeadjkocnnamk/related
-->