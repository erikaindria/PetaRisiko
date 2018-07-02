<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KerentananSosial */

$this->title = 'Update Kerentanan Sosial: ' . $model->id_kerensos;
$this->params['breadcrumbs'][] = ['label' => 'Kerentanan Sosial', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kerensos, 'url' => ['view', 'id' => $model->id_kerensos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kerentanan-sosial-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
