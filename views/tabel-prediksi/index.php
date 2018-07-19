<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TabelPrediksiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tabel Prediksi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-prediksi-index">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-body">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Prediksi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_prediksi',
            // 'id_pasien',
            [
                'attribute' => 'pasien',
                'value' => 'tabelPasien.nama_pasien'
            ],
            [
                'attribute' => 'jenis_kelamin',
                'value' => 'tabelJenisKelamin.jenis_kelamin'
            ],
            'usia',
            'tekanan_sistolik',
            'tekanan_diastolik',
            'riwayat_penyakit_tiroid',
            'TSH',
            'T4',
            'hasil_prediksi',
            // 'tanggal_input',
            //'catatan_dokter:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
        </div>
    </div>
</div>
