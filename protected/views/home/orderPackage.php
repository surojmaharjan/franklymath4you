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
      <h1>Monthly Package: </h1>
      <div class="form-container-wrapper">
         <div class="form-container" style="height: 210px;">
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
            <h3 style="margin-bottom: 10px;">Subscribe for any one Monthly package.</h3>
            <p>
               <?php 
               $home_model = new home_model();
               $data_list = $home_model->get_packageList();
              // $data_list = array('1'=>'1 month &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $160', '4'=>'4 month &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $608 (Save 5%)', '7'=> '7 month &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $1,043 (Save 7%)', '9'=>'9 month &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $1,296 (Save 10%)');
               echo $form->radioButtonList($registerUser, 'package', $data_list); 
               ?>
               <label for="RegisterUsers[package]" generated="true" class="error" style="display:none; margin-left: 0;">Select Package</label>
            </p>
            <div style="width:530px;">
            <p>
            <?php echo CHtml::submitButton('submit', array('value' => 'GET NOW', 'style'=>'width:115px;')); ?>
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