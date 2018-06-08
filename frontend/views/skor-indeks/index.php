<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'PRB | Jawa Timur';
?>
<div class="skor-indeks-index">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            INDEKS KAPASITAS
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Process</a></li>
            <li class="active">Indeks Kapasitas</li>
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
                            <th>Skor</th>                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach ($query['nilaiindeks'] as $res) { ?>
                        <tr>
                            <td style="width: 60%;"><?= $res['nama_kabupaten'] ?></td>
                            <td style="width: 40%;"><?= $query['skorindeks'][$i] ?></td>
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
    </section>
</div>
