<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TabelPegawai */

$this->title = 'Update Tabel Pegawai: ' . $model->id_pegawai;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Pegawais', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pegawai, 'url' => ['view', 'id' => $model->id_pegawai]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tabel-pegawai-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
