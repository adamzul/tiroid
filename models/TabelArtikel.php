<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabel_artikel".
 *
 * @property integer $id_artikel
 * @property integer $id_pegawai
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
            [['id_artikel'], 'required'],
            [['id_artikel', 'id_pegawai'], 'integer'],
            [['konten_artikel'], 'string'],
            [['tanggal_artikel'], 'safe'],
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
            'konten_artikel' => 'Konten Artikel',
            'tanggal_artikel' => 'Tanggal Artikel',
            'sumber_artikel' => 'Sumber Artikel',
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
