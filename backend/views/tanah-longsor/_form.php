<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\TanahLongsor;
use backend\models\Bencana;

/* @var $this yii\web\View */
/* @var $model app\models\TanahLongsor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tanah-longsor-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'id_tanah_longsor')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'id_bencana')->widget(Select2::className(),[
            'data'=> \yii\helpers\ArrayHelper::map(Bencana::find()->all(),'id_bencana','id_bencana'),
            'options' => ['placeholder' => 'Pilih ID Bencana'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>
    </div>

    <div class="col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'kerentanan_gerakan_tanah')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'longtitude')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-xs-6 form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
