<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\DownloadImage;

/* @var $this yii\web\View */
/* @var $model app\Models\TabelArtikel */

$this->title = $model->id_artikel." . ".$model->judul_artikel;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Artikels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
  </div>
  <div class="panel-body">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_artikel], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_artikel], [
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
            'id_artikel',
            // 'id_pegawai',
            'judul_artikel',
            'konten_artikel:ntext',
            'tanggal_artikel',
            'sumber_artikel',
            array(
                'attribute' => 'foto',
                'format' => ['image', ['width' => '100', 'height' => '100']],
                'value' => function($data){
                    if($data->foto == null){
                        return;
                    }
                    $downloadImage = new DownloadImage('article', $data->foto);
                    return $downloadImage->download();
                }
            ),
        ],
    ]) ?>
  </div>
</div>
<div class="tabel-artikel-view">

    

</div>
