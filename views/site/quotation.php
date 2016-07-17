<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Button;
use yii\jui\DatePicker;
use kartik\datetime\DateTimePicker;

$this->title = 'Quotation';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-md-6">

	<div class="status_master"></div>
	<?php $form = ActiveForm::begin(
		[
			'id' => 'quotation-form',
			'options' => ['class' => 'form-horizontal ', 'enctype' => 'multipart/form-data'],
			'fieldConfig' => [
	            'labelOptions' => ['class' => 'col-lg-12 control-label'],
	        ],
		]
	); 
    ?>
        <?= $form->field($model, 'Quotation_Number', ['template' => '
			   <div class="col-sm-4">{label}</div>
			   <div class="col-sm-8">
			       {input}
			   </div>
			   '])->textInput(['autofocus' => true, 'value'=>"Q-".date("dmYHims")]) ?>
		<?php
				echo '<div class="form-group field-quotationform-quotation_date required">';
				echo '<div class="col-sm-4">
						<label class="col-lg-12 control-label" for="quotationform-quotation_date">Quotation Date</label>
					  </div>';
				echo '<div class="col-sm-8">';
				echo '
						<div id="data_1">
                            <div class="input-group date">
                                <span class="input-group-addon">
                                	<i class="fa fa-calendar"></i>
                                </span>
                                <input type="text" class="form-control quotationform-quotation_date" name="QuotationForm[Quotation_Date]" value="'.date("Y-m-d").'">
                            </div>
                        </div>';

				echo '</div>
					  </div>';
		?>
        <?= $form->field($model, 'Customer_Name',['template' => '
			   <div class="col-sm-4">{label}</div>
			   <div class="col-sm-8">
			        {input}
			   </div>'])->dropDownList($model->getCustomes(), ['prompt'=>'- Select -']) ?>
        <?= $form->field($model, 'Sub_Customer_Name',['template' => '
			   <div class="col-sm-4">{label}</div>
			   <div class="col-sm-8">
			        {input}
			   </div>'])->dropDownList($model->getCustomes(), ['prompt'=>'- Select -']) ?>
        <?= $form->field($model, 'Revision_Number', ['template' => '
			   <div class="col-sm-4">{label}</div>
			   <div class="col-sm-8">
			        {input}
			   </div>']) ?>
		<?php
				echo '<div class="form-group field-quotationform-analysis_time_agreed required">';
				echo '<div class="col-sm-4">
						<label class="col-lg-12 control-label" for="quotationform-analysis_time_agreed">Analysis Time Agreed</label>
					  </div>';
				echo '<div class="col-sm-8">';
				echo '	<div id="data_1">
                            <div class="input-group date">
                                <span class="input-group-addon">
                                	<i class="fa fa-calendar"></i>
                                </span>
                                <input type="text" class="form-control quotationform-analysis_time_agreed" name="QuotationForm[Analysis_Time_Agreed]" value="'.date("Y-m-d").'">
                            </div>
                        </div>';
				echo '</div>
					  </div>';
		?>
        <?= $form->field($model, 'Sales_Department', ['template' => '
			   <div class="col-sm-4">{label}</div>
			   <div class="col-sm-8">
			        {input}
			   </div>'])->dropDownList(['LUBRICANT'=>'LUBRICANT','EVIRO'=>'EVIRO','TRAVO'=>'TRAVO','CALIBRATION'=>'CALIBRATION'], ['prompt'=>'- Select -']) ?>
        <?= $form->field($model, 'Petrolab_PIC', ['template' => '
			   <div class="col-sm-4">{label}</div>
			   <div class="col-sm-8">
			        {input}
			   </div>'])->textInput(['readonly' => true, 'value' => Yii::$app->user->identity->username])->label('Petrolab PIC') ?>
        <?= $form->field($model, 'Attachment_File', ['template' => '
			   <div class="col-sm-4">{label}</div>
			   <div class="col-sm-8">
			       <div class="input-group col-sm-5 ">
			          {input}
			       </div>
			   </div>']) ->fileInput()?>
		<?php 
			echo '<div class="form-group field-quotationform-quotation_date required">
				  <div class="col-sm-4">
				      	<label class="col-lg-12 control-label" for="quotationform-quotation_date">
				      		List Package Quotation
				      	</label>
				  </div>
				  <div class="col-sm-8 list_package">
				 		<ul class="todo-list m-t ui-sortable">
                        	<div class="well">
                        		Please, Select and Add Package.
                        	</div>
                        </ul>
				  </div>
				  </div>
			';
		?>
        <div class="form-group">
            <div class="col-lg-offset-4 col-lg-11">
            <?= Html::Button('Save', ['class' => 'btn btn-primary save-qotation', 'name' => 'save-button']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-default', 'name' => 'reset-button']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>

<!-- CHILD Quotation -->
<div class="col-md-6">
	<h4>Select & Add Packages</h4>
	<hr/>
	<div class="status"></div>
	<div class="form-horizontal">
        <?= $form->field($model, 'Package_Name', ['template' => '
			   	<div class="col-sm-4">{label}</div>
			   	<div class="col-sm-8">
			       <div class="col-sm-10 ">
			          {input}
			   	</div>
		       	</div>
			    '])->dropDownList($model->getPackage(), ['prompt'=>'- Select -']); ?>
        <?= $form->field($model, 'Laboratory_Service_Description', ['template' => '
			   	<div class="col-sm-4">{label}</div>
			   	<div class="col-sm-8">
			       <div class="col-sm-10 ">
			          {input}
			   	</div>
		       	</div>
			    '])->textarea(['rows' => 3]); ?>
        <?= $form->field($model, 'Temporary_Lab_Number', ['template' => '
			   	<div class="col-sm-4">{label}</div>
			   	<div class="col-sm-8">
			       <div class="col-sm-10 ">
			          {input}
			   	</div>
		       	</div>
			    '])->textInput(); ?>
		<?= $form->field($model, 'Sales_Price', ['template' => '
			   	<div class="col-sm-4">{label}</div>
			   	<div class="col-sm-8">
			       <div class="col-sm-10 ">
			          {input}
			   	</div>
		       	</div>
			    '])->textInput(['type' => 'number','value' => '0']); ?>
		<?= $form->field($model, 'Sales_Quantity', ['template' => '
			   	<div class="col-sm-4">{label}</div>
			   	<div class="col-sm-8">
			       <div class="col-sm-10 ">
			          {input}
			   	</div>
		       	</div>
			    '])->textInput(['value' => '0']); ?>
		<?= $form->field($model, 'Discount', ['template' => '
			   	<div class="col-sm-4">{label}</div>
			   	<div class="col-sm-8">
			       <div class="col-sm-10 ">
			          {input}
			   	</div>
		       	</div>
			    '])->textInput(['value' => '0']); ?>
		<?= $form->field($model, 'Price_Discount', ['template' => '
			   	<div class="col-sm-4">{label}</div>
			   	<div class="col-sm-8">
			       <div class="col-sm-10 ">
			          {input}
			   	</div>
		       	</div>
			    '])->textInput(['value' => '0']); ?>
		<?= $form->field($model, 'Notes', ['template' => '
			   	<div class="col-sm-4">{label}</div>
			   	<div class="col-sm-8">
			       <div class="col-sm-10 ">
			          {input}
			   	</div>
		       	</div>
			    '])->textarea(['rows' => 2]); ?>
        <div class="form-group">
            <div class="col-lg-offset-4 col-lg-5">
            &nbsp;&nbsp;&nbsp;
            <?= Html::submitButton('Add', ['class' => 'btn btn-primary save-package', 'name' => 'contact-button']) ?>
            <?= Html::Button('Remove', ['class' => 'btn btn-danger close_package', 'name' => 'contact-button']) ?>
           	<?= Html::resetButton('Reset', ['class' => 'btn btn-default', 'name' => 'reset-button']) ?>
            </div>
        </div>
    </div>
</div>

