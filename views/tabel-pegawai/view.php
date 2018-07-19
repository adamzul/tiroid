<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\DownloadImage;

/* @var $this yii\web\View */
/* @var $model app\Models\TabelPegawai */

$this->title = $model->id_pegawai;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Pegawais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-pegawai-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_pegawai], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_pegawai], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_pegawai',
            'nama_pegawai',
            'tabelJenisKelamin.jenis_kelamin',
            'tanggal_lahir_pegawai',
            'alamat_pegawai',
            'no_telpon_pegawai',
            'username_pegawai',
            'tabelRole.role',
            array(
                'attribute' => 'foto',
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
        ],
    ]) ?>

</div>
