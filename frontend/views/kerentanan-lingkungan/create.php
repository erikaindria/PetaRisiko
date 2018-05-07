<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KerentananLingkungan */

$this->title = 'Create Kerentanan Lingkungan';
$this->params['breadcrumbs'][] = ['label' => 'Kerentanan Lingkungans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kerentanan-lingkungan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
