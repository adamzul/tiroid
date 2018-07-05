<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\time\TimePicker;
use app\models\TabelPegawai;
use app\models\TabelHari;

/* @var $this yii\web\View */
/* @var $model app\models\TabelJadwal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-jadwal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pegawai')->dropDownList(ArrayHelper::map(TabelPegawai::find()->where(['id_role_pegawai' => 1])->all(), 'id_pegawai', 'nama_pegawai'))->label("Dokter") ?>

    <?= $form->field($model, 'id_hari_jadwal')->dropDownList(ArrayHelper::map(TabelHari::find()->all(), 'id_hari', 'hari'))->label("Hari") ?>

    <?= $form->field($model, 'jam_mulai_jadwal')->widget(TimePicker::classname(), [
            'name' => 'timeStart',
            'pluginOptions' => [
            'showMeridian' => false,
            ]
        ]) ?>

    <?= $form->field($model, 'jam_berakhir_jadwal')->widget(TimePicker::classname(), [
            'name' => 'timeStop',
            'pluginOptions' => [
            'showMeridian' => false,
            ] 
        ])?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
