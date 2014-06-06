<?php
$script = Yii::app()->clientScript;
$script->registerScriptFile(Yii::app()->request->baseUrl . '/media/js/jquery.js');
$script->registerScriptFile(Yii::app()->request->baseUrl . '/media/js/form_validater.js');

?>
<script type="text/javascript">
   $(document).ready(function(){
      $form_validater.set_student_login_rules();
   });
</script>
<div class="admin-setting">
   <h1>Web Site Setting:</h1>
   <?php
   if (isset($success_msg)) {
      echo '<p class="success">' . $success_msg . '</p>';
   }
   else if (isset($fail_msg)) {
      echo '<p class="error">' . $fail_msg . '</p>';
   }

   $form = $this->beginWidget('CActiveForm', array(
       'id'                     => 'admin_setting_form',
       'enableClientValidation' => true,
       'enableAjaxValidation'   => false, //turn on ajax validation on the client side
       'clientOptions'          => array(
           'validateOnSubmit' => true,
       ),
       'htmlOptions'      => array(
           'onsubmit'   => '$("#admin_setting_form").validate();',
           'onkeypress' => " if(event.keyCode == 13){ $('#admin_setting_form').submit(); } "
       ),
           ));

   ?>
   <fieldset>
    <legend>Enter information below</legend>
   <p>
      <label for="#">Name:<span>*</span></label>
      <span class="text-wrapper">
         <?php
         echo $form->textField($WebsiteSetting, 'name', array('class'     => 'required', 'maxlength' => '30'));

         ?>
      </span>
      <label for="WebsiteSetting_name" generated="true" class="error" style="display: none;"></label>
   </p>
   <p>
      <label for="#">Email:<span>*</span></label>
      <span class="text-wrapper">
         <?php
         echo $form->textField($WebsiteSetting, 'email', array('class'     => 'required', 'maxlength' => '225'));

         ?>
      </span>
      <label for="WebsiteSetting_email" generated="true" class="error" style="display: none;"></label>
   </p>
   <p>
      <label for="#">Paypal username:<span>*</span></label>
      <span class="text-wrapper">
         <?php
         echo $form->textField($WebsiteSetting, 'paypal_username', array('class'     => 'required', 'maxlength' => '225'));

         ?>
      </span>
      <label for="WebsiteSetting_paypal_username" generated="true" class="error" style="display: none;"></label>
   </p>
   <p>
      <label for="#">Paypal password:<span>*</span></label>
      <span class="text-wrapper">
         <?php
         echo $form->textField($WebsiteSetting, 'paypal_password', array('class'     => 'required', 'maxlength' => '225'));

         ?>
      </span>
      <label for="WebsiteSetting_paypal_password" generated="true" class="error" style="display: none;"></label>
   </p>
   <p>
      <label for="#">Paypal Signature:<span>*</span></label>
      <span class="text-wrapper">
         <?php
         echo $form->textField($WebsiteSetting, 'paypal_signature', array('class'     => 'required', 'maxlength' => '225'));

         ?>
      </span>
      <label for="WebsiteSetting_paypal_signature" generated="true" class="error" style="display: none;"></label>
   </p>
   <p>
      <label for="#">Paypal mode:<span>*</span></label>
      <?php
      $data = array('0' => 'test mode', '1' => 'live mode');
      echo $form->dropDownList($WebsiteSetting, 'apiLive', $data, array('class' => 'required', 'style' => 'width:150px;'));

      ?>
   </p>
   <p>
      <label for="#">Add Scripts:<span>*</span></label>
      <span class="textarea-wrapper">
         <?php
         echo $form->textArea($WebsiteSetting, 'google_analytic', array(
             'placeholder' => "Add script such as google analytics code."));

         ?>
      </span>
   </p>
   <p>
   <label>&nbsp;</label>
   <?php echo CHtml::submitButton('submit', array('value' => 'Update')); ?>
   </p>
   </fieldset>
<?php $this->endWidget(); ?>
</div>                     