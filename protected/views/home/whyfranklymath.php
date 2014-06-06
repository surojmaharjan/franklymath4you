<?php
$tab_data['active_tab'] = 4;
$this->renderPartial('//blocks/header_menu', $tab_data);

?>
<div class="main-container-wrapper">
   <div class="main-container col1-layout about">
      <div class="main">
         <div class="col-main">
            <div class="block block-works forwhom">
               <div class="block-title">
                  <h1>Who is this method of tutoring for</h1>
               </div>
               <div class="block-content">
                  <strong>Generally speaking, there are three types of students who receive tutoring: </strong>
                  <ol>
                     <li><span class="list-icon  alpha-0"></span><span class="number">1)</span><span>Those in need of remediation</span> </li>
                     <li><span class="list-icon"></span><span class="number">2)</span><span>Those looking for a little extra homework help or a leg up in class</span> </li>
                     <li><span class="list-icon alpha-0"></span><span class="number">3)</span><span>Those who exceed the abilities of their classmates and are looking for enrichment.</span> </li>
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
            <div class="block block-method forwhom">
               <div class="block-content"> <strong>This service is ideal for students who fall into the second category listed above. Below is a description of the type of students that fall into each of the above categories.</strong>
                  <hr />
                  <ol>
                     <li><span class="list-icon  alpha-0"></span><span class="number">1)</span><span>Those in need of remediation</span> 
                        <p>Within this category I see two types of students:  those that take a little bit longer to comprehend new topics and therefore benefit from a one on one reteaching of a classroom lesson, and those who at some point in their math education fell behind on a topic and therefore have deficiencies in their math background that they need support with.  </p>
                     </li>
                     <li><span class="list-icon"></span><span class="number">2)</span><span>Those looking for a little extra homework help or a leg up in class</span>
                        <p>In my experience this is the most common type of student receiving tutoring in the tristate area.  These students are typically receiving a grade between a B and an A.  They are able to follow classroom lessons and can complete 8 out of 10 homework problems with minimal effort but often get confused on more challenging problems.  The benefit of  tutoring for these students is just as often about building confidence before a quiz or test as it is about mastering the material.</p>
                     </li>
                     <li><span class="list-icon alpha-0"></span><span class="number">3)</span><span>Those who exceed the abilities of their classmates and are looking for enrichment.</span>
                        <p>These students thoroughly enjoy learning and practicing math.  New material comes easily to them and they are therefore often bored in class.  Enrichment tutoring is to help keep a student engaged in the subject until he or she reaches a course level that is challenging for him.  Enrichment activities range from teaching ahead to real life problem solving and project work.</p>
                        
                     </li>
                  </ol>
                  <p style="text-align:justify;">Students who fall into categories 1 and 3 above require consistent one on one in person tutoring to be effective.  That is not necessarily the case for the students who fall into category 2.  As mentioned above, students in category 2 understand what is going on in class and can complete 80 to 90 percent of their homework problems without assistance.  Because of this, they do not really need an in person tutor once a week but rather someone they can call on to ask questions a few minutes a day.  Some times they benefit from working with a tutor before a test or quiz but other times they understand the material and would do just as well without that session.  Unfortunately it is difficult to find a tutor who is this flexible and willing to hold a weekly spot open in case that student needs them and therefore parents end up hiring a tutor to come once a week which ends up being costly and not ideally effective for the student.  This service is a solution to this problem. </p>
               </div>
            </div>
         </div>
         <!-- end col-main --> 
      </div>
   </div>
</div>