<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TabelPegawaiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-pegawai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pegawai') ?>

    <?= $form->field($model, 'nama_pegawai') ?>

    <?= $form->field($model, 'jenis_kelamin_pegawai') ?>

    <?= $form->field($model, 'tanggal_lahir_pegawai') ?>

    <?= $form->field($model, 'alamat_pegawai') ?>

    <?php // echo $form->field($model, 'no_telpon_pegawai') ?>

    <?php // echo $form->field($model, 'username_pegawai') ?>

    <?php // echo $form->field($model, 'password_pegawai') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
