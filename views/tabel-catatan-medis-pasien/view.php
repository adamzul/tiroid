<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TabelCatatanMedisPasien */

$this->title = $model->id_catatan_medis_pasien." . " .$model->tabelPasien->nama_pasien;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Catatan Medis Pasiens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-catatan-medis-pasien-view">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-body">

            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id_catatan_medis_pasien], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id_catatan_medis_pasien], [
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
                    'id_catatan_medis_pasien',
                    'tabelPenyakit.nama_penyakit',
                    'tabelPasien.nama_pasien',
                    // 'id_pegawai',
                    'catatan:ntext',
                ],
            ]) ?>
        </div>
    </div>
</div>
