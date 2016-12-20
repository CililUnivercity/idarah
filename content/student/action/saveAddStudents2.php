<?php
    header("content-type: text/javascript");
    
    include("../../connect.php");
    $student_id = $_POST['student_id'];
    $student_idText = addslashes($student_id);
    
    $program = $_POST['program'];
    $programText = addslashes($program);
    
    $income_year = $_POST['income_year'];
    $income_yearText = addslashes($income_year);
    
    $firstname_rumi = $_POST['firstname_rumi'];
    $firstname_rumiText = addslashes($firstname_rumi);
    
    $lastname_rumi = $_POST['lastname_rumi'];
    $lastname_rumiText = addslashes($lastname_rumi);
    
    $firstname_jawi = $_POST['firstname_jawi'];
    $firstname_jawiText = addslashes($firstname_jawi);
    
    $lastname_jawi = $_POST['lastname_jawi'];
    $lastname_jawiText = addslashes($lastname_jawi);
    
    $firstname_eng = $_POST['firstname_eng'];
    $firstname_engText = addslashes($firstname_eng);
    
    $lastname_eng = $_POST['lastname_eng'];
    $lastname_engText = addslashes($lastname_eng);
    
    $gender = $_POST['gender'];
    $genderText = addslashes($gender);
    
    $cityzen_id = $_POST['cityzen_id'];
    $cityzen_idText = addslashes($cityzen_id);
    
    $birdth_date = $_POST['birdth_date'];
    $birdth_dateText = addslashes($birdth_date);
    
    $disease = $_POST['disease'];
    $diseaseText = addslashes($disease);
    
    $father_name = $_POST['father_name'];
    $father_nameText = addslashes($father_name);
    
    $father_lastname = $_POST['father_lastname'];
    $father_lastnameText = addslashes($father_lastname);
    
    $mother_name = $_POST['mother_name'];
    $mother_nameText = addslashes($mother_name);
    
    $mother_lastname = $_POST['mother_lastname'];
    $mother_lastnameText = addslashes($mother_lastname);
    
    $job = $_POST['job'];
    $jobText = addslashes($job);
    
    $income = $_POST['income'];
    $incomeText = addslashes($income);
    
    $email = $_POST['email'];
    $emailText = addslashes($email);
    
    $telephone = $_POST['telephone'];
    $telephoneText = addslashes($telephone);
    
    $ibtidai_graduate = $_POST['ibtidai_graduate'];
    $ibtidai_graduateText = addslashes($ibtidai_graduate);
    
    $ibtidai_graduate_year = $_POST['ibtidai_graduate_year'];
    $ibtidai_graduate_yearText = addslashes($ibtidai_graduate_year);
    
    $mutawasit_graduate = $_POST['mutawasit_graduate'];
    $mutawasit_graduateText = addslashes($mutawasit_graduate);
    
    $mutawasit_graduate_year = $_POST['mutawasit_graduate_year'];
    $mutawasit_graduate_yearText = addslashes($mutawasit_graduate_year);
    
    $sanawi_graduate = $_POST['sanawi_graduate'];
    $sanawi_graduateText = addslashes($sanawi_graduate);
    
    $sanawi_graduate_year = $_POST['sanawi_graduate_year'];
    $sanawi_graduate_yearText = addslashes($sanawi_graduate_year);
    
    $bachelor_graduate = $_POST['bachelor_graduate'];
    $bachelor_graduateText = addslashes($bachelor_graduate);
    
    if(isset($_POST['melayu_lang_skill'])){
        $melayu_lang_skill = $_POST['melayu_lang_skill'];
        $melayu_lang_skillText = addslashes($melayu_lang_skill);
    }else{
        $melayu_lang_skill = "";
        $melayu_lang_skillText = addslashes($melayu_lang_skill);
    }
    
    if(isset($_POST['arab_lang_skill'])){
        $arab_lang_skill = $_POST['arab_lang_skill'];
        $arab_lang_skillText = addslashes($arab_lang_skill);
    }else{
        $arab_lang_skill = "";
        $arab_lang_skillText = addslashes($arab_lang_skill);
    }
    
    if(isset($_POST['ingris_lang_skill'])){
        $ingris_lang_skill = $_POST['ingris_lang_skill'];
        $ingris_lang_skillText = addslashes($ingris_lang_skill);
    }else{
        $ingris_lang_skill = "";
        $ingris_lang_skillText = addslashes($ingris_lang_skill);
    }
    
    if(isset($_POST['thai_lang_skill'])){
        $thai_lang_skill = $_POST['thai_lang_skill'];
        $thai_lang_skillText = addslashes($thai_lang_skill);
    }else{
        $thai_lang_skill = "";
        $thai_lang_skillText = addslashes($thai_lang_skill);
    }
    
    
    $password = $_POST['password'];
    $passwordText = addslashes($password);
    
    $check = mysqli_query($con, "select * from students WHERE student_id='$student_idText'");
    $rs_c = mysqli_fetch_array($check);
        
    if($rs_c[0] > 0){
        echo <<<JS
		alert("Data sudah ada!");
                document.getElementById('student_id').focus();
                document.getElementById('msg').innerHTML = "";
JS;
    }else{ 
        $insert = mysqli_query($con, "INSERT INTO students
        (student_id,program,income_year,firstname_rumi,lastname_rumi,
        firstname_jawi,lastname_jawi,firstname_eng,lastname_eng,gender,
        cityzen_id,birdth_date,disease,father_name,father_lastname,
        mother_name,mother_lastname,job,income,email,
        telephone,ibtidai_graduate,ibtidai_graduate_year,mutawasit_graduate,mutawasit_graduate_year,
        sanawi_graduate,sanawi_graduate_year,bachelor_graduate,melayu_lang_skill,arab_lang_skill,
        ingris_lang_skill,thai_lang_skill,password)
        VALUES 
        ('$student_idText','$programText','$income_yearText','$firstname_rumiText','$lastname_rumiText',
        '$firstname_jawiText','$lastname_jawiText','$firstname_engText','$lastname_engText','$genderText',
        '$cityzen_idText','$birdth_dateText','$diseaseText','$father_nameText','$father_lastnameText',
        '$mother_nameText','$mother_lastnameText','$jobText','$incomeText','$emailText',
        '$telephoneText','$ibtidai_graduateText','$ibtidai_graduate_yearText','$mutawasit_graduateText','$mutawasit_graduate_yearText',
        '$sanawi_graduateText','$sanawi_graduate_yearText','$bachelor_graduateText','$melayu_lang_skillText','$arab_lang_skillText',
        '$ingris_lang_skillText','$thai_lang_skillText','$passwordText')");
        
        $maxId = mysqli_query($con, "SELECT MAX(st_id) AS max FROM students");
        $RowId = mysqli_fetch_array($maxId);
        $id = $RowId['max'];

        mysqli_close($con);
        echo <<<JS
        loadRegisterContent('addMasterStep2', 'student/add', '$id');
JS;
    }
?>

