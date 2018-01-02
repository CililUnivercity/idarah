<div class="panel panel-primary">
    <div class="panel-body">
        
        <div class="pull-left">
            <h4><span class="glyphicon glyphicon-user"></span> <b>PENGAJIAN MUSTAWA BAHASA ARAB</b></h4>
        </div>
        <div class="pull-right">
            <a href="?page=mustawa" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-home"></span> Home</a>
            <a onclick="loadContent('result', 'mustawa', '')" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-map-marker"></span> Hasil pengajian</a>
            <a onclick="loadContent('moneyReport', 'mustawa', '')" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list-alt"></span> Laporan duit daftar</a>
        </div>
        
        <br><br>

        <hr>
            <div id="masterPagination">
                <?php
                    if(!isset($_GET['studentPage'])){
                        $_GET['studentPage'] = "1";
                    }
                    $studentPage = $_GET['studentPage']; // To get the page

                                switch ($studentPage) {

                                    case 'master':
                                        include 'content/student/list/master.php';
                                        break;
                                    case 'bachelor':
                                        include 'content/student/list/bachelor.php';
                                        break;
                                }
                ?>
            </div>
            
            <div id="content">
                
                <div>
                    
                    <div class="col-lg-4">
                        <div class="alert alert-dismissible alert-info">
                            <h4>Warning!</h4>
                            <p>Best check yo self, you're not looking too good. Nulla vitae elit libero, a pharetra augue. Praesent commodo cursus magna, <a href="#" class="alert-link">vel scelerisque nisl consectetur et</a>.</p>
                        </div>    
                    </div>

                    <div class="col-lg-4">
                        <div class="alert alert-dismissible alert-info">
                            <h4>Warning!</h4>
                            <p>Best check yo self, you're not looking too good. Nulla vitae elit libero, a pharetra augue. Praesent commodo cursus magna, <a href="#" class="alert-link">vel scelerisque nisl consectetur et</a>.</p>
                        </div>    
                    </div>

                    <div class="col-lg-4">
                        <div class="alert alert-dismissible alert-info">
                            <h4>Warning!</h4>
                            <p>Best check yo self, you're not looking too good. Nulla vitae elit libero, a pharetra augue. Praesent commodo cursus magna, <a href="#" class="alert-link">vel scelerisque nisl consectetur et</a>.</p>
                        </div>    
                    </div>
                
                </div>   
                
                <div>
                    
                    <div class="col-lg-4">
                        <div class="alert alert-dismissible alert-info">
                            <h4>Warning!</h4>
                            <p>Best check yo self, you're not looking too good. Nulla vitae elit libero, a pharetra augue. Praesent commodo cursus magna, <a href="#" class="alert-link">vel scelerisque nisl consectetur et</a>.</p>
                        </div>    
                    </div>

                    <div class="col-lg-4">
                        <div class="alert alert-dismissible alert-info">
                            <h4>Warning!</h4>
                            <p>Best check yo self, you're not looking too good. Nulla vitae elit libero, a pharetra augue. Praesent commodo cursus magna, <a href="#" class="alert-link">vel scelerisque nisl consectetur et</a>.</p>
                        </div>    
                    </div>

                    <div class="col-lg-4">
                        <div class="alert alert-dismissible alert-info">
                            <h4>Warning!</h4>
                            <p>Best check yo self, you're not looking too good. Nulla vitae elit libero, a pharetra augue. Praesent commodo cursus magna, <a href="#" class="alert-link">vel scelerisque nisl consectetur et</a>.</p>
                        </div>    
                    </div>
                
                </div>  
    
            </div>

    </div>
</div>