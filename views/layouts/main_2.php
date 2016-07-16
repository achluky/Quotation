<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<div class="wrapper">
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
                    <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Main view</span></a>
                </li>
                <li>
                    <a href="minor.html"><i class="fa fa-th-large"></i> <span class="nav-label">Minor view</span> </a>
                </li>
            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
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
                        <a href="#">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center m-t-lg">
                        <h1>
                            Welcome in INSPINIA Static SeedProject
                        </h1>           
                        <?= $content ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="pull-right">
                <?= Yii::powered() ?>
            </div>
            <div>
                <p class="pull-left">&copy; PT Petrolab Service <?= date('Y') ?></p>
            </div>
        </div>
    </div>
</div>

<!-- Mainly scripts -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

<!-- modefication by luky -->
<script src="/Quotation/web/assets/chosen/chosen.jquery.js"></script>
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
    $("#quotationform-package_name").chosen();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
    $( "#quotationform-package_name" ).change(function() {
        packed_id = $( "#quotationform-package_name" ).val();
        $("#quotationform-sales_price").val(packed_id);
    });
});
</script>
</body>
</html>
