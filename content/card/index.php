<div class="panel panel-primary">
    <div class="panel-body">
        <h4>Kartu mahasiswa</h4>
        <hr>
        <form class="form-horizontal" id="studentSearch" name="studentSearch">
            <div class="col-lg-3">
                <input type="text" class="form-control input-sm" id="q" autofocus onkeypress="return isPressEnterStudent('content/card/action/studentSearch.php', 'studentSearch')">
            </div>
        </form>
        <a class="btn btn-success btn-sm" onclick="student_Search('content/card/action/studentSearch.php', 'studentSearch')">SEARCH</a>
        <a class="btn btn-success btn-sm" onclick="filterSearch()">PILIH KELAS</a>
        <br><br>
        
            <!-- search filter -->
        <div id="filter" style="display: none">
            <form class="form-horizontal" name="classroom" id="classroom">
                
                <div class="form-group">
                    
                    <div class="col-lg-2">
                        
                    </div>
                    
                    <div class="col-lg-2">
                        <select class="form-control input-sm" name="class" id="class">
                            <option value="0">GENERASI</option>
                            <?php
                                $year = mysqli_query($con, "SELECT * FROM year ORDER BY YEAR");
                                while($sry = mysqli_fetch_array($year)){
                                    $year_value = $sry['year'];
                            ?>
                                <option value="<?= $year_value ?>" <?php if($year_value==date('Y')){echo 'selected';} ?>><?= $year_value ?></option>
                            <?php
                                }  
                            ?>
                        </select>
                    </div>
                    
                    <div class="col-lg-2">
                        <select class="form-control input-sm" name="re_id" id="re_id">
                            <option value="0">Semister / Tahun</option>
                            <?php
                                //get data from register data
                                $register = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.p_id='0' ORDER BY re_id DESC");
                                while($registerResult = mysqli_fetch_array($register)){
                                    $re_id = $registerResult['re_id'];
                                    $term = $registerResult['term_id'];
                                    $year = $registerResult['year'];
                            ?>
                            <option value="<?= $registerResult['re_id'] ?>"><?= $term ?> / <?= $year ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    
                    <div class="col-lg-2">
                        <select name="ft_id" id="ft_id" class="form-control input-sm" onchange="facultySelect()">
                            <option value="0">Fakulti</option>
                            <?php
                                $faculty = mysqli_query($con, "SELECT * FROM fakultys");
                                while($ft_result = mysqli_fetch_array($faculty)){
                                    $ft_id = $ft_result['ft_id'];
                                    $ft_name = $ft_result['ft_name'];
                            ?>
                            <option value="<?= $ft_id ?>"><?= $ft_name ?></option>
                            <?php
                                }
                            ?>
                        </select>                           
                    </div>
                    
                    <div class="col-lg-2">
                        <div id="departmentSelectAlert"></div>
                            <select name="dp_id" id="dp_id" class="form-control input-sm">
                                <option>Jurusan</option>
                            </select>
                        </div>
                </div>
                
            </form>
            <div align="center">
                <button class="btn btn-success btn-sm" onclick="classroom1('content/card/action/classroom.php', 'classroom')"><span class="glyphicon glyphicon-search"></span> Cari</button>
            </div>
        </div>
        <br>
        <!-- subcontent -->
        <div id="subcontent">
            <form class='form-horizontal' method='post' name="examPay" id="examPay" action="content/card/printAll.php" target="_blank">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <td>PILIH</td>
                            <td align="center">NIM</td>
                            <td align="center">NAMA - NASAB</td>
                            <td align="center">FAKULTI</td>
                            <td align="center">JURUSAN</td>
                        </tr>
                    </thead>
                        <?php
                        $pagic = "?page=studentCard";
                        $sql = "SELECT COUNT(st_id) FROM students";
                        $query = mysqli_query($con, $sql);
                        $row = mysqli_fetch_row($query);
                        // Here we have the total row count
                        $rows = $row[0];
                        // This is the number of results we want displayed per page
                        $page_rows = 15;
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
                        $sql = "SELECT st.*,ft.* FROM students st INNER JOIN fakultys ft on st.ft_id=ft.ft_id WHERE st.student_id!='' ORDER BY st_id DESC $limit";
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
                        $i = 1;
                        while($p = mysqli_fetch_array($query)){
                            $student_id = $p['student_id'];
                            $st_id = $p['st_id'];
                            $ft_id = $p['ft_id'];
                            $dp_id = $p['dp_id'];
                            $student_id = $p['student_id'];
                            $fname = str_replace("\'", "&#39;", $p["firstname_rumi"]);
                            $lname = str_replace("\'", "&#39;", $p["lastname_rumi"]);
                            $fname_j = str_replace("\'", "&#39;", $p["firstname_jawi"]);
                            $lname_j = str_replace("\'", "&#39;", $p["lastname_jawi"]);
                            $telephone = str_replace("\'", "&#39;", $p["telephone"]);
                            $program = $p['program'];
                            $cityzen_id = $p['cityzen_id'];

                            $faculty = mysqli_query($con, "SELECT * FROM fakultys WHERE ft_id='$ft_id'");
                            $ftResult = mysqli_fetch_array($faculty);
                            $ft_name = $ftResult['ft_name'];

                            $department = mysqli_query($con, "SELECT * FROM departments WHERE dp_id='$dp_id'");
                            $dpResult = mysqli_fetch_array($department);
                            $dp_name = $dpResult['dp_name'];
                        ?>
                        <tr>
                            <td align="center"><input type="checkbox" name="select[<?= $i ?>]" value="1"></td>
                            <input type="hidden" name="st_id[<?= $i ?>]" value="<?= $st_id ?>">
                            <td align="center"><a href="content/card/printCard.php?st_id=<?=$st_id?>" target="_blank"><?= $student_id ?></a></td>
                            <td align="left"><?= $fname ?> - <?= $fname ?></td>
                            <td align="left"><?= $ft_name ?></td>
                            <td align="left"><?= $dp_name ?></td>
                        </tr>
                        <?php
                        $i++;
                        }
                        ?>
                </table>
                <button type="submit" class="btn btn-success btn-sm">PRINT</button>
            </form>
            
            <div class="pull-left">
                <div class="pagination"><?php echo $paginationCtrls; ?></div>
            </div>
            
        </div>
        
    </div>
</div>

