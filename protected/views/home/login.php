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
<?php
$tab_data['active_tab'] = 0;
$this->renderPartial('//blocks/header_menu', $tab_data);

?>
<div class="main-container-wrapper">
   <div class="main-container">
      <div class="main">
         <div class="page-title block-title">
                  <h1>Login Now:</h1>
               </div>
         <div class="col-main">
            <div class="login">
               <div class="block block-question">
                  <div class="block-content">
                     <div class="form-container-wrapper">
                        <div class="form-container">
                           <?php
                           $form = $this->beginWidget('CActiveForm', array(
                               'id'                     => 'login_form',
                               'enableClientValidation' => true,
                               'enableAjaxValidation'   => false, //turn on ajax validation on the client side
                               'clientOptions'          => array(
                                   'validateOnSubmit' => true,
                               ),
                               'htmlOptions'      => array(
                                   'onsubmit'   => '$("#login_form").validate();',
                                   'onkeypress' => " if(event.keyCode == 13){ $('#login_form').submit(); } "
                               ),
                                   ));

                           ?>
                           <div class="error-message">
                              <?php if (isset($fail_msg)) {
                              echo '<label id="error_msg" class="error">' . $fail_msg . '</label>';
                           } ?>
                           	<label class="error" generated="true" for="RegisterUsers_email" style="display:none">Enter email.</label>
                              <label for="RegisterUsers_password" generated="true" class="error" style="display:none; margin-bottom:0">Password Required</label>
                           </div>
                           <p>
                              <label for="#">Email:<span>*</span></label>
                              <span class="text-wrapper">
                                 <?php
                                 echo $form->textField($registerUser, 'email', array('class'     => 'required', 'maxlength' => '100', 'onclick'=>"$('#error_msg').css('display','none');"));

                                 ?>
                              </span>
                           </p>
                           <p>
                              <label for="#">Password:<span>*</span></label>
                              <span class="text-wrapper">
                                 <?php
                                 echo $form->passwordField($registerUser, 'password', array('class'     => 'required', 'maxlength' => '32', 'autocomplete'=>"off"));

                                 ?>
                              </span>
                              
                           </p>
                           <p style="width: 350px;">
                              <?php echo CHtml::submitButton('submit', array('value' => 'Log In')); ?>
                           </p>
                           <?php $this->endWidget(); ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end col-main --> 
      </div>
   </div>
</div>