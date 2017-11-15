<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TabelJadwalPemeriksaan;

/**
 * TabelJadwalPemeriksaanSearch represents the model behind the search form about `app\models\TabelJadwalPemeriksaan`.
 */
class TabelJadwalPemeriksaanSearch extends TabelJadwalPemeriksaan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_jadwal_pemeriksaan', 'id_pasien', 'id_pegawai'], 'integer'],
            [['jadwal_pemeriksaan'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TabelJadwalPemeriksaan::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_jadwal_pemeriksaan' => $this->id_jadwal_pemeriksaan,
            'id_pasien' => $this->id_pasien,
            'id_pegawai' => $this->id_pegawai,
            'jadwal_pemeriksaan' => $this->jadwal_pemeriksaan,
        ]);

        return $dataProvider;
    }
}
