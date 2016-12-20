
<table class="table table-bordered table-striped table-hover">
    <tr>
        <td align="center" width="10%">SEMESTER</td>
        <td align="center" width="10%">TAHUN</td>
        <td align="center" width="10%">AKSI</td>
    </tr>
<?php
    include("../function/function.php");
    $order = "re_id";
    $sql = register($order);
    while($row = mysqli_fetch_array($sql)){
?>
    <tr>
        <td align="center"><?= $row['term_id']; ?></td>
        <td align="center"><?= $row['year']; ?></td>
        <td align="center">
            <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list-alt"></span> LAPORAN</a>
            <a class="btn btn-success btn-sm" onclick="loadContent('addSubject', 'attendance', '<?= $row['re_id'] ?>')"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
        </td>
    </tr>
<?php
    }
?>
</table>
<!--
<div class="panel panel-primary">
    <div class="panel-heading"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH MATA KULIAH</div>
        <div class="panel-body">
            <table class="table table-striped table-bordered">
                <tr>
                    <td align="center">Kelas</td>
                    <td align="center">PAI</td>
                    <td align="center">PBSM</td>
                    <td align="center">SYARIAH</td>
                    <td align="center">USULUDDIN</td>
                    <td align="center">DIRASAT</td>
                </tr>
                
                <tr align="center">
                    <td align="center">1</td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm" onclick="loadAttendanceContent('addList', 'attendance', '1', '121', '22')"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm" onclick="loadAttendanceContent('addList', 'attendance', '1', '121', '23')"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm" onclick="loadAttendanceContent('addList', 'attendance', '1', '122', '')"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm" onclick="loadAttendanceContent('addList', 'attendance', '1', '123', '')"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm" onclick="loadAttendanceContent('addList', 'attendance', '1', '124', '')"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                </tr>
            
                <tr align="center">
                    <td align="center">2</td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                </tr>
                
                <tr align="center">
                    <td align="center">3</td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                </tr>
                
                <tr align="center">
                    <td align="center">4</td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                </tr>
                
            </table>
        </div>
    </div>
-->