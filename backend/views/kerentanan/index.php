<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kerentanan';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- DataTables CSS -->
<head>
  <!-- Bootstrap 3.3.7 -->
  <link href="http://localhost/PetaRisiko/vendor/bower/adminlte/dist/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="http://localhost/PetaRisiko/vendor/bower/adminlte/dist/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css">
</head>

<script src="http://localhost/PetaRisiko/vendor/bower-asset/datatables/media/js/jquery.js"></script>

<div class="kerentanan-index">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Kerentanan Sosial</h3>
            </div><!-- /.box-header -->
                    
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID Kerensos</th>
                            <th>Kepadatan Penduduk</th>
                            <th>Rasio Jenis Kelamin</th>
                            <th>Rasio Kemiskinan</th>
                            <th>Rasio Orang Cacat</th>
                            <th>Rasio Kelompok Umur</th>
                            <th>Aksi</th>                   
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach ($query['sosial'] as $res)  { ?>
                        <tr>
                            <td><?= $res['id_kerensos'] ?></td>
                            <td><?= $res['kepadatan_penduduk'] ?></td>
                            <td><?= $res['rasio_jenis_kelamin'] ?></td>
                            <td><?= $res['rasio_kemiskinan'] ?></td>
                            <td><?= $res['rasio_orang_cacat'] ?></td>
                            <td><?= $res['rasio_kelompok_umur'] ?></td>
                            <td>
                                <?= Html::a('<i class="fa fa-eye"></i>', ['view', 'id'=>$res['id_kerensos']]) ?>
                                <?= Html::a('<i class="fa fa-pencil"></i>', ['update', 'id'=>$res['id_kerensos']]) ?>
                                <?= Html::a('<i class="fa fa-trash-o"></i>', ['delete', 'id'=>$res['id_kerensos']], ['data-method' => 'post']) ?>
                            </td>
                        </tr>
                        <?php } ?>                    
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        </div>
      </div> <!-- row -->

      <div class="row">
        <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Kerentanan Ekonomi</h3>
            </div><!-- /.box-header -->
                    
            <div class="box-body">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID Kerenek</th>
                            <th>Lahan Produktif</th> 
                            <th>PDRB</th>
                            <th>Aksi</th>                   
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach ($query['ekonomi'] as $res)  { ?>
                        <tr>
                            <td><?= $res['id_kerenek'] ?></td>
                            <td><?= $res['lahan_produktif'] ?></td>
                            <td><?= $res['PDRB'] ?></td>
                            <td>
                                <?= Html::a('<i class="fa fa-eye"></i>', ['view', 'id'=>$res['id_kerenek']]) ?>
                                <?= Html::a('<i class="fa fa-pencil"></i>', ['update', 'id'=>$res['id_kerenek']]) ?>
                                <?= Html::a('<i class="fa fa-trash-o"></i>', ['delete', 'id'=>$res['id_kerenek']], ['data-method' => 'post']) ?>
                            </td>
                        </tr>
                        <?php } ?>                    
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        </div>
      </div> <!-- row -->

      <div class="row">
        <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Kerentanan Fisik</h3>
            </div><!-- /.box-header -->
                    
            <div class="box-body">
                <table id="example3" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID Kerenfis</th>
                            <th>Fasilitas Umum</th> 
                            <th>Fasilitas Kritis</th>
                            <th>Rumah</th>
                            <th>Aksi</th>                   
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach ($query['fisik'] as $res)  { ?>
                        <tr>
                            <td><?= $res['id_kerenfis'] ?></td>
                            <td><?= $res['fasilitas_umum'] ?></td>
                            <td><?= $res['fasilitas_kritis'] ?></td>
                            <td><?= $res['rumah'] ?></td>
                            <td>
                                <?= Html::a('<i class="fa fa-eye"></i>', ['view', 'id'=>$res['id_kerenfis']]) ?>
                                <?= Html::a('<i class="fa fa-pencil"></i>', ['update', 'id'=>$res['id_kerenfis']]) ?>
                                <?= Html::a('<i class="fa fa-trash-o"></i>', ['delete', 'id'=>$res['id_kerenfis']], ['data-method' => 'post']) ?>
                            </td>
                        </tr>
                        <?php } ?>                    
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        </div>
      </div> <!-- row -->

      <div class="row">
        <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Kerentanan Lingkungan</h3>
            </div><!-- /.box-header -->
                    
            <div class="box-body">
                <table id="example4" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID Kerenling</th>
                            <th>Hutan Lindung</th> 
                            <th>Hutan Alam</th>
                            <th>Hutan Bakau</th>
                            <th>Semak Belukar</th>  
                            <th>Aksi</th>                   
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach ($query['lingkungan'] as $res)  { ?>
                        <tr>
                            <td><?= $res['id_kerenling'] ?></td>
                            <td><?= $res['hutan_lindung'] ?></td>
                            <td><?= $res['hutan_alam'] ?></td>
                            <td><?= $res['hutan_bakau'] ?></td>
                            <td><?= $res['semak_belukar'] ?></td>
                            <td>
                                <?= Html::a('<i class="fa fa-eye"></i>', ['view', 'id'=>$res['id_kerenling']]) ?>
                                <?= Html::a('<i class="fa fa-pencil"></i>', ['update', 'id'=>$res['id_kerenling']]) ?>
                                <?= Html::a('<i class="fa fa-trash-o"></i>', ['delete', 'id'=>$res['id_kerenling']], ['data-method' => 'post']) ?>
                            </td>
                        </tr>
                        <?php } ?>                    
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        </div>
      </div> <!-- row -->
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
    $('#example1').DataTable({
        'lengthChange': true,
    });

    $('#example2').DataTable({
        'lengthChange': true,
    });

    $('#example3').DataTable({
        'lengthChange': true,
    });

    $('#example4').DataTable({
        'lengthChange': true,
    });
  });
</script>