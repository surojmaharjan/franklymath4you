<div >
	<h1>Edit Profile</h1>
     <div class="admin-setting">
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
    <p>
      <label for="#">User Name:<span>*</span></label>
      <span class="text-wrapper">
         <?php echo $form->textField($model,'user_name');?>
      </span>
   </p>
   <p>
      <label for="#">First Name:<span>*</span></label>
      <span class="text-wrapper">
         <?php echo $form->textField($model,'first_name');?>
      </span>
   </p>
   <p>
      <label for="#">Last Name:<span>*</span></label>
      <span class="text-wrapper">
         <?php echo $form->textField($model,'last_name');?>
      </span>
   </p>
   <p>
      <label for="#">Email:<span>*</span></label>
      <span class="text-wrapper">
        <?php echo $form->textField($model,'email');?>
      </span>
   </p>
    <p>
      <label for="#">Street:<span>*</span></label>
      <span class="text-wrapper">
        <?php echo $form->textField($model,'street');?>
      </span>
   </p>
   <p>
      <label for="#">City:<span>*</span></label>
      <span class="text-wrapper">
        <?php echo $form->textField($model,'city');?>
      </span>
   </p>
   <p>
      <label for="#">State:<span>*</span></label>
      <span class="text-wrapper">
        <?php echo $form->textField($model,'state');?>
      </span>
   </p>
   <p>
      <label for="#">Phone Number:<span>*</span></label>
      <span class="text-wrapper">
        <?php echo $form->textField($model,'phone');?>
      </span>
   </p>
	<p>
      <label>&nbsp;</label>
    <?php echo CHtml::submitButton('Edit Profile', array('class' => '')); ?>
  </p>
  </fieldset>
    
<?php $this->endWidget(); ?>
         </div>
</div>