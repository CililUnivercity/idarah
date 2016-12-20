<?php
    if(isset($_POST['certificate'])){
        $certificate = $_POST['certificate'];
    }else{
        $certificate = "";
    }
    
    if(isset($_POST['confCertificate'])){
        $confCertificate = $_POST['confCertificate'];
    }else{
        $confCertificate = "";
    }
    
    echo $certificate;
    
    
    /*
    
    $confCertificate = $_POST['confCertificate'];
    $citizenbook = $_POST['citizenbook'];
    $idBook = $_POST['idBook'];
    $photo = $_POST['photo'];
     * 
     */
?>

