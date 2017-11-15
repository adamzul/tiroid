<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabel_catatan_medis_pasien".
 *
 * @property integer $id_catatan_medis_pasien
 * @property integer $id_penyakit
 * @property integer $id_pasien
 * @property integer $id_pegawai
 * @property string $catatan
 *
 * @property TabelPegawai $idPegawai
 * @property TabelPasien $idPasien
 * @property TabelPenyakit $idPenyakit
 */
class TabelCatatanMedisPasien extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabel_catatan_medis_pasien';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_catatan_medis_pasien'], 'required'],
            [['id_catatan_medis_pasien', 'id_penyakit', 'id_pasien', 'id_pegawai'], 'integer'],
            [['catatan'], 'string'],
            [['id_pegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TabelPegawai::className(), 'targetAttribute' => ['id_pegawai' => 'id_pegawai']],
            [['id_pasien'], 'exist', 'skipOnError' => true, 'targetClass' => TabelPasien::className(), 'targetAttribute' => ['id_pasien' => 'id_pasien']],
            [['id_penyakit'], 'exist', 'skipOnError' => true, 'targetClass' => TabelPenyakit::className(), 'targetAttribute' => ['id_penyakit' => 'id_penyakit']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_catatan_medis_pasien' => 'Id Catatan Medis Pasien',
            'id_penyakit' => 'Id Penyakit',
            'id_pasien' => 'Id Pasien',
            'id_pegawai' => 'Id Pegawai',
            'catatan' => 'Catatan',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPenyakit()
    {
        return $this->hasOne(TabelPenyakit::className(), ['id_penyakit' => 'id_penyakit']);
    }
}
