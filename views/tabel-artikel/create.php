<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\Models\TabelArtikel */

$this->title = 'Create Tabel Artikel';
$this->params['breadcrumbs'][] = ['label' => 'Tabel Artikels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-artikel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
