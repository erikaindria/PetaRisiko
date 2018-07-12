<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\Kabupaten;
use backend\models\KerentananFisik;
use backend\models\KerentananEkonomi;
use backend\models\KerentananLingkungan;
use backend\models\KerentananSosial;
use backend\models\IndeksKapasitas;

/* @var $this yii\web\View */
/* @var $model app\models\Kabupaten */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kabupaten-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'id_kabupaten')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'id_periode')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'id_kerenek')->widget(Select2::className(),[
            'data' => \yii\helpers\ArrayHelper::map(KerentananEkonomi::find()->all(),'id_kerenek','id_kerenek'),
            'options' => ['placeholder' => 'Pilih ID Kerenek'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>
    </div>

    <div class="col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'id_kerenfis')->widget(Select2::className(),[
            'data' => \yii\helpers\ArrayHelper::map(KerentananFisik::find()->all(),'id_kerenfis','id_kerenfis'),
            'options' => ['placeholder' => 'Pilih ID Kerenfis'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>
    </div>

    <div class="col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'id_kerenling')->widget(Select2::className(),[
            'data' => \yii\helpers\ArrayHelper::map(KerentananLingkungan::find()->all(),'id_kerenling','id_kerenling'),
            'options' => ['placeholder' => 'Pilih ID Kerenling'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>
    </div>

    <div class="col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'id_kerensos')->widget(Select2::className(),[
            'data' => \yii\helpers\ArrayHelper::map(KerentananSosial::find()->all(),'id_kerensos','id_kerensos'),
            'options' => ['placeholder' => 'Pilih ID Kerensos'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>
    </div>

    <div class="col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'id_indeks_kapasitas')->widget(Select2::className(),[
            'data' => \yii\helpers\ArrayHelper::map(IndeksKapasitas::find()->all(),'id_indeks_kapasitas','id_indeks_kapasitas'),
            'options' => ['placeholder' => 'Pilih ID Indeks Kapasitas'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>
    </div>

    <div class="col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'nama_kabupaten')->textInput(['maxlength' => true]) ?>
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
