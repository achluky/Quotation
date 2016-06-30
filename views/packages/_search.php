<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PackagesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="packages-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Package_ID') ?>

    <?= $form->field($model, 'Package_Name') ?>

    <?= $form->field($model, 'Short_Package_Name') ?>

    <?= $form->field($model, 'Description') ?>

    <?= $form->field($model, 'Price') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
