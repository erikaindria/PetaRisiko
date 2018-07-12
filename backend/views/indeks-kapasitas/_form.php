<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\IndeksKapasitas;

/* @var $this yii\web\View */
/* @var $model app\models\IndeksKapasitas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="indeks-kapasitas-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-xs-8 form-group has-feedback">
        <?= $form->field($model, 'id_indeks_kapasitas')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-xs-8 form-group has-feedback">
        <?= $form->field($model, 'skor')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-xs-6 form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
