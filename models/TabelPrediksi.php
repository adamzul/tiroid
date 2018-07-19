<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabel_prediksi".
 *
 * @property int $id_prediksi
 * @property int $id_pasien
 * @property string $jenis_kelamin
 * @property int $usia
 * @property int $tekanan_sistolik
 * @property int $tekanan_diastolik
 * @property string $riwayat_penyakit_tiroid
 * @property double $TSH
 * @property double $T4
 * @property string $hasil_prediksi
 * @property string $tanggal_input
 * @property string $catatan_dokter
 *
 * @property TabelPasien $pasien
 */
class TabelPrediksi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tabel_prediksi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pasien', 'usia', 'tekanan_sistolik', 'tekanan_diastolik'], 'integer'],
            [['tekanan_sistolik', 'tekanan_diastolik', 'riwayat_penyakit_tiroid', 'TSH', 'T4'], 'required'],
            [['TSH', 'T4'], 'number'],
            [['tanggal_input'], 'safe'],
            [['catatan_dokter'], 'string'],
            [['jenis_kelamin'], 'string', 'max' => 1],
            [['riwayat_penyakit_tiroid'], 'string', 'max' => 3],
            [['hasil_prediksi'], 'string', 'max' => 10],
            [['id_pasien'], 'exist', 'skipOnError' => true, 'targetClass' => TabelPasien::className(), 'targetAttribute' => ['id_pasien' => 'id_pasien']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_prediksi' => 'Id Prediksi',
            'id_pasien' => 'Id Pasien',
            'usia' => 'Usia',
            'jenis_kelamin' => 'Jenis Kelamin',
            'tekanan_sistolik' => 'Tekanan Sistolik',
            'tekanan_diastolik' => 'Tekanan Diastolik',
            'riwayat_penyakit_tiroid' => 'Riwayat Penyakit Tiroid',
            'TSH' => 'Tsh',
            'T4' => 'T4',
            'hasil_prediksi' => 'Hasil Prediksi',
            'tanggal_input' => 'Tanggal Input',
            'catatan_dokter' => 'Catatan Dokter',
        ];
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
    public function getTabelJenisKelamin()
    {
        return $this->hasOne(TabelJenisKelamin::className(), ['id_jenis_kelamin' => 'jenis_kelamin']);
    }
    
}
