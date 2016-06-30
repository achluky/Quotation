<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Packages;

/**
 * PackagesSearch represents the model behind the search form about `app\models\Packages`.
 */
class PackagesSearch extends Packages
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Package_ID'], 'integer'],
            [['Package_Name', 'Short_Package_Name', 'Description', 'created_at'], 'safe'],
            [['Price'], 'number'],
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
        $query = Packages::find();

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
            'Package_ID' => $this->Package_ID,
            'Price' => $this->Price,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'Package_Name', $this->Package_Name])
            ->andFilterWhere(['like', 'Short_Package_Name', $this->Short_Package_Name])
            ->andFilterWhere(['like', 'Description', $this->Description]);

        return $dataProvider;
    }
}
