<h4 class="text-center">DAFDAR MUSTAWA</h4>
<div class="col-lg-4">
    <form class="form-horizontal" id="mustawaSearchForm" name="mustawaSearchForm">
    <div class="input-group">
        <input type="text" class="form-control input-sm" id="q" name="q" placeholder="Tahun" onkeypress="return isPressEnterMustawa()">
      <span class="input-group-btn">
          <a class="btn btn-success btn-sm" type="button" onclick="mustawaSearch()"><span class="glyphicon glyphicon-search"></span> CARI</a>
      </span>
    </div><!-- /input-group -->
  </form>
</div>
<div class="pull-right" align="left">
    <a onclick="loadContent('mustawaAdd', 'register')" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</a>
</div>
<br><br>
<?php
                    include("../../connect.php");
                    $pagic = "?page=register&&registerpage=mustawa";
                    $sql = "SELECT COUNT(mustawaData_id) FROM mustawadata";
                    $query = mysqli_query($con, $sql);
                    $row = mysqli_fetch_row($query);
                    // Here we have the total row count
                    $rows = $row[0];
                    // This is the number of results we want displayed per page
                    $page_rows = 7;
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
                    $sql = "SELECT * FROM mustawadata ORDER BY mustawaData_id DESC $limit";
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
<div id="pagination" align="left">
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <td align="center"><b>TAHUN</b></td>
            <td align="center"><b>AWAL PENDAFTARAN</b></td>
            <td align="center"><b>AKHIR PENDAFTARAN</b></td>
            <td align="center"><b>HARGA DAFTAR</b></td>
            <td align="center"><b>LEVEL</b></td>
            <td align="center"><b>STATUS</b></td>
            <td align="center"><b>AKHIR PERUBAHAN</b></td>
            <td align="center"><b>AKSI</b></td>
        </tr>
        </thead>
        <tbody>
          <?php
              while($p = mysqli_fetch_array($query)){
                  $mustawaData_id = $p['mustawaData_id'];
                  $year = $p['year'];
                  $startDate = $p['startDate'];
                  $endDate = $p['endDate'];
                  $prize = $p['prize'];
                  $level = $p['level'];
                  $status = $p['status'];
                  $editDate = $p['editDate'];
          ?>
          <tr>
                <td align="center"><?= $year ?></td>
                <td align="center"><?= $startDate ?></td>
                <td align="center"><?= $endDate ?></td>
                <td align="center"><?= $prize ?></td>
                <td align="center"><?= $level ?></td>
                <td align="center"><?php if($status==1){echo 'Buka';}else{echo 'Tutup';} ?></td>
                <td align="center"><?= $editDate ?></td>
                <td align="center"><a onclick="loadContent('mustawaEdit', 'register', '<?= $mustawaData_id ?>')" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-edit"></span> UBAH</a></td>
          </tr>
          <?php
              }
          ?>
        </tbody>
    </table> 

<div class="pull-right">
        <?= $textline2 ?>
    </div>

    <div class="pull-left">
        <div class="pagination"><?php echo $paginationCtrls; ?></div>
    </div>
</div>