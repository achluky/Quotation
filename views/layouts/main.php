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
    <?php $this->head() ?>
    <link href="<?= Yii::getAlias('@web')?>/assets/lte/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= Yii::getAlias('@web')?>/assets/lte/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= Yii::getAlias('@web')?>/assets/lte/css/animate.css" rel="stylesheet">
    <link href="<?= Yii::getAlias('@web')?>/assets/lte/css/style.css" rel="stylesheet">
    <!-- <link href="<?= Yii::getAlias('@web')?>/assets/chosen/chosen.min.css" rel="stylesheet" >  -->
    <link href="<?= Yii::getAlias('@web')?>/assets/lte/css/plugins/chosen/chosen.css" rel="stylesheet" > 
    <link href="<?= Yii::getAlias('@web')?>/assets/chosen/chosen-bootstrap.css" rel="stylesheet" >
    <!-- <link href="<?= Yii::getAlias('@web')?>/assets/lte/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet" >  -->
    <link href="<?= Yii::getAlias('@web')?>/assets/lte//css/plugins/iCheck/custom.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> 
                            <span class="block m-t-xs"> 
                                <strong class="font-bold">
                                    <?= strtoupper (Yii::$app->user->identity->username )?>    
                                </strong>
                            </span> 
                            <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                            </span> </a>
                                <?php  if(!Yii::$app->user->isGuest){ ?>
                                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                        <li><a href="<?= Url::to(['/site/logout'])?>" data-method="post">Logout</a></li>
                                    </ul>
                                <?php } ?>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li class="active">
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Quotation</span></a>
                    <ul class="nav nav-second-level collapse in">
                        <li><a href="<?= Url::to(['/site/quotation'])?>">Quotation Form</a></li>
                        <li><a href="<?= Url::to(['/quotationmaster/index'])?>">List Of Quotation </a></li>
                        <li><a href="<?= Url::to(['/packages/index'])?>">Packages</a></li>
                        <li><a href="<?= Url::to(['/customers/index'])?>">Customers</a></li>
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
                        <span class="m-r-sm text-muted welcome-message">Welcome to <?= strtoupper (Yii::$app->user->identity->username )?>.</span>
                    </li>
                    <?php  if(!Yii::$app->user->isGuest){ ?>
                        <li>
                            <a href="<?= Url::to(['/site/logout'])?>" data-method="post"> 
                                <i class="fa fa-sign-out"></i> Logout
                            </a>
                        </li>
                    <?php } ?>
                </ul>

            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-8">
                <h2><?= $this->title ?></h2>
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="ibox-content p-xl">
                        <div class="row">
                            <?= $content ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mainly scripts -->
<script src="<?= Yii::getAlias('@web')?>/assets/lte/js/jquery-2.1.1.js"></script>
<script src="<?= Yii::getAlias('@web')?>/assets/lte/js/bootstrap.min.js"></script>
<script src="<?= Yii::getAlias('@web')?>/assets/lte/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?= Yii::getAlias('@web')?>/assets/lte/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?= Yii::getAlias('@web')?>/assets/lte/js/inspinia.js"></script>
<script src="<?= Yii::getAlias('@web')?>/assets/lte/js/plugins/pace/pace.min.js"></script>

<!-- chosen  JS-->
<script src="<?= Yii::getAlias('@web')?>/assets/chosen/chosen.jquery.js"></script>
<script src="<?= Yii::getAlias('@web')?>/assets/chosen/ajax-chosen.js"></script>

<!-- date js  -->
<script src="<?= Yii::getAlias('@web')?>/assets/lte/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- icheck -->
<script src="<?= Yii::getAlias('@web')?>/assets/lte/js/plugins/iCheck/icheck.min.js"></script>

<!-- jquery.maskMoney -->
<script src="<?= Yii::getAlias('@web')?>/assets/lte/js/jquery.maskMoney.js"></script>

<!-- main js  -->
<script type="text/javascript">
$(document).ready(function () {
    // init package

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
        var quotationform_sales_price = quotationform_sales_price.replace("Rp. ","");
        var quotationform_sales_price = quotationform_sales_price.replace(".","");
        var quotationform_sales_price = quotationform_sales_price.replace(".","");
        var quotationform_sales_price = quotationform_sales_price.replace(".","");
        if (quotationform_sales_price=='') {
            $( ".status" ).append(status_error+"<p>Sales Price is NULL</p>"+status_error_end);
            return;
        };
        var quotationform_sales_quantity = $("#quotationform-sales_quantity").val(); 
        if (quotationform_sales_quantity=='') {
            $( ".status" ).append(status_error+"<p>Sales Quantity is NULL</p>"+status_error_end);
            return;
        };
        var quotationform_discount = $("#quotationform-discount").val(); 
        var quotationform_discount = quotationform_discount.replace("Rp. ","");
        var quotationform_discount = quotationform_discount.replace(".","");
        var quotationform_discount = quotationform_discount.replace(".","");
        var quotationform_discount = quotationform_discount.replace(".","");
        if (quotationform_discount=='') {
            $( ".status" ).append(status_error+"<p>Discount is NULL</p>"+status_error_end);
            return;
        };
        var quotationform_price_discount = $("#quotationform-price_discount").val(); 
        var quotationform_price_discount = quotationform_price_discount.replace("Rp. ","");
        var quotationform_price_discount = quotationform_price_discount.replace(".","");
        var quotationform_price_discount = quotationform_price_discount.replace(".","");
        var quotationform_price_discount = quotationform_price_discount.replace(".","");
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
                Discount:quotationform_discount,
                Price_Discount:quotationform_price_discount,
                Notes:quotationform_notes
        },function( data ) {
            if (data.status) {
                $("#quotationform-package_name").val(""); 
                $("#quotationform-laboratory_service_description").val(""); 
                $("#quotationform-temporary_lab_number").val(""); 
                $("#quotationform-sales_price").val(0); 
                $("#quotationform-sales_quantity").val(0); 
                $("#quotationform-discount").val(0); 
                $("#quotationform-price_discount").val(0); 
                $("#quotationform-notes").val(""); 
                $( ".status" ).append("<div class=\"alert alert-info alert-dismissible fade in\" role=\"alert\">"+
                      "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button>"+
                      "<h4>Succsesfuly!</h4>"+
                      "<p>Package in Quotation Number ."+quotationform_quotation_number+" Save."+
                      "</p>"+
                    "</div>" );
                $( ".list_package ul .well").append("<li><span class=\"m-21-xs\"><span class='glyphicon glyphicon-ok'></span></span> "+quotationform_package_name+"</li>");
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
    $("#quotationform-sales_quantity").change(function() {
        var s = $("#quotationform-sales_price").val();
        var s = s.replace("Rp. ","");
        var s = s.replace(".","");
        var s = s.replace(".","");
        var s = s.replace(".","");
        var sq = $("#quotationform-sales_quantity").val();
        $("#quotationform-price_discount").val(s*sq);
        $("#quotationform-price_discount").focus();
    });
    $("#quotationform-discount").change(function() {
        var d = $("#quotationform-discount").val();
        var d = d.replace("Rp. ","");
        var d = d.replace(".","");
        var d = d.replace(".","");
        var d = d.replace(".","");
        var pd = $("#quotationform-price_discount").val();
        var pd = pd.replace("Rp. ","");
        var pd = pd.replace(".","");
        var pd = pd.replace(".","");
        var pd = pd.replace(".","");
        $("#quotationform-price_discount").val(pd-d);
        $("#quotationform-price_discount").focus();
    });
    $("#quotationform-package_name").chosen();
    $("#quotationform-customer_name").chosen();
    $("#quotationform-sub_customer_name").chosen();
    $("#quotationform-package_name").change(function() {
        packed_id = $( "#quotationform-package_name" ).val();
        $.post( "<?= Url::to(['site/getprice'])?>", { Packed_id : packed_id },function( data ) {
            if (data.status) {
                $("#quotationform-sales_price").val(data.price);
                $("#quotationform-sales_price").focus();
            }
        }, "json");
    });
    $('#data_1 .input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true,
        format: "yyyy-mm-dd"
    });
    $( ".save-qotation" ).click(function() {
        var quotation_number = $("#quotationform-quotation_number").val();
        var quotation_date = $("#quotationform-quotation_date").val();
        var customer_name = $("#quotationform-customer_name").val();
        var sub_customer_name = $("#quotationform-sub_customer_name").val();
        var revision_number = $("#quotationform-revision_number").val();
        var analysis_time_agreed = $("#quotationform-analysis_time_agreed").val();
        var sales_department = $("#quotationform-sales_department").val();
        var petrolab_pic = $("#quotationform-petrolab_pic").val();
        var attachment_file = $("#quotationform-attachment_file").val();

        var status_error = "<div class=\"alert alert-danger alert-dismissible fade in\" role=\"alert\">"+
                              "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button>";
        var status_error_end ="</div>";
        if (customer_name == '') {
            $( ".status_master" ).append(status_error+"<p>Customer Name is NULL</p>"+status_error_end);
            return;
        };
        if (sub_customer_name == '') {
            $( ".status_master" ).append(status_error+"<p>Sub Customer Name is NULL</p>"+status_error_end);
            return;
        };
        if (revision_number == '') {
            $( ".status_master" ).append(status_error+"<p>Revision Number is NULL</p>"+status_error_end);
            return;
        };
        if (analysis_time_agreed == '') {
            $( ".status_master" ).append(status_error+"<p>Analysis Time Agreed is NULL</p>"+status_error_end);
            return;
        };
        if (sales_department == '') {
            $( ".status_master" ).append(status_error+"<p>Sales Departmentis NULL</p>"+status_error_end);
            return;
        };
        if (attachment_file == '') {
            $( ".status_master" ).append(status_error+"<p>Attachment File is NULL</p>"+status_error_end);
            return;
        };
        $("#quotation-form").submit();
    });
    $(".close_package").click(function() {
        var packed_id = $(".list_package li").text();
        $.post( "<?= Url::to(['site/quotation_removechild'])?>", { 
                Packed_id: packed_id
        },function( data ) {
            if (data.status) {
                $( ".list_package li" ).remove();
            }else{

            };
        }, "json");
    });
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
        });
    $('#quotationform-sales_price').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
    $('#quotationform-discount').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
    $('#quotationform-price_discount').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
    $('#urgent').on('ifChecked', function(event){
        var packed_id = $("#quotationform-package_name").val();
        $.post( "<?= Url::to(['site/getprice2'])?>", { 
                Packed_id: packed_id
        },function( data ) {
            if (data.status) {
                $("#quotationform-sales_price").val(data.price);
                $("#quotationform-sales_price").focus();
            }else{};
        }, "json");
    });
    $('#urgent').on('ifUnchecked', function(event){
        var packed_id = $("#quotationform-package_name").val();
        $.post( "<?= Url::to(['site/getprice'])?>", { 
                Packed_id: packed_id
        },function( data ) {
            if (data.status) {
                $("#quotationform-sales_price").val(data.price);
                $("#quotationform-sales_price").focus();
            }else{};
        }, "json"); 
    });

    $('#new_modal').on('shown.bs.modal', function () {
        $('#packages-package_name').focus();
    })
    $("#save_package").click(function(){
        var package_name = $("#packages-package_name_new").val();
        var short_package_name =$("#packages-short_package_name_new").val();
        var description =$("#packages-description_new").val();
        var price =$("#packages-price_new").val();
        var price_urgent =$("#packages-price_urgent_new").val();

        $.post( "<?= Url::to(['packages/createajax'])?>", { 
                Package_Name: package_name,
                Short_Package_Name: short_package_name,
                Description: description,
                Price: price,
                Price_2: price_urgent
        },function( data ) {
            if (data.status) {
                $(".status_save").append('<div class="alert alert-info" role="alert"><strong>Succsesfuly !.</strong> Click Sync</div>');
            }else{};
        }, "json");
    })

    // $("#package_sync").ajaxChosen({
    //     type: 'GET',
    //     url: '/ajax-chosen/data.php',
    //     dataType: 'json'
    // }, function (data) {
    //     var results = [];
    //     $.each(data, function (i, val) {
    //         results.push({ value: val.value, text: val.text });
    //     });
    //     return results;
    // });

    $("#sync").click(function(){
        $.ajax({
             type: "post",
             url: "<?= Url::to(['site/syncpackage'])?>",
             success: function (response) {
               document.getElementById("package_sync").innerHTML=response; 
             }
       });
    });

});
</script>

</body>
</html>
