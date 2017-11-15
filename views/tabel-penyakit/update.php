<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TabelPenyakit */

$this->title = 'Update Tabel Penyakit: ' . $model->id_penyakit;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Penyakits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_penyakit, 'url' => ['view', 'id' => $model->id_penyakit]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tabel-penyakit-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
