<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'PRB | Jawa Timur';

?>

<!-- DataTables CSS -->
<head>

  <!-- DataTables -->
  <link rel="stylesheet" href="../../vendor/almasaeed2010/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.css">

</head>








<div class="bencana-index">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            DAFTAR BENCANA
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Data</a></li>
            <li class="active">Daftar Bencana</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Jawa Timur</h3>
            </div><!-- /.box-header -->
                    
            <div class="box-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nama Kabupaten</th>
                            <th>Alamat Kejadian</th>
                            <th>Tanggal Kejadian</th>
                            <th>Waktu Kejadian</th>                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($query as $res)  { ?>
                        <tr>
                            <td><?= $res['nama_kabupaten'] ?></td>
                            <td><?= $res['alamat_kejadian'] ?></td>
                            <td><?= $res['tanggal_kejadian'] ?></td>
                            <td><?= $res['waktu_kejadian'] ?></td>
                        </tr>
                        <?php } ?>                    
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nama Kabupaten</th>
                            <th>Alamat Kejadian</th>
                            <th>Tanggal Kejadian</th>
                            <th>Waktu Kejadian</th>  
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section>
</div>


<!-- DataTables -->
<script src="../../vendor/almasaeed2010/adminlte/bower_components/datatables.net/js/jquery.dataTables.js"></script>
<script src="../../vendor/almasaeed2010/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.js"></script>


<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>