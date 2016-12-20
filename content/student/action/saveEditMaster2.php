<?php
	header("content-type:text/javascript");
	include("../../connect.php");
        $id = $_POST['id'];
        
	$t_studentname = $_POST['t_studentname'];
        $t_studentnameText = addslashes($t_studentname);

        $t_studentlastname = $_POST['t_studentlastname'];
        $t_studentlastnameText = addslashes($t_studentlastname);

        $t_fathername = $_POST['t_fathername'];
        $t_fathernameText = addslashes($t_fathername);

        $t_fatherlastname = $_POST['t_fatherlastname'];
        $t_fatherlastnameText = addslashes($t_fatherlastname);

        $t_mothername = $_POST['t_mothername'];
        $t_mothernameText = addslashes($t_mothername);

        $t_motherlastname = $_POST['t_motherlastname'];
        $t_motherlastnameText = addslashes($t_motherlastname);
        
        $t_province = $_POST['t_province'];
        $t_provinceText = addslashes($t_province);

        $t_village_name = $_POST['t_village_name'];
        $t_village_nameText = addslashes($t_village_name);

        $house_number = $_POST['house_number'];
        $house_numberText = addslashes($house_number);

        $place = $_POST['place'];
        $placeText = addslashes($place);

        $t_road = $_POST['t_road'];
        $t_roadText = addslashes($t_road);

        $t_subdistrict = $_POST['t_subdistrict'];
        $t_subdistrictText = addslashes($t_subdistrict);

        $t_district = $_POST['t_district'];
        $t_districtText = addslashes($t_district);

        $t_province_sec = $_POST['t_province_sec'];
        $t_province_secText = addslashes($t_province_sec);

        $post = $_POST['post'];
        $postText = addslashes($post);

	$update = mysqli_query($con, "UPDATE students SET
                  t_studentname = '$t_studentnameText',
                  t_studentlastname = '$t_studentlastnameText',
                  t_province = '$t_provinceText',
                  t_fathername = '$t_fathernameText',
                  t_fatherlastname = '$t_fatherlastnameText',
                  t_mothername = '$t_mothernameText',
                  t_motherlastname = '$t_motherlastnameText',
                  t_village_name = '$t_village_nameText',
                  house_number = '$house_numberText',
                  place = '$placeText',
                  t_road = '$t_roadText',
                  t_subdistrict = '$t_subdistrictText',
                  t_district = '$t_districtText',
                  t_province_sec = '$t_province_secText',
                  post = '$postText'
                  WHERE st_id='$id'");
	mysqli_close($con);
        
	echo <<<JS
            loadRegisterContent('studentShowMaster', 'student/edit', '$id');
JS;
?>