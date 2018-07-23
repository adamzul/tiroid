<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TabelJadwalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tabel Jadwal';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-jadwal-index">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-body">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Jadwal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_jadwal_dokter',
            [
                'attribute' => 'dokter',
                'value' => 'tabelPegawai.nama_pegawai'
            ],
            [
                'attribute' => 'hari',
                'value' => 'tabelHari.hari'
            ],
            'jam_mulai_jadwal',
            'jam_berakhir_jadwal',
            // 'ruang',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
        </div>
    </div>

</div>
