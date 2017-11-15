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

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
