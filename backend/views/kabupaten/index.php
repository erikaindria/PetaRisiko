<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kabupaten';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kabupaten-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Kabupaten', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_kabupaten',
            'id_periode',
            'id_kerenek',
            'id_kerenfis',
            'id_kerenling',
            'id_kerensos',
            'id_indeks_kapasitas',
            'nama_kabupaten',
            'longtitude',
            'latitude',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
