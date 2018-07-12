<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\select2;
use backend\models\KerentananSosial;

/* @var $this yii\web\View */
/* @var $model app\models\KerentananSosial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kerentanan-sosial-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'id_kerensos')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'kepadatan_penduduk')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'rasio_jenis_kelamin')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'rasio_kemiskinan')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'rasio_kelompok_umur')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-xs-6 form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
