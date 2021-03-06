<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\KerentananLingkungan */

$this->title = $model->id_kerenling;
$this->params['breadcrumbs'][] = ['label' => 'Kerentanan Lingkungan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kerentanan-lingkungan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_kerenling], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_kerenling], [
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
            'id_kerenling',
            'hutan_lindung',
            'hutan_alam',
            'hutan_bakau',
            'semak_belukar',
        ],
    ]) ?>

</div>
