<?php

class HomeController extends Controller {
   /*
    * set main layout for HomeController.
    */

   public $layout = '//layouts/main';

   public function actionIndex() {
      $this->render('index');
   }

   public function actionPracticeExam() {
      if (isset(Yii::app()->user->role) && Yii::app()->user->role = 'student') {
         //$this->redirect(Yii::app()->request->baseUrl . '/UserForm');
         
         $data = array();
         $user_id = Yii::app()->user->user_id;
         $registerUser = RegisterUsers::model()->findByPk($user_id);

         $home_model = new home_model();
         $admin = User::model()->findByAttributes(array('role' => 'admin'));
         if (isset($_POST['PracticeExamRequest'])) {
            if(Common::isExpierSubscriber() == TRUE){
               $data['fail_msg'] = 'Your monthy subscriber package has been expired.';
            }
            else if(Common::isExceedRequest($_POST['PracticeExamRequest']['exam_type'], $registerUser->email)){
               $data['fail_msg'] = 'Sorry, your practice exam quota has exceeded. You can only access two practice quizzes/test and one practice midterm/final in a month.';
            }
            else{
               $practriceExams = PractriceExams::model()->findByAttributes(array('exam_type' => $_POST['PracticeExamRequest']['exam_type']));
               if (isset($practriceExams)) {
                  $parctricExamRequest = $_POST['PracticeExamRequest'];
                  $parctricExamRequest['name'] = $registerUser->name;
                  $parctricExamRequest['email'] = $registerUser->email;
                  $parctricExamRequest['phone_num'] = $registerUser->phone_num;
                  $parctricExamRequest['grade'] = $registerUser->grade;
                  $parctricExamRequest['course'] = $registerUser->course;
                  $parctricExamRequest['school'] = $registerUser->school;
                  $parctricExamRequest['how_know'] = $registerUser->how_hear;
                  $parctricExamRequest['is_register_user'] = 1;
                  $parctricExamRequest['is_payed'] = 1;
                  $parctricExamRequest['charge'] = 0.00;
                  
                  $id = $home_model->add_practice_exam_request($parctricExamRequest);
                  if ($id != NULL) {
                     $home_model->upload_attachfile('request_exam', $id, $_FILES["AttachedFiles"]);
                     $attachFiles = AttachedFiles::model()->findAllByAttributes(array('reference_id'=>$id, 'attach_for'=>'request_exam'));
                     $data['success_msg'] = 'Thank you for submitting your request. 
                                           You will receive your practice exam within 2 days.';

                     $data['subject'] = 'New practice exam request.';
                     $data['sendTo'] = $admin->email;
                     $data['parctricExamRequest'] = $parctricExamRequest;
                     $data['attachFiles'] = $attachFiles;

                     date_default_timezone_set('America/Los_Angeles');
                     $mail = new YiiMailer('request_practice_exam', $data);
                     $mail->setLayout('mail');
                     $mail->render();
                     $mail->From = 'noreply@franklymath4you.com';
                     $mail->FromName = 'FranklyMath';
                     $mail->Subject = $data['subject'];
                     $mail->AddAddress($data['sendTo']);
                     $mail->Send();
                  }
                  else {
                     $data['fail_msg'] = 'Fail to summit form.';
                  }
               }
            }
         }

         $data['PracticeExamRequest'] = new PracticeExamRequest();
         $data['AttachedFiles'] = new AttachedFiles();
         $this->render('practiceExamForUser', $data);
         
      }

      $data = array();
      $data['PracticeExamRequest'] = new PracticeExamRequest();
      $data['AttachedFiles'] = new AttachedFiles();
      if (isset($_POST['PracticeExamRequest'])) {
         $home_model = new home_model();
         $parctricExamRequest = $_POST['PracticeExamRequest'];
         $practriceExams = PractriceExams::model()->findByAttributes(array('exam_type' => $parctricExamRequest['exam_type']));
         if (isset($practriceExams)) {
            $parctricExamRequest['is_payed'] = 0;
            $parctricExamRequest['is_register_user'] = 0;
            $parctricExamRequest['charge'] = $practriceExams->charge;

            $id = $home_model->add_practice_exam_request($parctricExamRequest);
            if ($id != NULL) {
               $home_model->upload_attachfile('request_exam', $id, $_FILES["AttachedFiles"]);
               $returnUrl = Yii::app()->getBaseUrl(true) . '/PaymentForPractriceExam';
               $cancelUrl = Yii::app()->getBaseUrl(true) . '/PaymentForPractriceExam';
               $description = 'You will be charge for your practrice exam.';
               $charge = $practriceExams->charge;

               $return_data = Common::pay_payment($returnUrl, $cancelUrl, $charge, $description, $id);
               if ($return_data['is_valid']) {
                  $this->redirect($return_data['payPalUrl']);
               }
               else {
                  $data['fail_msg'] = $return_data['error'];
               }
            }
            else {
               $data['fail_msg'] = 'Fail to summit form.';
            }
         }
      }
      else if (Yii::app()->user->hasFlash('success')) {
         $data['success_msg'] = 'Thank you for submitting your request. 
                                 You will receive your practice exam within 2 days.';
      }
      else if (Yii::app()->user->hasFlash('error')) {
         $data['fail_msg'] = 'Sorry! Fail to send your practice exam request.';
      }

      $this->render('practiceExamForm', $data);
   }

   public function actionAskHomework() {
      if (isset(Yii::app()->user->role) && Yii::app()->user->role = 'student') {
         //$this->redirect(Yii::app()->request->baseUrl . '/UserForm');
         
         $data = array();
         $user_id = Yii::app()->user->user_id;
         $registerUser = RegisterUsers::model()->findByPk($user_id);

         $home_model = new home_model();
         $admin = User::model()->findByAttributes(array('role' => 'admin'));

         if (isset($_POST['HomeworkQuestions'])) {
            if(Common::isExpierSubscriber() == TRUE){
               $data['fail_msg'] = 'Your monthy subscriber package has been expired.';
            }
            else{
               $homwork_data = $_POST['HomeworkQuestions'];
               $homwork_data['name'] = $registerUser->name;
               $homwork_data['email'] = $registerUser->email;
               $homwork_data['phone_num'] = $registerUser->phone_num;
               $homwork_data['grade'] = $registerUser->grade;
               $homwork_data['course'] = $registerUser->course;
               $homwork_data['school'] = $registerUser->school;
               $homwork_data['how_know'] = $registerUser->how_hear;
               $homwork_data['is_register_user'] = 1;
               $homwork_data['is_payed'] = 1;
               $homwork_data['charge'] = 0.00;

               $id = $home_model->add_homework_question($homwork_data);
               if ($id != NULL) {
                  $home_model->upload_attachfile('ask_homework', $id, $_FILES["AttachedFiles"]);
                  $attachFiles = AttachedFiles::model()->findAllByAttributes(array('reference_id'=>$id, 'attach_for'=>'ask_homework'));
                  $data['success_msg'] = 'Thank you for submitting your homework question. 
                                       If it is between the hours of 7 am and 9 pm you will 
                                       receive feedback within two hours.  Outside of these 
                                       hours, feedback may take longer.';

                  $data['subject'] = 'New homework question';
                  $data['sendTo'] = $admin->email;
                  $data['homeworkQuestion'] = $homwork_data;
                  $data['attachFiles'] = $attachFiles;

                  date_default_timezone_set('America/Los_Angeles');
                  $mail = new YiiMailer('ask_homework', $data);
                  $mail->setLayout('mail');
                  $mail->render();
                  $mail->From = 'noreply@franklymath4you.com';
                  $mail->FromName = 'FranklyMath';
                  $mail->Subject = $data['subject'];
                  $mail->AddAddress($data['sendTo']);
                  $mail->Send();
               }
               else {
                  $data['fail_msg'] = 'Sorry! Fail to send your homework question.';
               }
            }
            
         }
         
         $data['HomeworkQuestions'] = new HomeworkQuestions();
         $data['AttachedFiles'] = new AttachedFiles();
         $this->render('askHomeworkForUser', $data);
      }
      else{
         
      

      $data = array();

      if (isset($_POST['HomeworkQuestions'])) {

         $homwork_data = $_POST['HomeworkQuestions'];
         $homwork_data['is_register_user'] = 0;
         $homwork_data['is_payed'] = 0;
         $charges = PaymentPackage::model()->findByAttributes(array('package_name'          => 'per_homework'));
         $homwork_data['charge'] = $charges->charge;

         $home_model = new home_model();
         $id = $home_model->add_homework_question($homwork_data);
         if ($id != NULL) {
            $home_model->upload_attachfile('ask_homework', $id, $_FILES["AttachedFiles"]);

            $returnUrl = Yii::app()->getBaseUrl(true) . '/PaymentForHomework';
            $cancelUrl = Yii::app()->getBaseUrl(true) . '/PaymentForHomework';
            $charge = $homwork_data['charge'];
            $description = 'You will be charge for your homework question.';

            $return_data = Common::pay_payment($returnUrl, $cancelUrl, $charge, $description, $id);
            if ($return_data['is_valid']) {
               $this->redirect($return_data['payPalUrl']);
            }
            else {
               $data['fail_msg'] = $return_data['error'];
            }
         }
         else {
            $data['fail_msg'] = 'Sorry! Fail to send your homework question.';
         }
      }
      else if (Yii::app()->user->hasFlash('success')) {
         $data['success_msg'] = 'Thank you for submitting your homework question. 
                                 If it is between the hours of 7 am and 9 pm you will 
                                 receive feedback within two hours.  Outside of these 
                                 hours, feedback may take longer.';
      }
      else if (Yii::app()->user->hasFlash('error')) {
         $data['fail_msg'] = 'Sorry! Fail to send your homework question.';
      }

      $data['HomeworkQuestions'] = new HomeworkQuestions();
      $data['AttachedFiles'] = new AttachedFiles();
      $this->render('ask_question_form', $data);
      }
   }

   public function actionHowitworks() {
      $this->render('howitworks');
   }

   public function actionGetstarted() {
      $this->render('getstarted');
   }

   public function actionWhoisthisfor() {
      $this->render('whyfranklymath');
   }

   public function actionWhychoosethismethod() {
      $this->render('whychoosethismethod');
   }

   public function actionAboutme() {
      $this->render('aboutme');
   }

   /**
    * Registation page
    */
   public function actionRegister() {
      if (isset(Yii::app()->user->role) && Yii::app()->user->role = 'student') {
         $this->redirect(Yii::app()->request->baseUrl . '/UserProfile');
      }

      $data = array();
      if (isset($_POST['RegisterUsers'])) {
         $home_model = new home_model();
         $student_information = $_POST['RegisterUsers'];
         $register_id = $home_model->register_student($student_information);
         if ($register_id != NULL) {
            //----------------  send email  -------------------------------//
            $register_user = RegisterUsers::model()->findByPk($register_id);
            $data['subject'] = 'Thank you for registering.';
            $data['sendTo'] = $register_user->email;
            $data['register_user'] = $register_user->attributes;

            $mail = new YiiMailer('register_user', $data);
            $mail->setLayout('mail');
            $mail->render();
            $mail->From = 'noreply@franklymath4you.com';
            $mail->FromName = 'FranklyMath';
            $mail->Subject = $data['subject'];
            $mail->AddAddress($data['sendTo']);
            $mail->Send();

            $returnUrl = Yii::app()->getBaseUrl(true) . '/Register_complete';
            $cancelUrl = Yii::app()->getBaseUrl(true) . '/Register_complete';
            $charge = Common::getPackage_price($student_information['package']);
            $description = 'Payment for registation.';

            $return_data = Common::pay_payment($returnUrl, $cancelUrl, $charge, $description, $register_id);
            if ($return_data['is_valid']) {
               $this->redirect($return_data['payPalUrl']);
            }
            else {
               $data['fail_msg'] = $return_data['error'];
            }
         }
         else {
            $data['fail_msg'] = Yii::app()->user->getFlash('error');
         }
      }
      else if (Yii::app()->user->hasFlash('success')) {
         $data['success_msg'] = 'User register successfully.';
      }
      else if (Yii::app()->user->hasFlash('error')) {
         $data['fail_msg'] = Yii::app()->user->getFlash('error');
      }

      $this->render('register', $data);
   }

   public function actionRegister_complete() {
      $token = trim($_GET['token']);
      if (Yii::app()->session[$token] != '') {
         $register_userId = Yii::app()->session[$token]['id'];

         $register_user = RegisterUsers::model()->findByPk($register_userId);
         $payerId = trim($_GET['PayerID']);
         $payment_status = Common::get_payment_status($token, $payerId);
         if ($payment_status['status'] != 'error') {
            Yii::app()->user->setFlash('success', $payment_status['msg']);
            
            date_default_timezone_set('America/Los_Angeles');
            $date = new DateTime();
            $current_date = $date->format("Y-m-d");
            $register_user->payment_status = 'payed';
            $register_user->payment_date = date($current_date);
            $register_user->update();

            //----------------  send email  -------------------------------//
            $admin = User::model()->findByAttributes(array('role'=> 'admin'));
            $data['subject'] = 'New user registered.';
            $data['sendTo'] = $admin->email;
            $data['register_user'] = $register_user->attributes;

            $mail = new YiiMailer('newuser_register', $data);
            $mail->setLayout('mail');
            $mail->render();
            $mail->From = 'noreply@franklymath4you.com';
            $mail->FromName = 'FranklyMath';
            $mail->Subject = $data['subject'];
            $mail->AddAddress($data['sendTo']);
            $mail->Send();
            
            //----------------  send email  -------------------------------//
            $data['subject'] = 'Your registration has completed.';
            $data['sendTo'] = $register_user->email;
            $data['register_user'] = $register_user->attributes;

            $mail = new YiiMailer('conformation', $data);
            $mail->setLayout('mail');
            $mail->render();
            $mail->From = 'noreply@franklymath4you.com';
            $mail->FromName = 'FranklyMath';
            $mail->Subject = $data['subject'];
            $mail->AddAddress($data['sendTo']);
            $mail->Send();

            $this->redirect(Yii::app()->request->baseUrl . '/register');
            
         }
         else {
            Yii::app()->user->setFlash('error', $payment_status['msg']);
            $register_user->payment_status = 'not payed';
            $register_user->update();
            $this->redirect(Yii::app()->request->baseUrl . '/register');
         }
      }
      else {
         $this->redirect(Yii::app()->request->baseUrl . '/register');
      }
   }

   public function actionPaymentForHomework() {
      $token = trim($_GET['token']);
      if (Yii::app()->session[$token] != '') {
         $id = Yii::app()->session[$token]['id'];

         $HomeworkQuestion = HomeworkQuestions::model()->findByPk($id);
         $attachFiles = AttachedFiles::model()->findAllByAttributes(array('reference_id'=>$id, 'attach_for'=>'ask_homework'));
         $payerId = trim($_GET['PayerID']);
         $payment_status = Common::get_payment_status($token, $payerId);
         if ($payment_status['status'] != 'error') {
            Yii::app()->user->setFlash('success', $payment_status['msg']);
            $HomeworkQuestion->is_payed = 1;
            $HomeworkQuestion->update();

            $admin = User::model()->findByAttributes(array('role' => 'admin'));

            $data['subject'] = 'New homework question';
            $data['sendTo'] = $admin->email;
            $data['homeworkQuestion'] = $HomeworkQuestion->attributes;
            $data['attachFiles'] = $attachFiles;

            date_default_timezone_set('America/Los_Angeles');
            $mail = new YiiMailer('ask_homework', $data);
            $mail->setLayout('mail');
            $mail->render();
            $mail->From = 'noreply@franklymath4you.com';
            $mail->FromName = 'FranklyMath';
            $mail->Subject = $data['subject'];
            $mail->AddAddress($data['sendTo']);
            $mail->Send();

            $this->redirect(Yii::app()->request->baseUrl . '/AskHomework');
         }
         else {
            Yii::app()->user->setFlash('error', $payment_status['msg']);
            $HomeworkQuestion->is_payed = 0;
            $HomeworkQuestion->update();
            $this->redirect(Yii::app()->request->baseUrl . '/AskHomework');
         }
      }
      else {
         $this->redirect(Yii::app()->request->baseUrl . '/AskHomework');
      }
   }

   public function actionPaymentForPractriceExam() {
      $token = trim($_GET['token']);
      if (Yii::app()->session[$token] != '') {
         $id = Yii::app()->session[$token]['id'];
         $parctricExamRequest = PracticeExamRequest::model()->findByPk($id);
         $attachFiles = AttachedFiles::model()->findAllByAttributes(array('reference_id'=>$id, 'attach_for'=>'request_exam'));
         $payerId = trim($_GET['PayerID']);
         $payment_status = Common::get_payment_status($token, $payerId);
         if ($payment_status['status'] != 'error') {
            Yii::app()->user->setFlash('success', $payment_status['msg']);
            $parctricExamRequest->is_payed = 1;
            $parctricExamRequest->update();
            $admin = User::model()->findByAttributes(array('role' => 'admin'));

            $data['subject'] = 'New practice exam request.';
            $data['sendTo'] = $admin->email;
            $data['parctricExamRequest'] = $parctricExamRequest->attributes;
            $data['attachFiles'] = $attachFiles;
            
            date_default_timezone_set('America/Los_Angeles');
            $mail = new YiiMailer('request_practice_exam', $data);
            $mail->setLayout('mail');
            $mail->render();
            $mail->From = 'noreply@franklymath4you.com';
            $mail->FromName = 'FranklyMath';
            $mail->Subject = $data['subject'];
            $mail->AddAddress($data['sendTo']);
            $mail->Send();

            $this->redirect(Yii::app()->request->baseUrl . '/PracticeExam');
         }
         else {
            Yii::app()->user->setFlash('error', $payment_status['msg']);
            $parctricExamRequest->is_payed = 0;
            $parctricExamRequest->update();
            $this->redirect(Yii::app()->request->baseUrl . '/PracticeExam');
         }
      }
      else {
         $this->redirect(Yii::app()->request->baseUrl . '/PracticeExam');
      }
   }

   public function actionLogin() {
      if (isset($_POST['RegisterUsers'])) {
         $user = new LoginForm();
         $user->email = $_POST['RegisterUsers']['email'];
         $user->password = $_POST['RegisterUsers']['password'];

         if ($user->validate() && $user->login()) {
            if (Yii::app()->user->role == 'admin') {
               $this->redirect(Yii::app()->request->baseUrl . '/admin/setting');
            }
            else if (Yii::app()->user->role == 'tutor') {
               $this->redirect(Yii::app()->request->baseUrl . '/home');
            }
            else if (Yii::app()->user->role == 'student') {
               Common::isExpierSubscriber();
               $this->redirect(Yii::app()->request->baseUrl . '/home');
            }
         }
         else {
            $error = $user->getErrors();
            $data['fail_msg'] = 'User or Password does not match.';
         }
      }

      $data['registerUser'] = new RegisterUsers();
      $this->render('login', $data);
   }

   public function actionUserForm() {
      if (isset(Yii::app()->user->role) && Yii::app()->user->role = 'student') {
         $data = array();
         $user_id = Yii::app()->user->user_id;
         $registerUser = RegisterUsers::model()->findByPk($user_id);

         $home_model = new home_model();
         $admin = User::model()->findByAttributes(array('role' => 'admin'));

         if (isset($_POST['HomeworkQuestions'])) {
            if(Common::isExpierSubscriber() == TRUE){
               $data['fail_msg1'] = 'Your monthy subscriber package has been expired.';
            }
            else{
               $homwork_data = $_POST['HomeworkQuestions'];
               $homwork_data['name'] = $registerUser->name;
               $homwork_data['email'] = $registerUser->email;
               $homwork_data['phone_num'] = $registerUser->phone_num;
               $homwork_data['grade'] = $registerUser->grade;
               $homwork_data['course'] = $registerUser->course;
               $homwork_data['school'] = $registerUser->school;
               $homwork_data['how_know'] = $registerUser->how_hear;
               $homwork_data['is_register_user'] = 1;
               $homwork_data['is_payed'] = 1;
               $homwork_data['charge'] = 0.00;

               $id = $home_model->add_homework_question($homwork_data);
               if ($id != NULL) {
                  $home_model->upload_attachfile('ask_homework', $id, $_FILES["AttachedFiles"]);
                  $attachFiles = AttachedFiles::model()->findAllByAttributes(array('reference_id'=>$id, 'attach_for'=>'ask_homework'));
                  $data['success_msg1'] = 'Thank you for submitting your homework question. 
                                       If it is between the hours of 7 am and 9 pm you will 
                                       receive feedback within two hours.  Outside of these 
                                       hours, feedback may take longer.';

                  $data['subject'] = 'New homework question';
                  $data['sendTo'] = $admin->email;
                  $data['homeworkQuestion'] = $homwork_data;
                  $data['attachFiles'] = $attachFiles;

                  date_default_timezone_set('America/Los_Angeles');
                  $mail = new YiiMailer('ask_homework', $data);
                  $mail->setLayout('mail');
                  $mail->render();
                  $mail->From = 'noreply@franklymath4you.com';
                  $mail->FromName = 'FranklyMath';
                  $mail->Subject = $data['subject'];
                  $mail->AddAddress($data['sendTo']);
                  $mail->Send();
               }
               else {
                  $data['fail_msg1'] = 'Sorry! Fail to send your homework question.';
               }
            }
            
         }
         else if (isset($_POST['PracticeExamRequest'])) {
            if(Common::isExpierSubscriber() == TRUE){
               $data['fail_msg1'] = 'Your monthy subscriber package has been expired.';
            }
            else{
               $practriceExams = PractriceExams::model()->findByAttributes(array('exam_type' => $_POST['PracticeExamRequest']['exam_type']));
               if (isset($practriceExams)) {
                  $parctricExamRequest = $_POST['PracticeExamRequest'];
                  $parctricExamRequest['name'] = $registerUser->name;
                  $parctricExamRequest['email'] = $registerUser->email;
                  $parctricExamRequest['phone_num'] = $registerUser->phone_num;
                  $parctricExamRequest['grade'] = $registerUser->grade;
                  $parctricExamRequest['course'] = $registerUser->course;
                  $parctricExamRequest['school'] = $registerUser->school;
                  $parctricExamRequest['how_know'] = $registerUser->how_hear;
                  $parctricExamRequest['is_register_user'] = 1;
                  $parctricExamRequest['is_payed'] = 1;
                  $parctricExamRequest['charge'] = 0.00;

                  $id = $home_model->add_practice_exam_request($parctricExamRequest);
                  if ($id != NULL) {
                     $home_model->upload_attachfile('request_exam', $id, $_FILES["AttachedFiles"]);
                     $attachFiles = AttachedFiles::model()->findAllByAttributes(array('reference_id'=>$id, 'attach_for'=>'request_exam'));
                     $data['success_msg2'] = 'Thank you for submitting your request. 
                                           You will receive your practice exam within 2 days.';

                     $data['subject'] = 'New practice exam request.';
                     $data['sendTo'] = $admin->email;
                     $data['parctricExamRequest'] = $parctricExamRequest;
                     $data['attachFiles'] = $attachFiles;

                     date_default_timezone_set('America/Los_Angeles');
                     $mail = new YiiMailer('request_practice_exam', $data);
                     $mail->setLayout('mail');
                     $mail->render();
                     $mail->From = 'noreply@franklymath4you.com';
                     $mail->FromName = 'FranklyMath';
                     $mail->Subject = $data['subject'];
                     $mail->AddAddress($data['sendTo']);
                     $mail->Send();
                  }
                  else {
                     $data['fail_msg2'] = 'Fail to summit form.';
                  }
               }
            }
         }

         $data['PracticeExamRequest'] = new PracticeExamRequest();
         $data['HomeworkQuestions'] = new HomeworkQuestions();
         $data['AttachedFiles'] = new AttachedFiles();
         $this->render('userForm', $data);
      }
      else {
         $this->redirect(Yii::app()->request->baseUrl . '/home');
      }
   }

   public function actionUserProfile() {
      if (isset(Yii::app()->user->role) && Yii::app()->user->role = 'student') {
         $data = array();
         $user_id = Yii::app()->user->user_id;
         $registerUser = RegisterUsers::model()->findByPk($user_id);
         if (isset($_POST['RegisterUsers'])) {
            $registerUser->attributes = $_POST['RegisterUsers'];
            if ($registerUser->update()) {
               $data['success_msg'] = 'Update successfully.';
            }
            else {
               $data['fail_msg'] = 'Fail to update.';
            }
         }

         $data['registerUser'] = $registerUser;
         $this->render('userInfoForm', $data);
      }
      else {
         $this->redirect(Yii::app()->request->baseUrl . '/home');
      }
   }

   public function actionOrderPackage() {
      if (isset(Yii::app()->user->role) && Yii::app()->user->role = 'student') {
         $data = array();
         $user_id = Yii::app()->user->user_id;
         $registerUser = RegisterUsers::model()->findByPk($user_id);
         if (isset($_POST['RegisterUsers'])) {
            $package = PaymentPackage::model()->findByAttributes(array('month_duration' => $_POST['RegisterUsers']['package']), 'is_active=1');
            if (isset($package)) {
               $registerUser->package_id = $package->id;
               if ($registerUser->update()) {
                  $returnUrl = Yii::app()->getBaseUrl(true) . '/Register_complete';
                  $cancelUrl = Yii::app()->getBaseUrl(true) . '/Register_complete';
                  $charge = Common::getPackage_price($_POST['RegisterUsers']['package']);
                  $description = 'Payment for monthy package.';

                  $return_data = Common::pay_payment($returnUrl, $cancelUrl, $charge, $description, $user_id);
                  if ($return_data['is_valid']) {
                     $this->redirect($return_data['payPalUrl']);
                  }
                  else {
                     $data['fail_msg'] = $return_data['error'];
                  }
               }
            }
            else {
               $data['fail_msg'] = 'Fail to update.';
            }
         }
         else {
            if ($registerUser->payment_status != 'payed') {
               $data['registerUser'] = new RegisterUsers();
               $this->render('orderPackage', $data);
            }
            else {
               $this->redirect(Yii::app()->request->baseUrl . '/UserProfile');
            }
         }
      }
      else {
         $this->redirect(Yii::app()->request->baseUrl . '/home');
      }
   }

   public function actionLogout() {
      if (!isset(Yii::app()->user->Guest)) {
         Yii::app()->user->logout(false);
         $this->redirect(Yii::app()->homeUrl . 'home');
      }
   }

}