<?php
   $tab_data['active_tab'] = 0;
   $this->renderPartial('//blocks/header_menu', $tab_data);

   $script = Yii::app()->clientScript;
   $script->registerScriptFile(Yii::app()->request->baseUrl . '/media/js/jquery.js');
   $script->registerScriptFile(Yii::app()->request->baseUrl . '/media/js/form_validater.js');
?>
<script type="text/javascript">
   $(document).ready(function(){
      $form_validater.set_register_form_rules();
   });
</script>

<div class="main-container-wrapper">
  <div class="main-container col1-layout">
    <div class="main">
      <div class="col-main">
        <div class="block block-method">
           <div class="block block-question">
   <div class="block-content">
      <h1>Edit User Information: </h1>
      <div class="form-container-wrapper">
         <div class="form-container" style="height: 430px;">
            <?php
            if (isset($success_msg)) {
               echo '<p class="success">' . $success_msg . '</p>';
            }
            else if (isset($fail_msg)) {
               echo '<p class="error_msg">' . $fail_msg . '</p>';
            }

            ?>
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
                    'onkeypress' => " if(event.keyCode == 13){ } "
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
               <label for="#">Phone Number:<span>*</span></label>
               <span class="text-wrapper">
                  <?php
                  echo $form->textField($registerUser, 'phone_num', array('class'     => 'required', 'maxlength' => '20'));

                  ?>
               </span>
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
            <p>
               <?php
                  $package = Common::getPackageInfo($registerUser->package_id);
               ?>
               <label for="#">Registered monthly package: </label> <span><?php echo $package['package_name']; ?></span>
            </p>
            <p>
               <label for="#">Payment for Package Date: </label> <span><?php echo $registerUser->payment_date; ?></span>
            </p>
            <p>
               <label for="#">Package status: </label> <span>
                  <?php 
                  if($registerUser->payment_status == 'payed'){
                     echo 'Active';
                  }
                  else if($registerUser->payment_status == 'not payed'){
                     echo 'Not payed <span style="margin-left: 50px;"><a href="'.Yii::app()->request->baseUrl.'/OrderPackage">Pay for monthly package</a></span>';
                  }
                  else{
                     echo 'Expired <span style="margin-left: 50px;"><a href="'.Yii::app()->request->baseUrl.'/OrderPackage">Pay for monthly package</a></span>';
                  }
                     
                  ?>
               </span>
            </p>
            
            <p>&nbsp;</p>
            <div style="width:500px;">
            <p>
            <?php echo CHtml::submitButton('submit', array('value' => 'UPDATE')); ?>
            </p>
            </div>
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
  </div>
</div>