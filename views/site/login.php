<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin([
'id' => 'login-form',
'options' => ['class' => 'm-t'],
'action' => Url::to(['site/login']),
]); ?>
    <div class="form-group">
        <input type="input" class="form-control" name="LoginForm[username]" placeholder="Username" required="">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="LoginForm[password]" placeholder="Password" required="">
    </div>
    <?= Html::submitButton('Login', ['class' => 'btn btn-primary full-width m-b', 'name' => 'login-button']) ?>
<?php ActiveForm::end(); ?>
