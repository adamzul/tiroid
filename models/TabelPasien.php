<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabel_pasien".
 *
 * @property integer $id_pasien
 * @property string $nama_pasien
 * @property string $jenis_kelamin_pasien
 * @property string $tanggal_lahir
 * @property string $alamat
 * @property string $username_pasien
 * @property string $password_pasien
 *
 * @property TabelAppointment[] $tabelAppointments
 * @property TabelCatatanMedisPasien[] $tabelCatatanMedisPasiens
 * @property TabelHasilPemeriksaan[] $tabelHasilPemeriksaans
 * @property TabelJadwalPemeriksaan[] $tabelJadwalPemeriksaans
 * @property TabelPrediksi[] $tabelPrediksis
 */
class TabelPasien extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabel_pasien';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tanggal_lahir'], 'safe'],
            [['nama_pasien', 'username_pasien'], 'string', 'max' => 30],
            [['jenis_kelamin_pasien'], 'string', 'max' => 1],
            [['alamat'], 'string', 'max' => 50],
            [['password_pasien'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pasien' => 'Id Pasien',
            'nama_pasien' => 'Nama Pasien',
            'jenis_kelamin_pasien' => 'Jenis Kelamin Pasien',
            'tanggal_lahir' => 'Tanggal Lahir',
            'alamat' => 'Alamat',
            'username_pasien' => 'Username Pasien',
            'password_pasien' => 'Password Pasien',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabelAppointments()
    {
        return $this->hasMany(TabelAppointment::className(), ['id_pasien' => 'id_pasien']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabelCatatanMedisPasiens()
    {
        return $this->hasMany(TabelCatatanMedisPasien::className(), ['id_pasien' => 'id_pasien']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabelHasilPemeriksaans()
    {
        return $this->hasMany(TabelHasilPemeriksaan::className(), ['id_pasien' => 'id_pasien']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabelJadwalPemeriksaans()
    {
        return $this->hasMany(TabelJadwalPemeriksaan::className(), ['id_pasien' => 'id_pasien']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabelPrediksis()
    {
        return $this->hasMany(TabelPrediksi::className(), ['id_pasien' => 'id_pasien']);
    }
}
