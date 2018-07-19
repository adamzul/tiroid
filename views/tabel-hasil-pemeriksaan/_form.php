<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

use app\models\TabelPasien;
use app\models\TabelJenisPemeriksaan;

/* @var $this yii\web\View */
/* @var $model app\models\TabelHasilPemeriksaan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-hasil-pemeriksaan-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


    <?= $form->field($model, 'id_pasien')->dropDownList(ArrayHelper::map(TabelPasien::find()->all(), 'id_pasien', 'nama_pasien'))->label('Pasien') ?>

    <?= $form->field($model, 'id_jenis_pemeriksaan_pasien')->dropDownList(ArrayHelper::map(TabelJenisPemeriksaan::find()->all(), 'id_jenis_pemeriksaan', 'jenis_pemeriksaan'))->label('Jenis Pemeriksaan') ?>

    <?= $form->field($model, 'hasil_pemeriksaan')->textarea(['rows' => 6]) ?>

    <?= $form->field($upload, 'imageFile')->fileInput()->label('Foto') ?>

    <?= $form->field($model, 'tanggal_pemeriksaan')->widget(DatePicker::classname(),[
        'name' => 'date',
        'pluginOptions' => ['format' => 'yyyy-mm-dd', 'autoclose' => true]

    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
