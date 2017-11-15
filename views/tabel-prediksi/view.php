<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TabelPrediksi */

$this->title = $model->id_prediksi;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Prediksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-prediksi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_prediksi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_prediksi], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_prediksi',
            'id_pasien',
            'jenis_kelamin',
            'usia',
            'hasil_pemeriksaan_usg',
            'hasil_pemeriksaan_klinis',
            'riwayat_penyakit_gondok',
            'riwayat_penyakit_keluarga',
            'hasil_prediksi',
            'catatan_dokter:ntext',
        ],
    ]) ?>

</div>
