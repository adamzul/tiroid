<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabel_dataset".
 *
 * @property integer $id_dataset
 * @property string $fitur1
 * @property string $fitur2
 * @property string $fitur3
 * @property string $fitur4
 * @property string $fitur5
 * @property string $label
 */
class TabelDataset extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabel_dataset';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fitur1', 'fitur2', 'fitur3', 'label'], 'required'],
            [['fitur1', 'fitur2', 'fitur3', 'label'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_dataset' => 'Id Dataset',
            'fitur1' => 'Fitur1',
            'fitur2' => 'Fitur2',
            'fitur3' => 'Fitur3',
            'label' => 'Label',
        ];
    }
}
