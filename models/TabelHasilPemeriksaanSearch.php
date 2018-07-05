<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TabelHasilPemeriksaan;

/**
 * TabelHasilPemeriksaanSearch represents the model behind the search form about `app\models\TabelHasilPemeriksaan`.
 */
class TabelHasilPemeriksaanSearch extends TabelHasilPemeriksaan
{
    public $pasien, $pegawai, $jenis_pemeriksaan;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_hasil_pemeriksaan', 'id_pasien', 'id_pegawai'], 'integer'],
            [['hasil_pemeriksaan', 'foto', 'tanggal_pemeriksaan', 'pasien', 'pegawai', 'jenis_pemeriksaan'], 'safe'],
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
        $query = TabelHasilPemeriksaan::find();
        $query->joinWith(['tabelPasien', 'tabelPegawai']);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['pasien'] = [
            'asc' => ['tabel_pasien.nama_pasien' => SORT_ASC],
            'desc' => ['tabel_pasien.nama_pasien' => SORT_DESC]
        ];
        $dataProvider->sort->attributes['jenis_pemeriksaan'] = [
            'asc' => ['tabel_jenis_pemeriksaan.jenis_pemeriksaan' => SORT_ASC],
            'desc' => ['tabel_jenis_pemeriksaan.jenis_pemeriksaan' => SORT_DESC]
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_hasil_pemeriksaan' => $this->id_hasil_pemeriksaan,
            'id_pasien' => $this->id_pasien,
            'id_pegawai' => $this->id_pegawai,
            'tanggal_pemeriksaan' => $this->tanggal_pemeriksaan,
        ]);

        $query->andFilterWhere(['like', 'hasil_pemeriksaan', $this->hasil_pemeriksaan])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'tabel_pasien.nama_pasien', $this->pasien])
            ->andFilterWhere(['like', 'tabel_jenis_pemeriksaan.nama_pasien', $this->jenis_pemeriksaan]);

        return $dataProvider;
    }
}
