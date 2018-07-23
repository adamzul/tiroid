<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TabelRuleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tabel Rules';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-rule-index">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-body">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_rule',
            'usia',
            'jenis_kelamin',
            'tekanan_sistolik',
            'tekanan_diastolik',
            'riwayat_penyakit_tiroid',
            'TSH',
            'T4',
            'label',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
        </div>
    </div>
</div>
