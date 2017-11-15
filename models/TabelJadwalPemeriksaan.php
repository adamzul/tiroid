<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabel_jadwal_pemeriksaan".
 *
 * @property integer $id_jadwal_pemeriksaan
 * @property integer $id_pasien
 * @property integer $id_pegawai
 * @property string $jadwal_pemeriksaan
 *
 * @property TabelPegawai $idPegawai
 * @property TabelPasien $idPasien
 */
class TabelJadwalPemeriksaan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabel_jadwal_pemeriksaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_jadwal_pemeriksaan'], 'required'],
            [['id_jadwal_pemeriksaan', 'id_pasien', 'id_pegawai'], 'integer'],
            [['jadwal_pemeriksaan'], 'safe'],
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
            'id_jadwal_pemeriksaan' => 'Id Jadwal Pemeriksaan',
            'id_pasien' => 'Id Pasien',
            'id_pegawai' => 'Id Pegawai',
            'jadwal_pemeriksaan' => 'Jadwal Pemeriksaan',
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
