<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TabelPenyakit */

$this->title = 'Create Tabel Penyakit';
$this->params['breadcrumbs'][] = ['label' => 'Tabel Penyakits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-penyakit-create">
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
