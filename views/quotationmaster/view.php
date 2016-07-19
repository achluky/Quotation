<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\QuotationMaster */

$this->title = "Quotation Number : ".$model->Quotation_Number;
$this->params['breadcrumbs'][] = ['label' => 'Quotation Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quotation-master-view">
    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'Quotation_ID',
            'Quotation_Number',
            'Quotation_Date',
            'Customer_Name',
            'Sub_Customer_Name',
            'Revision_Number',
            'Analysis_Time_Agreed',
            'Sales_Department',
            'Petrolab_PIC',
            'Attachment_File:ntext',
        ],
    ]) ?>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Quotation_Number], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Quotation_Number], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>       
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> View Package Quotation', 
            ['quotationmaster/viewlist', 'quotation_number' => $model->Quotation_Number], [
            'class' => 'btn btn-info',
            
        ]) ?>
    </p>
</div>
