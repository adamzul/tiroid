<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TabelJadwal */

$this->title = 'Create Tabel Jadwal';
$this->params['breadcrumbs'][] = ['label' => 'Tabel Jadwals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-jadwal-create">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
    </div>
    <div class="panel-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
  </div>
</div>
