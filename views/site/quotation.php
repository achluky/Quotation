<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Button;

$this->title = 'Quotation';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-quotation">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>

        <p>
            Note that if you turn on the Yii debugger, you should be able
            to view the mail message on the mail panel of the debugger.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else: ?>

        <p>
            If you have business inquiries or other questions, please fill out the following form to contact us.
            Thank you.
        </p>
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
						   '])->textInput(['autofocus' => true]) ?>
                    <?= $form->field($model, 'Quotation_Date', ['template' => '
						   <div class="col-sm-4">{label}</div>
						   <div class="col-sm-8">
						       <div class="input-group col-sm-12 ">
						          <span class="input-group-addon">
						             <span class="glyphicon glyphicon-calendar"></span>
						          </span>
						          {input}
						       </div>
						   </div>'])->textInput(['data-default' => '']) ?>
                    <?= $form->field($model, 'Customer_Name',['template' => '
						   <div class="col-sm-4">{label}</div>
						   <div class="col-sm-8">
						       <div class="input-group col-sm-5 ">
						          <span class="input-group-addon">
						             <span class="glyphicon glyphicon-user"></span>
						          </span>
						          {input}
						       </div>
						   </div>']) ?>
                    <?= $form->field($model, 'Sub_Customer_Name',['template' => '
						   <div class="col-sm-4">{label}</div>
						   <div class="col-sm-8">
						       <div class="input-group col-sm-5 ">
						          <span class="input-group-addon">
						             <span class="glyphicon glyphicon-user"></span>
						          </span>
						          {input}
						       </div>
						   </div>']) ?>
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
                    <?= $form->field($model, 'Analysis_Time_Agr', ['template' => '
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
						          <span class="input-group-addon">
						             <span class="glyphicon glyphicon-file"></span>
						          </span>
						          {input}
						       </div>
						   </div>']) ?>
			        <div class="form-group">
			            <div class="col-lg-offset-4 col-lg-11">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                        <?= Html::resetButton('Reset', ['class' => 'btn btn-default', 'name' => 'reset-button']) ?>
                        </div>
                    </div>
                <?php ActiveForm::end(); ?>
        	</div>

        	<!-- CHILD Quotation -->
        	<div class="dynamicPackage"></div>
        	<div class="col-md-6">
        	<?php $form = ActiveForm::begin(
        		[
        			'id' => 'login-form',
					'options' => ['class' => 'form-horizontal bs-example bs-example-form', 'enctype' => 'multipart/form-data'],
					'fieldConfig' => [
			            'labelOptions' => ['class' => 'col-lg-12 control-label'],
			        ],
				]
        	); 
            ?>
            <?= $form->field($model, 'Package_Name', ['template' => '
				   	<div class="col-sm-4">{label}</div>
				   	<div class="col-sm-8">
				       <div class="input-group col-sm-10 ">
				          <span class="input-group-addon">
				             <span class="glyphicon glyphicon-th-large"></span>
				          </span>
				          {input}
				   	</div>
			       	</div>
				    '])->dropDownList($model->getPackage(), ['prompt'=>'- Select -']); ?>
            <?= $form->field($model, 'Laboratory_Service_Description', ['template' => '
				   	<div class="col-sm-4">{label}</div>
				   	<div class="col-sm-8">
				       <div class="input-group col-sm-10 ">
				          <span class="input-group-addon">
				             <span class="glyphicon glyphicon-th-large"></span>
				          </span>
				          {input}
				   	</div>
			       	</div>
				    '])->textarea(['rows' => 3]); ?>
            <?= $form->field($model, 'Temporary_Lab_Number', ['template' => '
				   	<div class="col-sm-4">{label}</div>
				   	<div class="col-sm-8">
				       <div class="input-group col-sm-10 ">
				          <span class="input-group-addon">
				             <span class="glyphicon glyphicon-th-large"></span>
				          </span>
				          {input}
				   	</div>
			       	</div>
				    '])->textInput(); ?>
			<?= $form->field($model, 'Sales_Price', ['template' => '
				   	<div class="col-sm-4">{label}</div>
				   	<div class="col-sm-8">
				       <div class="input-group col-sm-10 ">
				          <span class="input-group-addon">
				             <span class="glyphicon glyphicon-th-large"></span>
				          </span>
				          {input}
				   	</div>
			       	</div>
				    '])->textInput(); ?>
			<?= $form->field($model, 'Sales_Quantity', ['template' => '
				   	<div class="col-sm-4">{label}</div>
				   	<div class="col-sm-8">
				       <div class="input-group col-sm-10 ">
				          <span class="input-group-addon">
				             <span class="glyphicon glyphicon-th-large"></span>
				          </span>
				          {input}
				   	</div>
			       	</div>
				    '])->textInput(); ?>
			<?= $form->field($model, 'Notes', ['template' => '
				   	<div class="col-sm-4">{label}</div>
				   	<div class="col-sm-8">
				       <div class="input-group col-sm-10 ">
				          <span class="input-group-addon">
				             <span class="glyphicon glyphicon-th-large"></span>
				          </span>
				          {input}
				   	</div>
			       	</div>
				    '])->textarea(['rows' => 2]); ?>
            <?php ActiveForm::end(); ?>

	        <div class="form-group">
	            <div class="col-lg-offset-4 col-lg-4">
	                <?= Html::submitButton('Add', ['class' => 'btn btn-primary btnadd', 'name' => 'contact-button']) ?>
	                <?= Html::resetButton('Reset', ['class' => 'btn btn-default', 'name' => 'reset-button']) ?>
                </div>
            </div>


            <?php 
            $this->registerJs(''
            	. '$(".btnadd").on("click",function(){'
				. 	'$(".dynamicPackage").append(\''
				. 		'<div class="col-sm-4">&nbsp;</div>'
				. 		'<div class="col-sm-8">'
			    . 		'</div>'
			    . 	'\');'
				. '})');
			?>
        	</div>

        	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
			      </div>
			      <div class="modal-body">
			        <form>
			          <div class="form-group">
			            <label for="recipient-name" class="control-label">ID Package:</label>
			            <input type="text" class="form-control" id="id-Package">
			          </div>
			          <div class="form-group">
			            <label for="message-text" class="control-label">Package Name:</label>
			            <input type="text" class="form-control" id="Package_Name" name="Package_Name">
			          </div>
			          <div class="form-group">
			            <label for="message-text" class="control-label">Short Package Name:</label>
			            <input type="text" class="form-control" id="Short_Package_Name" name="Short_Package_Name">
			          </div>
			          <div class="form-group">
			            <label for="message-text" class="control-label">Price:</label>
			            <input type="text" class="form-control" id="Price" name="Price">
			          </div>
			          <div class="form-group">
			            <label for="message-text" class="control-label">Description:</label>
			            <textarea class="form-control" id="Description" name="Description"></textarea>
			          </div>
			        </form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary save-package">Save Package</button>
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
    <?php endif; ?>
</div>