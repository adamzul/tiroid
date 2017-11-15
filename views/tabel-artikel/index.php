<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TabelArtikelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tabel Artikels';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-artikel-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tabel Artikel', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_artikel',
            'id_pegawai',
            'konten_artikel:ntext',
            'tanggal_artikel',
            'sumber_artikel',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
