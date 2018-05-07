<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tanah Longsors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tanah-longsor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tanah Longsor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tanah_longsor',
            'id_bencana',
            'kerentanan_gerakan_tanah',
            'longtitude',
            'latitude',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
