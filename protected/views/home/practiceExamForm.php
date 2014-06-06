<?php
$script = Yii::app()->clientScript;
$script->registerScriptFile(Yii::app()->request->baseUrl . '/media/js/jquery.js');
$script->registerScriptFile(Yii::app()->request->baseUrl . '/media/js/form_validater.js');

?>
<script type="text/javascript">
   $(document).ready(function(){
      $form_validater.set_practice_exam_form_rules();
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
                  <h2>Request a Practice Exam Now!</h2>
                  <p>If you are already a registered member of the site do not request a practice exam below. Please <a href="<?php echo Yii::app()->request->baseUrl?>/login">sign in</a> to ask your homework question or request a practice exam.</p>
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
                            'id'                     => 'PracticeExamRequest_form',
                            'enableClientValidation' => true,
                            'enableAjaxValidation'   => false, //turn on ajax validation on the client side
                            'clientOptions'          => array(
                                'validateOnSubmit' => true,
                            ),
                            'htmlOptions'      => array(
                                'onsubmit'   => '$("#PracticeExamRequest_form").validate();',
                                'enctype'    => 'multipart/form-data',
                                'onkeypress' => " if(event.keyCode == 13){ } "
                            ),
                                ));

                        ?>
                        <p>
                           <label for="#">Name:<span>*</span></label>
                           <span class="text-wrapper">
                              <?php
                              echo $form->textField($PracticeExamRequest, 'name', array('class'     => 'required', 'maxlength' => '32'));

                              ?>
                           </span>
                           <label class="error" generated="true" for="PracticeExamRequest_name" style="display: none;"></label>
                        </p>
                        <p>
                           <label for="#">Email:<span>*</span></label>
                           <span class="text-wrapper">
                              <?php
                              echo $form->textField($PracticeExamRequest, 'email', array('class'     => 'required', 'maxlength' => '100'));

                              ?>
                           </span>
                           <label for="PracticeExamRequest_email" generated="true" class="error" style="display: none;"></label>
                        </p>
                        <p>
                           <label for="#">Phone Number:<span>*</span></label>
                           <span class="text-wrapper">
                              <?php
                              echo $form->textField($PracticeExamRequest, 'phone_num', array('class'     => 'required', 'maxlength' => '20'));

                              ?>
                           </span>
                           <label for="PracticeExamRequest_phone_num" generated="true" class="error" style="display: none;"></label>
                           <span class="note">(your phone number is requested in case there is a problem with the email address when sending feedback)</span>
                        </p>
                        <p>
                           <label for="#">Grade:<span>*</span></label>
                           <span class="text-wrapper">
                              <?php
                              echo $form->textField($PracticeExamRequest, 'grade', array('class'     => 'required', 'maxlength' => '15'));

                              ?>
                           </span>
                           <label for="PracticeExamRequest_grade" generated="true" class="error" style="display: none;"></label>
                        </p>
                        <p>
                           <label for="#">School:<span>*</span></label>
                           <span class="text-wrapper">
                              <?php
                              echo $form->textField($PracticeExamRequest, 'school', array('class' => 'required'));

                              ?>
                           </span>
                           <label for="PracticeExamRequest_school" generated="true" class="error" style="display: none;"></label>
                        </p>
                        <p>
                           <label for="#">Course:<span>*</span></label>
                           <span class="text-wrapper">
                              <?php
                              echo $form->textField($PracticeExamRequest, 'course', array('class' => 'required'));

                              ?>
                           </span>
                           <label for="PracticeExamRequest_course" generated="true" class="error" style="display: none;"></label>
                        </p>
                        <p>
                           <label for="#">Exam Type:<span>*</span></label>
                           <?php
                           $data = array('Quiz'    => 'Quiz', 'Test'    => 'Test', 'Midterm' => 'Midterm', 'Final'   => 'Final');
                           echo $form->dropDownList($PracticeExamRequest, 'exam_type', $data, array('class' => 'required', 'style' => 'width:150px;'));

                           ?>
                        </p>
                        <p>
                           <label for="#">Exam Date:<span>*</span></label>
                           <span class="text-wrapper">
                              <?php
                              echo $form->textField($PracticeExamRequest, 'exam_date', array('class' => 'required'));

                              ?>
                           </span>
                           <label for="PracticeExamRequest_exam_date" generated="true" class="error" style="display: none;"></label>
                        </p>
                        <p>
                           <label for="#">Exam topics:<span>*</span></label>
                           <span class="textarea-wrapper">
                              <?php
                              //echo $form->t($question, 'course', array('class' => 'required'));
                              echo $form->textArea($PracticeExamRequest, 'exam_topics', array(
                                  'class'       => 'required',
                                  'placeholder' => ""
                                      )
                              );

                              ?>
                           </span>
                           <label for="PracticeExamRequest_exam_topics" generated="true" class="error" style="display: none;"></label>
                        </p>
                        <p>
                           <label>&nbsp;</label>
                           <span class="upload-block">
                              <span class="upload-block-text"> In order to provide you with a practice exam that will most closely match your real exam you must submit as 
                                 much information as possible.  Things to include here: all topics on the exam, upload any review packet or homework 
                                 examples provided by your teacher, the name of your class textbook if you use one often, the name of your teacher 
                                 (I may have worked with students in his or her class before and therefore have an idea of the kind of exams given), 
                                 the length of the exam if known, etc.</span>
                              <span class="browse">
                                 <?php
                                 echo $form->fileField($AttachedFiles, 'file_name', array('size' => '10', 'name' => 'AttachedFiles[]'));
                                 echo $form->fileField($AttachedFiles, 'file_name', array('size' => '10', 'name' => 'AttachedFiles[]'));
                                 echo $form->fileField($AttachedFiles, 'file_name', array('size' => '10', 'name' => 'AttachedFiles[]'));

                                 ?>
                              </span>
                           </span>
                        </p>
                        <p>
                           <?php echo CHtml::submitButton('submit', array('value' => 'SUBMIT')); ?>
                        </p>
                        <p>
                           <span class="italic">
                              *In general: a quiz covers one topic (example: foiling binomials), 
                              a test covers multiple topics within the same unit (example: foiling 
                              binomials, factoring binomials, finding the lcm of trinomials, naming 
                              polynomials), a midterm covers multiple units that are usually related 
                              to each other (example: polynomials, foiling binomials, factoring quadratic 
                              equations, solving linear equations, exponent rules), a final covers all 
                              topics / units from the year.  If you select "quiz" in the form but then 
                              submit multiple topics your practice quiz will only contain one of these 
                              topics so please make sure you select the correct option.
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