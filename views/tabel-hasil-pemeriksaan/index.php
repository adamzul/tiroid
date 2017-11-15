<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TabelHasilPemeriksaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tabel Hasil Pemeriksaans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-hasil-pemeriksaan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tabel Hasil Pemeriksaan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_hasil_pemeriksaan',
            'id_pasien',
            'id_pegawai',
            'hasil_pemeriksaan:ntext',
            'foto',
            // 'tanggal_pemeriksaan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
