<div class="pull-left">
    <h4><b><span class="glyphicon glyphicon-file"></span> LAPORAN TAHUNAN</b></h4>
</div>
<div class="pull-right">
    <a onclick="loadContent('index','payment/report')" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-arrow-left"></span> BACK</a>
</div>
<br><hr>

<div class="btn-group">
    <button class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LOPORAN YURAN</button>
    <button data-toggle="dropdown" class="btn btn-success btn-sm dropdown-toggle" data-placeholder="false"><span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="#" onclick="reportContent('bachelor','payment/report','')">SARJANA</a></li>
            <li><a href="#" onclick="reportContent('master','payment/report','')">PASCA SARJANA</a></li>
        </ul>
</div>

<div class="btn-group">
    <button class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LOPORAN UJIAN</button>
    <button data-toggle="dropdown" class="btn btn-success btn-sm dropdown-toggle" data-placeholder="false"><span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="#" onclick="reportContent('examReport','payment/report','')">SARJANA</a></li>
            <li><a href="#" onclick="#">PASCA SARJANA</a></li>
        </ul>
</div>

<div class="btn-group">
    <button class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LOPORAN NAMA UJIAN</button>
    <button data-toggle="dropdown" class="btn btn-success btn-sm dropdown-toggle" data-placeholder="false"><span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="#" onclick="reportContent('examAccess','payment/report/form','')">SARJANA</a></li>
            <li><a href="#" onclick="#">PASCA SARJANA</a></li>
        </ul>
</div>

<div id="reportContent"></div>