<?php
	$id = $_POST['id'];
	include("../../connect.php");

                    $tmp_name = $_FILES['documents']['tmp_name'];
                    for($i = 0 ; $i < count($tmp_name); $i++){
                            sleep(1);
                            $name = $_FILES['documents']['name'][$i];
                            move_uploaded_file($tmp_name[$i], "../files/documents/".time().$name);
                            $documentName = time().$name;
                            $insert = mysqli_query($con, "INSERT INTO studentfile VALUES ('','$id','$documentName')");
                    }

?>
//แสดงข้อความที่เพจ upload.php ตามลักษณะการเชื่มโยงระหว่าเฟรมที่ได้กล่าวถึงไปแล้ว
<script>
    top.loadRegisterContent('master', 'student', '');
</script>