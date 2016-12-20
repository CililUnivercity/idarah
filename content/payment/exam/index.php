<h4>&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-usd"></span> BAYAR UJIAN</h4>
<form class="form-horizontal" id="examSearchForm" name="examSearchForm">
    <div class="col-lg-3">
        <input type="text" class="form-control input-sm" name="q" id="q" autofocus onkeypress="return isPressEnterExam()">
    </div>
</form>
<button type="submit" class="btn btn-success btn-sm" onclick="searchExam()" id="searchBox">SEARCH</button>
<button type="submit" class="btn btn-success btn-sm" onclick="loadContent('payByClass', 'payment/exam', '')"><span class="glyphicon glyphicon-usd"></span> BAYAR MENGIKUT KELAS</button>
<br><br>

<?php
    include("../../connect.php");
    $pagic = "?page=payment&&paymentpage=exam";
    $sql = "SELECT COUNT(srx_id) FROM student_register_exam";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_row($query);
    // Here we have the total row count
    $rows = $row[0];
    // This is the number of results we want displayed per page
    $page_rows = 10;
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
    $sql = "SELECT srx.*,st.*,rx.* FROM student_register_exam srx 
            INNER JOIN students st ON srx.st_id=st.st_id
            INNER JOIN register_exam rx ON srx.rx_id=rx.rx_id ORDER BY srx_id DESC $limit";
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
      <td align="center"><b>STATUS</b></td>
      <td align="center"><b>Hapus</b></td>
    </tr>
  </thead>
  <tbody>
<?php
    while($row = mysqli_fetch_array($query)){
        $id = $row['srx_id'];
        $student_id = str_replace("\'", "&#39;", $row["student_id"]);
        $name_r = str_replace("\'", "&#39;", $row["firstname_rumi"]);
        $lastname_r = str_replace("\'", "&#39;", $row["lastname_rumi"]);
        $name_j = str_replace("\'", "&#39;", $row["firstname_jawi"]);
        $lastname_j = str_replace("\'", "&#39;", $row["lastname_jawi"]);
        $term = $row['term'];
        $year = $row['year'];
        $status = $row['pay_status'];
?>
    <tr id="<?= $id ?>">
      <td align="center"><a href="#" onclick="loadContent('examPay', 'payment/exam', '<?= $id ?>')"><?= $student_id ?></a></td>
      <td align="left"><?= strtoupper($name_r) ?> - <?= strtoupper($lastname_r) ?></td>
      <td align="right"><div id='subText'><?= $name_j ?> - <?= $lastname_j ?></div></td>
      <td align="center"><?= $term ?>/<?= $year ?></td>
<?php
    if($status=="Belum bayar" || $status=="BELUM LUNAS"){
?>
      <td align="center"><button class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-exclamation-sign"></span> BELUM LUNAS</button></td>
<?php 
    }else{
?>
      <td align="center"><button class="btn btn-success btn-sm"><span class="glyphicon glyphicon-ok"></span> SUDAH LUNAS</button></td>
<?php
    }
?>
      <td align="center"><a href="#" onclick="deleteRegisterExam('<?= $id ?>')"><span class="glyphicon glyphicon-remove"></span></a></td>
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

