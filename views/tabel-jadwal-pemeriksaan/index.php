<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TabelJadwalPemeriksaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tabel Jadwal Pemeriksaans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-jadwal-pemeriksaan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tabel Jadwal Pemeriksaan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_jadwal_pemeriksaan',
            'id_pasien',
            'id_pegawai',
            'jadwal_pemeriksaan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
