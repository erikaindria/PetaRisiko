<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\KerentananEkonomi */

$this->title = $model->id_kerenek;
$this->params['breadcrumbs'][] = ['label' => 'Kerentanan Ekonomis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kerentanan-ekonomi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_kerenek], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_kerenek], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_kerenek',
            'lahan_produktif',
            'PDRB',
        ],
    ]) ?>

</div>
