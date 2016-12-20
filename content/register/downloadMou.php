<?php 
    include("../connect.php");
    $id = $_GET['id'];
    $mou = mysqli_query($con, "SELECT * FROM programfile WHERE pf_id='$id'");
    $rowMou = mysqli_fetch_array($mou);
    $name = $rowMou['pf_mou'];
    $path = "files/mou/";
    $filename = $name;

    header("Content-Length: " . filesize($path.$filename));
    header('Pragma: public');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Cache-Control: private', false); // required for certain browsers 
    header('Content-Type: application/pdf');

    header('Content-Disposition: attachment; filename="'. basename($path.$filename) . '";');
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: ' . filesize($path.$filename));

    readfile($path.$filename);
?>