<div class="panel panel-primary"><!-- panel panel-primary -->
    <div class="panel-body"><!-- panel-body -->

        <div class="pull-left">
            <h4><span class="glyphicon glyphicon-list-alt"></span> <b>DAFTAR PROGRAM</b></h4>
        </div>

        <div class="pull-right"><!-- pull-right -->
            
            <div class="btn-group">
                <button class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> Program</button>
                <button data-toggle="dropdown" class="btn btn-success btn-sm dropdown-toggle" data-placeholder="false"><span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#" onclick="loadContent('mainBachelor', 'register')">Sarjana (S1)</a></li>
                    <li><a href="#" onclick="loadContent('programList', 'register')">Pasca sarjana (S2)</a></li>
                </ul>
            </div>

            <div class="btn-group">
                <button class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> Daftar belajar</button>
                <button data-toggle="dropdown" class="btn btn-success btn-sm dropdown-toggle" data-placeholder="false"><span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#" onclick="loadContent('bachelorList', 'register')">Sarjana (S1)</a></li>
                    <li><a href="#" onclick="loadContent('masterList', 'register')">Pasca sarjana (S2)</a></li>
                    <li><a href="#" onclick="loadContent('mustawa', 'register')">Mustawa bahasa arab</a></li>
                </ul>
            </div>

            <div class="btn-group">
                <button class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> Daftar ujian</button>
                <button data-toggle="dropdown" class="btn btn-success btn-sm dropdown-toggle" data-placeholder="false"><span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#">Calon Tahun 1</a></li>
                    <li><a href="#">Calon transfer</a></li>
                </ul>
            </div>

        </div><!-- /pull-right -->

        <br><br><hr>

        <div id="content" align="center"></div>
        <div id="masterPagination">
                <?php
                    if(!isset($_GET['registerpage'])){
                        $_GET['registerpage'] = "1";
                    }
                    $registerpage = $_GET['registerpage']; // To get the page

                                switch ($registerpage) {

                                    case 'mustawa':
                                        include 'content/register/mustawaList.php';
                                        break;
                                }
                ?>
        </div>

    </div><!-- /panel-body -->
</div><!-- /panel panel-primary -->

