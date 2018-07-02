<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KerentananSosial */

$this->title = 'Create Kerentanan Sosial';
$this->params['breadcrumbs'][] = ['label' => 'Kerentanan Sosial', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kerentanan-sosial-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
