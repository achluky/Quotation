<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Button;
use yii\jui\DatePicker;

$this->title = 'Quotation';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-quotation">
    <h1><?= Html::encode($this->title) ?></h1>
        <hr/>

        <div class="row">

        	<!-- MASTER Quotation -->
        	<div class="col-md-6">
        		<?php $form = ActiveForm::begin(
            		[
            			'id' => 'login-form',
    					'options' => ['class' => 'form-horizontal ', 'enctype' => 'multipart/form-data'],
    					'fieldConfig' => [
				            'labelOptions' => ['class' => 'col-lg-12 control-label'],
				        ],
    				]
            	); 
                ?>
					<!-- {error}{hint} -->
                    <?= $form->field($model, 'Quotation_Number', ['template' => '
						   <div class="col-sm-4">{label}</div>
						   <div class="col-sm-8">
						       <div class="input-group col-sm-12 ">
						          <span class="input-group-addon">
						             <span class="glyphicon glyphicon-th"></span>
						          </span>
						          {input}
						       </div>
						   </div>
						   '])->textInput(['autofocus' => true, 'value'=>"Q-PETROLAB-".date("dmYims")]) ?>
                    <?= $form->field($model, 'Quotation_Date', ['template' => '
						   <div class="col-sm-4">{label}</div>
						   <div class="col-sm-8">
						       <div class="input-group col-sm-12 ">
						          <span class="input-group-addon">
						             <span class="glyphicon glyphicon-calendar"></span>
						          </span>
						          {input}
						       </div>
						   </div>'])
                    				// ->widget(\yii\jui\DatePicker::classname(), [
								    //'language' => 'ru',
								    //'dateFormat' => 'yyyy-MM-dd',
									// ]) 
							?>
                    <?= $form->field($model, 'Customer_Name',['template' => '
						   <div class="col-sm-4">{label}</div>
						   <div class="col-sm-8">
						       <div class="input-group col-sm-8 ">
						          <span class="input-group-addon">
						             <span class="glyphicon glyphicon-user"></span>
						          </span>
						          {input}
						       </div>
						   </div>'])->dropDownList($model->getCustomes(), ['prompt'=>'- Select -']) ?>
                    <?= $form->field($model, 'Sub_Customer_Name',['template' => '
						   <div class="col-sm-4">{label}</div>
						   <div class="col-sm-8">
						       <div class="input-group col-sm-8 ">
						          <span class="input-group-addon">
						             <span class="glyphicon glyphicon-user"></span>
						          </span>
						          {input}
						       </div>
						   </div>'])->dropDownList($model->getCustomes(), ['prompt'=>'- Select -']) ?>
                    <?= $form->field($model, 'Revision_Number', ['template' => '
						   <div class="col-sm-4">{label}</div>
						   <div class="col-sm-8">
						       <div class="input-group col-sm-5 ">
						          <span class="input-group-addon">
						             <span class="glyphicon glyphicon-th"></span>
						          </span>
						          {input}
						       </div>
						   </div>']) ?>
                    <?= $form->field($model, 'Analysis_Time_Agreed', ['template' => '
						   <div class="col-sm-4">{label}</div>
						   <div class="col-sm-8">
						       <div class="input-group col-sm-12 ">
						          <span class="input-group-addon">
						             <span class="glyphicon glyphicon-time"></span>
						          </span>
						          {input}
						       </div>
						   </div>']) ?>
                    <?= $form->field($model, 'Sales_Department', ['template' => '
						   <div class="col-sm-4">{label}</div>
						   <div class="col-sm-8">
						       <div class="input-group col-sm-5 ">
						          <span class="input-group-addon">
						             <span class="glyphicon glyphicon-book"></span>
						          </span>
						          {input}
						       </div>
						   </div>']) ?>
                    <?= $form->field($model, 'Petrolab_PIC', ['template' => '
						   <div class="col-sm-4">{label}</div>
						   <div class="col-sm-8">
						       <div class="input-group col-sm-12 ">
						          <span class="input-group-addon">
						             <span class="glyphicon glyphicon-info-sign"></span>
						          </span>
						          {input}
						       </div>
						   </div>'])->textInput(['readonly' => true, 'value' => Yii::$app->user->identity->username]) ?>
                    <?= $form->field($model, 'Attachment_File', ['template' => '
						   <div class="col-sm-4">{label}</div>
						   <div class="col-sm-8">
						       <div class="input-group col-sm-5 ">
						          {input}
						       </div>
						   </div>']) ->fileInput()?>
			        <div class="form-group">
			            <div class="col-lg-offset-4 col-lg-11">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                        <?= Html::resetButton('Reset', ['class' => 'btn btn-default', 'name' => 'reset-button']) ?>
                        </div>
                    </div>
                <?php ActiveForm::end(); ?>
        	</div>

        	<!-- CHILD Quotation -->
        	<div class="col-md-6">
        		<div class="breadcrumb list_package">
        			<p><b>List Package Quotation</b></p>
        		</div>
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
						    '])->textInput(); ?>
					<?= $form->field($model, 'Sales_Quantity', ['template' => '
						   	<div class="col-sm-4">{label}</div>
						   	<div class="col-sm-8">
						       <div class="col-sm-10 ">
						          {input}
						   	</div>
					       	</div>
						    '])->textInput(); ?>
					<?= $form->field($model, 'Notes', ['template' => '
						   	<div class="col-sm-4">{label}</div>
						   	<div class="col-sm-8">
						       <div class="col-sm-10 ">
						          {input}
						   	</div>
					       	</div>
						    '])->textarea(['rows' => 2]); ?>
		            <div class="form-group">
			            <div class="col-lg-offset-4 col-lg-4">
			            <?= Html::submitButton('Add', ['class' => 'btn btn-primary save-package', 'name' => 'contact-button']) ?>
			            <?= Html::resetButton('Reset', ['class' => 'btn btn-default', 'name' => 'reset-button']) ?>
		                </div>
		            </div>
	            </div>
        	</div>

        </div>
        <hr/>

        <h3 id="description">Description</h3>
        <table>
        		<td width="50%" valign="top">
			        <dl>
				      <dt>1. Quotation_Number</dt>
				      <dd>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi rutrum orci at dignissim fermentum. lacus vel aliquam. </dd>
				      <dt>2. Quotation_Date</dt>
				      <dd>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi rutrum orci at dignissim fermentum. Nullam vel vestibulum purus. er non lacus vel aliquam. </dd>
				      <dt>3. Customer_Name</dt>
				      <dd>Lorem ipsum dolorus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce ullamcorper non lacus vel aliquam. </dd>
				      <dt>4. Sub_Customer_Name</dt>
				      <dd>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi rutrum orci at dignissim fermentum. Nullam vel vestibulum purus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce ullamcorper non lacus vel aliquam. </dd>
				    </dl>
        		</td>
        		<td width="50%" valign="top">
        			<dl>
				      <dt>5. Revision_Number</dt>
				      <dd>Nullam vel vestibulum purus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce ullamcorper non lacus vel aliquam. </dd>
				      <dt>6. Analysis_Time_Agreed</dt>
				      <dd>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi rutrum orci at dignissim fermentum.fames ac turpis egestas. Fusce ullamcorper non lacus vel aliquam. </dd>
				      <dt>7. Sales_Department</dt>
				      <dd>ristique senectus et netus et malesuada fames ac turpis egestas. Fusce ullamcorper non lacus vel aliquam. </dd>
				      <dt>8. Petrolab_PIC</dt>
				      <dd>Lorem ipsum dolor sit amet, Fusce ullamcorper non lacus vel aliquam. </dd>
				      <dt>9. Attachment_File</dt>
				      <dd>Lorem ipsu ullamcorper non lacus vel aliquam. </dd>
				    </dl>
        		</td>
        </table>
</div>