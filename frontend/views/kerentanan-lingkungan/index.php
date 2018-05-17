<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\models\KerentananLingkungan;
use yii\models\Kabupaten;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'PRB | Jawa Timur';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kerentanan-lingkungan-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Create Kerentanan Lingkungan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            KERENTANAN LINGKUNGAN
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Data</a></li>
            <li class="active">Kerentanan</li>
            <li class="active">Kerentanan Lingkungan</li>
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
                            <th>Hutan Lindung</th>
                            <th>Hutan Alam</th>
                            <th>Hutan Bakau</th>
                            <th>Semak Belukar</th>                
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($query as $res)  { ?>
                        <tr>
                            <td><?= $res['nama_kabupaten'] ?></td>
                            <td><?= $res['hutan_lindung'] ?></td>
                            <td><?= $res['hutan_alam'] ?></td>
                            <td><?= $res['hutan_bakau'] ?></td>
                            <td><?= $res['semak_belukar'] ?></td>
                        </tr>
                        <?php } ?>                    
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nama Kabupaten</th>
                            <th>Hutan Lindung</th>
                            <th>Hutan Alam</th>
                            <th>Hutan Bakau</th>
                            <th>Semak Belukar</th>
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section>
</div>
