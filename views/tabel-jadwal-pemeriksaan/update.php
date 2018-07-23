<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\TabelJadwalPemeriksaan */

$this->title = 'Update Tabel Jadwal Pemeriksaan: ' . $model->id_jadwal_pemeriksaan." - ".$model->tabelPasien->nama_pasien;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Jadwal Pemeriksaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_jadwal_pemeriksaan." - ".$model->tabelPasien->nama_pasien, 'url' => ['view', 'id' => $model->id_jadwal_pemeriksaan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tabel-jadwal-pemeriksaan-update">
	<div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
    </div>
    <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
  </div>
</div>
