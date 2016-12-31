<?php
    header("content-type:text/javascript");

    include '../../../connect.php';
    $p_id = $_POST['p_id'];
    
    if($p_id=='154'){
        $p_idText = '0';
    }else{
        $p_idText = $p_id;
    }
    
    
    $sql = mysqli_query($con, "SELECT * FROM register WHERE p_id='$p_idText'");
    $num = mysqli_num_rows($sql);

    $response = "";
$javascript = <<<JS
            var el = document.getElementById('register');
            while(el.length>0){
                el.remove(0);
            }
JS;
$response = $javascript;
echo $response;
$i=0;
while($result = mysqli_fetch_array($sql)){
$javascript = <<<JS
        var opt = document.createElement('option');
        opt.value = "id";
        opt.text = "Test";
        document.getElementById('register').add(opt);
JS;
    $response .= $javascript;
    echo $response;
    $i++;
    }
            echo <<<JS
            document.getElementById('selectAlert').innerHTML = "";
JS;

?>

