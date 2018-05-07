<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IndeksKapasitas */

$this->title = 'Update Indeks Kapasitas: ' . $model->id_indeks_kapasitas;
$this->params['breadcrumbs'][] = ['label' => 'Indeks Kapasitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_indeks_kapasitas, 'url' => ['view', 'id' => $model->id_indeks_kapasitas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="indeks-kapasitas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
