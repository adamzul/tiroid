<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TabelNotifikasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-notifikasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_notifikasi')->textInput() ?>

    <?= $form->field($model, 'id_pegawai')->textInput() ?>

    <?= $form->field($model, 'konten_notifikasi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tanggal_notifikasi')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
