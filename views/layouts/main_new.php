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
    <link href="/Quotation/web/assets/lte/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Quotation/web/assets/lte/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/Quotation/web/assets/lte/css/animate.css" rel="stylesheet">
    <link href="/Quotation/web/assets/lte/css/style.css" rel="stylesheet">
</head>
<body>
<div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="#">Logout</a></li>
                            </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li class="active">
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Quotation</span></a>
                    <ul class="nav nav-second-level collapse in">
                        <li><a href="#">Form Quotation </a></li>
                        <li><a href="#">List Quotation </a></li>
                        <li><a href="#">Packages</a></li>
                        <li><a href="#">Customers</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" method="post" action="#">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Welcome to INSPINIA+ Admin Theme.</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-8">
                <h2>Invoice</h2>

                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>

                <!-- <ol class="breadcrumb">
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        Other Pages
                    </li>
                    <li class="active">
                        <strong>Invoice</strong>
                    </li>
                </ol> -->
            </div>
        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div>
    </div>

</div>

<!-- Mainly scripts -->
<script src="/Quotation/web/assets/lte/js/jquery-2.1.1.js"></script>
<script src="/Quotation/web/assets/lte/js/bootstrap.min.js"></script>
<script src="/Quotation/web/assets/lte/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/Quotation/web/assets/lte/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="/Quotation/web/assets/lte/js/inspinia.js"></script>
<script src="/Quotation/web/assets/lte/js/plugins/pace/pace.min.js"></script>
</body
</html>
