<?php
   $tab_data['active_tab'] = 2;
   $this->renderPartial('//blocks/header_menu', $tab_data);
?>
<div class="main-container-wrapper">
   <div class="main-container col2-right-layout">
      <div class="main">
         <div class="col-main">
            <div class="block block-works">
               <div class="block-title">
                  <h1>HOW IT WORKS</h1>
               </div>
               <div class="block-content">
                  <h2>Homework Help:</h2>
                  <ol>
                     <li><span class="number">1)</span><span>Student sends me the question that they are having difficulty answering.  </span></li>
                     <li><span class="number">2)</span><span>Within two hours * I send feedback on the problem.  Depending on the question posed,
                           students will receive either a written explanation with step-by-step instructions on how to
                           solve the problem** or a video file that contains a written and verbal explanation.  Since
                           this is still a personalized tutoring service, what comes back will depend on the student
                           and question involved.</span> </li>
                     <li><p  style="margin-left: 31px; font-size:15px; color:#000;">* This time frame applies to the hours between 7 am and 9 pm.  If you submit a question outside of those hours you may have to wait longer to receive feedback.</p></li>
                     <li><p  style="margin-left: 31px; font-size:15px; color:#000;">
                           ** Please note that with few exceptions I will not answer the exact question sent to me.  When I receive a homework question from a student, I will write and solve a different problem that uses the same process that is needed for the one sent to me.  This provides the student with a model of how to solve the problem without eliminating the opportunity for them to do so on their own.</p></li>
                     <li><span class="number">3)</span><span>There is no limit to the number of email exchanges so if the student still has questions    	          we will stay in contact until he or she understands.</span></li>
                  </ol>
               </div>
            </div>
            <div class="block block-works">
               <div class="block-content">
                  <h2>Practice Exams</h2>
                  <ol>
                     <li><span class="number">1)</span><span>Student sends me a list of topics as well as any review material or relevant handouts for an upcoming exam</span></li>
                     <li><span class="number">2)</span><span>Based on the information received as well as the homework questions the student and I have previously reviewed, I will write a practice exam.</span> </li>
                     <li><span class="number">3)</span><span>The student sends me back the exam when he or she completes it.</span></li>
                     <li><span class="number">4)</span><span>I grade the exam and recommend follow up depending on the students score.</span></li>
                     <li><span>a.&nbsp;&nbsp;&nbsp;&nbsp;If the student preforms well, we stop there.</span></li>
                     <li class="last"><span>b.&nbsp;&nbsp;&nbsp;&nbsp;If it is clear the student still has gaps in his or her understanding of the material, I will either recommend we sit down for a one hour in person tutoring session or send more practice material for the student to work on.  </span></li>
                  </ol>
               </div>
            </div>
            <div class="block block-works">
               <div class="block-content">
                  <h2>In Person Tutoring</h2>
                  <ol>
                     <li><span>On occasion I may recommend setting up a one hour in person tutoring session with a student.</span></li>
                  </ol>
               </div>
            </div>
         </div>
         <!-- end col-main -->
      </div>
      <!-- end main -->
      <div class="col-right">
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
      </div>
   </div>
</div>