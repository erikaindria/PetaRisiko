<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bencana */

$this->title = 'Create Bencana';
$this->params['breadcrumbs'][] = ['label' => 'Bencanas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bencana-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
