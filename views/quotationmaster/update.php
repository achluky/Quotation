<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\QuotationMaster */

$this->title = 'Update Quotation Master: ' . $model->Quotation_ID;
$this->params['breadcrumbs'][] = ['label' => 'Quotation Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Quotation_ID, 'url' => ['view', 'id' => $model->Quotation_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="quotation-master-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
