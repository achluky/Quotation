<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property integer $Customer_ID
 * @property string $Customer_Name
 * @property string $Customer_Short_Name
 * @property string $Customer_Administrative_Address
 * @property string $Office_Phone
 * @property string $Office_Fax
 * @property string $Customer_Factory
 * @property string $Factory_Phone
 * @property string $Factory_Fax
 * @property string $Office_Email
 * @property string $Industrial_Sector
 * @property string $NPWP
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Customer_Administrative_Address'], 'string'],
            [['Customer_Name', 'Customer_Factory', 'Industrial_Sector', 'NPWP'], 'string', 'max' => 50],
            [['Customer_Short_Name', 'Factory_Phone'], 'string', 'max' => 20],
            [['Office_Phone', 'Office_Fax', 'Factory_Fax'], 'string', 'max' => 15],
            [['Office_Email'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Customer_ID' => 'Customer  ID',
            'Customer_Name' => 'Customer  Name',
            'Customer_Short_Name' => 'Customer  Short  Name',
            'Customer_Administrative_Address' => 'Customer  Administrative  Address',
            'Office_Phone' => 'Office  Phone',
            'Office_Fax' => 'Office  Fax',
            'Customer_Factory' => 'Customer  Factory',
            'Factory_Phone' => 'Factory  Phone',
            'Factory_Fax' => 'Factory  Fax',
            'Office_Email' => 'Office  Email',
            'Industrial_Sector' => 'Industrial  Sector',
            'NPWP' => 'Npwp',
        ];
    }
}
