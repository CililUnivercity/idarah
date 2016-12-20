<?php
	$id = $_POST['id'];
	include("../connect.php");
                    $tmp_name = $_FILES['pf_mou']['tmp_name'];
                    for($i = 0 ; $i < count($tmp_name); $i++){
                            sleep(1);
                            $name = $_FILES['pf_mou']['name'][$i];
                            move_uploaded_file($tmp_name[$i], "files/mou/".time().$name);
                            $documentName = time().$name;
                            $insert1 = mysqli_query($con, "INSERT INTO programfile VALUES ('','$id','$documentName','')");
                    }
?>
//แสดงข้อความที่เพจ upload.php ตามลักษณะการเชื่มโยงระหว่าเฟรมที่ได้กล่าวถึงไปแล้ว
<script>
	top.loadRegisterContent('editProgram', 'register', '<?= $id ?>');
</script>