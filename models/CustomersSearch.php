<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Customers;

/**
 * CustomersSearch represents the model behind the search form about `app\models\Customers`.
 */
class CustomersSearch extends Customers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Customer_ID'], 'integer'],
            [['Customer_Name', 'Customer_Short_Name', 'Customer_Administrative_Address', 'Office_Phone', 'Office_Fax', 'Customer_Factory', 'Factory_Phone', 'Factory_Fax', 'Office_Email', 'Industrial_Sector', 'NPWP'], 'safe'],
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
        $query = Customers::find();

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
            'Customer_ID' => $this->Customer_ID,
        ]);

        $query->andFilterWhere(['like', 'Customer_Name', $this->Customer_Name])
            ->andFilterWhere(['like', 'Customer_Short_Name', $this->Customer_Short_Name])
            ->andFilterWhere(['like', 'Customer_Administrative_Address', $this->Customer_Administrative_Address])
            ->andFilterWhere(['like', 'Office_Phone', $this->Office_Phone])
            ->andFilterWhere(['like', 'Office_Fax', $this->Office_Fax])
            ->andFilterWhere(['like', 'Customer_Factory', $this->Customer_Factory])
            ->andFilterWhere(['like', 'Factory_Phone', $this->Factory_Phone])
            ->andFilterWhere(['like', 'Factory_Fax', $this->Factory_Fax])
            ->andFilterWhere(['like', 'Office_Email', $this->Office_Email])
            ->andFilterWhere(['like', 'Industrial_Sector', $this->Industrial_Sector])
            ->andFilterWhere(['like', 'NPWP', $this->NPWP]);

        return $dataProvider;
    }
}
