<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\DownloadImage;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TabelHasilPemeriksaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tabel Hasil Pemeriksaan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
    </div>
    <div class="panel-body">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a('Tambah Hasil Pemeriksaan', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        <?php Pjax::begin(); ?>    <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id_hasil_pemeriksaan',
                    [
                        'attribute' => 'pasien',
                        'value' => 'tabelPasien.nama_pasien'
                    ],
                    [
                        'attribute' => 'jenis_pemeriksaan',
                        'value' => 'tabelJenisPemeriksaan.jenis_pemeriksaan'
                    ],
                    'tanggal_pemeriksaan',
                    'hasil_pemeriksaan:ntext',
                    array(
                        'format' => ['image', ['width' => '100', 'height' => '100']],
                        'value' => function($data){
                            if($data->foto == null){
                                return;
                            }
                            $downloadImage = new DownloadImage('checkup_result', $data->foto);
                            return $downloadImage->download();
                            // $url = Url::to('@web').'/../upload/hasil_pemeriksaan/'.$data->foto;
                            // // var_dump($url);
                            // return Html::img($url, ['alt'=>'myImage','width'=>'700','height'=>'500']);
                        }
                    ),

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
<div class="tabel-hasil-pemeriksaan-index">

</div>

<?php
// $downloadImage = new DownloadImage('/1530377498171.jpg');
// echo '<img src="'.$downloadImage->download().'" />';
 ?>
