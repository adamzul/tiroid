<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TabelPrediksi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-prediksi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_prediksi')->textInput() ?>

    <?= $form->field($model, 'id_pasien')->textInput() ?>

    <?= $form->field($model, 'jenis_kelamin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usia')->textInput() ?>

    <?= $form->field($model, 'hasil_pemeriksaan_usg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hasil_pemeriksaan_klinis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'riwayat_penyakit_gondok')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'riwayat_penyakit_keluarga')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hasil_prediksi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'catatan_dokter')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
