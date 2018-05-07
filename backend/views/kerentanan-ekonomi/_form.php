<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KerentananEkonomi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kerentanan-ekonomi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_kerenek')->textInput() ?>

    <?= $form->field($model, 'lahan_produktif')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PDRB')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
