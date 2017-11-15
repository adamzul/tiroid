<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TabelPenyakitSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-penyakit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_penyakit') ?>

    <?= $form->field($model, 'nama_penyakit') ?>

    <?= $form->field($model, 'deskripsi_penyakit') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
