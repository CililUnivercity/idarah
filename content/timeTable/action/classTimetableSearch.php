<?php
    include '../../../connect.php';
    //header("content-type: text/javascript");
    
    $rs_class = $_POST['class'];
    $re_id = $_POST['re_id'];
    $ft_id = $_POST['ft_id'];
    $dp_id = $_POST['dp_id'];
    
    //get data from register data
    $register = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE re_id='$re_id'");
    $registerResult = mysqli_fetch_array($register);
    $rs_term = $registerResult['term_id'];
    $rs_year = $registerResult['year'];
    
    //echo "alert('$dp_id');";
    
    $registerSubject = mysqli_query($con, "SELECT re.*,s.*,t.* FROM registerSubject re 
                                           INNER JOIN subject s ON re.s_id=s.s_id
                                           INNER JOIN teachers t ON re.t_id=t.t_id
                                           WHERE re.rs_class='$rs_class'
                                           AND re.rs_term='$rs_term'
                                           AND re.rs_academic_year='$rs_year'
                                           AND re.ft_id='$ft_id'
                                           AND re.dp_id='$dp_id'
                                           ORDER BY rs_session
                                           ");
    
    $response = <<<RS
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <td align="center"><b>HISAH</b></td>
                        <td align="center"><b>KOD</b></td>
                        <td align="center">MATA KULIAH</div></td>
                        <td align="center"><div id="subText"><b>مادة</b></div></td>
                        <td align="center"><b>PENSYARAH</b></td>
                        <td align="center"><b>SKS</b></td>
                        <td align="center"><b>HAPUS</b></td>
                    </tr>
                </thead>
                <tbody>
RS;
    while($registerSubjectResult = mysqli_fetch_array($registerSubject)){
        $rs_id = $registerSubjectResult['rs_id'];
        $subjectCode = $registerSubjectResult['s_code'];
        $s_rumiName = ucwords(str_replace("\'", "&#39;", $registerSubjectResult["s_rumiName"]));
        $s_arabName = str_replace("\'", "&#39;", $registerSubjectResult["s_arabName"]);
        $teacherName = str_replace("\'", "&#39;", $registerSubjectResult["t_fnameRumi"]);
        $teacherLastname = str_replace("\'", "&#39;", $registerSubjectResult["t_lnameRumi"]);
        $credit = str_replace("\'", "&#39;", $registerSubjectResult["s_credit"]);
        $session = $registerSubjectResult['rs_session'];
        
        $tbody = <<<TB
            <tr id="$rs_id">
                <td align="center">{$session}</td>
                <td align="center">{$subjectCode}</td>
                <td>{$s_rumiName}</td>
                <td align="right"><div id="subText">{$s_arabName}</div></td>
                <td align="left">{$teacherName} {$teacherLastname}</td>
                <td>{$credit}</td>
                <td align="center">
                    <a href="#" onclick="deleteRegisterSubject('$rs_id')"><span class='glyphicon glyphicon-remove'></span></a>
                </td>
            </tr>
TB;
    $response .= $tbody;
    }
    $response .= "</tbody></table>";
    echo $response;
?>

