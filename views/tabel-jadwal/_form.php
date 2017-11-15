<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TabelJadwal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-jadwal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_jadwal_dokter')->textInput() ?>

    <?= $form->field($model, 'id_pegawai')->textInput() ?>

    <?= $form->field($model, 'hari_jadwal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jam_mulai_jadwal')->textInput() ?>

    <?= $form->field($model, 'jam_berakhir_jadwal')->textInput() ?>

    <?= $form->field($model, 'ruang')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
