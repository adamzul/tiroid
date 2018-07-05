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

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model, 'upload' => $upload
    ]) ?>

</div>
