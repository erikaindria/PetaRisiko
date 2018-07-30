<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\AhpTanahLongsor;
use backend\models\Kabupaten;
/* @var $this yii\web\View */
/* @var $model app\models\AhpTanahLongsor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ahp-tanah-longsor-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-xs-7 form-group has-feedback">
        <?= $form->field($model, 'id_ahp_tanah_longsor')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-xs-7 form-group has-feedback">
        <?= $form->field($model, 'id_kabupaten')->widget(Select2::className(),[
            'data' => \yii\helpers\ArrayHelper::map(Kabupaten::find()->all(),'id_kabupaten','nama_kabupaten'),
            'options' => ['placeholder' => 'Pilih Kabupaten'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>
    </div>

    <div class="col-xs-7 form-group has-feedback">
        <?= $form->field($model, 'bobot')->textInput(['maxlength' => true]) ?>
    </div>


    <div class="col-xs-6 form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
