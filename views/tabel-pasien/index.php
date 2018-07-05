<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\Models\TabelPasienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tabel Pasiens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-pasien-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tabel Pasien', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pasien',
            'nama_pasien',
            // 'id_jenis_kelamin_pasien',
            'tanggal_lahir',
            'alamat',
            [
                'attribute' => 'jenis_kelamin',
                'value' => 'tabelJenisKelamin.jenis_kelamin'
            ],
            'email_pasien',
            // 'password_pasien',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
