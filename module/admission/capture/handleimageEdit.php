<?php
session_start();
//$_SESSION['id']="1";
//$id=$_SESSION['id'];
$st_id = $_GET['studentid'];
include 'connection.php';
$name = date('YmdHis');
$newname="../../../content/student/capture/images/".$name.".jpg";
$file = file_put_contents( $newname, file_get_contents('php://input') );
if (!$file) {
	print "Error occured here";
	exit();
}
else
{
    $sql="UPDATE image SET images='$name',name='$newname' WHERE st_id='$st_id'";
    $result=mysqli_query($con,$sql);
    $value=mysqli_insert_id($con);
    $_SESSION["myvalue"]=$value;
	
}

$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/' . $newname;
print "$url\n";

?>
