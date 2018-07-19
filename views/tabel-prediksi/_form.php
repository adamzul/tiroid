<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use yii\widgets\ActiveForm;
use app\models\TabelPasien;
use app\models\TabelJenisKelamin;


/* @var $this yii\web\View */
/* @var $model app\models\TabelPrediksi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-prediksi-form">
    <?php $arrayRiwayat = [['riwayat'=> 'yes'], ['riwayat'=> 'no']] ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pasien')->dropDownList(ArrayHelper::map(TabelPasien::find()->all(), 'id_pasien', 'nama_pasien'))->label('Pasien') ?>

    <?= $form->field($model, 'jenis_kelamin')->dropDownList(ArrayHelper::map(TabelJenisKelamin::find()->all(), 'id_jenis_kelamin', 'jenis_kelamin'))->label('Jenis Kelamin') ?>

    <?= $form->field($model, 'usia')->textInput() ?>

    <?= $form->field($model, 'tekanan_sistolik')->textInput() ?>

    <?= $form->field($model, 'tekanan_diastolik')->textInput() ?>

    <?= $form->field($model, 'riwayat_penyakit_tiroid')->dropDownList(ArrayHelper::map($arrayRiwayat, 'riwayat', 'riwayat'))->label('Jenis Kelamin') ?>

    <?= $form->field($model, 'TSH')->textInput() ?>

    <?= $form->field($model, 'T4')->textInput() ?>
    <?= $form->field($model, 'tanggal_input')->widget(DatePicker::classname(),[
        'name' => 'date',
        'pluginOptions' => ['format' => 'yyyy-mm-dd', 'autoclose' => true]

    ]) ?>

    <?= $form->field($model, 'catatan_dokter')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
