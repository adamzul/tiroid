<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TabelCatatanMedisPasien */

$this->title = 'Update Tabel Catatan Medis Pasien: ' . $model->id_catatan_medis_pasien;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Catatan Medis Pasiens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_catatan_medis_pasien, 'url' => ['view', 'id' => $model->id_catatan_medis_pasien]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tabel-catatan-medis-pasien-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
