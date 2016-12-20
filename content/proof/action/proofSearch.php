<?php
    header("content-type: text/plain");
    include("../../connect.php");

    $class = $_POST['class'];
    $faculty = $_POST['faculty'];
    $department = $_POST['department'];
    
    $sql = mysqli_query($con, "SELECT * FROM students WHERE ft_id='$faculty' AND dp_id='$department' AND class='$class' AND student_id!='' ORDER BY student_id");
    
    $response = <<<RES

        <div class="pull-right">
            <a target="_blank" class="btn btn-success btn-sm" href="content/proof/print/proof.php?class={$class}&faculty={$faculty}&department={$department}"><span class="glyphicon glyphicon-print"></span> PRINT</a>
        </div>
        <br><br>
            
	<table class="table table-bordered">
            <thead>
                <tr>
                    <td align="center"><b>BIL</b></td>
                    <td align="center"><b>NO.POKOK</b></td>
                    <td align="center"><b>NAMA-NASAB</b></td>
                    <td align="center"><b><div id="subText"><b>نام - نسب</b></div></td>
                    <td align="center"><b>GAMBAR</b></td>
                    <td align="center"><b>SALINAN KAD PENGENALAN</b></td>
                    <td align="center"><b>SALINAN SENARAI DAPUR</b></td>
                    <td align="center"><b>SYAHADAH</b></td>
                  </tr>
          </thead>
RES;
    $i = 1;
    while($row = mysqli_fetch_array($sql)){
        $id = $row['st_id'];
        $student_id = str_replace("\'", "&#39;", $row["student_id"]);
        $name_r = str_replace("\'", "&#39;", $row["firstname_rumi"]);
        $lastname_r = str_replace("\'", "&#39;", $row["lastname_rumi"]);
        $name_j = str_replace("\'", "&#39;", $row["firstname_jawi"]);
        $lastname_j = str_replace("\'", "&#39;", $row["lastname_jawi"]);
        $certificate = $row["confCertificate"];
        $photo = $row["photo"];
        $citizenBook = $row["citizen_book"];
        $id_book = $row['id_book'];
        
        if($photo==''){
            $photoResult = "<span class='glyphicon glyphicon-remove'></span>";
        }else{
            $photoResult = "<span class='glyphicon glyphicon-ok'></span>";
        }
        
        if($id_book==''){
            $id_bookResult = "<span class='glyphicon glyphicon-remove'></span>";
        }else{
            $id_bookResult = "<span class='glyphicon glyphicon-ok'></span>";
        }
        
        if($citizenBook==''){
            $citizenBookResult = "<span class='glyphicon glyphicon-remove'></span>";
        }else{
            $citizenBookResult = "<span class='glyphicon glyphicon-ok'></span>";
        }
        
        if($certificate==''){
            $certificateResult = "<span class='glyphicon glyphicon-remove'></span>";
        }else{
            $certificateResult = "<span class='glyphicon glyphicon-ok'></span>";
        }
    $tbody = <<<TBODY
        <tbody>
            <tr id="$id">
                <td align="center">{$i}</td>
                <td align="center">{$student_id}</td>
                <td align="left">{$name_r} - {$lastname_r}</td>
                <td align="right"><div id='subText'>{$name_j} - {$lastname_j}</div></td>
                <td align="center">{$photoResult}</td>
                <td align="center">{$id_bookResult}</td>
                <td align="center">{$citizenBookResult}</td>
                <td align="center">{$certificateResult}</td>
            </tr>
	</tbody>
TBODY;
        $i++;
	$response .= $tbody;

	} //end block while

	$response .= "</table>";
        
        mysqli_close($con);

	echo $response;
?>