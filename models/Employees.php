<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property integer $Employee_ID
 * @property string $Full_Name
 * @property string $Short_Name
 * @property string $Department
 * @property string $Job_Position
 * @property string $Home_Address
 * @property string $Hand_Phone_1
 * @property string $Hand_Phone_2
 * @property string $Home_Phone
 */
class Employees extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Home_Address'], 'string'],
            [['Full_Name', 'Department', 'Job_Position'], 'string', 'max' => 50],
            [['Short_Name'], 'string', 'max' => 20],
            [['Hand_Phone_1', 'Hand_Phone_2', 'Home_Phone'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Employee_ID' => 'Employee  ID',
            'Full_Name' => 'Full  Name',
            'Short_Name' => 'Short  Name',
            'Department' => 'Department',
            'Job_Position' => 'Job  Position',
            'Home_Address' => 'Home  Address',
            'Hand_Phone_1' => 'Hand  Phone 1',
            'Hand_Phone_2' => 'Hand  Phone 2',
            'Home_Phone' => 'Home  Phone',
        ];
    }
}
