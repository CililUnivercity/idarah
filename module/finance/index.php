<div class="panel panel-primary">
    <div class="panel-body">
        
        <div class="pull-right">
            <div class="btn-group">
                <button class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> PEMBAYARAN</button>
                <button data-toggle="dropdown" class="btn btn-success btn-sm dropdown-toggle" data-placeholder="false"><span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#">YURAN</a></li>
                    <li><a href="?page=finance&&financepage=exam">UJIAN</a></li>
                </ul>
            </div>
        </div>

        <?php
        
            $financepage = $_GET['financepage']; // To get the page

                switch ($financepage) {
                    case'default':
                        include 'module/finance/main.php';
                        break;
                    case'yuran':
                        include 'module/finance/yuran/main.php';
                        break;
                    case'yuranSearch':
                        include 'module/finance/yuran/function/search.php';
                        break;
                    case'exam':
                        include 'module/finance/exam/main.php';
                        break;
                    case'examSearch':
                        include 'module/finance/exam/function/search.php';
                        break;
                    case'examSave':
                        include 'module/finance/exam/function/save.php';
                        break;
                }
        ?>
        
    </div>
</div>


