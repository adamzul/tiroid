<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\DownloadImage;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TabelPegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pegawai';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-pegawai-index">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-body">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create  Pegawai', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pegawai',
            'nama_pegawai',
            [
                'attribute' => 'jenis_kelamin',
                'value' => 'tabelJenisKelamin.jenis_kelamin'
            ],
            'tanggal_lahir_pegawai',
            'alamat_pegawai',
            [
                'attribute' => 'role',
                'value' => 'tabelRole.role'
            ],
            array(
                'format' => ['image', ['width' => '100', 'height' => '100']],
                'value' => function($data){
                    if($data->foto == null){
                        return;
                    }
                    $downloadImage = new DownloadImage('employee', $data->foto);
                    return $downloadImage->download();
                    // $url = Url::to('@web').'/../upload/hasil_pemeriksaan/'.$data->foto;
                    // // var_dump($url);
                    // return Html::img($url, ['alt'=>'myImage','width'=>'700','height'=>'500']);
                }
            ),
            // 'no_telpon_pegawai',
            // 'username_pegawai',
            // 'password_pegawai',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
        </div>
    </div>
</div>
