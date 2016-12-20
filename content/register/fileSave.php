<?php
	$response = "";
	$save_path = "";
	$id = $_POST['id'];
	include("../connect.php");

        /*
	//ตรวจสอบว่าเกิด Error หรือไม่
	if($_FILES['pf_mou']['error']!=0){
		$response = "Error: {$_FILES['pf_mou']['error']}";
	}else{
		
			$save_dir = "files/mou";
			$type = explode(".", $_FILES['pf_mou']['name']);
			$type = $type[count($type)-1];
			//ถ้าไม่มี dir นี้อยู่ก่อนให้สร้างขึ้นมาใหม่
			if(!file_exists($save_dir)){
				mkdir($save_dir);
			}

			//พาธหรือเส้นทางที่เราจะนำไฟล์ไปเก็บ
			$save_path = $save_dir . "/" . time() . "." . $type; 
			$mouName = time() . "." . $type;

			if(!move_uploaded_file($_FILES['pf_mou']['tmp_name'], $save_path)){
				$response .= "ไม่สามารถบันทึกไฟล์ได้";
			}else{
				$insert1 = mysqli_query($con, "INSERT INTO programfile VALUES ('','$id','$mouName','')");
			}

	}
        */
                    $tmp_name = $_FILES['pf_mou']['tmp_name'];
                    for($i = 0 ; $i < count($tmp_name); $i++){
                            sleep(1);
                            $name = $_FILES['pf_mou']['name'][$i];
                            move_uploaded_file($tmp_name[$i], "files/mou/".time().$name);
                            $documentName = time().$name;
                            $insert1 = mysqli_query($con, "INSERT INTO programfile VALUES ('','$id','$documentName','')");
                    }

                    $tmp_name1 = $_FILES['pf_documents']['tmp_name'];
                    for($ii = 0 ; $ii < count($tmp_name1); $ii++){
                            sleep(1);
                            $name1 = $_FILES['pf_documents']['name'][$ii];
                            move_uploaded_file($tmp_name1[$ii], "files/documents/".time().$name1);
                            $documentName = time().$name1;
                            $insert2 = mysqli_query($con, "INSERT INTO programfile VALUES ('','$id','','$documentName')");
                    }
            
      
?>
//แสดงข้อความที่เพจ upload.php ตามลักษณะการเชื่มโยงระหว่าเฟรมที่ได้กล่าวถึงไปแล้ว
<script>
	top.loadRegisterContent('programList', 'register', '');
</script>