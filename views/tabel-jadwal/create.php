<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TabelJadwal */

$this->title = 'Create Tabel Jadwal';
$this->params['breadcrumbs'][] = ['label' => 'Tabel Jadwals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-jadwal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
