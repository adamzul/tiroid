<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabel_penyakit".
 *
 * @property integer $id_penyakit
 * @property string $nama_penyakit
 * @property string $deskripsi_penyakit
 *
 * @property TabelCatatanMedisPasien[] $tabelCatatanMedisPasiens
 */
class TabelPenyakit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabel_penyakit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['deskripsi_penyakit'], 'string'],
            [['nama_penyakit'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_penyakit' => 'Id Penyakit',
            'nama_penyakit' => 'Nama Penyakit',
            'deskripsi_penyakit' => 'Deskripsi Penyakit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabelCatatanMedisPasiens()
    {
        return $this->hasMany(TabelCatatanMedisPasien::className(), ['id_penyakit' => 'id_penyakit']);
    }
}
