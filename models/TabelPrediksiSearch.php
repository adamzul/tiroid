<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TabelPrediksi;

/**
 * TabelPrediksiSearch represents the model behind the search form of `app\models\TabelPrediksi`.
 */
class TabelPrediksiSearch extends TabelPrediksi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_prediksi', 'id_pasien', 'usia', 'tekanan_sistolik', 'tekanan_diastolik'], 'integer'],
            [['jenis_kelamin', 'riwayat_penyakit_tiroid', 'hasil_prediksi', 'tanggal_input', 'catatan_dokter'], 'safe'],
            [['TSH', 'T4'], 'number'],
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
            'tekanan_sistolik' => $this->tekanan_sistolik,
            'tekanan_diastolik' => $this->tekanan_diastolik,
            'TSH' => $this->TSH,
            'T4' => $this->T4,
            'tanggal_input' => $this->tanggal_input,
        ]);

        $query->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'riwayat_penyakit_tiroid', $this->riwayat_penyakit_tiroid])
            ->andFilterWhere(['like', 'hasil_prediksi', $this->hasil_prediksi])
            ->andFilterWhere(['like', 'catatan_dokter', $this->catatan_dokter]);

        return $dataProvider;
    }
}
