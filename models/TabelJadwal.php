<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabel_jadwal".
 *
 * @property integer $id_jadwal_dokter
 * @property integer $id_pegawai
 * @property string $hari_jadwal
 * @property string $jam_mulai_jadwal
 * @property string $jam_berakhir_jadwal
 * @property string $ruang
 *
 * @property TabelPegawai $idPegawai
 */
class TabelJadwal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabel_jadwal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pegawai'], 'integer'],
            [['jam_mulai_jadwal', 'jam_berakhir_jadwal'], 'safe'],
            [['hari_jadwal'], 'string', 'max' => 10],
            [['ruang'], 'string', 'max' => 20],
            [['id_pegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TabelPegawai::className(), 'targetAttribute' => ['id_pegawai' => 'id_pegawai']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_jadwal_dokter' => 'Id Jadwal Dokter',
            'id_pegawai' => 'Id Pegawai',
            'hari_jadwal' => 'Hari Jadwal',
            'jam_mulai_jadwal' => 'Jam Mulai Jadwal',
            'jam_berakhir_jadwal' => 'Jam Berakhir Jadwal',
            'ruang' => 'Ruang',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPegawai()
    {
        return $this->hasOne(TabelPegawai::className(), ['id_pegawai' => 'id_pegawai']);
    }
}
