<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AhpTanahLongsor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ahp-tanah-longsor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_ahp_tanah_longsor')->textInput() ?>

    <?= $form->field($model, 'id_kabupaten')->textInput() ?>

    <?= $form->field($model, 'bobot')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
