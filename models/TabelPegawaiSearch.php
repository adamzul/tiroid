<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\Models\TabelPegawai;

/**
 * TabelPegawaiSearch represents the model behind the search form about `app\Models\TabelPegawai`.
 */
class TabelPegawaiSearch extends TabelPegawai
{
    public $role, $jenis_kelamin;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pegawai'], 'integer'],
            [['nama_pegawai', 'id_jenis_kelamin_pegawai', 'tanggal_lahir_pegawai', 'alamat_pegawai', 'no_telpon_pegawai', 'username_pegawai', 'password_pegawai', 'id_role_pegawai', 'role', 'jenis_kelamin'], 'safe'],
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
        $query->joinWith(['tabelJenisKelamin', 'tabelRole']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['jenis_kelamin'] = [
            'asc' => ['tabel_jenis_kelamin.jenis_kelamin' => SORT_ASC],
            'desc' => ['tabel_jenis_kelamin.jenis_kelamin' => SORT_DESC]
        ];

        $dataProvider->sort->attributes['role'] = [
            'asc' => ['tabel_role.role' => SORT_ASC],
            'desc' => ['tabel_role.role' => SORT_DESC]
        ];

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
            ->andFilterWhere(['like', 'id_jenis_kelamin_pegawai', $this->id_jenis_kelamin_pegawai])
            ->andFilterWhere(['like', 'alamat_pegawai', $this->alamat_pegawai])
            ->andFilterWhere(['like', 'no_telpon_pegawai', $this->no_telpon_pegawai])
            ->andFilterWhere(['like', 'username_pegawai', $this->username_pegawai])
            ->andFilterWhere(['like', 'password_pegawai', $this->password_pegawai])
            ->andFilterWhere(['like', 'tabel_jenis_kelamin.jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'tabel_role.role', $this->role]);

        return $dataProvider;
    }
}
