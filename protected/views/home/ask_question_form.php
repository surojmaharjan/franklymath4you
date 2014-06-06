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
            <div class="block block-question">
               <div class="block-title">
                  <h2>Ask Your Homework Question Now ! </h2>
                  <p>If you are already a registered member of the site do not ask your homework question below. Please <a href="<?php echo Yii::app()->request->baseUrl?>/login">sign in</a> to ask your homework question or request a practice exam.</p>
               </div>
               <div class="block-content">
                  <div class="form-container-wrapper">
                     <div class="form-container">
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
                           <label for="#">Name:<span>*</span></label>
                           <span class="text-wrapper">
                              <?php
                              echo $form->textField($HomeworkQuestions, 'name', array('class'     => 'required', 'maxlength' => '32'));

                              ?>
                           </span>
                           <label class="error" generated="true" for="HomeworkQuestions_name" style="display: none;"></label>
                        </p>
                        <p>
                           <label for="#">Email:<span>*</span></label>
                           <span class="text-wrapper">
                              <?php
                              echo $form->textField($HomeworkQuestions, 'email', array('class'     => 'required', 'maxlength' => '100'));

                              ?>
                           </span>
                           <label for="HomeworkQuestions_email" generated="true" class="error" style="display: none;"></label>
                        </p>
                        <p>
                           <label for="#">Phone Number:<span>*</span></label>
                           <span class="text-wrapper">
                              <?php
                              echo $form->textField($HomeworkQuestions, 'phone_num', array('class'     => 'required', 'maxlength' => '20'));

                              ?>
                           </span>
                           <label for="HomeworkQuestions_phone_num" generated="true" class="error" style="display: none;"></label>
                           <span class="note">(your phone number is requested in case there is a problem with the email address when sending feedback)</span>
                        </p>
                        <p>
                           <label for="#">Grade:<span>*</span></label>
                           <span class="text-wrapper">
                              <?php
                              echo $form->textField($HomeworkQuestions, 'grade', array('class'     => 'required', 'maxlength' => '15'));

                              ?>
                           </span>
                           <label for="HomeworkQuestions_grade" generated="true" class="error" style="display: none;"></label>
                        </p>
                        <p>
                           <label for="#">School:<span>*</span></label>
                           <span class="text-wrapper">
                              <?php
                              echo $form->textField($HomeworkQuestions, 'school', array('class' => 'required'));

                              ?>
                           </span>
                           <label for="HomeworkQuestions_school" generated="true" class="error" style="display: none;"></label>
                        </p>
                        <p>
                           <label for="#">Course:<span>*</span></label>
                           <span class="text-wrapper">
                              <?php
                              echo $form->textField($HomeworkQuestions, 'course', array('class' => 'required'));

                              ?>
                           </span>
                           <label for="HomeworkQuestions_course" generated="true" class="error" style="display: none;"></label>
                        </p>
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
                           <label>&nbsp;</label>
                           <?php
                           echo $form->fileField($AttachedFiles, 'file_name', array('size' => '10', 'name' => 'AttachedFiles[]'));

                           ?>
                        </p>
                        <p>
                           <label for="#">How did you hear about the site:<span>*</span></label>
                           <?php
                           $data = array('teacher'       => 'teacher', 'friend'        => 'friend', 'google search' => 'google search', 'others'        => 'others');
                           echo $form->dropDownList($HomeworkQuestions, 'how_know', $data, array('class' => 'required', 'style' => 'width:150px;'));

                           ?>
                        </p>
                        <div style="width: 470px;">
                           <p>
                              <?php echo CHtml::submitButton('submit', array('value' => 'SUBMIT')); ?>
                           </p>
                        </div>
                        <p>
                           <span class="italic">
                              *Please note that with few exceptions I will not answer the exact question sent to me.  
                              When I receive a homework question from a student, I will write and solve a different 
                              problem that uses the same process that is needed for the one sent to me.  This 
                              provides the student with a model of how to solve the problem without eliminating 
                              the opportunity for them to do so on their own.
                           </span>
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