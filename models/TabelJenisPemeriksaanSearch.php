<?php

namespace app\Models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\Models\TabelJenisPemeriksaan;

/**
 * TabelJenisPemeriksaanSearch represents the model behind the search form of `app\Models\TabelJenisPemeriksaan`.
 */
class TabelJenisPemeriksaanSearch extends TabelJenisPemeriksaan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jenis_pemeriksaan'], 'integer'],
            [['jenis_pemeriksaan', 'deskripsi_jenis_pemeriksaan'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = TabelJenisPemeriksaan::find();

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
            'id_jenis_pemeriksaan' => $this->id_jenis_pemeriksaan,
        ]);

        $query->andFilterWhere(['like', 'jenis_pemeriksaan', $this->jenis_pemeriksaan])
            ->andFilterWhere(['like', 'deskripsi_jenis_pemeriksaan', $this->deskripsi_jenis_pemeriksaan]);

        return $dataProvider;
    }
}
