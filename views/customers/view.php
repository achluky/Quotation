<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Customers */

$this->title = $model->Customer_ID;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customers-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Customer_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Customer_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Customer_ID',
            'Customer_Name',
            'Customer_Short_Name',
            'Customer_Administrative_Address:ntext',
            'Office_Phone',
            'Office_Fax',
            'Customer_Factory',
            'Factory_Phone',
            'Factory_Fax',
            'Office_Email:email',
            'Industrial_Sector',
            'NPWP',
        ],
    ]) ?>

</div>
