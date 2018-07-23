<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\Models\TabelJenisPemeriksaan */

$this->title = $model->id_jenis_pemeriksaan." - ".$model->jenis_pemeriksaan;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Jenis Pemeriksaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-jenis-pemeriksaan-view">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
    </div>
    <div class="panel-body">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_jenis_pemeriksaan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_jenis_pemeriksaan], [
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
            'id_jenis_pemeriksaan',
            'jenis_pemeriksaan',
            'deskripsi_jenis_pemeriksaan:ntext',
        ],
    ]) ?>
    </div>
  </div>
</div>
