<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\TabelJenisPemeriksaan */

$this->title = 'Update Tabel Jenis Pemeriksaan: ' . $model->id_jenis_pemeriksaan;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Jenis Pemeriksaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_jenis_pemeriksaan, 'url' => ['view', 'id' => $model->id_jenis_pemeriksaan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tabel-jenis-pemeriksaan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
