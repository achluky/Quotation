<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

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
    public $Analysis_Time_Agreed;
    public $Sales_Department;
    public $Petrolab_PIC;
    public $Attachment_File;

    public $Package_Name;
    public $Laboratory_Service_Description;
    public $Temporary_Lab_Number;
    public $Sales_Price;
    public $Sales_Quantity;
    public $Notes;
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
                    'Analysis_Time_Agreed', 
                    'Sales_Department', 
                    'Petrolab_PIC', 
                    'Attachment_File'
                ], 
                'required'
            ],
            [
                ['Attachment_File'], 'file', 'skipOnEmpty' => false
            ],
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
    
    public function uploadFile()
    {
        if ($this->validate()) {
            $this->Attachment_File->saveAs( \Yii::getAlias('@webroot').'/../upload/' . $this->Attachment_File->baseName . '.' . $this->Attachment_File->extension);
            return true;
        } else {
            return false;
        }
    }

    public function quotation_email($POST)
    {
        $POST = $POST['QuotationForm'];
        // dd($POST);
        $subject = "Petrolab Quotation #".$POST['Quotation_Number']."#".$POST['Customer_Name']."";
        $body = "
Dear Sir/Modam
\n
Thanks to contact petrolab laboratory here with we send you our commertial quotation :

    Quotation Number : ".$POST['Quotation_Number']."
    Quotation Date : ".$POST['Quotation_Date']."
    Customers Name : ".$POST['Customer_Name']."
    Revison : ".$POST['Revision_Number']."
    Petrolab PIC : ".$POST['Petrolab_PIC']."

Should you need futher assistence, please do not hasitute to contact thanks for yout trust to petrolab laboratory
\n
Regards.";
            $rst = Yii::$app->mailer->compose()
                ->setTo("ahmadluky@apps.ipb.ac.id")
                ->setFrom(["luky.lucky24@gmail.com" => "ahmad luky"])
                ->setSubject($subject)
                ->setTextBody($body)
                ->attach(\Yii::getAlias('@webroot').'/../upload/' . $this->Attachment_File->baseName . '.' . $this->Attachment_File->extensio)
                ->send();
            return $rst;
    }

    public function getPackage(){
        return ArrayHelper::map(Packages::find()->all(), 'Package_ID', 'Package_Name');
    }
    
    public function getCustomes(){
        return ArrayHelper::map(Customers::find()->all(), 'Office_Email', 'Customer_Name');
    }

    public function savePackage_child($POST){
        return Yii::$app->db->createCommand()->insert('quotation_child', $POST)->execute();
    }

    public function savePackage_master($POST){
        return Yii::$app->db->createCommand()->insert('quotation_master', $POST['QuotationForm'])->execute();
    }
}
