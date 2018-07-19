<?php

namespace app\models;
 
use Yii;

/**
 * This is the model class for table "tabel_artikel".
 *
 * @property integer $id_artikel
 * @property integer $id_pegawai
 * @property string $judul_artikel
 * @property string $konten_artikel
 * @property string $tanggal_artikel
 * @property string $sumber_artikel
 *
 * @property TabelPegawai $idPegawai
 */
class TabelArtikel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabel_artikel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pegawai'], 'integer'],
            [['judul_artikel'], 'required'],
            [['konten_artikel'], 'string'],
            [['tanggal_artikel'], 'safe'],
            [['foto'], 'string', 'max' => 30],
            [['judul_artikel'], 'string', 'max' => 50],
            [['sumber_artikel'], 'string', 'max' => 30],
            [['id_pegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TabelPegawai::className(), 'targetAttribute' => ['id_pegawai' => 'id_pegawai']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_artikel' => 'Id Artikel',
            'id_pegawai' => 'Id Pegawai',
            'judul_artikel' => 'Judul Artikel',
            'konten_artikel' => 'Konten Artikel',
            'tanggal_artikel' => 'Tanggal Artikel',
            'sumber_artikel' => 'Sumber Artikel',
            'foto' => 'Foto'
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
