<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TabelRule;

/**
 * TabelRuleSearch represents the model behind the search form of `app\models\TabelRule`.
 */
class TabelRuleSearch extends TabelRule
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_rule'], 'integer'],
            [['usia', 'jenis_kelamin', 'tekanan_sistolik', 'tekanan_diastolik', 'riwayat_penyakit_tiroid', 'TSH', 'T4', 'label'], 'safe'],
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
        $query = TabelRule::find();

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
            'id_rule' => $this->id_rule,
        ]);

        $query->andFilterWhere(['like', 'usia', $this->usia])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'tekanan_sistolik', $this->tekanan_sistolik])
            ->andFilterWhere(['like', 'tekanan_diastolik', $this->tekanan_diastolik])
            ->andFilterWhere(['like', 'riwayat_penyakit_tiroid', $this->riwayat_penyakit_tiroid])
            ->andFilterWhere(['like', 'TSH', $this->TSH])
            ->andFilterWhere(['like', 'T4', $this->T4])
            ->andFilterWhere(['like', 'label', $this->label]);

        return $dataProvider;
    }
}
