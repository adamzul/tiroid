<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\Models\TabelPegawai */

$this->title = 'Create Tabel Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Tabel Pegawais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-pegawai-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
