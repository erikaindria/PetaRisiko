<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\Bencana;
use backend\models\Kabupaten;
/* @var $this yii\web\View */
/* @var $model app\models\Bencana */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bencana-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'id_bencana')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'id_kabupaten')->widget(Select2::className(),[
            'data' => \yii\helpers\ArrayHelper::map(Kabupaten::find()->all(),'id_kabupaten','nama_kabupaten'),
            'options' => ['placeholder' => 'Pilih Kabupaten'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>
    </div>

    <div class="col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'alamat_kejadian')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'tanggal_kejadian')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'waktu_kejadian')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-xs-6 form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
