<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\Models\TabelJadwalPemeriksaan */

$this->title = $model->id_jadwal_pemeriksaan;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Jadwal Pemeriksaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-jadwal-pemeriksaan-view">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
    </div>
    <div class="panel-body">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_jadwal_pemeriksaan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_jadwal_pemeriksaan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_jadwal_pemeriksaan',
            'id_pasien',
            'id_pegawai',
            'id_jenis_pemeriksaan',
            'jadwal_pemeriksaan',
        ],
    ]) ?>
    </div>
  </div>
</div>
