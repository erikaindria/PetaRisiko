<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bencana */

$this->title = $model->id_bencana;
$this->params['breadcrumbs'][] = ['label' => 'Bencana', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bencana-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_bencana], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_bencana], [
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
            'id_bencana',
            'id_kabupaten',
            'alamat_kejadian',
            'tanggal_kejadian',
            'waktu_kejadian',
        ],
    ]) ?>

</div>
