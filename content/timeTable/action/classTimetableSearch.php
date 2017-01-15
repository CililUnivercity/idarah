<?php
    include '../../../connect.php';
    //header("content-type: text/javascript");
    /*
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
    
    //$registerSubject = mysqli_query($con, "SELECT * FROM registerSubject WHERE rs_class='$rs_class' AND rs_term='$rs_term' AND rs_academic_year='$rs_year' AND ft_id='$ft_id' AND dp_id='$dp_id'");
    
     * 
     */
    $response = <<<RS
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <td align="center"><b>HISAH</b></td>
                        <td align="center"><b>KOD</b></td>
                        <td align="center">MATA KULIAH</div></td>
                        <td align="center"><b>PENSYARAH</b></td>
                        <td align="center"><b>SKS</b></td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
RS;
    echo $response;
?>

