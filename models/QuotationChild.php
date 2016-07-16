<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quotation_child".
 *
 * @property integer $id
 * @property string $Quotation_Number
 * @property string $Package_ID
 * @property string $Laboratory_Service_Description
 * @property string $Temporary_Lab_Number
 * @property double $Sales_Price
 * @property double $Sales_Quantity
 * @property integer $Discount
 * @property integer $Price_Discount
 * @property string $Notes
 */
class QuotationChild extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quotation_child';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Quotation_Number', 'Package_ID', 'Laboratory_Service_Description', 'Temporary_Lab_Number', 'Sales_Price', 'Sales_Quantity', 'Discount', 'Price_Discount', 'Notes'], 'required'],
            [['Laboratory_Service_Description', 'Notes'], 'string'],
            [['Sales_Price', 'Sales_Quantity'], 'number'],
            [['Discount', 'Price_Discount'], 'integer'],
            [['Quotation_Number'], 'string', 'max' => 40],
            [['Package_ID'], 'string', 'max' => 225],
            [['Temporary_Lab_Number'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Quotation_Number' => 'Quotation  Number',
            'Package_ID' => 'Package  ID',
            'Laboratory_Service_Description' => 'Laboratory  Service  Description',
            'Temporary_Lab_Number' => 'Temporary  Lab  Number',
            'Sales_Price' => 'Sales  Price',
            'Sales_Quantity' => 'Sales  Quantity',
            'Discount' => 'Discount',
            'Price_Discount' => 'Price  Discount',
            'Notes' => 'Notes',
        ];
    }
}
