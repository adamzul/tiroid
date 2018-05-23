<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\Models\TabelArtikel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-artikel-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'judul_artikel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'konten_artikel')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tanggal_artikel')->widget(DatePicker::classname(),
    	[
		    'name' => 'date',
		    'pluginOptions' => [
		        'format' => 'yyyy-mm-dd'
		    ]
		]) ?>

    

    <?= $form->field($model, 'sumber_artikel')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
