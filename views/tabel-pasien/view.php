<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\Models\TabelPasien */

$this->title = $model->id_pasien;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Pasiens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-pasien-view">

    <h1><?= Html::encode($model->nama_pasien) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_pasien], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_pasien], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_pasien',
            'nama_pasien',
            'tabelJenisKelamin.jenis_kelamin',
            'tanggal_lahir',
            'alamat',
            'email_pasien',
            'password_pasien',
        ],
    ]) ?>

</div>
