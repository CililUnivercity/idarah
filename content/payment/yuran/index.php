<style>
    #listbox{
        position: absolute;
        width: 300px;
        border: solid 1px black;
        background-color: #eeeeee;
        display: none;
        alignment-adjust: right;
        text-align: left;
    }
</style>
<h4>&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-usd"></span> BAYAR YURAN</h4>
<form class="form-horizontal" id="yuranSearchForm" name="studentSearchForm" id="studentSearchForm">
    <div class="col-lg-3">
        <input type="text" class="form-control input-sm" id="q" autofocus onkeypress="return isPressEnterYuran()" onkeyup="studentSearchAutoComp()">
        <div id="listbox"></div>
    </div>
</form>
<button type="submit" class="btn btn-success btn-sm" onclick="searchYuran()" id="searchBox">SEARCH</button>
<br><br>

<?php
    include '../../connect.php';
    $pagic = "?page=payment&&paymentpage=yuran";
    $sql = "SELECT COUNT(sr_id) FROM student_register";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_row($query);
    // Here we have the total row count
    $rows = $row[0];
    // This is the number of results we want displayed per page
    $page_rows = 8;
    // This tells us the page number of our last page
    $last = ceil($rows/$page_rows);
    // This makes sure $last cannot be less than 1
    if($last < 1){
            $last = 1;
    }
    // Establish the $pagenum variable
    $pagenum = 1;
    // Get pagenum from URL vars if it is present, else it is = 1
    if(isset($_GET['pn'])){
            $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
    }
    // This makes sure the page number isn't below 1, or more than our $last page
    if ($pagenum < 1) { 
        $pagenum = 1; 
    } else if ($pagenum > $last) { 
        $pagenum = $last; 
    }
    // This sets the range of rows to query for the chosen $pagenum
    $limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
    // This is your query again, it is for grabbing just one page worth of rows by applying $limit
    $sql = "SELECT sr.*,s.* FROM student_register sr
            INNER JOIN students s ON sr.st_id=s.st_id
            ORDER BY sr.sr_id DESC  $limit";
    $query = mysqli_query($con, $sql);
    // This shows the user what page they are on, and the total number of pages
    $textline1 = "จำนวน(<b>$rows</b>)";
    $textline2 = "Laman <b>$pagenum</b> Dari semua <b>$last</b>";
    // Establish the $paginationCtrls variable
    $paginationCtrls = '';
    // If there is more than 1 page worth of results
    if($last != 1){
            /* First we check if we are on page one. If we are then we don't need a link to 
               the previous page or the first page so we do nothing. If we aren't then we
               generate links to the first page, and to the previous page. */
            if ($pagenum > 1) {
            $previous = $pagenum - 1;

                    $paginationCtrls .= '<a href="'.$pagic.'&&pn='.$previous.'"><<</a> &nbsp; &nbsp; ';
                    // Render clickable number links that should appear on the left of the target page number
                    for($i = $pagenum-4; $i < $pagenum; $i++){
                            if($i > 0){
                            $paginationCtrls .= '<a href="'.$pagic.'&&pn='.$i.'">'.$i.'</a> &nbsp; ';
                            }
                }
        }
            // Render the target page number, but without it being a link
            $paginationCtrls .= ''.$pagenum.' &nbsp; ';
            // Render clickable number links that should appear on the right of the target page number
            for($i = $pagenum+1; $i <= $last; $i++){
                    $paginationCtrls .= '<a href="'.$pagic.'&&pn='.$i.'">'.$i.'</a> &nbsp; ';
                    if($i >= $pagenum+4){
                            break;
                    }
            }
            // This does the same as above, only checking if we are on the last page, and then generating the "Next"
        if ($pagenum != $last) {
            $next = $pagenum + 1;
            $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$pagic.'&&pn='.$next.'">>></a> ';
        }
    }
    $list = '';
?>

<table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <td align="center"><b>NO.POKOK</b></td>
      <td align="center"><b>NAMA-NASAB</b></td>
      <td align="center"><div id="subText"><b>نام - نسب</b></div></td>
      <td align="center"><b>SEMESTER/TAHUN</b></td>
      <!--<td align="center"><b>RESIT</b></td> -->
      <td align="center"><b>STATUS</b></td>
      <td align="center"><b>Hapus</b></td>
    </tr>
  </thead>
  <tbody>
<?php
    while($row = mysqli_fetch_array($query)){
        $id = $row['sr_id'];
        $student_id = str_replace("\'", "&#39;", $row["student_id"]);
        $name_r = str_replace("\'", "&#39;", $row["firstname_rumi"]);
        $lastname_r = str_replace("\'", "&#39;", $row["lastname_rumi"]);
        $name_j = str_replace("\'", "&#39;", $row["firstname_jawi"]);
        $lastname_j = str_replace("\'", "&#39;", $row["lastname_jawi"]);
        $term = $row['term'];
        $year = $row['academic_year'];
        $status = $row['pay_status'];
        $program = $row['program'];
?>
    <tr id="<?= $id ?>">
      <td align="center"><a onclick="loadContent('yuranPay', 'payment/yuran', '<?= $id ?>')" href="#"><?= $student_id ?></a></td>
      <td align="left"><?= strtoupper($name_r) ?> - <?= strtoupper($lastname_r) ?></td>
      <td align="right"><div id='subText'><?= $name_j ?> - <?= $lastname_j ?></div></td>
      <td align="center"><?= $term ?>/<?= $year ?></td>
      <!--<td align="center"><?php //$row['reciet_code'] ?></td>-->
      <td align="center">
          
          <?php
            if($status=='Sudah bayar'){
                $payStatus = "<a class='btn btn-success btn-sm'><span class='glyphicon glyphicon-ok'></span> SUDAH LUNAS</a>";
            }else if($status=='Belum bayar'){
                $payStatus = "<a class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-exclamation-sign'></span> BELUM BAYAR</a>";
            }else if($status=='BELUM LUNAS'){
                $payStatus = "<a class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-exclamation-sign'></span> BELUM LUNAS</a>";
            }else if($status=='SUDAH LUNAS'){
                $payStatus = "<a class='btn btn-success btn-sm'><span class='glyphicon glyphicon-ok'></span> SUDAH LUNAS</a>";
            }
            echo $payStatus;
          ?>
          
      </td>
      <td align="center"><a href="#" onclick="deleteYuranRegister('<?= $id ?>')"><span class="glyphicon glyphicon-remove"></span></a></td>
    </tr>
<?php 
    } 
?>
</table>
<div class="pull-left">
    <div class="pagination"><?php echo $paginationCtrls; ?></div>
</div>
<div class="pull-right">
    <?= $textline2 ?>
</div>
