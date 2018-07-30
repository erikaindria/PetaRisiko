<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AhpTanahLongsor */

$this->title = 'Create AHP Tanah Longsor';
$this->params['breadcrumbs'][] = ['label' => 'AHP Tanah Longsor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ahp-tanah-longsor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
