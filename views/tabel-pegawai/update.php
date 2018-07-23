<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\TabelPegawai */

$this->title = 'Update Tabel Pegawai: ' . $model->id_pegawai." - ".$model->nama_pegawai;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Pegawais', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pegawai." - ".$model->nama_pegawai, 'url' => ['view', 'id' => $model->id_pegawai]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tabel-pegawai-update">
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
