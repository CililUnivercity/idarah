<?php
    $re_id = $_GET['id'];
    include '../function/function.php';
    $row = registerSelect($re_id);
?>

<div class="pull-right">
    <a class="btn btn-success btn-sm" onclick="loadContent('firstPage', 'attendance', '')"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
</div>

<br><br>

<div class="panel panel-primary">
    <div class="panel-heading"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH MATA KULIAH <?= $row['term_id'] ?>/<?= $row['year'] ?></div>
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
                        <a class="btn btn-success btn-sm" onclick="loadAttendanceContent('addList', 'attendance', '1', '121', '22', '<?= $re_id ?>')"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm" onclick="loadAttendanceContent('addList', 'attendance', '1', '121', '23', '<?= $re_id ?>')"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm" onclick="loadAttendanceContent('addList', 'attendance', '1', '122', '', '<?= $re_id ?>')"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm" onclick="loadAttendanceContent('addList', 'attendance', '1', '123', '', '<?= $re_id ?>')"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm" onclick="loadAttendanceContent('addList', 'attendance', '1', '124', '', '<?= $re_id ?>')"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                </tr>
            
                <tr align="center">
                    <td align="center">2</td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm" onclick="loadAttendanceContent('addList', 'attendance', '2', '121', '22', '<?= $re_id ?>')"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm" onclick="loadAttendanceContent('addList', 'attendance', '2', '121', '23', '<?= $re_id ?>')"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm" onclick="loadAttendanceContent('addList', 'attendance', '2', '122', '', '<?= $re_id ?>')"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm" onclick="loadAttendanceContent('addList', 'attendance', '2', '123', '', '<?= $re_id ?>')"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm" onclick="loadAttendanceContent('addList', 'attendance', '2', '124', '', '<?= $re_id ?>')"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                </tr>
                
                <tr align="center">
                    <td align="center">3</td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm" onclick="loadAttendanceContent('addList', 'attendance', '3', '121', '22', '<?= $re_id ?>')"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm" onclick="loadAttendanceContent('addList', 'attendance', '3', '121', '23', '<?= $re_id ?>')"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm" onclick="loadAttendanceContent('addList', 'attendance', '3', '122', '', '<?= $re_id ?>')"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm" onclick="loadAttendanceContent('addList', 'attendance', '3', '123', '', '<?= $re_id ?>')"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm" onclick="loadAttendanceContent('addList', 'attendance', '3', '124', '', '<?= $re_id ?>')"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                </tr>
                
                <tr align="center">
                    <td align="center">4</td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm" onclick="loadAttendanceContent('addList', 'attendance', '4', '121', '22', '<?= $re_id ?>')"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm" onclick="loadAttendanceContent('addList', 'attendance', '4', '121', '23', '<?= $re_id ?>')"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm" onclick="loadAttendanceContent('addList', 'attendance', '4', '122', '', '<?= $re_id ?>')"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm" onclick="loadAttendanceContent('addList', 'attendance', '4', '123', '', '<?= $re_id ?>')"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                    <td align="center">
                        <a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> LIST</a>
                        <a class="btn btn-success btn-sm" onclick="loadAttendanceContent('addList', 'attendance', '4', '124', '', '<?= $re_id ?>')"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
                    </td>
                </tr>
                
            </table>
        </div>
    </div>

<!--
<table class="table table-bordered table-hover table-striped">
    <tr>
        <td align="center" width="30%">
            <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal<?php echo $re_id ?>"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</a>
            MATA KULIAH
        </td>
        <td align="center">PENSYARAH</td>
        <td align="center">SKS</td>
    </tr>
</table>
-->

<!-- Modal form -->
    <!--
    <div class="modal fade" id="myModal<?php echo $re_id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $re_id ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">                            
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel<?php echo $re_id ?>"><?= $row['term_id'] ?>/<?= $row['year'] ?></h4>
                </div>
                <div class="modal-body">

                    <div class="panel panel-primary">                                       
                        <div class="panel-body">

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    -->
<!-- /Modal showing -->


