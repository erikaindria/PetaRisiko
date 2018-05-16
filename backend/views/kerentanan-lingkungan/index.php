<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kerentanan Lingkungans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kerentanan-lingkungan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Kerentanan Lingkungan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_kerenling',
            'hutan_lindung',
            'hutan_alam',
            'hutan_bakau',
            'semak_belukar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
