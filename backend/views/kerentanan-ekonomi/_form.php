<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\KerentananEkonomi;

/* @var $this yii\web\View */
/* @var $model app\models\KerentananEkonomi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kerentanan-ekonomi-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-xs-8 form-group has-feedback">
        <?= $form->field($model, 'id_kerenek')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-xs-8 form-group has-feedback">
        <?= $form->field($model, 'lahan_produktif')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-xs-8 form-group has-feedback">
        <?= $form->field($model, 'PDRB')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-xs-6 form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
