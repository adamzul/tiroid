<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TabelCatatanMedisPasien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-catatan-medis-pasien-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_catatan_medis_pasien')->textInput() ?>

    <?= $form->field($model, 'id_penyakit')->textInput() ?>

    <?= $form->field($model, 'id_pasien')->textInput() ?>

    <?= $form->field($model, 'id_pegawai')->textInput() ?>

    <?= $form->field($model, 'catatan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
