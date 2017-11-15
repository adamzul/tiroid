<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TabelPasien */

$this->title = 'Update Tabel Pasien: ' . $model->id_pasien;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Pasiens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pasien, 'url' => ['view', 'id' => $model->id_pasien]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tabel-pasien-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
