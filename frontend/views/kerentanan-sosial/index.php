<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\models\KerentananSosial;
use yii\models\Kabupaten;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'PRB | Jawa Timur';
?>
<div class="kerentanan-sosial-index">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            KERENTANAN SOSIAL
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Data</a></li>
            <li class="active">Kerentanan</li>
            <li class="active">Kerentanan Sosial</li>
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
                            <th>Kepadatan Penduduk</th>
                            <th>Rasio Jenis Kelamin</th>
                            <th>Rasio Kemiskinan</th>
                            <th>Rasio Orang Cacat</th>
                            <th>Rasio Kelompok Umur</th>                      
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($query as $res) { ?>
                        <tr>
                            <td><?= $res['nama_kabupaten'] ?></td>
                            <td><?= $res['kepadatan_penduduk'] ?></td>
                            <td><?= $res['rasio_jenis_kelamin'] ?></td>
                            <td><?= $res['rasio_kemiskinan'] ?></td>
                            <td><?= $res['rasio_orang_cacat'] ?></td>
                            <td><?= $res['rasio_kelompok_umur'] ?></td>
                        </tr>
                        <?php } ?>                    
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nama Kabupaten</th>
                            <th>Kepadatan Penduduk</th>
                            <th>Rasio Jenis Kelamin</th>
                            <th>Rasio Kemiskinan</th>
                            <th>Rasio Orang Cacat</th>
                            <th>Rasio Kelompok Umur</th>
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section>
</div>

