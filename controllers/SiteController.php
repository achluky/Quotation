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
        
        // dd($post);

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

    public function actionQuotationresult(){
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

    public function actionGetprice()
    {    
        $model = new QuotationForm();
        if (isset($_POST)) {
            $data = $model->getPrice($_POST['Packed_id']);
            echo json_encode(array('status'=>true, 'price'=> $data['Price']));    
        }
    }
}
    