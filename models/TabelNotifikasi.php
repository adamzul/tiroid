<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabel_notifikasi".
 *
 * @property integer $id_notifikasi
 * @property integer $id_pegawai
 * @property string $konten_notifikasi
 * @property string $tanggal_notifikasi
 *
 * @property TabelPegawai $idPegawai
 */
class TabelNotifikasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabel_notifikasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pegawai'], 'integer'],
            [['konten_notifikasi'], 'string'],
            [['tanggal_notifikasi'], 'safe'],
            [['id_pegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TabelPegawai::className(), 'targetAttribute' => ['id_pegawai' => 'id_pegawai']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_notifikasi' => 'Id Notifikasi',
            'id_pegawai' => 'Id Pegawai',
            'konten_notifikasi' => 'Konten Notifikasi',
            'tanggal_notifikasi' => 'Tanggal Notifikasi',
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
