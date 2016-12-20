<?php

    $st_id = $_GET['st_id'];
    $gender = $_GET['gender'];
        
    $odrMax = mysqli_query($con, "SELECT MAX(odrNumber) AS odrNumber FROM pretest");
    $rsOdr = mysqli_fetch_array($odrMax);
    $maxOdr = $rsOdr['odrNumber'];
    $odrNumber = $maxOdr+1;
    //Update pretest data table
    $PRETEST = mysqli_query($con, "UPDATE pretest SET type='1',payStatus='1',odrNumber='$odrNumber' WHERE st_id='$st_id'");
?>
<script>
    alert("Pendaftaran calon mahasiswa sudah sempurna, sila print kertas peperiksaan");
</script>
<meta http-equiv="refresh" content="0; url=?page=admissions&&admissionpage=transferRegister&&st_id=<?= $st_id ?>">      
