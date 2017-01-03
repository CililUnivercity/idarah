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
<h4><span class="glyphicon glyphicon-usd"></span> BAYAR MUSTAWA</h4>
<div class="col-lg-4">
    <form class="form-horizontal" id="mustawaSearchForm" name="studentSearchForm" id="studentSearchForm">
    <div class="input-group">
        <input type="text" class="form-control input-sm" id="q" name="q" value="" onkeypress="return isPressEnterMustawaStudent()" onkeyup="studentSearchAutoComp()">
        <span class="input-group-btn">
            <a class="btn btn-success btn-sm" type="button" onclick="mustawaStudentSearch()"><span class="glyphicon glyphicon-search"></span> CARI</a>
        </span>
    </div><!-- /input-group -->
    <div id="listbox"></div>
  </form>
</div>

<br><br>

<div id="mustawaList">
    <?php
        include("../../connect.php");
        $pagic = "?page=payment&&paymentpage=mustawa";
        $sql = "SELECT COUNT(mustawa_register_id) FROM mustawa_register";
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
        $sql = "SELECT mr.mustawa_register_id AS mustawa_register_id,mr.mustawadata_id AS mustawadata_id,mr.payMoney AS payMoney,mr.register_date AS mrRegister_date,mr.reciet AS reciet,mr.st_id AS st_id,mr.learningGroup AS learningGroup,mr.learningStatus AS learningStatus,mr.year AS year,md.*,s.* FROM mustawa_register mr
                INNER JOIN students s ON mr.st_id=s.st_id
                INNER JOIN mustawadata md ON mr.mustawadata_id=md.mustawaData_id
                ORDER BY mustawa_register_id DESC $limit";
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
    <table class="table table-hover table-striped table-bordered">
        <thead>
            <tr>
                <td align="center"><b>NIM</b></td>
                <td align="center"><b>NAMA-NASAB</b></td>
                <td align="center"><div id="subText"><b>نام - نسب</b></div></td>
                <td align="center"><b>TARIKH</b></td>
                <td align="center"><b>DUIT</b></td>
                <td align="center"><b>RESIT</b></td>
                <td align="center"><b>GRUP</b></td>
                <td align="center"><b>MUSTAWA</b></td>
            </tr>
        </thead>
        <tbody>
            <?php
                    while($mustawa_register_result = mysqli_fetch_array($query)){
                        $st_id = $mustawa_register_result['st_id'];
                        $student_id = str_replace("\'", "&#39;", $mustawa_register_result["student_id"]);
                        $name_r = str_replace("\'", "&#39;", $mustawa_register_result["firstname_rumi"]);
                        $lastname_r = str_replace("\'", "&#39;", $mustawa_register_result["lastname_rumi"]);
                        $name_j = str_replace("\'", "&#39;", $mustawa_register_result["firstname_jawi"]);
                        $lastname_j = str_replace("\'", "&#39;", $mustawa_register_result["lastname_jawi"]);
                        $mustawa_register_id = $mustawa_register_result['mustawa_register_id'];
                        $register_date = $mustawa_register_result['mrRegister_date'];
                        $payMoney = $mustawa_register_result['payMoney'];
                        $reciet = $mustawa_register_result['reciet'];
                        $leaningGroup = $mustawa_register_result['learningGroup'];
                        $level = $mustawa_register_result['level'];
                    ?>
                    <tr id="<?= $mustawa_register_id ?>">
                        <td align="center"><a href="#" onclick="mustawaPay('<?= $st_id ?>')"><?= $student_id ?></a></td>
                        <td align="left"><?= strtoupper($name_r) ?> - <?= strtoupper($lastname_r) ?></td>
                        <td align="right"><div id='subText'><?= $name_j ?> - <?= $lastname_j ?></div></td>
                        <td align="center"><?= $register_date ?></td>
                        <td align="center"><?= $payMoney ?> ฿</td>
                        <td align="center"><?= str_pad($reciet, 3, "0", STR_PAD_LEFT) ?></td>
                        <td align="center"><?= $leaningGroup ?></td>
                        <td align="center"><?= $level ?></td>
                    </tr>
                    <?php
                    }
                    ?>
        </tbody>
    </table>
    <div class="pull-left">
        <div class="pagination"><?php echo $paginationCtrls; ?></div>
    </div>
    <div class="pull-right">
        <?= $textline2 ?>
    </div>
</div>


