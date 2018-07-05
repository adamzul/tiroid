<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TabelCatatanMedisPasien;

/**
 * TabelCatatanMedisPasienSearch represents the model behind the search form about `app\models\TabelCatatanMedisPasien`.
 */
class TabelCatatanMedisPasienSearch extends TabelCatatanMedisPasien
{
    public $pasien, $penyakit;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_catatan_medis_pasien', 'id_penyakit', 'id_pasien', 'id_pegawai'], 'integer'],
            [['catatan', 'pasien', 'penyakit'], 'safe'],
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
        $query = TabelCatatanMedisPasien::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['pasien'] = [
            'asc' => ['tabel_pasien.nama_pasien' => SORT_ASC],
            'desc' => ['tabel_pasien.nama_pasien' => SORT_DESC]
        ];
        $dataProvider->sort->attributes['penyakit'] = [
            'asc' => ['tabel_penyakit.nama_penyakit' => SORT_ASC],
            'desc' => ['tabel_penyakit.nama_penyakit' => SORT_DESC]
        ];
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_catatan_medis_pasien' => $this->id_catatan_medis_pasien,
            'id_penyakit' => $this->id_penyakit,
            'id_pasien' => $this->id_pasien,
            'id_pegawai' => $this->id_pegawai,
        ]);

        $query->andFilterWhere(['like', 'catatan', $this->catatan])
            ->andFilterWhere(['like', 'tabel_pasien.nama_pasien', $this->pasien])
            ->andFilterWhere(['like', 'tabel_penyakit.nama_penyakit', $this->penyakit]);

        return $dataProvider;
    }
}
