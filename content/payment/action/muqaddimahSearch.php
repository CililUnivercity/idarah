<?php
    header("content-type: text/plain");
    
    include("../../connect.php");
    $tt = mysqli_real_escape_string($con, $_POST['q']);
    $q = addslashes($tt);

    $search = mysqli_query($con, "SELECT * FROM students
                           WHERE student_id='$q' or firstname_jawi LIKE '%".$q."%' or firstname_rumi LIKE '%".$q."%'");
	
    if(!$search){
        echo "Pencarian tidak ber hasil , cuba dengan data lain";
	mysqli_close($con);
        exit();
    }
    
    $response = <<<RES
        <b>Hasil pencarian :</b> $q
	<table class="table table-bordered">
            <thead>
                <tr>
                    <td align="center"><b>NO.POKOK</b></td>
                    <td align="center"><b>NAMA-NASAB</b></td>
                    <td align="center"><b><div id="subText"><b>نام - نسب</b></div></td>
                    <td align="center"><b>TAHUN DAFTAR</b></td>
                    <td align="center"><b>STATUS</b></td>
                  </tr>
          </thead>
RES;
	
   
    while($row = mysqli_fetch_array($search)){
        $id = $row['st_id'];
        $student_id = str_replace("\'", "&#39;", $row["student_id"]);
        $name_r = str_replace("\'", "&#39;", $row["firstname_rumi"]);
        $lastname_r = str_replace("\'", "&#39;", $row["lastname_rumi"]);
        $name_j = str_replace("\'", "&#39;", $row["firstname_jawi"]);
        $lastname_j = str_replace("\'", "&#39;", $row["lastname_jawi"]);
        $status = $row['muqaddimah'];
        $income_year = $row['income_year'];
        
        $new_id = $id;
        $new_income_year = $income_year;
        $sql_check_status = mysqli_query($con, "SELECT * FROM muqaddimah_pay WHERE st_id='$new_id' and m_academicyear='$new_income_year'");
        $rs_sql_check_status = mysqli_fetch_array($sql_check_status);
        if($rs_sql_check_status[0] > 0){  
            $payStatus = "<font color='green'><b>Sudah bayar</b></font>";
        }else{
            $payStatus = "<font color='red'><b>Belum bayar</b></font>";
        }
           
    $tbody = <<<TBODY
        <tbody>
            <tr id="$id">
                <td align="center"><a href="#" onclick="loadContent('muqaddimahPay', 'payment/muqaddimah', '$id')">{$student_id}</a></td>
                <td align="left">{$name_r} - {$lastname_r}</td>
                <td align="right"><div id='subText'>{$name_j} - {$lastname_j}</div></td>
                <td align="center">{$income_year}</td>   
                <td align="center">{$payStatus}</td>
            </tr>
	</tbody>
TBODY;

	$response .= $tbody;

	} //end block while

	$response .= "</table>";

	if(mysqli_num_rows($search)==0){
		$response = "<b>Tidak jumpa data :</b> $q";
	}

	mysqli_close($con);

	echo $response;
?>

