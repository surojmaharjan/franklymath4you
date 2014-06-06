<?php 
   $script = Yii::app()->clientScript;
   $script->registerScriptFile(Yii::app()->request->baseUrl . '/media/js/jquery.js');
   $script->registerScriptFile(Yii::app()->request->baseUrl . '/media/js/form_validater.js');
?>
<script type="text/javascript">
   $(document).ready(function(){
      $form_validater.set_register_form_rules();
   });
</script>
<div class="block block-question">
   <div class="block-content">
      <h1>Form for Registering</h1>
      <div class="form-container-wrapper">
         <div class="form-container" style="height: 790px;">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id'                     => 'register_form',
                'enableClientValidation' => true,
                'enableAjaxValidation'   => false, //turn on ajax validation on the client side
                'clientOptions'          => array(
                    'validateOnSubmit' => true,
                ),
                'htmlOptions'      => array(
                    'onsubmit'   => '$("#register_form").validate();',
                    'enctype'    => 'multipart/form-data',
                    'onkeypress' => " if(event.keyCode == 13){ $('#register_form').submit(); } "
                ),
                    ));

            ?>
            <p>
               <label for="#">Name:<span>*</span></label>
               <span class="text-wrapper">
                  <?php
                  echo $form->textField($registerUser, 'name', array('class'     => 'required', 'maxlength' => '32'));

                  ?>
               </span>
               <label class="error" generated="true" for="RegisterUsers_name" style="display: none;"></label>
            </p>
            <p>
               <label for="#">Email:<span>*</span></label>
               <span class="text-wrapper">
                  <?php
                  echo $form->textField($registerUser, 'email', array('class'     => 'required', 'maxlength' => '100'));

                  ?>
               </span>
               <label for="RegisterUsers_email" generated="true" class="error" style="display: none;"></label>
            </p>
            <p>
               <label for="#">Password:<span>*</span></label>
               <span class="text-wrapper">
                  <?php
                  echo $form->passwordField($registerUser, 'password', array('class'     => 'required', 'maxlength' => '32'));

                  ?>
               </span>
               <label class="error" generated="true" for="RegisterUsers_password" style="display: none;"></label>
            </p>
            <p>
               <label for="#">Confirm Password:<span>*</span></label>
               <span class="text-wrapper">
                  <?php
                  echo $form->passwordField($registerUser, 'confirm_password', array('class'     => 'required', 'maxlength' => '32'));

                  ?>
               </span>
               <label class="error" generated="true" for="RegisterUsers_confirm_password" style="display: none;"></label>
            </p>
            <p>
               <label for="#">Phone Number:<span>*</span></label>
               <span class="text-wrapper">
                  <?php
                  echo $form->textField($registerUser, 'phone_num', array('class'     => 'required', 'maxlength' => '20'));

                  ?>
               </span>
              
               <span class="note register">(your phone number is requested in case there is a problem with the email address when sending feedback)</span>
                <label for="RegisterUsers_phone_num" generated="true" class="error" style="display: none;"></label>
            </p>
            <p>
               <label for="#">Grade:<span>*</span></label>
               <span class="text-wrapper">
                  <?php
                  echo $form->textField($registerUser, 'grade', array('class'     => 'required', 'maxlength' => '15'));

                  ?>
               </span>
               <label for="RegisterUsers_grade" generated="true" class="error" style="display: none;"></label>
            </p>
            <p>
               <label for="#">School:<span>*</span></label>
               <span class="text-wrapper">
               <?php
               echo $form->textField($registerUser, 'school', array('class' => 'required'));

               ?>
               </span>
               <label for="RegisterUsers_school" generated="true" class="error" style="display: none;"></label>
            </p>
            <p>
               <label for="#">Course:<span>*</span></label>
               <span class="text-wrapper">
               <?php
               echo $form->textField($registerUser, 'course', array('class' => 'required'));

               ?>
               </span>
               <label for="RegisterUsers_course" generated="true" class="error" style="display: none;"></label>
            </p>
            <p>
               <label for="#">Teacher Name:<span>*</span></label>
               <span class="text-wrapper">
               <?php
               echo $form->textField($registerUser, 'teacher_name');

               ?>
               </span>
               <label for="RegisterUsers_teacher_name" generated="true" class="error" style="display: none;"></label>
            </p>
            <p>
               <label for="#">Text Book:<span>*</span></label>
               <span class="text-wrapper">
               <?php
               echo $form->textField($registerUser, 'textbook');

               ?>
               </span>
               <label for="RegisterUsers_textbook" generated="true" class="error" style="display: none;"></label>
            </p>
            <p>
               <label for="#">How did you hear about the site:<span>*</span></label>
               <?php
               $data = array('friend' => 'friend', 'google search' => 'google search', 'teacher' => 'teacher', 'others' => 'others');
               echo $form->dropDownList($registerUser, 'how_hear', $data, array('class' => 'required', 'style'=>'width:150px;'));

               ?>
            </p>
            <h1 class="month">Monthly Package Options</h1>
            <p>
               <?php 
               $home_model = new home_model();
               $data_list = $home_model->get_packageList();
              // $data_list = array('1'=>'1 month &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $160', '4'=>'4 month &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $608 (Save 5%)', '7'=> '7 month &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $1,043 (Save 7%)', '9'=>'9 month &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $1,296 (Save 10%)');
               echo $form->radioButtonList($registerUser, 'package', $data_list); 
               ?> 
               <label for="RegisterUsers[package]" generated="true" class="error" style="display:none; margin-left: 0; width: 300px;">Select Package</label>
            </p>
                   
            <p style="width: 530px;">
            <?php echo CHtml::submitButton('submit', array('value' => 'SUBMIT')); ?>
            </p>
            <?php
            if (isset($success_msg)) {
               echo '<p class="message-thankyou">Thank you and you will receive an email from us shortly confirming your registration</p>';
            }
            else if (isset($fail_msg)) {
               echo '<p class="message-thankyou">' . $fail_msg . '</p>';
            }

            ?>
            
            <?php $this->endWidget(); ?>
            
         </div>
      </div>
   </div>
</div>