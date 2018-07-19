<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\Models\TabelArtikel */

$this->title = 'Tambah Tabel Artikel';
$this->params['breadcrumbs'][] = ['label' => 'Tabel Artikels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
  </div>
  <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model, 'upload' => $upload
    ]) ?>
  </div>
</div>
<div class="tabel-artikel-create">

    

    

</div>
