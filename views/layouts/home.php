<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href="<?= Yii::getAlias('@web')?>/assets/lte/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= Yii::getAlias('@web')?>/assets/lte/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= Yii::getAlias('@web')?>/assets/lte/css/animate.css" rel="stylesheet">
    <link href="<?= Yii::getAlias('@web')?>/assets/lte/css/style.css" rel="stylesheet">
</head>
<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">
            <div class="col-md-6">
                <h2 class="font-bold">Welcome to IN+</h2>
                <p>
                    Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                </p>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                </p>

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <?= $content ?>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Copyright Example Company
            </div>
            <div class="col-md-6 text-right">
               <small>© 2014-2015</small>
            </div>
        </div>
    </div>

</body>
</html>
