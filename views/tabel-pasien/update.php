<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\TabelPasien */

$this->title = 'Update Tabel Pasien: ' . $model->id_pasien." - ".$model->nama_pasien;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Pasiens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pasien." - ".$model->nama_pasien, 'url' => ['view', 'id' => $model->id_pasien]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tabel-pasien-update">
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
