<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TabelPegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tabel Pegawais';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-pegawai-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tabel Pegawai', ['create'], ['class' => 'btn btn-success']) ?>
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
            // 'no_telpon_pegawai',
            // 'username_pegawai',
            // 'password_pegawai',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
