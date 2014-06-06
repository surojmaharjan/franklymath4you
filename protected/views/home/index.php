<?php
$tab_data['active_tab'] = 1;
$this->renderPartial('//blocks/header_menu', $tab_data);
?>
<div class="banner-container-wrapper">
   <div class="banner-container"><img alt="Math homework help" src="<?php echo Yii::app()->request->baseUrl; ?>/media/images/banner.png"></div>
</div>
<div class="main-container-wrapper home">
   <div class="main-container col1-layout">
      <div class="main">
         <div class="col-main">
            <div class="block block-welcome">
               <div class="block-title">
                  <h1><span itemprop="name">Frankly Math</span></h1>
               </div>
               <div class="block-content">
                  <ul>
                     <li>Homework help whenever you need it</li>
                     <li>Personalized practice exams</li>
                     <li>Access from anywhere</li>
                     <li>Expert tutoring for a fraction of the cost</li>
                     <li class="last">No appointment needed</li>
                  </ul>

                  <div class="block-question">
                  	<div class="block-content">
                      <div class="form-container-wrapper">
                         <div class="form-container">
                         	<form action="#">
                                <p><a href="<?php echo Yii::app()->request->baseUrl;?>/AskHomework" class="buttonlink">Ask a Homework Question Now!</a></p>
                                <p class="last"><a href="<?php echo Yii::app()->request->baseUrl;?>/PracticeExam" class="buttonlink">Request a Practice Exam Now!</a></p>
                              </form>
                         </div>
						</div>
                        </div>
                  </div>
				<div class="img-container"><img alt="Image 1" src="<?php echo Yii::app()->request->baseUrl; ?>/media/images/img-1.png"></div>
                  <ul class="text">
                     <li>If you are a student who is able to complete 80 to 90 percent of your math homework easily without assistance..if you typically get test scores between 80% and 95%.. if you know how to study but tend to have difficulty doing so on your own before a quiz or a test, or know that you need to study but have not figured out thte right way..if you want to be able to go into class each day having conquered the challenge problem assigned by your teacher the day before….. Frankly Math is the perfect solution for you.  Let me help you eliminate the stress of thinking you don’t know how.</li>
                    <!--  <a href="#">Get Started Now </a> --></ul>
               </div>
            </div>  
      </div>
      </div>
   </div>
</div>
