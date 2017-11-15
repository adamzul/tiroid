<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TabelJadwal;

/**
 * TabelJadwalSearch represents the model behind the search form about `app\models\TabelJadwal`.
 */
class TabelJadwalSearch extends TabelJadwal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_jadwal_dokter', 'id_pegawai'], 'integer'],
            [['hari_jadwal', 'jam_mulai_jadwal', 'jam_berakhir_jadwal', 'ruang'], 'safe'],
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
        $query = TabelJadwal::find();

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
            'id_jadwal_dokter' => $this->id_jadwal_dokter,
            'id_pegawai' => $this->id_pegawai,
            'jam_mulai_jadwal' => $this->jam_mulai_jadwal,
            'jam_berakhir_jadwal' => $this->jam_berakhir_jadwal,
        ]);

        $query->andFilterWhere(['like', 'hari_jadwal', $this->hari_jadwal])
            ->andFilterWhere(['like', 'ruang', $this->ruang]);

        return $dataProvider;
    }
}
