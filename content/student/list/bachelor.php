<?php
    //include("../connect.php");
                    $pagic = "?page=student&&studentPage=bachelor";
                    $sql = "SELECT COUNT(st_id) FROM students";
                    $query = mysqli_query($con, $sql);
                    $row = mysqli_fetch_row($query);
                    // Here we have the total row count
                    $rows = $row[0];
                    // This is the number of results we want displayed per page
                    $page_rows = 5;
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
                    $sql = "SELECT st.*,ft.* FROM students st INNER JOIN fakultys ft on st.ft_id=ft.ft_id ORDER BY st_id DESC $limit";
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
    <table class="table">
      <tbody>
        <?php
            while($p = mysqli_fetch_array($query)){
                $id = $p['st_id'];
		$ft_id = $p['ft_id'];
                $dp_id = $p['dp_id'];
		$student_id = $p['student_id'];
                $fname = str_replace("\'", "&#39;", $p["firstname_rumi"]);
                $lname = str_replace("\'", "&#39;", $p["lastname_rumi"]);
                $fname_j = str_replace("\'", "&#39;", $p["firstname_jawi"]);
                $lname_j = str_replace("\'", "&#39;", $p["lastname_jawi"]);
                $telephone = str_replace("\'", "&#39;", $p["telephone"]);
                $program = $p['program'];
                $cityzenid = $p['cityzen_id'];
		
		$faculty = mysqli_query($con, "SELECT * FROM fakultys WHERE ft_id='$ft_id'");
		$ftResult = mysqli_fetch_array($faculty);
		$ft_name = $ftResult['ft_name'];
                
                $department = mysqli_query($con, "SELECT * FROM departments WHERE dp_id='$dp_id'");
		$dpResult = mysqli_fetch_array($department);
		$dp_name = $dpResult['dp_name'];
                
                if($program=='0'){
                    $selectAction =  "onclick='loadContent(\"studentShow\", \"student\", \"$id\")'";
                }else{
                    $selectAction =  "onclick='loadContent(\"studentShowMaster\", \"student/edit\", \"$id\")'";
                }
                
                $image = mysqli_query($con, "SELECT * FROM image WHERE id=(SELECT MAX(id) FROM image WHERE st_id='$id')");
                $imageRow = mysqli_fetch_array($image);
                
                if($imageRow[0]>0){
                    $src = 'content/student/capture/images/'.$imageRow["images"].'.jpg';
                    $picture = "<img src='$src' class='img-thumbnail' width='200px' hiegth='250px'>";
                }else{
                    $picture = "<a target='_blank' href='content/student/capture/index.php?st_id=$id'><img src='content/student/capture/images/add-user.png' class='img-thumbnail' width='200px' hiegth='250px'></a>";
                }                
        ?>
          <tr id="<?= $id ?>">
          <td width='20%'>
                <?= $picture ?>
          </td>
          <td align='left'>
              <b>NIM :</b> <font color="red"><i><?= $student_id ?></i></font><br>
              <b><div id="subText"><font color="orange"><?= $fname_j ?> - <?= $lname_j ?> </font> : نام - نسب </div></b>
              <b>NAMA - NASAB  :</b> <font color="orange"><i><?= $fname ?> - <?= $lname ?></i></font><br>
              <b>FAKULTI :</b> <font color="orange"><i><i><?= $ft_name ?></i></font><br>
              <b>JURUSAN  :</b> <font color="orange"><i><i><?= $dp_name ?></i></font><br>
              <b>NO TELEPON :</b> <font color="orange"><i><i><?= $telephone ?></i></font> <br>
              <b>NO. KAD PENGENALAN :</b><font color="orange"><i><i><?= $cityzenid ?></i></font><br>
          </td>
          <td align="right">
             
              <h4><a href="#"><span class="glyphicon glyphicon-print"></span></a> | <a <?= $selectAction ?> href="#"><span class="glyphicon glyphicon-edit"></span></a></h4>
          </td>
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