<div class="btn-group btn-group-justified">
  <a href="#" onclick="loadContent('index', 'payment/yuran', '')" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> YURAN</a>
  <a href="#" onclick="loadContent('index', 'payment/exam', '')" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> UJIAN</a>
  <a href="#" onclick="loadContent('index', 'payment/mustawa', '')" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> MUSTAWA</a>
  <a href="#" onclick="loadContent('index', 'payment/muqaddimah', '')" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> MUQADDIMAH</a>
  <a href="#" onclick="loadContent('index', 'payment/report', '')" class="btn btn-default"><span class="glyphicon glyphicon-file"></span> LAPORAN</a>
</div>
<br>
<blockquote>

    <div id="content"></div>

    <div id="masterPagination">
                <?php
                    if(!isset($_GET['paymentpage'])){
                        $_GET['paymentPage'] = "1";
                    }
                    $paymentpage = $_GET['paymentpage']; // To get the page

                                switch ($paymentpage) {

                                    case 'yuran':
                                        include 'content/payment/yuran/list.php';
                                        break;
                                    case 'muqaddimah':
                                        include 'content/payment/muqaddimah/list.php';
                                        break;
                                    case 'exam':
                                        include 'content/payment/exam/list.php';
                                        break;
                                    case 'mustawa':
                                        include 'content/payment/mustawa/list.php';
                                        break;
                                
                                    
                                    
                                    
                                    
                                }
                ?>
    </div>
</blockquote>


