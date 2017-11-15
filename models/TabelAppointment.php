<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabel_appointment".
 *
 * @property integer $id_appointment
 * @property integer $id_pasien
 * @property integer $id_pegawai
 * @property string $tanggal_mengajukan_appointment
 * @property string $tanggal_appointment
 *
 * @property TabelPegawai $idPegawai
 * @property TabelPasien $idPasien
 */
class TabelAppointment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabel_appointment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_appointment'], 'required'],
            [['id_appointment', 'id_pasien', 'id_pegawai'], 'integer'],
            [['tanggal_mengajukan_appointment', 'tanggal_appointment'], 'safe'],
            [['id_pegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TabelPegawai::className(), 'targetAttribute' => ['id_pegawai' => 'id_pegawai']],
            [['id_pasien'], 'exist', 'skipOnError' => true, 'targetClass' => TabelPasien::className(), 'targetAttribute' => ['id_pasien' => 'id_pasien']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_appointment' => 'Id Appointment',
            'id_pasien' => 'Id Pasien',
            'id_pegawai' => 'Id Pegawai',
            'tanggal_mengajukan_appointment' => 'Tanggal Mengajukan Appointment',
            'tanggal_appointment' => 'Tanggal Appointment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPegawai()
    {
        return $this->hasOne(TabelPegawai::className(), ['id_pegawai' => 'id_pegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPasien()
    {
        return $this->hasOne(TabelPasien::className(), ['id_pasien' => 'id_pasien']);
    }
}
