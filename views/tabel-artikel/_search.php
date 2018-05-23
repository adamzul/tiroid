<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TabelArtikelSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-artikel-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_artikel') ?>

    <?= $form->field($model, 'id_pegawai') ?>

    <?= $form->field($model, 'judul_artikel') ?>

    <?= $form->field($model, 'konten_artikel') ?>

    <?= $form->field($model, 'tanggal_artikel') ?>

    <?php // echo $form->field($model, 'sumber_artikel') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
