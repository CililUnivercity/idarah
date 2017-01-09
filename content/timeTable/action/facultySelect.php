<?php
    header("content-type:text/javascript");

    include '../../../connect.php';
    $ft_id = $_POST['ft_id'];
       
    $sql = mysqli_query($con, "SELECT * FROM departments WHERE ft_id='$ft_id'");
    $num = mysqli_num_rows($sql);

    $response = "";
$javascript = <<<JS
            var el = document.getElementById('dp_id');
            while(el.length>0){
                el.remove(0);
            }
JS;
$response = $javascript;
echo $response;
while($result = mysqli_fetch_array($sql)){
    $textValue = $result['dp_name'];
    $valueId = $result['dp_id'];
$javascript = <<<JS
        var opt = document.createElement('option');
        opt.value = "{$valueId}";
        opt.text = "{$textValue}";
        document.getElementById('dp_id').add(opt);
JS;
    $response .= $javascript;
    echo $response;
    }
            echo <<<JS
            document.getElementById('departmentSelectAlert').innerHTML = "";
JS;
