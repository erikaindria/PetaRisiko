<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'PRB | Jawa Timur';

?>
<div class="kerentanan-fisik-index">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            KERENTANAN FISIK
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Data</a></li>
            <li class="active">Kerentanan</li>
            <li class="active">Kerentanan Fisik</li>
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
                            <th>Fasilitas Umum</th>
                            <th>Fasilitas Kritis</th>
                            <th>Rumah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($query as $res) { ?>
                        <tr>
                            <td><?= $res['nama_kabupaten'] ?></td>
                            <td><?= $res['fasilitas_umum'] ?></td>
                            <td><?= $res['fasilitas_kritis'] ?></td>
                            <td><?= $res['rumah'] ?></td>
                        </tr>
                        <?php } ?>                      
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nama Kabupaten</th>
                            <th>Fasilitas Umum</th>
                            <th>Fasilitas Kritis</th>
                            <th>Rumah</th>
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section>

</div>
