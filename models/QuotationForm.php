<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * QuotationForm is the model behind the contact form.
 */
class QuotationForm extends Model
{
    public $Quotation_Number;
    public $Quotation_Date;
    public $Customer_Name;
    public $Sub_Customer_Name;
    public $Revision_Number;
    public $Analysis_Time_Agr;
    public $Sales_Department;
    public $Petrolab_PIC;
    public $Attachment_File;
    public $Cc_to_patrolab_email;
    public $Package_ID;
    public $Package_Name;
    public $verifyCode;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [
                [
                    'Quotation_Number', 
                    'Quotation_Date', 
                    'Customer_Name', 
                    'Sub_Customer_Name', 
                    'Revision_Number', 
                    'Analysis_Time_Agr', 
                    'Sales_Department', 
                    'Petrolab_PIC', 
                    'Attachment_File',
                    'Cc_to_patrolab_email',
                    'Package_ID',
                    'Package_Name'
                ], 
                'required'
            ],
            ['Attachment_File', 'file'],
            ['email', 'email']
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return boolean whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();

            return true;
        }
        return false;
    }

    public function getPackage(){
        return ArrayHelper::map(Packages::find()->all(), 'Package_ID', 'Package_Name');
    }
}
