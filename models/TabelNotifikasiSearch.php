<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TabelNotifikasi;

/**
 * TabelNotifikasiSearch represents the model behind the search form about `app\models\TabelNotifikasi`.
 */
class TabelNotifikasiSearch extends TabelNotifikasi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_notifikasi', 'id_pegawai'], 'integer'],
            [['konten_notifikasi', 'tanggal_notifikasi'], 'safe'],
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
        $query = TabelNotifikasi::find();

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
            'id_notifikasi' => $this->id_notifikasi,
            'id_pegawai' => $this->id_pegawai,
            'tanggal_notifikasi' => $this->tanggal_notifikasi,
        ]);

        $query->andFilterWhere(['like', 'konten_notifikasi', $this->konten_notifikasi]);

        return $dataProvider;
    }
}
