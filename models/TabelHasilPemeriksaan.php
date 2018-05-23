<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabel_hasil_pemeriksaan".
 *
 * @property integer $id_hasil_pemeriksaan
 * @property integer $id_pasien
 * @property integer $id_pegawai
 * @property string $hasil_pemeriksaan
 * @property string $foto
 * @property string $tanggal_pemeriksaan
 *
 * @property TabelPegawai $idPegawai
 * @property TabelPasien $idPasien
 */
class TabelHasilPemeriksaan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabel_hasil_pemeriksaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pasien', 'id_pegawai'], 'integer'],
            [['hasil_pemeriksaan'], 'string'],
            [['tanggal_pemeriksaan'], 'safe'],
            [['foto'], 'string', 'max' => 50],
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
            'id_hasil_pemeriksaan' => 'Id Hasil Pemeriksaan',
            'id_pasien' => 'Id Pasien',
            'id_pegawai' => 'Id Pegawai',
            'hasil_pemeriksaan' => 'Hasil Pemeriksaan',
            'foto' => 'Foto',
            'tanggal_pemeriksaan' => 'Tanggal Pemeriksaan',
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
