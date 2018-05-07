<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kerentanan Fisiks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kerentanan-fisik-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Kerentanan Fisik', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_kerenfis',
            'fasilitas_umum',
            'fasilitas_khusus',
            'rumah',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
