<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\QuotationMasterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quotation-master-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Quotation_ID') ?>

    <?= $form->field($model, 'Quotation_Number') ?>

    <?= $form->field($model, 'Quotation_Date') ?>

    <?= $form->field($model, 'Customer_Name') ?>

    <?= $form->field($model, 'Sub_Customer_Name') ?>

    <?php // echo $form->field($model, 'Revision_Number') ?>

    <?php // echo $form->field($model, 'Analysis_Time_Agreed') ?>

    <?php // echo $form->field($model, 'Sales_Department') ?>

    <?php // echo $form->field($model, 'Petrolab_PIC') ?>

    <?php // echo $form->field($model, 'Attachment_File') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
