<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TabelRule */

$this->title = 'Update Tabel Rule: ' . $model->id_rule;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Rules', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_rule, 'url' => ['view', 'id' => $model->id_rule]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tabel-rule-update">
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
