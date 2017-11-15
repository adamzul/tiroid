<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TabelCatatanMedisPasien */

$this->title = $model->id_catatan_medis_pasien;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Catatan Medis Pasiens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-catatan-medis-pasien-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'id_penyakit',
            'id_pasien',
            'id_pegawai',
            'catatan:ntext',
        ],
    ]) ?>

</div>
