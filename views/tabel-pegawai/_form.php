<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

use app\models\TabelRole;
use app\models\TabelJenisKelamin;


/* @var $this yii\web\View */
/* @var $model app\Models\TabelPegawai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-pegawai-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_pegawai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_jenis_kelamin_pegawai')->dropDownList(ArrayHelper::map(TabelJenisKelamin::find()->all(), 'id_jenis_kelamin', 'jenis_kelamin')) ?>

    <?= $form->field($model, 'tanggal_lahir_pegawai')->widget(DatePicker::classname(), 
    [
        'name' => 'date',
        'pluginOptions' => ['format' => 'yyyy-mm-dd', 'autoclose' => true]
    ]) ?>

    <?= $form->field($model, 'alamat_pegawai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_telpon_pegawai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username_pegawai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_pegawai')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'id_role_pegawai')->dropDownList(ArrayHelper::map(TabelRole::find()->all(), 'id_role', 'role')) ?>
    <?= $form->field($upload, 'imageFile')->fileInput()->label('Foto') ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
