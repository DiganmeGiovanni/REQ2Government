<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Beneficiary;

/**
 * BeneficiarySearch represents the model behind the search form about `app\models\Beneficiary`.
 */
class BeneficiarySearch extends Beneficiary
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idBeneficiary', 'idTypeIdentification'], 'integer'],
            [['name', 'aPaterno', 'aMaterno', 'email', 'idNumber', 'birthday'], 'safe'],
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
        $query = Beneficiary::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idBeneficiary' => $this->idBeneficiary,
            'birthday' => $this->birthday,
            'idTypeIdentification' => $this->idTypeIdentification,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'aPaterno', $this->aPaterno])
            ->andFilterWhere(['like', 'aMaterno', $this->aMaterno])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'idNumber', $this->idNumber]);

        return $dataProvider;
    }
}
