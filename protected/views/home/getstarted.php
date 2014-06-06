<?php
   $tab_data['active_tab'] = 3;
   $this->renderPartial('//blocks/header_menu', $tab_data);
?>
<div class="main-container-wrapper">
   <div class="main-container col2-right-layout">
      <div class="main">
         <div class="col-main">
            <div class="block block-works">
               <div class="block-title">
                  <h1>GET STARTED</h1>
               </div>
               <div class="block-content">
                  <p>
                     There are two options for enrolling in this tutoring service.
                  </p>
               </div>
               <div class="block block-works">
                  <div class="block-content">
                  <h2><a href="<?php echo Yii::app()->request->baseUrl.'/register'?>">Option 1:  Unlimited monthly access ($160 per month)</a></h2>
                  <ol>
                     <li><span class="list-icon"></span><span>Unlimited homework questions answered 7 days a week</span></li>
                     <li><span class="list-icon"></span><span>Up to 2 personalized practice quizzes or exams, with graded feedback, each month
						 </span><span class="note">(Midterms and finals are each counted as two practice quizzes or exams)</span></li>
                  </ol>
                  <h2><a href="<?php echo Yii::app()->request->baseUrl.'/home'?>">Option 2:  Pay as you go</a></h2>
                  <ol>
                     <li><span class="list-icon"></span><span>$15 fee for each homework question asked</span></li>
                     <li><span class="list-icon"></span><span>$20 for each practice quiz (including scoring)</span> </li>
                     <li><span class="list-icon"></span><span>$30 for each practice test (including scoring)</span> </li>
                     <li><span class="list-icon"></span><span>$50 for each practice midterm or final (including scoring)</span> </li>
                  </ol>
               </div>
               </div>
            </div>
         </div>
         <!-- end col-main -->
      </div>
      <!-- end main -->
      <div class="col-right">
			<div class="block-question">
                  	<div class="block-content">
                      <div class="form-container-wrapper  mb-20">
                         <div class="form-container">
                         	<form action="#">
                                <p><a href="<?php echo Yii::app()->request->baseUrl;?>/AskHomework" class="buttonlink">Ask a Homework Question Now!</a></p>
                                <p class="last"><a href="<?php echo Yii::app()->request->baseUrl;?>/PracticeExam" class="buttonlink">Request a Practice Exam Now!</a></p>
                              </form>
                         </div>
						</div>
                        <div class="block-content">
                           <img alt="img" src="<?php echo Yii::app()->request->baseUrl; ?>/media/images/img-2.png">
                        </div>
                        </div>
                  </div>
         </div>
   </div>
</div>