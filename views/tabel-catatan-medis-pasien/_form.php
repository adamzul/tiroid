<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use app\models\TabelPenyakit;
use app\models\TabelPasien;

/* @var $this yii\web\View */
/* @var $model app\models\TabelCatatanMedisPasien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-catatan-medis-pasien-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_penyakit')->dropDownList(ArrayHelper::map(TabelPenyakit::find()->all(), 'id_penyakit', 'nama_penyakit')) ?>

    <?= $form->field($model, 'id_pasien')->dropDownList(ArrayHelper::map(TabelPasien::find()->all(), 'id_pasien', 'nama_pasien')) ?>

    <?= $form->field($model, 'catatan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
