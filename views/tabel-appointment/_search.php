<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TabelAppointmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-appointment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_appointment') ?>

    <?= $form->field($model, 'id_pasien') ?>

    <?= $form->field($model, 'id_pegawai') ?>

    <?= $form->field($model, 'tanggal_mengajukan_appointment') ?>

    <?= $form->field($model, 'tanggal_appointment') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
