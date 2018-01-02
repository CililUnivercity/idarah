<?php
    function queryList($table, $condition, $connect){
        include $connect;
        $sql = mysqli_query($con, "SELECT * FROM $table WHERE $condition");
        $result = mysqli_fetch_array($sql);
        return $result;
    }
    function queryListInner($table, $condition, $connect, $orderBy){
        include $connect;
        $sql = mysqli_query($con, "SELECT * FROM $table WHERE $condition ORDER BY $orderBy");
        return $sql;;
    }
    function dbRowUpdate($table_name, $form_data, $where_clause='', $connect)
    {
        include $connect;
        // check for optional where clause
        $whereSQL = '';
        if(!empty($where_clause))
        {
            // check to see if the 'where' keyword exists
            if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
            {
                // not found, add key word
                $whereSQL = " WHERE ".$where_clause;
            } else
            {
                $whereSQL = " ".trim($where_clause);
            }
        }
        // start the actual SQL statement
        $sql = "UPDATE ".$table_name." SET ";

        // loop and build the column /
        $sets = array();
        foreach($form_data as $column => $value)
        {
             $sets[] = "`".$column."` = '".$value."'";
        }
        $sql .= implode(', ', $sets);

        // append the where statement
        $sql .= $whereSQL;

        // run and return the query result
        return mysqli_query($con, $sql);
    }
    function pagination($url, $numRow, $queryCondition, $displayRow, $connect){
        include $connect;
        //$pagic = "?page=student&&studentPage=bachelor";
        $pagic = $url;
        //$sql = "SELECT COUNT(st_id) FROM students";
        $sql = $numRow;
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_row($query);
        // Here we have the total row count
        $rows = $row[0];
        // This is the number of results we want displayed per page
        $page_rows = $displayRow;
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
        $sql = "SELECT * FROM students ORDER BY st_id DESC $limit";
        //$sql = $queryCondition." ".$limit;
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
        function looping($query){
            while($p = mysqli_fetch_array($query)){
                $st_id = $p['st_id'];
                return $st_id;
            }
        }
    }
?>

