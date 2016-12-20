<?php
    header("content-type:text/javascript");

    include '../../../../connect.php';
    $mustawaData_id = $_POST['mustawaData_id'];
    
    $sql = mysqli_query($con, "SELECT * FROM mustawadata WHERE mustawaData_id='$mustawaData_id'");
    $result = mysqli_fetch_array($sql);
    $prize = $result['prize'];
    $year = $result['year'];
    $groupt_number = $result['group_number'];
    
    //Get max receit from mustawa_register table
    $max_receit_sql = mysqli_query($con, "SELECT MAX(reciet) AS reciet FROM mustawa_register WHERE year='$year'");
    $max_receit_result = mysqli_fetch_array($max_receit_sql);
    $max_receit = $max_receit_result['reciet'] + 1;
    
    $response = "";
$javascript = <<<JS
            var el = document.getElementById('group');
            while(el.length>0){
                el.remove(0);
            }
JS;
$response = $javascript;
    for($i=1;$i<=$groupt_number;$i++){
        
$javascript = <<<JS
        var opt = document.createElement('option');
            opt.value = "{$i}";
            opt.text = "{$i}";
            document.getElementById('group').add(opt);
JS;
    $response .= $javascript;
    echo $response;
    }  
            echo <<<JS
            document.getElementById('prize').value = "$prize";
            document.getElementById('reciet').value = "$max_receit";
            document.getElementById('selectAlert').innerHTML = "";
JS;
?>
