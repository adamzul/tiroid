<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TabelJadwalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-jadwal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_jadwal_dokter') ?>

    <?= $form->field($model, 'id_pegawai') ?>

    <?= $form->field($model, 'hari_jadwal') ?>

    <?= $form->field($model, 'jam_mulai_jadwal') ?>

    <?= $form->field($model, 'jam_berakhir_jadwal') ?>

    <?php // echo $form->field($model, 'ruang') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
