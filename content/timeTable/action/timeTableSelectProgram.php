<?php
    header("content-type:text/javascript");

    include '../../../connect.php';
    $p_id = $_POST['p_id'];
    
    if($p_id=='154'){
        $p_idText = '0';
    }else{
        $p_idText = $p_id;
    }
    
    
    $sql = mysqli_query($con, "SELECT re.*,y.* FROM register re INNER JOIN year y ON re.y_id=y.y_id WHERE re.p_id='$p_idText' ORDER BY re.re_id DESC");
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
while($result = mysqli_fetch_array($sql)){
    $textValue = $result['year'];
    $valueId = $result['re_id'];
    $term = $result['term_id'];
$javascript = <<<JS
        var opt = document.createElement('option');
        opt.value = "{$valueId}";
        opt.text = "{$term}/{$textValue}";
        document.getElementById('register').add(opt);
JS;
    $response .= $javascript;
    echo $response;
    }
            echo <<<JS
            document.getElementById('selectAlert').innerHTML = "";
JS;

?>

