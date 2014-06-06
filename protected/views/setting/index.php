<div>
	<h1>Site Setting</h1>
	<?php
$form = $this->beginWidget('CActiveForm', array(
	'id' => 'add_page',
	'enableClientValidation' => true,
	'enableAjaxValidation' => false, //turn on ajax validation on the client side
	'clientOptions' => array(
		'validateOnSubmit' => true,
	),
	'htmlOptions' => array(
		'enctype' => 'multipart/form-data',
	),
		));
?>
  <fieldset>
    <legend>Enter information below</legend>
    <strong>  Web Site Name:</strong> <?php echo $form->textField($model,'name');?><br>
	<strong>  Contact Email:</strong> <?php echo $form->textField($model,'email');?><br>
	<strong>  Google Analytics:</strong> <?php echo $form->textArea($model,'google_analytic',array('rows'=>'10','cols'=>'80'));?><br>
    <?php echo CHtml::submitButton('Update Setting', array('class' => '')); ?>
  </fieldset>
<?php $this->endWidget(); ?>
</div>