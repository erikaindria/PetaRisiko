<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\KerentananFisik;

/* @var $this yii\web\View */
/* @var $model app\models\KerentananFisik */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kerentanan-fisik-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'id_kerenfis')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'fasilitas_umum')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'fasilitas_kritis')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'rumah')->textInput(['maxlength' => true]) ?>
    </div>


    <div class="col-xs-6 form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
