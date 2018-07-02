<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KerentananLingkungan */

$this->title = 'Update Kerentanan Lingkungan: ' . $model->id_kerenling;
$this->params['breadcrumbs'][] = ['label' => 'Kerentanan Lingkungan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kerenling, 'url' => ['view', 'id' => $model->id_kerenling]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kerentanan-lingkungan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
