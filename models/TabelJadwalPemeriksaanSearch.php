<?php

namespace app\Models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\Models\TabelJadwalPemeriksaan;

/**
 * TabelJadwalPemeriksaanSearch represents the model behind the search form of `app\Models\TabelJadwalPemeriksaan`.
 */
class TabelJadwalPemeriksaanSearch extends TabelJadwalPemeriksaan
{
    public $pasien, $jenis_pemeriksaan;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jadwal_pemeriksaan', 'id_pasien', 'id_pegawai', 'id_jenis_pemeriksaan'], 'integer'],
            [['jadwal_pemeriksaan', 'pasien', 'jenis_pemeriksaan'], 'safe'],
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
        $query = TabelJadwalPemeriksaan::find();
        $query->joinWith(['tabelPasien', 'tabelJenisPemeriksaan']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['jenis_pemeriksaan'] = [
            'asc' => ['tabel_jenis_pemeriksaan.jenis_pemeriksaan' => SORT_ASC],
            'desc' => ['tabel_jenis_pemeriksaan.jenis_pemeriksaan' => SORT_DESC]
        ];
        $dataProvider->sort->attributes['pasien'] = [
            'asc' => ['tabel_pasien.nama_pasien' => SORT_ASC],
            'desc' => ['tabel_pasien.nama_pasien' => SORT_DESC]
        ];

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
            'id_jenis_pemeriksaan' => $this->id_jenis_pemeriksaan,
            'jadwal_pemeriksaan' => $this->jadwal_pemeriksaan,
        ]);
        $query->andFilterWhere(['like', 'tabel_jenis_pemeriksaan.jenis_pemeriksaan', $this->jenis_pemeriksaan])
            ->andFilterWhere(['like', 'tabel_pasien.nama_pasien', $this->jenis_pemeriksaan]);

        return $dataProvider;
    }
}
