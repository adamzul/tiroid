<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabel_prediksi".
 *
 * @property integer $id_prediksi
 * @property integer $id_pasien
 * @property string $jenis_kelamin
 * @property integer $usia
 * @property string $hasil_pemeriksaan_usg
 * @property string $hasil_pemeriksaan_klinis
 * @property string $riwayat_penyakit_gondok
 * @property string $riwayat_penyakit_keluarga
 * @property string $hasil_prediksi
 * @property string $catatan_dokter
 *
 * @property TabelPasien $idPasien
 */
class TabelPrediksi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabel_prediksi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_prediksi'], 'required'],
            [['id_prediksi', 'id_pasien', 'usia'], 'integer'],
            [['catatan_dokter'], 'string'],
            [['jenis_kelamin'], 'string', 'max' => 1],
            [['hasil_pemeriksaan_usg', 'hasil_pemeriksaan_klinis', 'riwayat_penyakit_gondok', 'riwayat_penyakit_keluarga', 'hasil_prediksi'], 'string', 'max' => 10],
            [['id_pasien'], 'exist', 'skipOnError' => true, 'targetClass' => TabelPasien::className(), 'targetAttribute' => ['id_pasien' => 'id_pasien']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_prediksi' => 'Id Prediksi',
            'id_pasien' => 'Id Pasien',
            'jenis_kelamin' => 'Jenis Kelamin',
            'usia' => 'Usia',
            'hasil_pemeriksaan_usg' => 'Hasil Pemeriksaan Usg',
            'hasil_pemeriksaan_klinis' => 'Hasil Pemeriksaan Klinis',
            'riwayat_penyakit_gondok' => 'Riwayat Penyakit Gondok',
            'riwayat_penyakit_keluarga' => 'Riwayat Penyakit Keluarga',
            'hasil_prediksi' => 'Hasil Prediksi',
            'catatan_dokter' => 'Catatan Dokter',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPasien()
    {
        return $this->hasOne(TabelPasien::className(), ['id_pasien' => 'id_pasien']);
    }
}
