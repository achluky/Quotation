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
    public $Discount;
    public $Price_Discount;
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

    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

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
        $this->Attachment_File->saveAs( \Yii::getAlias('@webroot').'/../upload/file/' . $this->Attachment_File->baseName . '.' . $this->Attachment_File->extension);
        return true;
    }

    public function quotation_email($POST)
    {
        $POST = $POST['QuotationForm'];
        $subject = "Petrolab Quotation #".$POST['Quotation_Number']."#".$POST['Customer_Name']."";
        $str = file_get_contents( \Yii::getAlias('@webroot').'/../doc/action.html');
        $str = str_replace("%Quotation_Number%", $POST['Quotation_Number'], $str);
        $str = str_replace("%Quotation_Date%", $POST['Quotation_Date'], $str);
        $str = str_replace("%Customer_Name%", $POST['Customer_Name'], $str);
        $str = str_replace("%Revision_Number%", $POST['Revision_Number'], $str);
        $str = str_replace("%Petrolab_PIC%", $POST['Petrolab_PIC'], $str);

        $q_child = $this->getQuotation_child($POST['Quotation_Number']);

        $tabel = '';
        $sum_price=0;
        $sum_total_price=0;
        foreach ($q_child as $i => $child) {
            $tabel .= ' <tr>
                            <td>'.++$i.'</td>
                            <td>'.$child['Package_ID'].'</td>
                            <td>'.$child['Laboratory_Service_Description'].'</td>
                            <td style="text-align:center;">'.$child['Sales_Quantity'].'</td>
                            <td style="text-align:center;">'.$child['Sales_Price'].'</td>
                            <td style="text-align:center;">'.$child['Price_Discount'].'</td>
                        </tr>';
                        $sum_price += $child['Sales_Price'];
                        $sum_total_price += $child['Price_Discount'];
        }
        
        $tabel .= ' <tr class="total">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align:center;">'.$sum_price.'</td>
                        <td style="text-align:center;">'.$sum_total_price.'</td>
                    </tr>';

        $str = str_replace("%tabel%", $tabel, $str);
        $rst = Yii::$app->mailer->compose('layouts/html')
            ->setTo(trim($POST['Customer_Name']))
            ->setFrom(["luky.lucky24@gmail.com" => "no reply"])
            ->setSubject($subject)
            ->setHtmlBody($str)
            ->attach(\Yii::getAlias('@webroot').'/../upload/file/' . $this->Attachment_File->baseName . '.' . $this->Attachment_File->extension)
            ->send();
        return $rst;
    }

    public function getQuotation_child($quotation_number){
        return QuotationChild::find()->where('Quotation_Number="'.$quotation_number.'"')->asArray()->all();
    }
    public function getPackage(){
        return ArrayHelper::map(Packages::find()->all(), 'Package_Name', 'Package_Name');
    }
    public function getPackage2(){
        $query = "SELECT * FROM packages";
        return ArrayHelper::map(Packages::find()->all(), 'Package_Name', 'Package_Name');
    }
    
    public function getCustomes(){
        return ArrayHelper::map(Customers::find()->all(), 'Office_Email', 'Customer_Name');
    }

    public function getPrice($id){
        return Packages::find()->where('Package_Name="'.$id.'"')->asArray()->one();
    }

    public function savePackage_child($POST){
        return Yii::$app->db->createCommand()->insert('quotation_child', $POST)->execute();
    }
    public function removePackage_child($POST){
        $query = "DELETE FROM quotation_child WHERE Package_ID='".trim($POST['Packed_id'])."'";
        return Yii::$app->db->createCommand($query)->execute();
    }
    public function getPrice2($id){
        return Packages::find()->where('Package_Name="'.$id.'"')->asArray()->one();
    }
    public function savePackage_master($POST){
        return Yii::$app->db->createCommand()->insert('quotation_master', $POST['QuotationForm'])->execute();
    }
}
