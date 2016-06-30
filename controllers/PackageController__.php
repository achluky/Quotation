<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\Packages;

class PackageController extends Controller
{
    public function actionIndex()
    {
        return $this->render('package');
    }
    /**
     * Create
     */
    public function actionSave()
    {
        $model = new Packages();
        if (isset($_POST)) {
            $model->attributes=$_POST;
            if($model->save()){
            return $this->redirect(['site/quotation']);
            }else{
                echo json_encode(array('status'=>'failed'));
            }
        }
    }
    public function actionUpdate(){
    }
}
