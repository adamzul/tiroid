<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabel_jadwal_pemeriksaan".
 *
 * @property int $id_jadwal_pemeriksaan
 * @property int $id_pasien
 * @property int $id_pegawai
 * @property int $id_jenis_pemeriksaan
 * @property string $jadwal_pemeriksaan
 *
 * @property TabelPegawai $pegawai
 * @property TabelPasien $pasien
 * @property TabelJenisPemeriksaan $jenisPemeriksaan
 */
class TabelJadwalPemeriksaan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tabel_jadwal_pemeriksaan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pasien', 'id_pegawai', 'id_jenis_pemeriksaan'], 'integer'],
            [['jadwal_pemeriksaan'], 'safe'],
            [['id_pegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TabelPegawai::className(), 'targetAttribute' => ['id_pegawai' => 'id_pegawai']],
            [['id_pasien'], 'exist', 'skipOnError' => true, 'targetClass' => TabelPasien::className(), 'targetAttribute' => ['id_pasien' => 'id_pasien']],
            [['id_jenis_pemeriksaan'], 'exist', 'skipOnError' => true, 'targetClass' => TabelJenisPemeriksaan::className(), 'targetAttribute' => ['id_jenis_pemeriksaan' => 'id_jenis_pemeriksaan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_jadwal_pemeriksaan' => 'Id Jadwal Pemeriksaan',
            'id_pasien' => 'Id Pasien',
            'id_pegawai' => 'Id Pegawai',
            'id_jenis_pemeriksaan' => 'Id Jenis Pemeriksaan',
            'jadwal_pemeriksaan' => 'Jadwal Pemeriksaan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabelPegawai()
    {
        return $this->hasOne(TabelPegawai::className(), ['id_pegawai' => 'id_pegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabelPasien()
    {
        return $this->hasOne(TabelPasien::className(), ['id_pasien' => 'id_pasien']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabelJenisPemeriksaan()
    {
        return $this->hasOne(TabelJenisPemeriksaan::className(), ['id_jenis_pemeriksaan' => 'id_jenis_pemeriksaan']);
    }
}
