<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabel_jenis_pemeriksaan".
 *
 * @property int $id_jenis_pemeriksaan
 * @property string $jenis_pemeriksaan
 * @property string $deskripsi_jenis_pemeriksaan
 *
 * @property TabelHasilPemeriksaan[] $tabelHasilPemeriksaans
 */
class TabelJenisPemeriksaan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tabel_jenis_pemeriksaan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jenis_pemeriksaan', 'deskripsi_jenis_pemeriksaan'], 'required'],
            [['deskripsi_jenis_pemeriksaan'], 'string'],
            [['jenis_pemeriksaan'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_jenis_pemeriksaan' => 'Id Jenis Pemeriksaan',
            'jenis_pemeriksaan' => 'Jenis Pemeriksaan',
            'deskripsi_jenis_pemeriksaan' => 'Deskripsi Jenis Pemeriksaan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabelHasilPemeriksaans()
    {
        return $this->hasMany(TabelHasilPemeriksaan::className(), ['id_jenis_pemeriksaan_pasien' => 'id_jenis_pemeriksaan']);
    }
}
