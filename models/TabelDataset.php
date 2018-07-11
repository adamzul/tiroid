<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabel_dataset".
 *
 * @property int $id_dataset
 * @property string $usia
 * @property string $jenis_kelamin
 * @property string $tekanan_sistolik
 * @property string $tekanan_diastolik
 * @property string $riwayat_penyakit_tiroid
 * @property string $TSH
 * @property string $T4
 * @property string $label
 */
class TabelDataset extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tabel_dataset';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usia', 'jenis_kelamin', 'tekanan_sistolik', 'tekanan_diastolik', 'riwayat_penyakit_tiroid', 'TSH', 'T4', 'label'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_dataset' => 'Id Dataset',
            'usia' => 'Usia',
            'jenis_kelamin' => 'Jenis Kelamin',
            'tekanan_sistolik' => 'Tekanan Sistolik',
            'tekanan_diastolik' => 'Tekanan Diastolik',
            'riwayat_penyakit_tiroid' => 'Riwayat Penyakit Tiroid',
            'TSH' => 'Tsh',
            'T4' => 'T4',
            'label' => 'Label',
        ];
    }

    public function attribute()
    {
        return [
            'id_dataset' => 'id_dataset',
            'usia' => 'usia',
            'jenis_kelamin' => 'jenis_kelamin',
            'tekanan_sistolik' => 'tekanan_sistolik',
            'tekanan_diastolik' => 'tekanan_diastolik',
            'riwayat_penyakit_tiroid' => 'riwayat_penyakit_tiroid',
            'TSH' => 'TSH',
            'T4' => 'T4',
            'label' => 'label',
        ];
    }
}
