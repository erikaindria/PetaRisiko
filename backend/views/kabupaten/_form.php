<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kabupaten */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kabupaten-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_kabupaten')->textInput() ?>

    <?= $form->field($model, 'id_periode')->textInput() ?>

    <?= $form->field($model, 'id_kerenek')->textInput() ?>

    <?= $form->field($model, 'id_kerenfis')->textInput() ?>

    <?= $form->field($model, 'id_kerenling')->textInput() ?>

    <?= $form->field($model, 'id_kerensos')->textInput() ?>

    <?= $form->field($model, 'id_indeks_kapasitas')->textInput() ?>

    <?= $form->field($model, 'nama_kabupaten')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'longtitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
