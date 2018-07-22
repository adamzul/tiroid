<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TabelHasilPemeriksaan */

$this->title = 'Update Tabel Hasil Pemeriksaan: ' . $model->id_hasil_pemeriksaan;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Hasil Pemeriksaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_hasil_pemeriksaan, 'url' => ['view', 'id' => $model->id_hasil_pemeriksaan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tabel-hasil-pemeriksaan-update">
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
	  </div>
	  <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model, 'upload' => $upload
    ]) ?>
    </div>
  </div>

</div>
