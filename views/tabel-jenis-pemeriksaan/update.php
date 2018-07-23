<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\TabelJenisPemeriksaan */

$this->title = 'Update Tabel Jenis Pemeriksaan: ' . $model->id_jenis_pemeriksaan." - ".$model->jenis_pemeriksaan;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Jenis Pemeriksaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_jenis_pemeriksaan." - ".$model->jenis_pemeriksaan, 'url' => ['view', 'id' => $model->id_jenis_pemeriksaan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tabel-jenis-pemeriksaan-update">
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
