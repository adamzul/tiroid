<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TabelNotifikasi */

$this->title = 'Create Tabel Notifikasi';
$this->params['breadcrumbs'][] = ['label' => 'Tabel Notifikasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-notifikasi-create">
	<div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
  </div>
</div>
