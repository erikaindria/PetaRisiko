<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kerentanan Sosial';
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

<div class="kerentanan-sosial-index">
    <section class="content">
        <p>
            <?= Html::a('Create Kerentanan Sosial', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Kerentanan Sosial</h3>
            </div> <!-- /.box-header -->

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
                        <?php foreach ($query as $res) { ?>
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
});
</script>