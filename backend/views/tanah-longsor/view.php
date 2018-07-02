<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TanahLongsor */

$this->title = $model->id_tanah_longsor;
$this->params['breadcrumbs'][] = ['label' => 'Tanah Longsor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tanah-longsor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_tanah_longsor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_tanah_longsor], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_tanah_longsor',
            'id_bencana',
            'kerentanan_gerakan_tanah',
            'longtitude',
            'latitude',
        ],
    ]) ?>

</div>
