<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bencana */

$this->title = 'Update Bencana: ' . $model->id_bencana;
$this->params['breadcrumbs'][] = ['label' => 'Bencana', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_bencana, 'url' => ['view', 'id' => $model->id_bencana]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bencana-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
