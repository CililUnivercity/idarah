<h4 align="center">DAFTAR DAN STATISTIK</h4>
<?php
include('../connect.php');

$limit = 2;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
  
$sql = "SELECT * FROM register ORDER BY re_id ASC LIMIT $start_from, $limit";  
$rs_result = mysqli_query ($con, $sql);  
?>
<table class="table table-bordered table-striped">  
<thead>  
<tr>  
<th>title</th>  
<th>body</th>  
</tr>  
</thead>  
<tbody>  
<?php  
while ($row = mysqli_fetch_assoc($rs_result)) {  
?>  
            <tr>  
            <td><?= $row['y_id']; ?></td>  
            <td><?= $row['term_id']; ?></td>  
            </tr>  
<?php  
};  
?>  
</tbody>  
</table>