<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Peta Risiko';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bencana-index">

   <!--  <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Create Bencana', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_bencana',
            'id_kabupaten',
            // 'nama_kabupaten', //ini ditambahin sendiri ya
            'alamat_kejadian',
            'tanggal_kejadian',
            'waktu_kejadian',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

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
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama Kabupaten</th>
                            <th>Alamat Kejadian</th>
                            <th>Tanggal Kejadian</th>
                            <th>Waktu Kejadian</th>                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php  { ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
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
