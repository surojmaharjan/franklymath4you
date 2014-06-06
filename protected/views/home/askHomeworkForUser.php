<?php
$script = Yii::app()->clientScript;
$script->registerScriptFile(Yii::app()->request->baseUrl . '/media/js/jquery.js');
$script->registerScriptFile(Yii::app()->request->baseUrl . '/media/js/form_validater.js');

?>
<script type="text/javascript">
   $(document).ready(function(){
      $form_validater.set_ask_question_form_rules();
   });
</script>
<?php
$tab_data['active_tab'] = 0;
$this->renderPartial('//blocks/header_menu', $tab_data);

?>
<div class="main-container-wrapper">
   <div class="main-container col1-layout">
      <div class="main">
         <div class="col-main">
            <div class="block block-question ask">
               <div class="block-title">
                  <h2>Request a Practice Exam Now!</h2>
                  <!--<p>if you are a monthly subscriber please log in before submitting your question to avoid being charged.</p>-->
               </div>
               <div class="block-content">
                  <div class="form-container-wrapper">
                     <div class="form-container">
                        <h2>Ask Your Homework Question Now!</h2>
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
                            'id'                     => 'ask_question_form',
                            'enableClientValidation' => true,
                            'enableAjaxValidation'   => false, //turn on ajax validation on the client side
                            'clientOptions'          => array(
                                'validateOnSubmit' => true,
                            ),
                            'htmlOptions'      => array(
                                'onsubmit'   => '$("#ask_question_form").validate();',
                                'enctype'    => 'multipart/form-data',
                                'onkeypress' => " if(event.keyCode == 13){ } "
                            ),
                                ));

                        ?>

                        <p>
                           <label for="#">Question:<span>*</span></label>
                           <span class="textarea-wrapper">
                              <?php
                              //echo $form->t($question, 'course', array('class' => 'required'));
                              echo $form->textArea($HomeworkQuestions, 'question', array(
                                  'class'       => 'required',
                                  'placeholder' => "Type your homework question here or upload a picture or pdf of your question.  Please make sure you include all directions given in the assignment:"));

                              ?>
                           </span>
                           <label for="HomeworkQuestions_question" generated="true" class="error" style="display: none;"></label>
                        </p>
                        <p>
                           <label>&nbsp;  </label>
                           <?php
                           echo $form->fileField($AttachedFiles, 'file_name', array('size' => '10', 'name' => 'AttachedFiles[]'));

                           ?>
                        </p>
                        <p>
                        <?php echo CHtml::submitButton('submit', array('value' => 'SUBMIT')); ?>
                        </p>
                        <p><span class="italic">*Please note that with few exceptions I will not 
                              answer the exact question sent to me.  When I receive a homework question 
                              from a student, I will write and solve a different problem that uses the 
                              same process that is needed for the one sent to me.  This provides the 
                              student with a model of how to solve the problem without eliminating the 
                              opportunity for them to do so on their own. </span>
                        </p>
                        <?php $this->endWidget(); ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>