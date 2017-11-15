<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TabelPenyakit */

$this->title = 'Create Tabel Penyakit';
$this->params['breadcrumbs'][] = ['label' => 'Tabel Penyakits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-penyakit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
