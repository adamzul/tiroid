<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabel_hari".
 *
 * @property int $id_hari
 * @property string $hari
 * @property string $code
 */
class TabelHari extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tabel_hari';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hari', 'code'], 'required'],
            [['hari', 'code'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_hari' => 'Id Hari',
            'hari' => 'Hari',
            'code' => 'Code',
        ];
    }
}
