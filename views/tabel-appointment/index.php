<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TabelAppointmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tabel Appointments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-appointment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tabel Appointment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_appointment',
            'id_pasien',
            'id_pegawai',
            'tanggal_mengajukan_appointment',
            'tanggal_appointment',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
