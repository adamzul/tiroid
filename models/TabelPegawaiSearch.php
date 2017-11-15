<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TabelPegawai;

/**
 * TabelPegawaiSearch represents the model behind the search form about `app\models\TabelPegawai`.
 */
class TabelPegawaiSearch extends TabelPegawai
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pegawai'], 'integer'],
            [['nama_pegawai', 'jenis_kelamin_pegawai', 'tanggal_lahir_pegawai', 'alamat_pegawai', 'no_telpon_pegawai', 'username_pegawai', 'password_pegawai'], 'safe'],
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
        $query = TabelPegawai::find();

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
            'id_pegawai' => $this->id_pegawai,
            'tanggal_lahir_pegawai' => $this->tanggal_lahir_pegawai,
        ]);

        $query->andFilterWhere(['like', 'nama_pegawai', $this->nama_pegawai])
            ->andFilterWhere(['like', 'jenis_kelamin_pegawai', $this->jenis_kelamin_pegawai])
            ->andFilterWhere(['like', 'alamat_pegawai', $this->alamat_pegawai])
            ->andFilterWhere(['like', 'no_telpon_pegawai', $this->no_telpon_pegawai])
            ->andFilterWhere(['like', 'username_pegawai', $this->username_pegawai])
            ->andFilterWhere(['like', 'password_pegawai', $this->password_pegawai]);

        return $dataProvider;
    }
}
