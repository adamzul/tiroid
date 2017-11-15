<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TabelPrediksi */

$this->title = 'Create Tabel Prediksi';
$this->params['breadcrumbs'][] = ['label' => 'Tabel Prediksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-prediksi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
