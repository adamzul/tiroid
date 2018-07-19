<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TabelArtikel;

/**
 * TabelArtikelSearch represents the model behind the search form about `app\Models\TabelArtikel`.
 */
class TabelArtikelSearch extends TabelArtikel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_artikel', 'id_pegawai'], 'integer'],
            [['judul_artikel', 'konten_artikel', 'tanggal_artikel', 'sumber_artikel'], 'safe'],
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
        $query = TabelArtikel::find();

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
            'id_artikel' => $this->id_artikel,
            'id_pegawai' => $this->id_pegawai,
            'tanggal_artikel' => $this->tanggal_artikel,
        ]);

        $query->andFilterWhere(['like', 'judul_artikel', $this->judul_artikel])
            ->andFilterWhere(['like', 'konten_artikel', $this->konten_artikel])
            ->andFilterWhere(['like', 'sumber_artikel', $this->sumber_artikel]);

        return $dataProvider;
    }
}
