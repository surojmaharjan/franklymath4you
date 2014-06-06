<?php
   $tab_data['active_tab'] = 0;
   $this->renderPartial('//blocks/header_menu', $tab_data);
?>

<div class="main-container-wrapper">
  <div class="main-container col1-layout">
    <div class="main">
      <div class="col-main">
        <div class="block block-method">
          <div class="block-header">
            <h1>Register Now</h1>
            <hr class="divider" />
          </div>
          <div class="block-content"> 
             <p>
                     Please note, only those signing up for the monthly, unlimited 
                     access package need to register for this site.  If you are not 
                     choosing this package and wish to pay per use please go to the 
                     <a href="<?php echo Yii::app()->request->baseUrl.'/AskHomework'?>">ask your question now </a> page.
                  </p>
                  <p>
                     By signing up for the unlimited package you not only avoid 
                     the hassle of submitting a payment every time you ask a question 
                     but you also eliminate the need to resubmit all of your school 
                     and course information.  Once registered all of the information 
                     you provide will automatically be in our system creating a quick 
                     and easy place for you to ask your questions.  After your registration 
                     is complete, whenever you come to the Frankly Math site to ask a 
                     question, you should immediately sign in on the upper right hand 
                     corner.  This will automatically take you to a page where you can 
                     ask your homework question or request a practice exam. 
                  </p>
          </div>
                    <?php
                    $data['registerUser'] = new RegisterUsers();
                    if (isset($success_msg)) {
                       $data['success_msg'] = $success_msg;
                    }
                    else if (isset($fail_msg)) {
                       $data['fail_msg'] = $fail_msg;
                    }
                    $this->renderPartial('register_form', $data);

                    ?>
           </div>
      </div>
      <!-- end col-main --> 
    </div>
    <!-- end main --> 
  </div>
</div>