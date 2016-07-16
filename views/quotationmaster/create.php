<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\QuotationMaster */

$this->title = 'Create Quotation Master';
$this->params['breadcrumbs'][] = ['label' => 'Quotation Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quotation-master-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
