<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\TabelJadwalPemeriksaan */

$this->title = 'Update Tabel Jadwal Pemeriksaan: ' . $model->id_jadwal_pemeriksaan;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Jadwal Pemeriksaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_jadwal_pemeriksaan, 'url' => ['view', 'id' => $model->id_jadwal_pemeriksaan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tabel-jadwal-pemeriksaan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
