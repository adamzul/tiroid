<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\Models\TabelAppointment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-appointment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pasien')->textInput() ?>

    <?= $form->field($model, 'id_pegawai')->textInput() ?>

    <?= $form->field($model, 'tanggal_mengajukan_appointment')->textInput() ?>

    <?= $form->field($model, 'tanggal_appointment')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
