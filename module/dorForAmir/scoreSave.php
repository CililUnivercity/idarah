<?php
    $size = count($_POST['ss_score']);

    $i = 0;
    while ($i < $size) {
            $score= $_POST['ss_score'][$i];
            $id = $_POST['id'][$i];

            $query = mysqli_query($con, "UPDATE studentsubject SET ss_score = '$score' WHERE ss_id = '$id' LIMIT 1") ;
            ++$i;
}
echo "<script>alert('Data berhasil di perbaharui!')</script>";
?>
<meta http-equiv="refresh" content="0; url=?page=dorForAmir&&dolpage=list">
