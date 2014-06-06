<div>
	<a href="<?php echo Yii::app()->request->baseurl;?>/page">View</a>||
	<a href="<?php echo Yii::app()->request->baseurl;?>/page/add">Add</a>||
	<!--<a href="<?php echo Yii::app()->request->baseurl;?>/page/edit">Edit</a>-->
</div>
<div>
	<h1>Add Page</h1>
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
    <strong>  Page Name:</strong> <?php echo $form->textField($model,'name');?><br>
	<strong>  Content:</strong> <?php echo $form->textArea($model,'content',array('rows'=>'20','cols'=>'80'));?><br>
    <?php echo CHtml::submitButton('Add Page', array('class' => '')); ?>
  </fieldset>
<?php $this->endWidget(); ?>
</div>