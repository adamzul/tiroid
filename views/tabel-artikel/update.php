<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TabelArtikel */

$this->title = 'Update Tabel Artikel: ' . $model->id_artikel;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Artikels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_artikel, 'url' => ['view', 'id' => $model->id_artikel]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tabel-artikel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
