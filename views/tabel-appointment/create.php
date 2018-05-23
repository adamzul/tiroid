<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\Models\TabelAppointment */

$this->title = 'Create Tabel Appointment';
$this->params['breadcrumbs'][] = ['label' => 'Tabel Appointments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-appointment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
