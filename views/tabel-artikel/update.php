<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\TabelArtikel */

$this->title = 'Update Tabel Artikel: ' . $model->id_artikel." . ".$model->judul_artikel;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Artikels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_artikel." . ".$model->judul_artikel, 'url' => ['view', 'id' => $model->id_artikel]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tabel-artikel-update">
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
