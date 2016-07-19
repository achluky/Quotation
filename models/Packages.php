<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "packages".
 *
 * @property integer $Package_ID
 * @property string $Package_Name
 * @property string $Short_Package_Name
 * @property string $Description
 * @property double $Price
 * @property string $created_at
 */
class Packages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'packages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Package_ID'], 'string'],
            [['Description'], 'string'],
            [['Price'], 'number'],
            [['Package_Name', 'Short_Package_Name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Package_ID' => 'Package  ID',
            'Package_Name' => 'Package  Name',
            'Short_Package_Name' => 'Short  Package  Name',
            'Description' => 'Description',
            'Price' => 'Price',
        ];
    }

    
    public function savePackageNew($POST){
        return Yii::$app->db->createCommand()->insert('packages', $POST)->execute();
    }
}
