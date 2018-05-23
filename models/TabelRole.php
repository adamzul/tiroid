<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabel_role".
 *
 * @property integer $id_role
 * @property string $role
 */
class TabelRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabel_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role'], 'required'],
            [['role'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_role' => 'Id Role',
            'role' => 'Role',
        ];
    }
}
