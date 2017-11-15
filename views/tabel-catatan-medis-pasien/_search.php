<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TabelCatatanMedisPasienSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-catatan-medis-pasien-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_catatan_medis_pasien') ?>

    <?= $form->field($model, 'id_penyakit') ?>

    <?= $form->field($model, 'id_pasien') ?>

    <?= $form->field($model, 'id_pegawai') ?>

    <?= $form->field($model, 'catatan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
