<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\Models\TabelJenisPemeriksaan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-jenis-pemeriksaan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jenis_pemeriksaan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deskripsi_jenis_pemeriksaan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
