<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\QuotationMaster */

$this->title = 'Update Quotation Number : ' . $model->Quotation_Number;
$this->params['breadcrumbs'][] = ['label' => 'Quotation Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Quotation_Number, 'url' => ['view', 'id' => $model->Quotation_Number]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="quotation-master-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
