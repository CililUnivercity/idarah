<?php
	header("content-type: text/plain");
	include("../connect.php");
	$tt = mysqli_real_escape_string($con, $_GET['q']);
	$sk = addslashes($tt);

	$search = mysqli_query($con, "SELECT * FROM students  
								  WHERE firstname_rumi LIKE '%$sk%' OR 
								  lastname_rumi LIKE '%$sk%' OR 
								  firstname_jawi LIKE '%$sk%' OR 
								  lastname_jawi LIKE '%$sk%' OR
								  cityzen_id='$sk' OR
								  telephone='$sk' OR
								  student_id LIKE '%$sk%' ");
	
	if(!$search){
		echo "Pencarian tidak ber hasil , cuba dengan data lain";
		mysqli_close($con);
		exit();
	}

	$response = <<<RES
		<b>Hasil pencarian :</b> $sk
		<table class="table">
RES;
	
	while($p = mysqli_fetch_array($search)){
		$id = $p['st_id'];
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
                
                $programName = mysqli_query($con, "SELECT * FROM program WHERE p_id='$program'");
                $programNameFetch = mysqli_fetch_array($programName);
                $nameProgram = $programNameFetch['p_name'];
                
                if($program=='0'){
                    $selectAction =  "onclick='loadContent(\"studentShow\", \"student\", \"$id\")'";
                    $data = "<b>NIM :</b> <font color='red'><i> $student_id </i></font><br>
                            <b><div id='subText'><font color='orange'> $fname_j  - $lname_j  </font> : نام - نسب </div></b>
                             <b>NAMA - NASAB  :</b> <font color='orange'><i>$fname  -  $lname </i></font> <br>
                             <b>FAKULTI :</b> <font color='orange'><i> $ft_name </i></font><br>
                             <b>JURUSAN  :</b> <font color='orange'><i> $dp_name </i></font><br>
                             <b>NO TELEPON :</b> <font color='orange'><i>$telephone</i></font> <br>
                             <b>NO. KAD PENGENALAN :</b> <font color='orange'><i>$cityzen_id</i></font> <br>";
                }else{
                    $selectAction =  "onclick='loadContent(\"studentShowMaster\", \"student/edit\", \"$id\")'";
                    $data = "<b>NIM :</b> <font color='red'>$student_id</font> <br>
                            <b><div id='subText'><font color='orange'> $fname_j  - $lname_j  </font> : نام - نسب </div></b>
                            <b>NAMA - NASAB  :</b> <font color='orange'>$fname - $lname</font> <br>
                            <b>PROGRAM :</b> <font color='orange'>$nameProgram</font> <br>
                            <b>NO TELEPON :</b> <font color='orange'>$telephone</font> <br>
                            <b>NO. KAD PENGENALAN :</b> <font color='orange'>$cityzen_id</font> <br>";
                }
                
                $image = mysqli_query($con, "SELECT * FROM image WHERE id=(SELECT MAX(id) FROM image WHERE st_id='$id')");
                $imageRow = mysqli_fetch_array($image);
                
                if($imageRow[0]>0){
                    $src = 'content/student/capture/images/'.$imageRow["images"].'.jpg';
                    $picture = "<img src='$src' class='img-thumbnail' width='200px' hiegth='250px'>";
                }else{
                    $picture = "<a target='_blank' href='content/student/capture/index.php?st_id=$id'><img src='content/student/capture/images/add-user.png' class='img-thumbnail' width='200px' hiegth='250px'></a>";
                }                
                
		$tbody = <<<TBODY
			<tbody>
				<tr id="$id">
                                    <td width='20%'>
                                          $picture
                                    </td>
                                    <td align='left'>
                                        $data
                                    </td>
                                    <td align="right">
                                        
                                        <h4><a href="#"><span class="glyphicon glyphicon-print"></span></a> | <a $selectAction href="#"><span class="glyphicon glyphicon-edit"></span></a></h4>
                                    </td>
                                  </tr>
			</tbody>
TBODY;

	$response .= $tbody;

	} //end block while

	$response .= "</table>";

	if(mysqli_num_rows($search)==0){
		$response = "<b>Tidak jumpa data :</b> $sk";
	}

	mysqli_close($con);

	echo $response;
?>