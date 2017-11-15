<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TabelPasien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-pasien-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pasien')->textInput() ?>

    <?= $form->field($model, 'nama_pasien')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_kelamin_pasien')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_lahir')->textInput() ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username_pasien')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_pasien')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
