<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TabelAppointment */

$this->title = 'Update Tabel Appointment: ' . $model->id_appointment;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Appointments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_appointment, 'url' => ['view', 'id' => $model->id_appointment]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tabel-appointment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
