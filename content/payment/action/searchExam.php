<?php
    header("content-type: text/plain");
    
    include("../../connect.php");
    $tt = mysqli_real_escape_string($con, $_POST['q']);
    $q = addslashes($tt);

    $search = mysqli_query($con, "SELECT srx.*,st.* FROM student_register_exam srx 
            INNER JOIN students st ON srx.st_id=st.st_id
            WHERE student_id='$q' or firstname_jawi LIKE '%".$q."%' or firstname_rumi LIKE '%".$q."%'
            ");
	
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
                    <td align="center"><div id="subText"><b>نام - نسب</b></div></td>
                    <td align="center"><b>SEMESTER/TAHUN</b></td>
                    <td align="center"><b>STATUS</b></td>
                    <td align="center"><b>Hapus</b></td>
                </tr>
          </thead>
RES;
	
    while($row = mysqli_fetch_array($search)){
        $id = $row['srx_id'];
        $student_id = str_replace("\'", "&#39;", $row["student_id"]);
        $name_r = str_replace("\'", "&#39;", $row["firstname_rumi"]);
        $lastname_r = str_replace("\'", "&#39;", $row["lastname_rumi"]);
        $name_j = str_replace("\'", "&#39;", $row["firstname_jawi"]);
        $lastname_j = str_replace("\'", "&#39;", $row["lastname_jawi"]);
        $term = $row['term'];
        $year = $row['year'];
        $status = $row['pay_status'];
        
        if($status=="Belum bayar" || $status=="BELUM LUNAS"){
            $payStatus = "<a class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-ok'></span> BELUM LUNAS</a>";
        }else{
            $payStatus = "<a class='btn btn-success btn-sm'><span class='glyphicon glyphicon-ok'></span> SUDAH LUNAS</a>";
        }
                
    $tbody = <<<TBODY
        <tbody>
            <tr id="$id">
                <td align="center"><a href="#" onclick="loadContent('examPay', 'payment/exam', '$id')" >{$student_id}</a></td>
                <td align="left">{$name_r} - {$lastname_r}</td>
                <td align="right"><div id='subText'>{$name_j} - {$lastname_j}</div></td>
                <td align="center">{$term}/{$year}</td>
                <td align="center">{$payStatus}</td>
                <td align="center"><a href="#" onclick="deleteRegisterExam('$id')"><span class="glyphicon glyphicon-remove"></span></a></td>
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

