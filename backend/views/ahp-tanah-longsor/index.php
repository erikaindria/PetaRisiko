<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ahp Tanah Longsor';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ahp-tanah-longsor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ahp Tanah Longsor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_ahp_tanah_longsor',
            'id_kabupaten',
            'bobot',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
