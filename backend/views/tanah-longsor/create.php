<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TanahLongsor */

$this->title = 'Create Tanah Longsor';
$this->params['breadcrumbs'][] = ['label' => 'Tanah Longsors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tanah-longsor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
