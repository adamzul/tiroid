<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TabelRule */

$this->title = $model->id_rule;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Rules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-rule-view">
        <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-body">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_rule], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_rule], [
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
            'id_rule',
            'usia',
            'jenis_kelamin',
            'tekanan_sistolik',
            'tekanan_diastolik',
            'riwayat_penyakit_tiroid',
            'TSH',
            'T4',
            'label',
        ],
    ]) ?>
        </div>
    </div>
</div>
