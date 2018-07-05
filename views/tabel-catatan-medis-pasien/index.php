<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TabelCatatanMedisPasienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tabel Catatan Medis Pasiens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-catatan-medis-pasien-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tabel Catatan Medis Pasien', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_catatan_medis_pasien',
            
            [
                'attribute' => 'pasien',
                'value' => 'tabelPasien.nama_pasien'
            ],
            [
            'attribute' => 'penyakit',
            'value' => 'tabelPenyakit.nama_penyakit'                
            ],
            'catatan:ntext',
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
