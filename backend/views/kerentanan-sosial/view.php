<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\KerentananSosial */

$this->title = $model->id_kerensos;
$this->params['breadcrumbs'][] = ['label' => 'Kerentanan Sosial', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kerentanan-sosial-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_kerensos], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_kerensos], [
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
            'id_kerensos',
            'kepadatan_penduduk',
            'rasio_jenis_kelamin',
            'rasio_kemiskinan',
            'rasio_orang_cacat',
            'rasio_kelompok_umur',
        ],
    ]) ?>

</div>
