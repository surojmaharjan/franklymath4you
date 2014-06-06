<?php 
   $script = Yii::app()->clientScript;
   $script->registerScriptFile(Yii::app()->request->baseUrl . '/media/js/jquery.js');
   $script->registerScriptFile(Yii::app()->request->baseUrl . '/media/js/form_validater.js');
?>
<script type="text/javascript">
   $(document).ready(function(){
      $form_validater.set_admin_login_rules();
   });
</script>
<?php
$tab_data['active_tab'] = 0;
$this->renderPartial('//blocks/header_menu', $tab_data);

?>
<div class="main-container-wrapper">
   <div class="main-container col2-right-layout">
      <div class="main">
         <div class="col-main">
            <div class="block block-works">
               <div class="block-title">
                  <h1>Adimn Login:</h1>
               </div>
               <div class="block block-question">
                  <div class="block-content">
                     <div class="form-container-wrapper">
                        <div class="form-container">
                           <?php
                           if (isset($success_msg)) {
                              echo '<p class="success">' . $success_msg . '</p>';
                           }
                           else if (isset($fail_msg)) {
                              echo '<p class="error">' . $fail_msg . '</p>';
                           } 
                           
                           $form = $this->beginWidget('CActiveForm', array(
                               'id'                     => 'admin_login_form',
                               'enableClientValidation' => true,
                               'enableAjaxValidation'   => false, //turn on ajax validation on the client side
                               'clientOptions'          => array(
                                   'validateOnSubmit' => true,
                               ),
                               'htmlOptions'      => array(
                                   'onsubmit'   => '$("#admin_login_form").validate();',
                                   'onkeypress' => " if(event.keyCode == 13){ $('#admin_login_form').submit(); } "
                               ),
                                   ));

                           ?>
                           <p>
                              <label for="#">Email:<span>*</span></label>
                              <span class="text-wrapper">
                                 <?php
                                 echo $form->textField($user, 'email', array('class'     => 'required', 'maxlength' => '100'));

                                 ?>
                              </span>
                              <label for="Users_email" generated="true" class="error" style="display: none;"></label>
                           </p>
                           <p>
                              <label for="#">Password:<span>*</span></label>
                              <span class="text-wrapper">
                                 <?php
                                 echo $form->passwordField($user, 'password', array('maxlength' => '32', 'autocomplete'=>"off"));

                                 ?>
                              </span>
                           </p>
                           <p>&nbsp;</p>
                           <p>
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
      <!-- end main -->
      <div class="col-right">
         <div class="block block-image">
            <div class="block-content">
            </div>
         </div>
      </div>
   </div>
</div>