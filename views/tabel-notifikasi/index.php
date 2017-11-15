<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TabelNotifikasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tabel Notifikasis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-notifikasi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tabel Notifikasi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_notifikasi',
            'id_pegawai',
            'konten_notifikasi:ntext',
            'tanggal_notifikasi',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
