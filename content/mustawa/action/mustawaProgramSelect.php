<?php
    header("content-type:text/javascript");

    include '../../../connect.php';
    $mustawaData_id = $_POST['mustawaData_id'];
    
    $sql = mysqli_query($con, "SELECT * FROM mustawadata WHERE mustawaData_id='$mustawaData_id'");
    $result = mysqli_fetch_array($sql);
    $group_number = $result['group_number'];
    
    $response = "";
$javascript = <<<JS
            var el = document.getElementById('group');
            while(el.length>0){
                el.remove(0);
            }
JS;
$response = $javascript;
    for($i=0;$i<=$group_number;$i++){
        if($i==0){
            $optionText = "--Pilih--";
        }else{
            $optionText = $i;
        }
$javascript = <<<JS
        var opt = document.createElement('option');
            opt.value = "{$i}";
            opt.text = "{$optionText}";
            document.getElementById('group').add(opt);
JS;
    $response .= $javascript;
    echo $response;
    }  
            echo <<<JS
            document.getElementById('selectAlert').innerHTML = "";
JS;
?>

