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

<div class="alert alert-info">
	<center><a class="alert-link" href="#"><h4>This Application Under Development</h4></a>
	<label>1. Ketika melakukan Test pastikan Customer Name dan Sub Customer Name adalah Email ANDA. Hal ini Untuk Mengecek Apakah Email Terkirim atau tidak</label><br/>
	<label>2. Selamat Mencoba</label>
	</center>
</div>

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
			   '])->textInput(['autofocus' => true, 'value'=>"Q-".date("YmdHis").""]) ?>
			   <!-- Q-201607220119 -->
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
					  // '.date("Y-m-d").'
		?>
        <?= $form->field($model, 'Customer_Name',['template' => '
			   <div class="col-sm-4">{label}</div>
			   <div class="col-sm-8">
			        {input}
			   </div>'])->dropDownList($model->getCustomes(), ['prompt'=>'- Please Select -']) ?>
			    <!-- 'options'=>['ahmadluky@apps.ipb.ac.id'=>['Selected'=>true] -->
        <?= $form->field($model, 'Sub_Customer_Name',['template' => '
			   <div class="col-sm-4">{label}</div>
			   <div class="col-sm-8">
			        {input}
			   </div>'])->dropDownList($model->getCustomes(), ['prompt'=>'- Please Select -']) ?>
			   <!-- 'options'=>['ahmadluky@apps.ipb.ac.id'=>['Selected'=>true] -->
        <?= $form->field($model, 'Revision_Number', ['template' => '
			   <div class="col-sm-4">{label}</div>
			   <div class="col-sm-8">
			        {input}
			   </div>']) ?>
		<?= $form->field($model, 'Analysis_Time_Agreed', ['template' => '
			   <div class="col-sm-4">{label}</div>
			   <div class="col-sm-8">
			        {input}
			   </div>'])->dropDownList(['24'=>'24 Hours','48'=>'2 days','72'=>'3 days','336'=>'Up To 14 days'], ['prompt'=>'Please Select']) ?>
			   <!-- , 'options'=>['24'=>['Selected'=>true]] -->
        <?= $form->field($model, 'Sales_Department', ['template' => '
			   <div class="col-sm-4">{label}</div>
			   <div class="col-sm-8">
			        {input}
			   </div>'])->dropDownList(['LUBRICANT'=>'LUBRICANT','EVIRO'=>'EVIRO','TRAVO'=>'TRAVO','CALIBRATION'=>'CALIBRATION'], ['prompt'=>'- Select -']) ?>
			   <!-- , 'options'=>['EVIRO'=>['Selected'=>true]] -->
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
            <?= Html::Button('<span class="glyphicon glyphicon-floppy-disk"></span> Save', ['class' => 'btn btn-primary save-qotation', 'name' => 'save-button']) ?>
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
		<div class="form-group">
			<div class="col-sm-4">
				<label class="col-lg-12 control-label">&nbsp;</label>
			</div>
			<div class="col-sm-8">
				<div class="col-sm-12">
					<a data-toggle="modal" id="new_modal" href="#modal-form"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> New Package Name</button></a>
					<a id="sync" href="#"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-refresh"></span> Sycn</button></a>
				</div>
			</div>
		</div>
	    <?= $form->field($model, 'Package_Name', ['template' => '
			   	<div class="col-sm-4">{label}</div>
			   	<div class="col-sm-8">
			       	<div class="col-sm-12" id="package_sync">
			          {input}
			   		</div>
		       	</div>
			    '])->dropDownList($model->getPackage(), ['prompt'=>'- Please Select -']); ?>
        <?= $form->field($model, 'Laboratory_Service_Description', ['template' => '
			   	<div class="col-sm-4">{label}</div>
			   	<div class="col-sm-8">
			       <div class="col-sm-12 ">
			          {input}
			   	</div>
		       	</div>
			    '])->textarea(['rows' => 3]); ?>
        <?= $form->field($model, 'Temporary_Lab_Number', ['template' => '
			   	<div class="col-sm-4">{label}</div>
			   	<div class="col-sm-8">
			       <div class="col-sm-12">
			          {input}
			   	</div>
		       	</div>
			    '])->textInput(); ?>
		<div class="form-group">
			<div class="col-sm-4">
				<label class="col-lg-12 control-label">Urgent Analysis</label>
			</div>
			<div class="col-sm-8">
				<div class="col-sm-12">
                	<label> <input type="checkbox" class="i-checks" id="urgent"></label>
                </div>
			</div>
		</div>
		<?= $form->field($model, 'Sales_Price', ['template' => '
			   	<div class="col-sm-4">{label}</div>
			   	<div class="col-sm-8">
			       <div class="col-sm-12">
			          {input}
			   	</div>
		       	</div>
			    '])->textInput(['type' => 'text','value' => '0']); ?>
		<?= $form->field($model, 'Sales_Quantity', ['template' => '
			   	<div class="col-sm-4">{label}</div>
			   	<div class="col-sm-8">
			       <div class="col-sm-12">
			          {input}
			   	</div>
		       	</div>
			    '])->textInput(['value' => '0']); ?>
		<?= $form->field($model, 'Discount', ['template' => '
			   	<div class="col-sm-4">{label}</div>
			   	<div class="col-sm-8">
			       <div class="col-sm-12">
			          {input}
			   	</div>
		       	</div>
			    '])->textInput(['value' => '0']); ?>
		<?= $form->field($model, 'Price_Discount', ['template' => '
			   	<div class="col-sm-4">{label}</div>
			   	<div class="col-sm-8">
			       <div class="col-sm-12">
			          {input}
			   	</div>
		       	</div>
			    '])->textInput(['value' => '0']); ?>
		<?= $form->field($model, 'Notes', ['template' => '
			   	<div class="col-sm-4">{label}</div>
			   	<div class="col-sm-8">
			       <div class="col-sm-12">
			          {input}
			   	</div>
		       	</div>
			    '])->textarea(['rows' => 2]); ?>
        <div class="form-group">
            <div class="col-lg-offset-4 col-lg-5">
            &nbsp;&nbsp;&nbsp;
            <?= Html::submitButton('<span class="glyphicon glyphicon-plus"></span> Add', ['class' => 'btn btn-primary save-package', 'name' => 'contact-button']) ?>
           	<?= Html::resetButton('Reset', ['class' => 'btn btn-default', 'name' => 'reset-button']) ?>
            </div>
        </div>
    </div>
</div>

<div id="modal-form" class="modal fade in" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="myModalLabel">New Package Name</h4>
        </div>
		<div class="status_save"></div>
        <div class="modal-body">
        	<form id="form_new_package">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Package Name</label>
			    <input type="input" class="form-control" id="packages-package_name_new" name="Packages[Package_Name]" placeholder="Package Name" autofocus>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Short Package Name</label>
			    <input type="input" class="form-control" id="packages-short_package_name_new" name="Packages[Short_Package_Name]" placeholder="Short Package Name">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Description</label>
			    <textarea id="packages-description_new" class="form-control"  rows="6" name="Packages[Description]" placeholder="Description"></textarea>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Price</label>
			    <input type="input" class="form-control packages-price_new" id="packages-price_new" placeholder="Price" name="Packages[Price]">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Price Urgent Analisys</label>
			    <input type="input" class="form-control packages-price_urgent_new" id="packages-price_urgent_new" name="Packages[Price_2]" placeholder="Price Urgent Analisys">
			  </div>
			</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="save_package"><span class="glyphicon glyphicon-floppy-disk"></span> Save Package</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>