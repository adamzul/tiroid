<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\Models\TabelPegawai */

$this->title = 'Create Tabel Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Tabel Pegawais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-pegawai-create">
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
</div>
