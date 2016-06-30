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
    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var recipient = button.data('whatever')
      var modal = $(this)
      modal.find('.modal-title').text('ID New Package Service ' + recipient)
      modal.find('#id-Package').val(recipient)
    });

    $( ".save-package" ).click(function() {
        var id_Package = $("#id-Package").val(); 
        var Package_Name = $("#Package_Name").val(); 
        var Short_Package_Name = $("#Short_Package_Name").val(); 
        var Price = parseInt($("#Price").val()); 
        var Description = $("#Description").val(); 
        $.post( "<?= Url::to(['packages/save'])?>", { 
                Package_ID: id_Package, 
                Package_Name: Package_Name, 
                Short_Package_Name:Short_Package_Name, 
                Price:Price, 
                Description:Description,
                _csrf : '<?=Yii::$app->request->getCsrfToken()?>'
            } );
        $('#exampleModal').modal('hide');
    });

});
</script>

</body>
</html>
<?php $this->endPage() ?>
