<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kabupaten';
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

<div class="kabupaten-index">
    <section class="content">
        <p>
            <?= Html::a('Create Kabupaten', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Kabupaten</h3>
            </div><!-- /.box-header -->
                    
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID Kabupaten</th>
                            <!-- <th>ID Periode</th> -->
                            <!-- <th>ID Kerenek</th> -->
                            <!-- <th>ID Kerenfis</th>  -->
                            <!-- <th>ID Kerenling</th> -->
                            <!-- <th>ID Kerensos</th> -->
                            <!-- <th>ID Indeks Kapasitas</th> -->
                            <th>Nama Kabupaten</th> 
                            <th>Longtitude</th>
                            <th>Latitude</th>  
                            <th>Aksi</th>                    
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($query as $res)  { ?>
                        <tr>
                            <td><?= $res['id_kabupaten'] ?></td>
                            <!-- <td><?= $res['id_periode'] ?></td> -->
                            <!-- <td><?= $res['id_kerenek'] ?></td> -->
                            <!-- <td><?= $res['id_kerenfis'] ?></td> -->
                            <!-- <td><?= $res['id_kerenling'] ?></td> -->
                            <!-- <td><?= $res['id_kerensos'] ?></td> -->
                            <!-- <td><?= $res['id_indeks_kapasitas'] ?></td> -->
                            <td><?= $res['nama_kabupaten'] ?></td>
                            <td><?= $res['longtitude'] ?></td>
                            <td><?= $res['latitude'] ?></td>
                            <td>
                                <?= Html::a('<i class="fa fa-eye"></i>', ['view', 'id'=>$res['id_kabupaten']]) ?>
                                <?= Html::a('<i class="fa fa-pencil"></i>', ['update', 'id'=>$res['id_kabupaten']]) ?>
                                <?= Html::a('<i class="fa fa-trash-o"></i>', ['delete', 'id'=>$res['id_kabupaten']], ['data-method' => 'post']) ?>
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