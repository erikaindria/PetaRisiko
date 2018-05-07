<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bencanas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bencana-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bencana', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_bencana',
            'id_kabupaten',
            'alamat_kejadian',
            'tanggal_kejadian',
            'waktu_kejadian',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
