<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TabelPrediksiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tabel Prediksis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-prediksi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tabel Prediksi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_prediksi',
            'id_pasien',
            'jenis_kelamin',
            'usia',
            'hasil_pemeriksaan_usg',
            // 'hasil_pemeriksaan_klinis',
            // 'riwayat_penyakit_gondok',
            // 'riwayat_penyakit_keluarga',
            // 'hasil_prediksi',
            // 'catatan_dokter:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
