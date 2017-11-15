<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TabelNotifikasiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-notifikasi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_notifikasi') ?>

    <?= $form->field($model, 'id_pegawai') ?>

    <?= $form->field($model, 'konten_notifikasi') ?>

    <?= $form->field($model, 'tanggal_notifikasi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
