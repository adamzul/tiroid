<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TabelAppointment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-appointment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fitur1')->textInput() ?>

    <?= $form->field($model, 'fitur2')->textInput() ?>

    <?= $form->field($model, 'fitur3')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('validate', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
