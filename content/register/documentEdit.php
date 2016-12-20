<?php
	$id = $_POST['id'];
	include("../connect.php");
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
	top.loadRegisterContent('editProgram', 'register', '<?= $id ?>');
</script>