<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Quotation Application',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            [
                'label' => 'Home', 
                'url' => ['/site/index'],
                'visible' => Yii::$app->user->isGuest
            ],
            [
                'label' => 'Quotation',
                'url' => ['site/quotation'],
                'visible' => !Yii::$app->user->isGuest
            ],
            [
                'label' => 'Packages',
                'url' => ['packages/index'],
                'visible' => !Yii::$app->user->isGuest
            ],
            [
                'label' => 'Customers',
                'url' => ['customers/index'],
                'visible' => !Yii::$app->user->isGuest
            ],

            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (          
               
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; PT Petrolab Service <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>

<script type="text/javascript">
$(document).ready(function () {
    $( ".save-package" ).click(function() {
        var status_error = "<div class=\"alert alert-danger alert-dismissible fade in\" role=\"alert\">"+
                              "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button>";
        var status_error_end ="</div>";
        var quotationform_quotation_number = $("#quotationform-quotation_number").val(); 
        var quotationform_package_name = $("#quotationform-package_name").val(); 
        if (quotationform_package_name=='') {
            $( ".status" ).append(status_error+"<p>Packages Name is NULL</p>"+status_error_end);
            return;
        };
        var quotationform_laboratory_service_description = $("#quotationform-laboratory_service_description").val(); 
        if (quotationform_laboratory_service_description=='') {
            $( ".status" ).append(status_error+"<p>Laboratory Service Description is NULL</p>"+status_error_end);
            return;
        };
        var quotationform_temporary_lab_number = $("#quotationform-temporary_lab_number").val(); 
        if (quotationform_temporary_lab_number=='') {
            $( ".status" ).append(status_error+"<p>Temporary Lab Number NULL</p>"+status_error_end);
            return;
        };
        var quotationform_sales_price = $("#quotationform-sales_price").val(); 
        if (quotationform_sales_price=='') {
            $( ".status" ).append(status_error+"<p>Sales Price is NULL</p>"+status_error_end);
            return;
        };
        var quotationform_sales_quantity = $("#quotationform-sales_quantity").val(); 
        if (quotationform_sales_quantity=='') {
            $( ".status" ).append(status_error+"<p>Sales Quantity is NULL</p>"+status_error_end);
            return;
        };
        var quotationform_notes = $("#quotationform-notes").val(); 
        if (quotationform_notes=='') {
            $( ".status" ).append(status_error+"<p>Notes is NULL</p>"+status_error_end);
            return;
        };
        $.post( "<?= Url::to(['site/quotation_child'])?>", { 
                Quotation_Number: quotationform_quotation_number,
                Package_ID: quotationform_package_name, 
                Laboratory_Service_Description: quotationform_laboratory_service_description, 
                Temporary_Lab_Number:quotationform_temporary_lab_number, 
                Sales_Price:quotationform_sales_price, 
                Sales_Quantity:quotationform_sales_quantity,
                Notes:quotationform_notes
        },function( data ) {
            if (data.status) {
                $("#quotationform-package_name").val(""); 
                $("#quotationform-laboratory_service_description").val(""); 
                $("#quotationform-temporary_lab_number").val(""); 
                $("#quotationform-sales_price").val(""); 
                $("#quotationform-sales_quantity").val(""); 
                $("#quotationform-notes").val(""); 
                $( ".status" ).append("<div class=\"alert alert-info alert-dismissible fade in\" role=\"alert\">"+
                      "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button>"+
                      "<h4>Succsesfuly!</h4>"+
                      "<p>Package in Quotation Number ."+quotationform_quotation_number+" Save."+
                      "</p>"+
                    "</div>" );
                $( ".list_package").append("<p><span class='glyphicon glyphicon-ok'></span> "+quotationform_package_name+"</p>");
            }else{
                $( ".status" ).append( "<div class=\"alert alert-danger alert-dismissible fade in\" role=\"alert\">"+
                      "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button>"+
                      "<h4>You got an error!</h4>"+
                      "<p>Package in Quotation Number ."+quotationform_quotation_number+" Failed Save."+
                      "</p>"+
                    "</div>" );
            };
        }, "json");
    });

});
</script>

</body>
</html>
<?php $this->endPage() ?>
