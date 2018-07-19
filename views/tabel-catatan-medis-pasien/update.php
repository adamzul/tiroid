<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TabelCatatanMedisPasien */

$this->title = 'Update Catatan Medis Pasien: ' . $model->id_catatan_medis_pasien;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Catatan Medis Pasien', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_catatan_medis_pasien, 'url' => ['view', 'id' => $model->id_catatan_medis_pasien]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tabel-catatan-medis-pasien-update">

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
