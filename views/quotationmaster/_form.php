<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\QuotationMaster */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quotation-master-form">

    <?php $form = ActiveForm::begin(
        [
            'options' => [ 'enctype' => 'multipart/form-data']
        ]
    ); ?>

    <?= $form->field($model, 'Quotation_Number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Quotation_Date')->textInput() ?>

    <?= $form->field($model, 'Customer_Name')->textInput() ?>

    <?= $form->field($model, 'Sub_Customer_Name')->textInput() ?>

    <?= $form->field($model, 'Revision_Number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Analysis_Time_Agreed')->textInput() ?>

    <?= $form->field($model, 'Sales_Department')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Petrolab_PIC')->textInput() ?>

    <?= $form->field($model, 'Attachment_File')->fileInput() ?>

    <?php if ($model->Attachment_File): ?>
        <div class="form-group">
            <?= Html::a('File Name : '.$model->Attachment_File, ['/file', 'file' => $model->Attachment_File]) ?>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
