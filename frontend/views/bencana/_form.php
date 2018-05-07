<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bencana */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bencana-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_bencana')->textInput() ?>

    <?= $form->field($model, 'id_kabupaten')->textInput() ?>

    <?= $form->field($model, 'alamat_kejadian')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_kejadian')->textInput() ?>

    <?= $form->field($model, 'waktu_kejadian')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
