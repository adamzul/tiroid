<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TabelNotifikasi */

$this->title = 'Create Tabel Notifikasi';
$this->params['breadcrumbs'][] = ['label' => 'Tabel Notifikasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-notifikasi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
