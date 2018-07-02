<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KerentananEkonomi */

$this->title = 'Update Kerentanan Ekonomi: ' . $model->id_kerenek;
$this->params['breadcrumbs'][] = ['label' => 'Kerentanan Ekonomi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kerenek, 'url' => ['view', 'id' => $model->id_kerenek]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kerentanan-ekonomi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
