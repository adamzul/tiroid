<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TabelPenyakit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-penyakit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_penyakit')->textInput() ?>

    <?= $form->field($model, 'nama_penyakit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deskripsi_penyakit')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
