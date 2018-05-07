<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KerentananFisik */

$this->title = 'Update Kerentanan Fisik: ' . $model->id_kerenfis;
$this->params['breadcrumbs'][] = ['label' => 'Kerentanan Fisiks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kerenfis, 'url' => ['view', 'id' => $model->id_kerenfis]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kerentanan-fisik-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
