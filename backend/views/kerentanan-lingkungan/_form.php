<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KerentananLingkungan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kerentanan-lingkungan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_kerenling')->textInput() ?>

    <?= $form->field($model, 'hutan_lindung')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hutan_alam')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hutan_bakau')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'semak_belukar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rawa')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
