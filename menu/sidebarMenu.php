<?php
    $status = $_SESSION["status"];
    if($status == 'Pensyarah'){
        //*** Get User Login
        $id = $_SESSION['UserID'];
        $strSQL = "SELECT * FROM teachers WHERE t_id = '$id'";
        $objQuery = mysqli_query($con,$strSQL);
        $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);  
        
        $code = $objResult['t_code'];
        $fname = $objResult['t_fnameRumi'];
        $lname = $objResult['t_lnameRumi'];
    }else{
        //*** Get User Login
        $id = $_SESSION['UserID'];
        $strSQL = "SELECT * FROM user WHERE u_id = '$id'";
        $objQuery = mysqli_query($con,$strSQL);
        $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
        
        $code = $objResult['u_codename'].$objResult['u_codenumber'];
        $fname = $objResult['u_fname'];
        $lname = $objResult['u_lname'];
    }
    

?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><table width="100%">
            <tr><td></td><td align="left"> Data pengguna</td></tr>
      </table></h3>
  </div>
  <div class="panel-body">
      <p>KOD : <b><?= $code ?></b> </p> 
      <p>Nama-Baka : <b><?= $fname ?> - <?= $lname ?></b></p> 
      <p>Status Pengguna : <b><?= $status ?></b></p> 
  </div>
</div>

<?php
    if($status == 'Amir kuliah' or $status == 'Pusda'){
?>
<ul class="nav nav-pills nav-stacked">
    <li role="presentation" class="active"><a href="#">SISTEM IDARAH</a></li>
    <li role="presentation"><a href="?page=student&&studentpage=listed"><span class='glyphicon glyphicon-user'></span> Data mahasiswa</a></li>
    <li role="presentation"><a href="?page=activity&&activitypage=history"><span class='glyphicon glyphicon-tasks'></span> Aktivitas</a></li>
    <li role="presentation"><a href="?page=setting&&settingpage=specialScore"><span class='glyphicon glyphicon-cog'></span> Perkuliahan</a></li>
    <li role="presentation"><a href="?page=dorForAmir&&dolpage=main"><span class='glyphicon glyphicon-th-large'></span> Sistem Dur</a></li>
    <li role="presentation"><a href="#"><span class='glyphicon glyphicon-tasks'></span> Borang / Form</a></li>
    <li role="presentation"><a href="#"><span class='glyphicon glyphicon-comment'></span> Peraturan</a></li>
    <li role="presentation"><a href="#"><span class='glyphicon glyphicon-compressed'></span> Struktur</a></li>
    <li role="presentation"><a href="#"><span class='glyphicon glyphicon-stats'></span> Statistik mahasiswa</a></li>
</ul>
<?php
    }elseif($status == 'Kewangan' or $status == 'Admin'){
?>
<ul class="nav nav-pills nav-stacked">
    <li role="presentation" class="active"><a href="#">SISTEM IDARAH</a></li>
    <li role="presentation"><a href="?page=student&&studentpage=list"><span class='glyphicon glyphicon-user'></span> Data mahasiswa</a></li>
    <li role="presentation"><a href="?page=register&&registerpage=main"><span class='glyphicon glyphicon-list-alt'></span> Daftar program</a></li>
    <li role="presentation"><a href="?page=payment&&paymentpage=main"><span class='glyphicon glyphicon-usd'></span> Pembayaran</a></li>
    <li role="presentation"><a href="?page=proof"><span class='glyphicon glyphicon-flag'></span> Persyaratan</a></li>
    <li role="presentation"><a href="?page=report&&reportpage=main"><span class='glyphicon glyphicon-open-file'></span> Laporan</a></li>
    <li role="presentation"><a href="?page=activity&&activitypage=add"><span class='glyphicon glyphicon-tasks'></span> Aktivitas</a></li>
    <li role="presentation"><a href="?page=setting&&settingpage=specialScore"><span class='glyphicon glyphicon-cog'></span> Perkuliahan</a></li>
    <li role="presentation"><a href="?page=mustawa"><span class='glyphicon glyphicon-blackboard'></span> Pengajian mustawa</a></li>
    <li role="presentation"><a href="?page=post&&postpage=main"><span class='glyphicon glyphicon-tasks'></span> Post maklumat</a></li>
    <li role="presentation"><a href="?page=rs&&rspage=main"><span class='glyphicon glyphicon-flag'></span> Special menu</a></li>
    <li role="presentation"><a href="?page=dur"><span class='glyphicon glyphicon-compressed'></span> Sistem dur</a></li>
    <li role="presentation"><a href="?page=transcript&&transcriptpage=main"><span class='glyphicon glyphicon-stats'></span> Transcip</a></li>
    <li role="presentation"><a href="?page=admissions&&admissionpage=default"><span class='glyphicon glyphicon-stats'></span> Penerimaan mahasiswa baru</a></li>
    <li role="presentation"><a href="?page=attendance"><span class='glyphicon glyphicon-menu-hamburger'></span> Catatan kehadiran</a></li>
    <li role="presentation"><a href="?page=studentCard"><span class='glyphicon glyphicon-list'></span> Kartu mahasiswa</a></li>
</ul>
<?php 
    }elseif($status == 'Pensyarah'){
?>
<ul class="nav nav-pills nav-stacked">
    <li role="presentation" class="active"><a href="#">SISTEM IDARAH</a></li>
    <li role="presentation"><a href="#"><span class='glyphicon glyphicon-user'></span> Data mahasiswa</a></li>
    <li role="presentation"><a href="?page=setting&&settingpage=score"><span class='glyphicon glyphicon-cog'></span> Perkuliahan</a></li>
    <li role="presentation"><a href="#"><span class='glyphicon glyphicon-briefcase'></span> Jadual guru</a></li>
    <li role="presentation"><a href="#"><span class='glyphicon glyphicon-tasks'></span> Borang / Form</a></li>
    <li role="presentation"><a href="#"><span class='glyphicon glyphicon-comment'></span> Peraturan</a></li>
    <li role="presentation"><a href="#"><span class='glyphicon glyphicon-compressed'></span> Struktur</a></li>
</ul>
<?php
    //If status is "Pengurus data"
    }else{
?>
<ul class="nav nav-pills nav-stacked">
    <li role="presentation" class="active"><a href="#">SISTEM IDARAH</a></li>
    <li role="presentation"><a href="?page=student&&studentpage=list"><span class='glyphicon glyphicon-user'></span> Data mahasiswa</a></li>
    <li role="presentation"><a href="?page=register&&registerpage=main"><span class='glyphicon glyphicon-list-alt'></span> Daftar program</a></li>
    <li role="presentation"><a href="?page=setting&&settingpage=specialScore"><span class='glyphicon glyphicon-cog'></span> Perkuliahan</a></li>
    <li role="presentation"><a href="?page=proof"><span class='glyphicon glyphicon-flag'></span> Persyaratan</a></li>
    <li role="presentation"><a href="?page=mustawa"><span class='glyphicon glyphicon-blackboard'></span> Pengajian mustawa</a></li>
    <li role="presentation"><a href="#"><span class='glyphicon glyphicon-briefcase'></span> Jadual guru</a></li>
    <li role="presentation"><a href="#"><span class='glyphicon glyphicon-tasks'></span> Borang / Form</a></li>
    <li role="presentation"><a href="#"><span class='glyphicon glyphicon-comment'></span> Peraturan</a></li>
    <li role="presentation"><a href="#"><span class='glyphicon glyphicon-compressed'></span> Struktur</a></li>
</ul>
<?php 
    } 
?>
