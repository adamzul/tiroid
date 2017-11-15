<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TabelHasilPemeriksaan */

$this->title = 'Create Tabel Hasil Pemeriksaan';
$this->params['breadcrumbs'][] = ['label' => 'Tabel Hasil Pemeriksaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-hasil-pemeriksaan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
