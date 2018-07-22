<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TabelJadwal */

$this->title = $model->id_jadwal_dokter;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Jadwals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-jadwal-view">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
    </div>
    <div class="panel-body">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_jadwal_dokter], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_jadwal_dokter], [
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
            'id_jadwal_dokter',
            'id_pegawai',
            'id_hari_jadwal',
            'jam_mulai_jadwal',
            'jam_berakhir_jadwal',
            'ruang',
        ],
    ]) ?>
    </div>
  </div>

</div>
