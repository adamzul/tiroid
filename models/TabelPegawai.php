<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabel_pegawai".
 *
 * @property integer $id_pegawai
 * @property integer $id_role_pegawai
 * @property string $nama_pegawai
 * @property string $id_jenis_kelamin_pegawai
 * @property string $tanggal_lahir_pegawai
 * @property string $alamat_pegawai
 * @property string $no_telpon_pegawai
 * @property string $username_pegawai
 * @property string $password_pegawai
 *
 * @property TabelAppointment[] $tabelAppointments
 * @property TabelArtikel[] $tabelArtikels
 * @property TabelCatatanMedisPasien[] $tabelCatatanMedisPasiens
 * @property TabelHasilPemeriksaan[] $tabelHasilPemeriksaans
 * @property TabelJadwal[] $tabelJadwals
 * @property TabelJadwalPemeriksaan[] $tabelJadwalPemeriksaans
 * @property TabelNotifikasi[] $tabelNotifikasis
 */
class TabelPegawai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabel_pegawai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_role_pegawai'], 'required'],
            [['id_role_pegawai'], 'integer'],
            [['tanggal_lahir_pegawai'], 'safe'],
            [['nama_pegawai', 'username_pegawai'], 'string', 'max' => 30],
            [['id_jenis_kelamin_pegawai'], 'string', 'max' => 1],
            [['alamat_pegawai'], 'string', 'max' => 50],
            [['no_telpon_pegawai'], 'string', 'max' => 15],
            [['password_pegawai'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pegawai' => 'Id Pegawai',
            'id_role_pegawai' => 'Id Role Pegawai',
            'nama_pegawai' => 'Nama Pegawai',
            'id_jenis_kelamin_pegawai' => 'Id Jenis Kelamin Pegawai',
            'tanggal_lahir_pegawai' => 'Tanggal Lahir Pegawai',
            'alamat_pegawai' => 'Alamat Pegawai',
            'no_telpon_pegawai' => 'No Telpon Pegawai',
            'username_pegawai' => 'Username Pegawai',
            'password_pegawai' => 'Password Pegawai',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabelAppointments()
    {
        return $this->hasMany(TabelAppointment::className(), ['id_pegawai' => 'id_pegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabelArtikels()
    {
        return $this->hasMany(TabelArtikel::className(), ['id_pegawai' => 'id_pegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabelCatatanMedisPasiens()
    {
        return $this->hasMany(TabelCatatanMedisPasien::className(), ['id_pegawai' => 'id_pegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabelHasilPemeriksaans()
    {
        return $this->hasMany(TabelHasilPemeriksaan::className(), ['id_pegawai' => 'id_pegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabelJadwals()
    {
        return $this->hasMany(TabelJadwal::className(), ['id_pegawai' => 'id_pegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabelJadwalPemeriksaans()
    {
        return $this->hasMany(TabelJadwalPemeriksaan::className(), ['id_pegawai' => 'id_pegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabelNotifikasis()
    {
        return $this->hasMany(TabelNotifikasi::className(), ['id_pegawai' => 'id_pegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabelRole()
    {
        return $this->hasOne(TabelRole::className(), ['id_role' => 'id_role_pegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabelJenisKelamin()
    {
        return $this->hasOne(TabelJenisKelamin::className(), ['id_jenis_kelamin' => 'id_jenis_kelamin_pegawai']);
    }
}
