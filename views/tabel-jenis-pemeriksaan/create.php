<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\Models\TabelJenisPemeriksaan */

$this->title = 'Create Tabel Jenis Pemeriksaan';
$this->params['breadcrumbs'][] = ['label' => 'Tabel Jenis Pemeriksaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-jenis-pemeriksaan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
