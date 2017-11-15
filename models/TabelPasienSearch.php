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
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pasien'], 'integer'],
            [['nama_pasien', 'jenis_kelamin_pasien', 'tanggal_lahir', 'alamat', 'username_pasien', 'password_pasien'], 'safe'],
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
            'id_pasien' => $this->id_pasien,
            'tanggal_lahir' => $this->tanggal_lahir,
        ]);

        $query->andFilterWhere(['like', 'nama_pasien', $this->nama_pasien])
            ->andFilterWhere(['like', 'jenis_kelamin_pasien', $this->jenis_kelamin_pasien])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'username_pasien', $this->username_pasien])
            ->andFilterWhere(['like', 'password_pasien', $this->password_pasien]);

        return $dataProvider;
    }
}
