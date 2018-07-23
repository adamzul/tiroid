<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TabelPenyakit */

$this->title = 'Update Tabel Penyakit: ' . $model->id_penyakit." - ". $model->nama_penyakit;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Penyakits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_penyakit." - ". $model->nama_penyakit, 'url' => ['view', 'id' => $model->id_penyakit]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tabel-penyakit-update">
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
