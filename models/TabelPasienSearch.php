<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TabelPasien;

/**
 * TabelPasienSearch represents the model behind the search form about `app\models\TabelPasien`.
 */
class TabelPasienSearch extends TabelPasien
{
    public $jenis_kelamin;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pasien'], 'integer'],
            [['nama_pasien', 'jenis_kelamin_pasien', 'tanggal_lahir', 'alamat', 'email_pasien', 'password_pasien', 'id_firebase', 'jenis_kelamin'], 'safe'],
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
        $query = TabelPasien::find();
        $query->joinWith(['tabelJenisKelamin']);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['jenis_kelamin'] = [
            'asc' => ['tabel_jenis_kelamin.jenis_kelamin' => SORT_ASC],
            'desc' => ['tabel_jenis_kelamin.jenis_kelamin' => SORT_DESC]
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_pasien' => $this->id_pasien,
            'tanggal_lahir' => $this->tanggal_lahir,
        ]);

        $query->andFilterWhere(['like', 'nama_pasien', $this->nama_pasien])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'email_pasien', $this->email_pasien])
            ->andFilterWhere(['like', 'password_pasien', $this->password_pasien])
            ->andFilterWhere(['like', 'id_firebase', $this->id_firebase])
            ->andFilterWhere(['like', 'tabel_jenis_kelamin.jenis_kelamin', $this->jenis_kelamin]);

        return $dataProvider;
    }
}
