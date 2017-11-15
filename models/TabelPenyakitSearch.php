<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TabelPenyakit;

/**
 * TabelPenyakitSearch represents the model behind the search form about `app\models\TabelPenyakit`.
 */
class TabelPenyakitSearch extends TabelPenyakit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_penyakit'], 'integer'],
            [['nama_penyakit', 'deskripsi_penyakit'], 'safe'],
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
        $query = TabelPenyakit::find();

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
            'id_penyakit' => $this->id_penyakit,
        ]);

        $query->andFilterWhere(['like', 'nama_penyakit', $this->nama_penyakit])
            ->andFilterWhere(['like', 'deskripsi_penyakit', $this->deskripsi_penyakit]);

        return $dataProvider;
    }
}
