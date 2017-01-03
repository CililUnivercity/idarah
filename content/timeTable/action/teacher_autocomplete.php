<?php
    include '../../../connect.php';
    $text = $_POST['t_id'];
    $title = addslashes($text);
    
    if(empty($title)){
        listbox("", "none", "");
        exit();
   }
  
    $sql = mysqli_query($con, "SELECT * FROM teachers WHERE t_fnameRumi LIKE '$title%'  OR t_fnameArab LIKE '%$title%'");
    $num = mysqli_num_rows($sql);
    
    if($num==0){
        listbox("", "none", $con);
        exit();
    }
    
    $list = "";
    while($data = mysqli_fetch_array($sql)){
        $name = str_replace("'", "&#39;", $data["t_fnameRumi"]);
        $lname = str_replace("'", "&#39;", $data["t_lnameRumi"]);
        $name_a = str_replace("'", "&#39;", $data["t_fnameArab"]);
        $lname_a = str_replace("'", "&#39;", $data["t_lnameArab"]);
        $t_id = $data['t_id'];
        $list .= "<div id=\"$t_id\" onclick=\"readText(this, this.id)\" ";
        $list .= "onmouseover=\"msOverList(this)\" ";
        $list .= "onmouseout=\"msOutList(this)\">";
        $list .= "$name - $lname";
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

