<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TabelPrediksiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-prediksi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_prediksi') ?>

    <?= $form->field($model, 'id_pasien') ?>

    <?= $form->field($model, 'jenis_kelamin') ?>

    <?= $form->field($model, 'usia') ?>

    <?= $form->field($model, 'tekanan_sistolik') ?>

    <?php // echo $form->field($model, 'tekanan_diastolik') ?>

    <?php // echo $form->field($model, 'riwayat_penyakit_tiroid') ?>

    <?php // echo $form->field($model, 'TSH') ?>

    <?php // echo $form->field($model, 'T4') ?>

    <?php // echo $form->field($model, 'hasil_prediksi') ?>

    <?php // echo $form->field($model, 'tanggal_input') ?>

    <?php // echo $form->field($model, 'catatan_dokter') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
