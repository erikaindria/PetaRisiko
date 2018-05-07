<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TanahLongsor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tanah-longsor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_tanah_longsor')->textInput() ?>

    <?= $form->field($model, 'id_bencana')->textInput() ?>

    <?= $form->field($model, 'kerentanan_gerakan_tanah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'longtitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
