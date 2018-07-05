<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabel_pasien".
 *
 * @property integer $id_pasien
 * @property string $nama_pasien
 * @property integer $id_jenis_kelamin_pasien
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
            [['id_jenis_kelamin_pasien'], 'integer'],
            [['tanggal_lahir'], 'safe'],
            [['nama_pasien', 'email_pasien'], 'string', 'max' => 30],
            [['alamat'], 'string', 'max' => 50],
            [['password_pasien'], 'string', 'max' => 60, 'min' => 6],
            [['id_firebase'], 'string', 'max' => 100],
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
            'id_jenis_kelamin_pasien' => 'Id Jenis Kelamin Pasien',
            'tanggal_lahir' => 'Tanggal Lahir',
            'alamat' => 'Alamat',
            'email_pasien' => 'Email Pasien',
            'password_pasien' => 'Password Pasien',
            'id_firebase' => 'Id Firebase'
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabelJenisKelamin(){
        return $this->hasOne(TabelJenisKelamin::classname(), ['id_jenis_kelamin' => 'id_jenis_kelamin_pasien']);
    }
}
