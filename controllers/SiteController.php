<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\QuotationForm;
use yii\web\UploadedFile;


class SiteController extends Controller
{
    public $enableCsrfValidation = false;
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['quotation']);
        }
        $model = new LoginForm();
        $this->layout = 'home';
        return $this->render('login', ['model' => $model]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        $post = Yii::$app->request->post();
        
        if ($model->load($post) && $model->login()) {
            return $this->redirect(['quotation']);
        }
        $this->layout = 'home';
        return $this->render('login', ['model' => $model]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new QuotationForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        }
        return $this->render('contact', ['model' => $model]);
    }

    public function actionQuotation()
    {
        $model = new QuotationForm();
        if ($model->load(Yii::$app->request->post())) {
            $model->Attachment_File = UploadedFile::getInstance($model, 'Attachment_File');
            if ($model->uploadFile()) {
                if($model->savePackage_master($_POST)){
                    $rst = $model->quotation_email($_POST, $model->Attachment_File);
                    return $this->redirect(['quotationresult']);
                }else{
                    Yii::$app->session->setFlash('contactFormSubmitted');
                    return $this->refresh();
                }
            }

        }
        return $this->render('quotation', ['model' => $model]);
    }

    public function actionQuotationresult()
    {
        return $this->render('result');
    }

    public function actionQuotation_child()
    {    
        $model = new QuotationForm();
        if (isset($_POST)) {
            if($model->savePackage_child($_POST)){
                echo json_encode(array('status'=>true, 'info'=> $_POST));
            }else{
                echo json_encode(array('status'=>false));
            }
        }
    }

    public function actionQuotation_removechild(){
        $model = new QuotationForm();
        if (isset($_POST)) {
            if($model->removePackage_child($_POST)){
                echo json_encode(array('status'=>true, 'info'=> $_POST));
            }else{
                echo json_encode(array('status'=>false));
            }
        }
    }

    public function actionGetprice()
    {    
        $model = new QuotationForm();
        if (isset($_POST)) {
            $data = $model->getPrice($_POST['Packed_id']);
            echo json_encode(array('status'=>true, 'price'=> $data['Price']));    
        }
    }


    public function actionGetprice2(){
        $model = new QuotationForm();
        if (isset($_POST)) {
            $data = $model->getPrice2($_POST['Packed_id']);
            echo json_encode(array('status'=>true, 'price'=> $data['Price_2']));    
        }
    }

    public function actionSyncpackage(){
        $model = new QuotationForm();
        $rst = $model->getPackage();
        $arr = array();
        foreach ($rst as $key => $value) {
            $arr_ = array();
            $arr_[$key] = $value;
            array_push($arr, $arr_);
        }
        echo json_encode($arr);

        // echo "
        // <!DOCTYPE html>
        //     <html lang=''>
        //     <head>
        //             <link href='".Yii::getAlias('@web')."/assets/lte/css/plugins/chosen/chosen.css' rel=\"stylesheet\">
        //     </head>
        //     <body>";

        // echo "
        //         <select id=\"quotationform-package_name\" class=\"form-control\" name=\"QuotationForm[Package_Name]\">
        //             <option value=\"\">- Please Select -</option>
        // ";

        // foreach ($rst as $key => $value) {
        //     echo "  <option value=\"".$key."\">".$value."</option>";
        // }

        // echo "  </select>";
        // echo "
        //         <script src='".Yii::getAlias('@web')."/assets/lte/js/jquery-2.1.1.js'></script>
        //         <script src='".Yii::getAlias('@web')."/assets/chosen/chosen.jquery.js'></script>";
        // echo "
        //         <script type=\"text/javascript\">
        //             $(document).ready(function () {
        //                 $(\"#quotationform-package_name\").chosen();
        //             });
        //       </script>";
        // echo "</body>
        // </html>";
    }


}
    