<?php
    header("content-type:text/plain");
    
    include '../../function/connect.php';
    $q = addslashes($_POST['q']);
    $sql = mysqli_query($con, "SELECT st.*,ft.* FROM students st
                               INNER JOIN fakultys ft ON st.ft_id=ft.ft_id 
                               WHERE student_id='$q' OR
                               firstname_rumi LIKE '%$q%' OR
                               lastname_rumi LIKE '%$q%' OR
                               firstname_jawi LIKE '%$q%' OR
                               lastname_jawi LIKE '%$q%' OR
                               cityzen_id='$q' OR
                               telephone='$q'");
    
    $response = <<<RS
        <div class="pull-left">Hasil pencarian "$q" :-</div>    
        <div class="pull-right"><a href="?page=studentCard" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-arrow-left"></span> back</a></div>
        <br><br>
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <td align="center"><b>NIM</b></td>
                    <td align="center"><b>NAMA - NASAB</b></td>
                    <td align="center"><b>FAKULTI</b></td>
                    <td align="center"><b>JURUSAN</b></td>
                </tr>
            </thead>
            <tbody>
RS;
    while($p = mysqli_fetch_array($sql)){
        $st_id = $p['st_id'];
        $student_id = $p['student_id'];
        $ft_id = $p['ft_id'];
        $dp_id = $p['dp_id'];
	$student_id = $p['student_id'];
        $fname = str_replace("\'", "&#39;", $p["firstname_rumi"]);
        $lname = str_replace("\'", "&#39;", $p["lastname_rumi"]);
        $fname_j = str_replace("\'", "&#39;", $p["firstname_jawi"]);
        $lname_j = str_replace("\'", "&#39;", $p["lastname_jawi"]);
        $telephone = str_replace("\'", "&#39;", $p["telephone"]);
        $program = $p['program'];
        $cityzen_id = $p['cityzen_id'];
		
	$faculty = mysqli_query($con, "SELECT * FROM fakultys WHERE ft_id='$ft_id'");
	$ftResult = mysqli_fetch_array($faculty);
	$ft_name = $ftResult['ft_name'];
                
        $department = mysqli_query($con, "SELECT * FROM departments WHERE dp_id='$dp_id'");
	$dpResult = mysqli_fetch_array($department);
	$dp_name = $dpResult['dp_name'];
        
        $tbody = <<<RS
                <tr>
                    <td align="center"><a href="content/card/printCard.php?st_id={$st_id}" target="_blank">{$student_id}</a></td>
                    <td align="left">{$fname} - {$lname}</td>
                    <td align="left">{$ft_name}</td>
                    <td align="left">{$dp_name}</td>
                </tr>
RS;
     $response .= $tbody;             
    }
    $response .= "</tbody></table>";
    
    if(mysqli_num_rows($sql)==0){
		$response = "<b>Tidak jumpa data :</b> $q";
                echo $response;
    }else{
        echo $response;
    }
?>

