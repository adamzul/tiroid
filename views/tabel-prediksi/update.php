<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TabelPrediksi */

$this->title = 'Update Tabel Prediksi: ' . $model->id_prediksi." - ".$model->tabelPasien->nama_pasien;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Prediksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_prediksi." - ".$model->tabelPasien->nama_pasien, 'url' => ['view', 'id' => $model->id_prediksi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tabel-prediksi-update">
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
