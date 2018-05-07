<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KerentananSosial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kerentanan-sosial-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_kerensos')->textInput() ?>

    <?= $form->field($model, 'kepadatan_penduduk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rasio_jenis_kelamin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rasio_kemiskinan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rasio_orang_cacat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rasio_kelompok_umur')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
