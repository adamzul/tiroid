<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TabelPasienSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-pasien-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pasien') ?>

    <?= $form->field($model, 'nama_pasien') ?>

    <?= $form->field($model, 'jenis_kelamin_pasien') ?>

    <?= $form->field($model, 'tanggal_lahir') ?>

    <?= $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'username_pasien') ?>

    <?php // echo $form->field($model, 'password_pasien') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
