<?php
    
	header("content-type:text/javascript");
	include("../../connect.php");
        $id = $_POST['id'];
        
	$student_id = $_POST['student_id'];
        $student_idText = addslashes($student_id);
        
        $income_year = $_POST['income_year'];
        $income_yearText = addslashes($income_year);

        $ft_id = $_POST['ft_id'];
        $ft_idText = addslashes($ft_id);

        $dp_id = $_POST['dp_id'];
        $dp_idText = addslashes($dp_id);

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
        
        $father_job = $_POST['father_job'];
        $father_jobText = addslashes($father_job);
        
        $mother_name = $_POST['mother_name'];
        $mother_nameText = addslashes($mother_name);
        
        $mother_lastname = $_POST['mother_lastname'];
        $mother_lastnameText = addslashes($mother_lastname);
        
        $mother_job = $_POST['mother_job'];
        $mother_jobText = addslashes($mother_job);
        
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
        
        $down_graduate = $_POST['down_graduate'];
        $down_graduateText = addslashes($down_graduate);
        
        $down_graduate_year = $_POST['down_graduate_year'];
        $down_graduate_yearText = addslashes($down_graduate_year);
        
        $first_highschool_graduate = $_POST['first_highschool_graduate'];
        $first_highschool_graduateText = addslashes($first_highschool_graduate);
        
        $first_highschool_graduate_year = $_POST['first_highschool_graduate_year'];
        $first_highschool_graduate_yearText = addslashes($first_highschool_graduate_year);
        
        $second_highschool_graduate = $_POST['second_highschool_graduate'];
        $second_highschool_graduateText = addslashes($second_highschool_graduate);
        
        $second_highschool_graduate_year = $_POST['second_highschool_graduate_year'];
        $second_highschool_graduate_yearText = addslashes($second_highschool_graduate_year);
         
        if(isset($_POST['certificate'])){
            $certificate = $_POST['certificate'];
            $certificateText = addslashes($certificate);
        }else{
            $certificate = "";
            $certificateText = addslashes($certificate);
        }

        if(isset($_POST['citizen_book'])){
            $citizen_book = $_POST['citizen_book'];
            $citizen_bookText = addslashes($citizen_book);
        }else{
            $citizen_book = "";
            $citizen_bookText = addslashes($citizen_book);
        }

        if(isset($_POST['id_book'])){
            $id_book = $_POST['id_book'];
            $id_bookText = addslashes($id_book);
        }else{
            $id_book = "";
            $id_bookText = addslashes($id_book);
        }

        if(isset($_POST['photo'])){
            $photo = $_POST['photo'];
            $photoText = addslashes($photo);
        }else{
            $photo = "";
            $photoText = addslashes($photo);
        }
        
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
       
	$update = mysqli_query($con, "UPDATE students SET
                  student_id = '$student_idText',
                  income_year = '$income_yearText',
                  ft_id = '$ft_idText',
                  dp_id = '$dp_idText',
                  firstname_rumi = '$firstname_rumiText',
                  lastname_rumi = '$lastname_rumiText',
                  firstname_jawi = '$firstname_jawiText',
                  lastname_jawi = '$lastname_jawiText',
                  firstname_eng = '$firstname_engText',
                  lastname_eng = '$lastname_engText',
                  gender = '$genderText',
                  cityzen_id = '$cityzen_id',
                  birdth_date = '$birdth_dateText',
                  disease = '$diseaseText',
                  father_name = '$father_nameText',
                  father_lastname = '$father_lastnameText',
                  father_job = '$father_jobText',
                  mother_name = '$mother_nameText',
                  mother_lastname = '$mother_lastnameText',
                  mother_job = '$mother_jobText',
                  email = '$emailText',
                  telephone = '$telephoneText',
                  ibtidai_graduate = '$ibtidai_graduate',
                  ibtidai_graduate_year = '$ibtidai_graduate_yearText',
                  mutawasit_graduate = '$mutawasit_graduateText',
                  mutawasit_graduate_year = '$mutawasit_graduate_yearText',
                  sanawi_graduate = '$sanawi_graduateText',
                  sanawi_graduate_year = '$sanawi_graduate_yearText',
                  down_graduate = '$down_graduateText',
                  down_graduate_year = '$down_graduate_yearText',
                  first_highschool_graduate = '$first_highschool_graduateText',
                  first_highschool_graduate_year = '$first_highschool_graduate_yearText',
                  second_highschool_graduate = '$second_highschool_graduateText',
                  second_highschool_graduate_year = '$second_highschool_graduate_yearText',
                  melayu_lang_skill = '$melayu_lang_skillText',
                  arab_lang_skill = '$arab_lang_skillText',
                  ingris_lang_skill = '$ingris_lang_skillText',
                  thai_lang_skill = '$thai_lang_skillText',
                  certificate = '$certificateText',
                  citizen_book = '$citizen_bookText',
                  id_book = '$id_bookText',
                  photo = '$photoText',
                  password = '$passwordText'
                  WHERE st_id='$id'");
	mysqli_close($con);
        
	echo <<<JS
            loadRegisterContent('studentShow', 'student', '$id');
JS;
?>