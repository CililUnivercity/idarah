<?php
    //header("content-type: text/javascript");
    
    include("../../connect.php");
    $mustawaData_id = mysqli_real_escape_string($con, $_POST['mustawaData_id']);
    $mustawaData_idText = addslashes($mustawaData_id);
    
    $group = mysqli_real_escape_string($con, $_POST['group']);
    $groupText = addslashes($group);
    
    $sql1 = mysqli_query($con, "SELECT * FROM mustawa_register WHERE mustawadata_id='$mustawaData_idText' AND learningGroup='$groupText'");//mustawa_register
    
    $response = <<<RS
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <td align="center"><b>BIL</b></td>
                        <td align="center"><b>NAMA - NASAB</b></td>
                        <td align="center"><div id='subText'>نام<b> - نسب</b></div></td>
                        <td align="center"><b>FAKULTI & JURUSAN</b></td>
                        <td align="center"><b>HASIL PENGAJIAN</b></td>
                    </tr>
                </thead>
                <tbody>
RS;
    $i = 1;
    while($result1 = mysqli_fetch_array($sql1)){
        $mustawa_register_id = $result1['mustawa_register_id'];
        $st_id = $result1['st_id'];
        $learningStatus = $result1['learningStatus'];
        
        $sql2 = mysqli_query($con, "SELECT * FROM students WHERE st_id='$st_id'");
        $result2 = mysqli_fetch_array($sql2);
        
        $fname_rumi = str_replace("\'", "&#39;", $result2["firstname_rumi"]);
        $lname_rumi = str_replace("\'", "&#39;", $result2["lastname_rumi"]);
        $fname_jawi = str_replace("\'", "&#39;", $result2["firstname_jawi"]);
        $lname_jawi = str_replace("\'", "&#39;", $result2["lastname_jawi"]);
        $ft_id = $result2['ft_id'];
        
        $sql3 = mysqli_query($con, "SELECT * FROM fakultys WHERE ft_id='$ft_id'");
        $result3 = mysqli_fetch_array($sql3);
        $ft_name = str_replace("\'", "&#39;", $result3["ft_name"]);
        
        if($learningStatus==1){
            $lulus = 'checked="checked"';
            $tidak = '';
        }else if($learningStatus==2){
            $lulus = '';
            $tidak = 'checked="checked"';
        }else{
            $lulus = '';
            $tidak = '';
        }
        
        $tbody = <<<TBODY
            <tr>
                <td align="center">{$i}</td>
                <td>{$fname_rumi} - {$lname_rumi}</td>
                <td align="right"><div id="subText">{$fname_jawi} - {$lname_jawi}</div></td>
                <td align="left">{$ft_name}</td>
                <td align="center">
                    <form class='form-horizontal'>
                        <div class='form-group'>
                            <input type="radio" id="mr1$mustawa_register_id" name="$mustawa_register_id" value='1' onclick="studyResultSave(this.id, $i)" $lulus> Lulus 
                            &nbsp;&nbsp;
                            <input type="radio" id="mr2$mustawa_register_id" name="$mustawa_register_id" value='2' onclick="studyResultSave(this.id, $i)" $tidak> Tidak
                            <div id='savingAlert$i'></div>
                        </div>
                    </form>
                </td>
            </tr>
TBODY;
        $response .= $tbody;
        $i++;
    }
        if(mysqli_num_rows($sql1)==0){
		$response = "<b>Tidak ada data";
	}
        $response .= "</tbody></table>";
        echo $response;
?>
