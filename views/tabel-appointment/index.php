<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\assets\AppointmentAsset;
use app\models\TabelPasien;
use app\models\TabelPegawai;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TabelAppointmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tabel Appointments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
  </div>
  <div class="panel-body">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Pasien</th>
            <th>Dokter</th>
            <th>Tanggal Appointment</th>
            <th>Konfirmasi</th>
            
        </tr>
    </thead>
    <tbody>
    <?php
    if($appointmentList != null){
        foreach ($appointmentList as $idPasien => $appointment) {
            # code...
            ?>
            <tr>
                <td><?= TabelPasien::findOne(['id_firebase'=>$idPasien])->nama_pasien ?></td>
                <td><?= TabelPegawai::findOne($appointment['idDoctor'])->nama_pegawai ?></td>
                <td><?= $appointment['date'] ?></td>
                <td>
                <?php
                if(array_key_exists('approved', $appointment)){
                    if($appointment['approved'] == true){
                        echo 'sudah dikonfirmasi';
                    }
                    else{
                        echo Html::a('konfirmasi', ['konfirmasi', 'idPasien' => $idPasien], ['class' => 'btn btn-success']);
                    }
                }
                else{
                    echo Html::a('konfirmasi', ['konfirmasi', 'idPasien' => $idPasien], ['class' => 'btn btn-success']);
                    }
                ?>
                </td>
            </tr>
    <?php
        }
    }
    ?>
    </tbody>
</table>
  </div>
</div>



 <?php
 AppointmentAsset::register($this);
 ?>