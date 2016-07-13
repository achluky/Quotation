<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\QuotationMaster;

/**
 * QuotationMasterSearch represents the model behind the search form about `app\models\QuotationMaster`.
 */
class QuotationMasterSearch extends QuotationMaster
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Quotation_ID', 'Customer_Name', 'Sub_Customer_Name', 'Petrolab_PIC'], 'integer'],
            [['Quotation_Number', 'Quotation_Date', 'Revision_Number', 'Analysis_Time_Agreed', 'Sales_Department', 'Attachment_File'], 'safe'],
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
        $query = QuotationMaster::find();

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
            'Quotation_ID' => $this->Quotation_ID,
            'Quotation_Date' => $this->Quotation_Date,
            'Customer_Name' => $this->Customer_Name,
            'Sub_Customer_Name' => $this->Sub_Customer_Name,
            'Analysis_Time_Agreed' => $this->Analysis_Time_Agreed,
            'Petrolab_PIC' => $this->Petrolab_PIC,
        ]);

        $query->andFilterWhere(['like', 'Quotation_Number', $this->Quotation_Number])
            ->andFilterWhere(['like', 'Revision_Number', $this->Revision_Number])
            ->andFilterWhere(['like', 'Sales_Department', $this->Sales_Department])
            ->andFilterWhere(['like', 'Attachment_File', $this->Attachment_File]);

        return $dataProvider;
    }
}
