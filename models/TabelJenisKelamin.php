<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabel_jenis_kelamin".
 *
 * @property integer $id_jenis_kelamin
 * @property string $jenis_kelamin
 */
class TabelJenisKelamin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabel_jenis_kelamin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenis_kelamin'], 'required'],
            [['jenis_kelamin'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_jenis_kelamin' => 'Id Jenis Kelamin',
            'jenis_kelamin' => 'Jenis Kelamin',
        ];
    }
}
