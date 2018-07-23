<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\DownloadImage;

/* @var $this yii\web\View */
/* @var $model app\models\TabelHasilPemeriksaan */

$this->title = $model->id_hasil_pemeriksaan." - ".;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Hasil Pemeriksaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-hasil-pemeriksaan-view">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
    </div>
    <div class="panel-body">


    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_hasil_pemeriksaan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_hasil_pemeriksaan], [
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
            'id_hasil_pemeriksaan',
            'tabelPasien.nama_pasien',
            'hasil_pemeriksaan:ntext',
            'tanggal_pemeriksaan',
            array(
                'attribute' => 'foto',
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
        ],
    ]) ?>
    </div>
  </div>

</div>
