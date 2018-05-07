<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TanahLongsor */

$this->title = 'Update Tanah Longsor: ' . $model->id_tanah_longsor;
$this->params['breadcrumbs'][] = ['label' => 'Tanah Longsors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tanah_longsor, 'url' => ['view', 'id' => $model->id_tanah_longsor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tanah-longsor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
