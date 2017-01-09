<?php
    include '../../../connect.php';
    $text = $_POST['subject'];
    $title = addslashes($text);
    
    if(empty($title)){
        listbox("", "none", "");
        exit();
   }
  
    $sql = mysqli_query($con, "SELECT * FROM subject WHERE s_rumiName LIKE '$title%' OR s_arabName LIKE '$title%' OR s_engName LIKE '$title%' OR s_thaiName LIKE '$title%' OR s_code LIKE '$title%'");
    $num = mysqli_num_rows($sql);
    
    if($num==0){
        listbox("", "none", $con);
        exit();
    }
    
    $list = "";
    while($data = mysqli_fetch_array($sql)){
        $name = str_replace("'", "&#39;", $data["s_rumiName"]);
        $name_a = str_replace("'", "&#39;", $data["s_arabName"]);
        $s_id = $data['s_id'];
        $s_code = $data['s_code'];
        $list .= "<div id=\"$s_id\" onclick=\"subjectReadText(this, this.id)\" ";
        $list .= "onmouseover=\"msOverList(this)\" ";
        $list .= "onmouseout=\"msOutList(this)\">";
        $list .= "$s_code # $name # $name_a";
        $list .= "</div>";
    }
    
    listbox($list, "block", $con);
?>

<?php
    function listbox($innerHTML, $display, $con){
$javascript = <<<JS
        document.getElementById('subjectList').innerHTML = '$innerHTML';
        document.getElementById('subjectList').style.display = '$display';
JS;
        header("content-type: text/javascript");
        echo $javascript;
    
        if($con){
            mysqli_close($con);
        }
    }

?>

