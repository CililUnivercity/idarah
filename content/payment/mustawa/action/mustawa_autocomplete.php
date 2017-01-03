<?php
    include '../../../../connect.php';
    $text = $_POST['q'];
    $title = addslashes($text);
    
    if(empty($title)){
        listbox("", "none", "");
        exit();
   }
  
    $sql = mysqli_query($con, "SELECT * FROM students WHERE student_id LIKE '$title%' OR firstname_rumi LIKE '%$title%' OR lastname_rumi LIKE '%$title%' OR firstname_jawi LIKE '%$title%' OR lastname_jawi LIKE '%$title%' OR t_studentname LIKE '%$title%' OR t_studentlastname LIKE '%$title%'");
    $num = mysqli_num_rows($sql);
    
    if($num==0){
        listbox("", "none", $con);
        exit();
    }
    
    $list = "";
    while($data = mysqli_fetch_array($sql)){
        $name = str_replace("'", "&#39;", $data["firstname_rumi"]);
        $lname = str_replace("'", "&#39;", $data["lastname_rumi"]);
        $student_id = $data['student_id'];
        $list .= "<div id=\"$student_id\" onclick=\"mustawa_readText(this.id)\" ";
        $list .= "onmouseover=\"msOverList(this)\" ";
        $list .= "onmouseout=\"msOutList(this)\">";
        $list .= "$student_id ( $name - $lname ) ";
        $list .= "</div>";
    }
    
    listbox($list, "block", $con);
?>

<?php
    function listbox($innerHTML, $display, $con){
$javascript = <<<JS
        document.getElementById('listbox').innerHTML = '$innerHTML';
        document.getElementById('listbox').style.display = '$display';
JS;
        header("content-type: text/javascript");
        echo $javascript;
    
        if($con){
            mysqli_close($con);
        }
    }

?>

