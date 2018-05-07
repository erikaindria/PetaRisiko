<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\IndeksKapasitas */

$this->title = 'Create Indeks Kapasitas';
$this->params['breadcrumbs'][] = ['label' => 'Indeks Kapasitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indeks-kapasitas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
