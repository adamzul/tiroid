<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TabelPrediksi;

/**
 * TabelPrediksiSearch represents the model behind the search form about `app\models\TabelPrediksi`.
 */
class TabelPrediksiSearch extends TabelPrediksi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_prediksi', 'id_pasien', 'usia'], 'integer'],
            [['jenis_kelamin', 'hasil_pemeriksaan_usg', 'hasil_pemeriksaan_klinis', 'riwayat_penyakit_gondok', 'riwayat_penyakit_keluarga', 'hasil_prediksi', 'catatan_dokter'], 'safe'],
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
        $query = TabelPrediksi::find();

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
            'id_prediksi' => $this->id_prediksi,
            'id_pasien' => $this->id_pasien,
            'usia' => $this->usia,
        ]);

        $query->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'hasil_pemeriksaan_usg', $this->hasil_pemeriksaan_usg])
            ->andFilterWhere(['like', 'hasil_pemeriksaan_klinis', $this->hasil_pemeriksaan_klinis])
            ->andFilterWhere(['like', 'riwayat_penyakit_gondok', $this->riwayat_penyakit_gondok])
            ->andFilterWhere(['like', 'riwayat_penyakit_keluarga', $this->riwayat_penyakit_keluarga])
            ->andFilterWhere(['like', 'hasil_prediksi', $this->hasil_prediksi])
            ->andFilterWhere(['like', 'catatan_dokter', $this->catatan_dokter]);

        return $dataProvider;
    }
}
