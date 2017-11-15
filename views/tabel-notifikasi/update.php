<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TabelNotifikasi */

$this->title = 'Update Tabel Notifikasi: ' . $model->id_notifikasi;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Notifikasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_notifikasi, 'url' => ['view', 'id' => $model->id_notifikasi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tabel-notifikasi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
