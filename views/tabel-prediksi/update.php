<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TabelPrediksi */

$this->title = 'Update Tabel Prediksi: ' . $model->id_prediksi;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Prediksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_prediksi, 'url' => ['view', 'id' => $model->id_prediksi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tabel-prediksi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
