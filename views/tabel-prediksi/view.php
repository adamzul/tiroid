<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TabelPrediksi */

$this->title = $model->id_prediksi." - ".$model->tabelPasien->nama_pasien;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Prediksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-prediksi-view">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-body">

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
            'tabelPasien.nama_pasien',
            'id_pasien',
            'jenis_kelamin',
            'usia',
            'tekanan_sistolik',
            'tekanan_diastolik',
            'riwayat_penyakit_tiroid',
            'TSH',
            'T4',
            'hasil_prediksi',
            'tanggal_input',
            'catatan_dokter:ntext',
        ],
    ]) ?>
        </div>
    </div>

</div>
