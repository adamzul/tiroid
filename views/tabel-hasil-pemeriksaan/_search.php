<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TabelHasilPemeriksaanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-hasil-pemeriksaan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_hasil_pemeriksaan') ?>

    <?= $form->field($model, 'id_pasien') ?>

    <?= $form->field($model, 'id_pegawai') ?>

    <?= $form->field($model, 'hasil_pemeriksaan') ?>

    <?= $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'tanggal_pemeriksaan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
