<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TabelRule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-rule-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'usia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_kelamin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tekanan_sistolik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tekanan_diastolik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'riwayat_penyakit_tiroid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TSH')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'T4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'label')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
