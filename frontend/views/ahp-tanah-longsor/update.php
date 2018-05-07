<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AhpTanahLongsor */

$this->title = 'Update Ahp Tanah Longsor: ' . $model->id_ahp_tanah_longsor;
$this->params['breadcrumbs'][] = ['label' => 'Ahp Tanah Longsors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ahp_tanah_longsor, 'url' => ['view', 'id' => $model->id_ahp_tanah_longsor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ahp-tanah-longsor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
