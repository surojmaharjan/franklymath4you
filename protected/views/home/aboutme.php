<?php
$tab_data['active_tab'] = 6;
$this->renderPartial('//blocks/header_menu', $tab_data);

?>

<div class="main-container-wrapper">
   <div class="main-container col1-layout about">
      <div class="main">
         <div class="col-main">
            <div class="block block-works">
               <div class="block-title">
                  <h1>ABOUT ME</h1>
               </div>
               <div class="block-content" style="font-weight:bold;">
                  <ol>
                     <li><span style="font-weight:bold;">I am a New York State certified secondary math teacher. I hold three teaching certifications. </span></li>
                     <li><span class="number">1)</span><span style="font-weight:bold;">Secondary mathematics grades 7 - 12</span> </li>
                     <li><span class="number">2)</span><span style="font-weight:bold;">Secondary mathematics grades 5 - 9</span> </li>
                     <li><span class="number">3)</span><span style="font-weight:bold;">General middle school education grades 5 - 9</span> </li>
                  </ol>
               </div>
            </div>
            <div class="block-question box">
               <div class="block-content">
                  <div class="form-container-wrapper">
                     <div class="form-container">
                        <form action="#">
                           <p><a href="<?php echo Yii::app()->request->baseUrl; ?>/AskHomework" class="buttonlink">Ask a Homework Question Now!</a></p>
                           <p class="last"><a href="<?php echo Yii::app()->request->baseUrl; ?>/PracticeExam" class="buttonlink">Request a Practice Exam Now!</a></p>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <div class="block block-method" style="text-align:justify;">
               <div class="block-content"> <strong>I received a B.A. from Cornell University where I spent two years studying civil engineering before graduating with a degree in Science and Technology.  I  went on to receive a M.S. from NYU in Real Estate Development and Finance.  After working in real estate for two years, where I spent the majority of that time managing two multi-million dollar ground up developments, I decided to go back to school to become a teacher.  I received an M.S.Ed. from Bank Street College of Education and taught at the Ethical Culture Fieldston School and The School at Columbia University before moving into my current position at the Horace Mann School. While the majority of my classroom experience has been in the middle grades, 6 – 8, the students in my private tutoring practice have ranged from 1st grade to 12th grade.</strong>
                  <strong>I began tutoring as soon as I matriculated at Bank Street.  Since then I have worked with upwards of 50 students ranging in topics from simple addition to trigonometry/precalculus and SAT prep.  The majority of my tutees attend private school in Manhattan or Riverdale and therefore I have significant experience with the curriculum at a vast number of schools in the area.  </strong>
                  <strong>I love teaching math and pride myself on knowing multiple ways to solve any given problem.  Unfortunately schools today usually only have time to teach one way to solve a problem.  While the majority of students may understand this method, there will always be those who see things differently and therefore need tools for a different approach.  I am constantly learning new methods and implementing new tools in order to provide my students with explanations that work for them.  Please feel free to contact me for additional information on my background and qualifications.</strong>
               </div>
            </div>
         </div>
         <!-- end col-main --> 
      </div>
   </div>
</div>
