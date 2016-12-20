<div class="panel panel-primary">
    <div class="panel-body">
        
        <div class="pull-left">
            <h4><span class="glyphicon glyphicon-user"></span> <b>Data mahasiswa</b></h4>
        </div>
        <div class="pull-right">
            <div class="btn-group">
                <button class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button>
                <button data-toggle="dropdown" class="btn btn-success btn-sm dropdown-toggle" data-placeholder="false"><span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#" onclick="loadContent('addBachelor', 'student/add/')">Sarjana (S1)</a></li>
                    <li><a href="#" onclick="loadContent('addMaster', 'student/add/')">Pasca sarjana (S2)</a></li>
                </ul>
            </div>
            <div class="btn-group">
                <button class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> Daftar</button>
                <button data-toggle="dropdown" class="btn btn-success btn-sm dropdown-toggle" data-placeholder="false"><span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#" onclick="loadContent('bachelor', 'student')">Sarjana (S1)</a></li>
                    <li><a href="#" onclick="loadContent('master', 'student')">Pasca sarjana (S2)</a></li>
                </ul>
            </div>
            <div class="btn-group">
                <button class="btn btn-success btn-sm"><span class="glyphicon glyphicon-cd"></span> Biodata</button>
                <button data-toggle="dropdown" class="btn btn-success btn-sm dropdown-toggle" data-placeholder="false"><span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#" onclick="loadContent('bachelorBiodaByClass', 'student')">Sarjana (S1)</a></li>
                    <li><a href="#">Pasca sarjana (S2)</a></li>
                </ul>
            </div>
        </div>
        
        <br><br>

        <hr>

            <!-- <form class="navbar-form" role="search" action="?page=student&&studentpage=search" method="post"> -->
            <form class="form-horizontal" id="studentSearchForm" name="studentSearchForm">
                <div class="col-lg-3">
                    <input type="text" class="form-control input-sm" id="q" autofocus onkeypress="return isPressEnter()">
                </div>
            </form>
            <button type="submit" class="btn btn-success btn-sm" onclick="searchStudent()" id="searchBox">SEARCH</button>
            <br><br>
            
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
            <div id="content"></div>

    </div>
</div>

