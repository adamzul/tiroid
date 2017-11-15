<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TabelJadwalPemeriksaan */

$this->title = 'Create Tabel Jadwal Pemeriksaan';
$this->params['breadcrumbs'][] = ['label' => 'Tabel Jadwal Pemeriksaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-jadwal-pemeriksaan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
