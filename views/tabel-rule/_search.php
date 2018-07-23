<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TabelRuleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-rule-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_rule') ?>

    <?= $form->field($model, 'usia') ?>

    <?= $form->field($model, 'jenis_kelamin') ?>

    <?= $form->field($model, 'tekanan_sistolik') ?>

    <?= $form->field($model, 'tekanan_diastolik') ?>

    <?php // echo $form->field($model, 'riwayat_penyakit_tiroid') ?>

    <?php // echo $form->field($model, 'TSH') ?>

    <?php // echo $form->field($model, 'T4') ?>

    <?php // echo $form->field($model, 'label') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
