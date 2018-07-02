<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KerentananFisik */

$this->title = 'Create Kerentanan Fisik';
$this->params['breadcrumbs'][] = ['label' => 'Kerentanan Fisik', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kerentanan-fisik-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
