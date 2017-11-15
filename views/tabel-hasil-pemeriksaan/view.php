<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TabelHasilPemeriksaan */

$this->title = $model->id_hasil_pemeriksaan;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Hasil Pemeriksaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-hasil-pemeriksaan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_hasil_pemeriksaan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_hasil_pemeriksaan], [
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
            'id_hasil_pemeriksaan',
            'id_pasien',
            'id_pegawai',
            'hasil_pemeriksaan:ntext',
            'foto',
            'tanggal_pemeriksaan',
        ],
    ]) ?>

</div>
