<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TabelCatatanMedisPasien */

$this->title = 'Create Tabel Catatan Medis Pasien';
$this->params['breadcrumbs'][] = ['label' => 'Tabel Catatan Medis Pasiens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-catatan-medis-pasien-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
