<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quotation_master".
 *
 * @property integer $Quotation_ID
 * @property string $Quotation_Number
 * @property string $Quotation_Date
 * @property integer $Customer_Name
 * @property integer $Sub_Customer_Name
 * @property string $Revision_Number
 * @property string $Analysis_Time_Agreed
 * @property string $Sales_Department
 * @property integer $Petrolab_PIC
 * @property string $Attachment_File
 */
class QuotationMaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quotation_master';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Quotation_Number', 'Quotation_Date', 'Customer_Name', 'Sub_Customer_Name', 'Revision_Number', 'Analysis_Time_Agreed', 'Sales_Department', 'Petrolab_PIC'], 'required'],
            [['Quotation_Date', 'Analysis_Time_Agreed'], 'safe'],
            [['Customer_Name', 'Sub_Customer_Name'], 'string'],
            [['Attachment_File','Petrolab_PIC'], 'string'],
            [['Quotation_Number', 'Revision_Number', 'Sales_Department'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Quotation_Number' => 'Quotation  Number',
            'Quotation_Date' => 'Quotation  Date',
            'Customer_Name' => 'Customer  Name',
            'Sub_Customer_Name' => 'Sub  Customer  Name',
            'Revision_Number' => 'Revision  Number',
            'Analysis_Time_Agreed' => 'Analysis  Time  Agreed',
            'Sales_Department' => 'Sales  Department',
            'Petrolab_PIC' => 'Petrolab  PIC',
            'Attachment_File' => 'Attachment  File',
        ];
    }
}
