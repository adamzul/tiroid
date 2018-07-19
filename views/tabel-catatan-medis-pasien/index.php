<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TabelCatatanMedisPasienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tabel Catatan Medis Pasien';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
  </div>
  <div class="panel-body">
  <p>
        <?= Html::a('Tambah Catatan Medis Pasien', ['create'], ['class' => 'btn btn-success']) ?>
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
<?php Pjax::end(); ?>
  </div>
</div>
<div class="tabel-catatan-medis-pasien-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    </div>
