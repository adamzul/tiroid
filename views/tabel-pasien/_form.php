<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

use app\models\TabelJenisKelamin;

/* @var $model app\models\TabelPasien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-pasien-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_pasien')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_jenis_kelamin_pasien')->dropDownList(ArrayHelper::map(TabelJenisKelamin::find()->all(), 'id_jenis_kelamin', 'jenis_kelamin'))->label('Jenis Kelamin Pasien') ?>

    <?= $form->field($model, 'tanggal_lahir')->widget(DatePicker::classname(), [
        'name' => 'date',
        'pluginOptions' => ['format' => 'yyyy-mm-dd', 'autoclose' => true]
    ]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email_pasien')->input('email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_pasien')->textInput(['maxlength' => true, 'minlength' => true]) ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
