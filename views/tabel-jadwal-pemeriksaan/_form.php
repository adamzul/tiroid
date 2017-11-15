<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TabelJadwalPemeriksaan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-jadwal-pemeriksaan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_jadwal_pemeriksaan')->textInput() ?>

    <?= $form->field($model, 'id_pasien')->textInput() ?>

    <?= $form->field($model, 'id_pegawai')->textInput() ?>

    <?= $form->field($model, 'jadwal_pemeriksaan')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
