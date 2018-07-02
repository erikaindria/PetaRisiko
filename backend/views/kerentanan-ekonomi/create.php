<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KerentananEkonomi */

$this->title = 'Create Kerentanan Ekonomi';
$this->params['breadcrumbs'][] = ['label' => 'Kerentanan Ekonomi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kerentanan-ekonomi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
