<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Customers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Customer_Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Customer_Short_Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Customer_Administrative_Address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Office_Phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Office_Fax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Customer_Factory')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Factory_Phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Factory_Fax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Office_Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Industrial_Sector')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NPWP')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
