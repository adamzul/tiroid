<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabel_rule".
 *
 * @property integer $id_rule
 * @property string $fitur1
 * @property string $fitur2
 * @property string $fitur3
 * @property string $fitur4
 * @property string $fitur5
 * @property string $fitur6
 * @property string $fitur7
 * @property string $label
 */
class TabelRule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabel_rule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fitur1', 'fitur2', 'fitur3', 'fitur4', 'fitur5', 'fitur6', 'fitur7', 'label'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_rule' => 'Id Rule',
            'fitur1' => 'Fitur1',
            'fitur2' => 'Fitur2',
            'fitur3' => 'Fitur3',
            'fitur4' => 'Fitur4',
            'fitur5' => 'Fitur5',
            'fitur6' => 'Fitur6',
            'fitur7' => 'Fitur7',
            'label' => 'Label',
        ];
    }
}
