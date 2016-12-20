<?php
    header("content-type: text/javascript");
    include '../../../connect.php';
    $mustawa_register_id = $_GET['mustawa_register_id'];
    $st_id = $_GET['st_id'];
    
    $DELETE = mysqli_query($con, "DELETE FROM mustawa_register WHERE mustawa_register_id='$mustawa_register_id'");
    
    echo "alert('Data berhasil di hapus !');";
    echo "mustawaPay('$st_id');";
?>
