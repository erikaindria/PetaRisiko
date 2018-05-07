<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kerentanan Sosials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kerentanan-sosial-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Kerentanan Sosial', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_kerensos',
            'kepadatan_penduduk',
            'rasio_jenis_kelamin',
            'rasio_kemiskinan',
            'rasio_orang_cacat',
            // 'rasio_kelompok_umur',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
