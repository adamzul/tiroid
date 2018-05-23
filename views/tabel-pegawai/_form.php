<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use app\models\TabelRole;


/* @var $this yii\web\View */
/* @var $model app\Models\TabelPegawai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-pegawai-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_pegawai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_kelamin_pegawai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_lahir_pegawai')->textInput() ?>

    <?= $form->field($model, 'alamat_pegawai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_telpon_pegawai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username_pegawai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_pegawai')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'role_pegawai')->dropDownList(ArrayHelper::map(TabelRole::find()->all(), 'id_role', 'role')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
