<?php

use yii\helpers\Html;
use yii\grid\GridView;

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

<div class="skor-indeks-index">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            KERENTANAN
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Process</a></li>
            <li class="active">Kerentanan</li>
        </ol>
    </section>

    <section class="content">
    <div class="row">
        <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Kerentanan Sosial</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama Kabupaten</th>
                            <th>Kepadatan Penduduk</th>
                            <th>Rasio Jenis Kelamin</th>
                            <th>Rasio Kemiskinan</th>
                            <th>Rasio Orang Cacat</th>
                            <th>Rasio Kelompok Umur</th>
                            <th>Skor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach ($query['sosial'] as $res) { ?>
                        <tr>
                            <td><?= $res['nama_kabupaten'] ?></td>
                            <td><?= $query['skorkepadatan'][$i] ?></td>
                            <td><?= $query['skorkelamin'][$i] ?></td>
                            <td><?= $query['skormiskin'][$i] ?></td>
                            <td><?= $query['skorcacat'][$i] ?></td>
                            <td><?= $query['skorumur'][$i] ?></td>
                            <td><?= $query['skorsosial'][$i] ?></td>
                        </tr>
                        <?php $i++; } ?>                    
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nama Kabupaten</th>
                            <th>Kepadatan Penduduk</th>
                            <th>Rasio Jenis Kelamin</th>
                            <th>Rasio Kemiskinan</th>
                            <th>Rasio Orang Cacat</th>
                            <th>Rasio Kelompok Umur</th>
                            <th>Skor</th>    
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Kerentanan Ekonomi</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama Kabupaten</th>
                            <th>Lahan Produktif</th>
                            <th>PDRB</th>
                            <th>Skor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach ($query['ekonomi'] as $res) { ?>
                        <tr>
                            <td><?= $res['nama_kabupaten'] ?></td>
                            <td><?= $query['skorlahan'][$i] ?></td>
                            <td><?= $query['skorPDRB'][$i] ?></td>
                            <td><?= $query['skorekonomi'][$i] ?></td>
                        </tr>
                        <?php $i++; } ?>                    
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nama Kabupaten</th>
                            <th>Lahan Produktif</th>
                            <th>PDRB</th>
                            <th>Skor</th> 
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Kerentanan Fisik</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example3" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama Kabupaten</th>
                            <th>Fasilitas Umum</th>
                            <th>Fasilitas Kritis</th>
                            <th>Rumah</th>
                            <th>Skor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach ($query['fisik'] as $res) { ?>
                        <tr>
                            <td><?= $res['nama_kabupaten'] ?></td>
                            <td><?= $query['skorumum'][$i] ?></td>
                            <td><?= $query['skorkritis'][$i] ?></td>
                            <td><?= $query['skorrumah'][$i] ?></td>
                            <td><?= $query['skorfisik'][$i] ?></td>
                        </tr>
                        <?php $i++; } ?>                    
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nama Kabupaten</th>
                            <th>Fasilitas Umum</th>
                            <th>Fasilitas Kritis</th>
                            <th>Rumah</th>
                            <th>Skor</th> 
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Kerentanan Lingkungan</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example4" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama Kabupaten</th>
                            <th>Hutan Lindung</th>
                            <th>Hutan Alam</th>
                            <th>Hutan Bakau</th>
                            <th>Semak Belukar</th>
                            <th>Skor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach ($query['lingkungan'] as $res) { ?>
                        <tr>
                            <td><?= $res['nama_kabupaten'] ?></td>
                            <td><?= $query['skorlindung'][$i] ?></td>
                            <td><?= $query['skoralam'][$i] ?></td>
                            <td><?= $query['skorbakau'][$i] ?></td>
                            <td><?= $query['skorbelukar'][$i] ?></td>
                            <td><?= $query['skorlingkungan'][$i] ?></td>
                        </tr>
                        <?php $i++; } ?>                    
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nama Kabupaten</th>
                            <th>Hutan Lindung</th>
                            <th>Hutan Alam</th>
                            <th>Hutan Bakau</th>
                            <th>Semak Belukar</th>
                            <th>Skor</th> 
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Nilai Kerentanan</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example5" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama Kabupaten</th>
                            <th>Skor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach ($query['lingkungan'] as $res) { ?>
                        <tr>
                            <td><?= $res['nama_kabupaten'] ?></td>
                            <td><?= $query['skorkerentanan'][$i] ?></td>
                        </tr>
                        <?php $i++; } ?>                    
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nama Kabupaten</th>
                            <th>Skor</th> 
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        </div>
    </div>
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
    $('#example2').DataTable();
    $('#example3').DataTable();
    $('#example4').DataTable();
    $('#example5').DataTable();
  });
</script>