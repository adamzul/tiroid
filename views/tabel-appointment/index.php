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
                if(array_key_exists('confirmation', $appointment)){
                    if($appointment['confirmation'] == true){
                        echo 'sudah dikonfirmasi';
                    }
                    else{
                        echo Html::a('belum dikonfirmasi', ['konfirmasi', 'idPasien' => $idPasien], ['class' => 'btn btn-success']);
                    }
                }
                else{
                    echo Html::a('belum dikonfirmasi', ['konfirmasi', 'idPasien' => $idPasien], ['class' => 'btn btn-success']);
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

 <?php
 AppointmentAsset::register($this);
 ?>