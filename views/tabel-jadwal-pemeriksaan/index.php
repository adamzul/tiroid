<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\Models\TabelJadwalPemeriksaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Create Jadwal Pemeriksaan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-jadwal-pemeriksaan-index">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-body">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Jadwal Pemeriksaan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_jadwal_pemeriksaan',
            [
                'attribute' => 'pasien',
                'value' => 'tabelPasien.nama_pasien'
            ],
            [
                'attribute' => 'jenis_pemeriksaan',
                'value' => 'tabelJenisPemeriksaan.jenis_pemeriksaan'
            ],
            // [
            //     'attribute' => 'pegawai',
            //     'value' => 'tabelPegawai.nama_pegawai'
            // ],
            'jadwal_pemeriksaan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
        </div>
    </div>
</div>
