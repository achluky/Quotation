<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CustomersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customers-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Customer_ID') ?>

    <?= $form->field($model, 'Customer_Name') ?>

    <?= $form->field($model, 'Customer_Short_Name') ?>

    <?= $form->field($model, 'Customer_Administrative_Address') ?>

    <?= $form->field($model, 'Office_Phone') ?>

    <?php // echo $form->field($model, 'Office_Fax') ?>

    <?php // echo $form->field($model, 'Customer_Factory') ?>

    <?php // echo $form->field($model, 'Factory_Phone') ?>

    <?php // echo $form->field($model, 'Factory_Fax') ?>

    <?php // echo $form->field($model, 'Office_Email') ?>

    <?php // echo $form->field($model, 'Industrial_Sector') ?>

    <?php // echo $form->field($model, 'NPWP') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
