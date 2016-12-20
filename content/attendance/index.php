<div class="btn-group btn-group-justified">
    <a href="#" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> CATATAN KEHADIRAN</a>
</div>
<br>
<blockquote>

    <div id="content"></div>
    <div id="masterPagination">
        <script>
            loadContent('firstPage', 'attendance', '');
        </script>
        <?php
            $page = $_GET['page'];
            
            /*
            switch ($page){
                case 'attendance':
                    include 'content/attendance/firstPage.php';
                    break;
            }
            
             */
        ?>
    </div>
   
    
</blockquote>  

