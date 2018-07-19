<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

use app\models\TabelPasien;
use app\models\TabelJenisPemeriksaan;

/* @var $this yii\web\View */
/* @var $model app\Models\TabelJadwalPemeriksaan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-jadwal-pemeriksaan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pasien')->dropDownList(ArrayHelper::map(TabelPasien::find()->all(), 'id_pasien', 'nama_pasien'))->label('Pasien') ?>

    <?php // $form->field($model, 'id_pegawai')->textInput() ?>

    <?= $form->field($model, 'id_jenis_pemeriksaan')->dropDownList(ArrayHelper::map(TabelJenisPemeriksaan::find()->all(), 'id_jenis_pemeriksaan', 'jenis_pemeriksaan'))->label('Jenis Pemeriksaan') ?>

    <?= $form->field($model, 'jadwal_pemeriksaan')->widget(DatePicker::classname(),[
        'name' => 'date',
        'pluginOptions' => ['format' => 'yyyy-mm-dd', 'autoclose' => true]

    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
