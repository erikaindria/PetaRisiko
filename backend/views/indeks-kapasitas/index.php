<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Indeks Kapasitas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indeks-kapasitas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Indeks Kapasitas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_indeks_kapasitas',
            'skor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
