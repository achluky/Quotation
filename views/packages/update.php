<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Packages */

$this->title = 'Update Packages: ' . $model->Package_ID;
$this->params['breadcrumbs'][] = ['label' => 'Packages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Package_ID, 'url' => ['view', 'id' => $model->Package_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="packages-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
