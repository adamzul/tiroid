<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TabelJadwalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tabel Jadwals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-jadwal-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tabel Jadwal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_jadwal_dokter',
            'id_pegawai',
            'hari_jadwal',
            'jam_mulai_jadwal',
            'jam_berakhir_jadwal',
            // 'ruang',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
