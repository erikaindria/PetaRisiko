<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KerentananFisik */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kerentanan-fisik-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_kerenfis')->textInput() ?>

    <?= $form->field($model, 'fasilitas_umum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fasilitas_kritis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rumah')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
