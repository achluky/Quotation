<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\QuotationMasterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quotation Masters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quotation-master-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!-- <?= Html::a('Create Quotation Master', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>
     <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Quotation_Number',
            'Quotation_Date',
            'Customer_Name',
            'Analysis_Time_Agreed',
            // 'Attachment_File:ntext',
            'Petrolab_PIC',
            // 'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
