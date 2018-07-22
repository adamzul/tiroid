<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TabelJadwal */

$this->title = 'Update Tabel Jadwal: ' . $model->id_jadwal_dokter;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Jadwals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_jadwal_dokter, 'url' => ['view', 'id' => $model->id_jadwal_dokter]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tabel-jadwal-update">
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
