<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\models\TanahLongsor;
use yii\models\Kabupaten;
use yii\models\Bencana;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'PRB | Jawa Timur';
?>

<!-- DataTables CSS -->
<head>
  <!-- Bootstrap 3.3.7 -->
  <link href="http://localhost/PetaRisiko/vendor/bower/adminlte/dist/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="http://localhost/PetaRisiko/vendor/bower/adminlte/dist/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css">

</head>

<script src="http://localhost/PetaRisiko/vendor/bower-asset/datatables/media/js/jquery.js"></script>

<div class="tanah-longsor-index">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Nilai Tanah Longsor
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Process</a></li>
            <li class="active">Hazard</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Jawa Timur</h3>
            </div><!-- /.box-header -->
                    
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Tanggal Kejadian</th>
                            <th>Nama Kabupaten</th>
                            <th>Latitude</th>
                            <th>Longtitude</th>
                            <th>Kerentanan Gerakan Tanah</th>
                            <th>Skor</th>              
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach ($query['data_longsor'] as $res) { ?>
                        <tr>
                            <td><?= $res['tanggal_kejadian'] ?></td>
                            <td><?= $res['nama_kabupaten'] ?></td>
                            <td><?= $res['latitude'] ?></td>
                            <td><?= $res['longtitude'] ?></td>
                            <td><?= $res['kerentanan_gerakan_tanah'] ?></td>
                            <td><?= $query['skor_longsor'][$i] ?></td>
                        </tr>
                        <?php $i++; } ?>                     
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Tanggal Kejadian</th>
                            <th>Nama Kabupaten</th>
                            <th>Latitude</th>
                            <th>Longtitude</th>
                            <th>Kerentanan Gerakan Tanah</th> 
                            <th>Skor</th>
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section>
</div>


<!-- DataTables -->
<script src="http://localhost/PetaRisiko/vendor/bower-asset/datatables/media/js/jquery.dataTables.min.js"></script>

<script src="http://localhost/PetaRisiko/vendor/bower-asset/datatables/dataTables.bootstrap.min.js"></script>

<script src="http://localhost/PetaRisiko/vendor/bower/adminlte/dist/plugins/datatables/extensions/Responsive/js/dataTables.responsive.js"></script>

<!-- page script -->
<script>
  // $(document).ready(function() {
  //   $('#example1').DataTable({
  //       responsive : true
  //   });
  // }); //bekos ini versi lama
  jQuery( document ).ready(function( $ ) {
    $('#example1').DataTable();
});
</script>