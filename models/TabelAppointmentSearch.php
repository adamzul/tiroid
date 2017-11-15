<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TabelAppointment;

/**
 * TabelAppointmentSearch represents the model behind the search form about `app\models\TabelAppointment`.
 */
class TabelAppointmentSearch extends TabelAppointment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_appointment', 'id_pasien', 'id_pegawai'], 'integer'],
            [['tanggal_mengajukan_appointment', 'tanggal_appointment'], 'safe'],
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
        $query = TabelAppointment::find();

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
            'id_appointment' => $this->id_appointment,
            'id_pasien' => $this->id_pasien,
            'id_pegawai' => $this->id_pegawai,
            'tanggal_mengajukan_appointment' => $this->tanggal_mengajukan_appointment,
            'tanggal_appointment' => $this->tanggal_appointment,
        ]);

        return $dataProvider;
    }
}
