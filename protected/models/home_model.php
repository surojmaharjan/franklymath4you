<?php

class home_model {

   /**
    * This function insert unregister student information into unregister_user table.
    * @param array $data define values of attributes
    * @return boolean true if data inserted else false.
    */
   public function add_unregister_student($data) {
      $unregister_student = new UnregisterUsers();
      $unregister_student->attributes = $data;
      $unregister_student->payment_status = 'not payed';
      if ($unregister_student->validate()) {
         $unregister_student->save();
         return $unregister_student->id;
      }
      else {
         $error = $unregister_student->getErrors();
         return NULL;
      }
   }

   /**
    * This function insert unregister student information into unregister_user table.
    * @param array $data define values of attributes
    * @return boolean true if data inserted else false.
    */
   public function register_student($data) {
      if($this->is_user_exist($data['email'])){
         Yii::app()->user->setFlash('error', 'User already registered.');
         return NULL;
      }
      
      $register_student = new RegisterUsers();
      $register_student->attributes = $data;
      $register_student->payment_status = 'not payed';
      $register_student->password = md5('FranklyMaht!@3' . $data['password']);
      $package = PaymentPackage::model()->findByAttributes(array('month_duration' => $data['package']), 'is_active=1');
      if (isset($package)) {
         $register_student->package_id = $package->id;
         if ($register_student->validate()) {
            $register_student->save();
            return $register_student->id;
         }
         else {
            $error = $register_student->getErrors();
            return NULL;
         }
      }
      else {
         Yii::app()->user->setFlash('error', 'Fail to make registration.');
         return NULL;
      }
   }
   
   function is_user_exist($email){
     $registered_user = RegisterUsers::model()->findByAttributes(array('email'=>$email));
     if(isset($registered_user)){
        return TRUE;
     } else{
        return FALSE;
     }
   }

   /**
    * This function insert student's question into question table.
    * @param array $data define values of attributes
    * @return boolean true if data inserted else false.
    */
   public function add_student_question($data) {
      $student_question = new Questions();
      $student_question->attributes = $data;
      $student_question->attach_file = CUploadedFile::getInstance($student_question, 'attach_file');

      if ($student_question->validate()) {
         $student_question->save();
         if ($student_question->attach_file != '') {
            $tmp = explode('.', $student_question->attach_file);
            $file_extension = strtolower(end($tmp));
            $file_name = Common::generate_filename() . '.' . $file_extension;
            $student_question->attach_file->saveAs("uploads/$file_name");
            $student_question->attach_file = $file_name;
            $student_question->update();
         }

         return true;
      }
      else {
         //$error = $student_question->getErrors();
         return false;
      }
   }

   /**
    * This function insert student's question into question table.
    * @param array $data define values of attributes
    * @return boolean true if data inserted else false.
    */
   public function add_practice_exam_request($data) {
      date_default_timezone_set('America/Los_Angeles');
      $date = new DateTime();
      $current_date = $date->format("Y-m-d");
      
      $parctricExamRequest = new PracticeExamRequest();
      $parctricExamRequest->attributes = $data;
      $parctricExamRequest->request_date = $current_date;

      if ($parctricExamRequest->validate()) {
         $parctricExamRequest->save();
         return $parctricExamRequest->id;
      }
      else {
         //$error = $parctricExamRequest->getErrors();
         $error = $parctricExamRequest->getErrors();
         return NULL;
      }
   }

   public function upload_attachfile($attach_for, $reference_id, $files) {
      $files_count = count($files["tmp_name"]);

      for ($i = 0; $i < $files_count; $i++) {
         if($files["name"][$i] != ''){
            $attachFile = new AttachedFiles();
            $tmp = explode('.', $files["name"][$i]);
            $file_extension = strtolower(end($tmp));
            $file_name = Common::generate_filename() . '.' . $file_extension;
            $attachFile->file_name = $file_name;
            $attachFile->attach_for = $attach_for;
            $attachFile->reference_id = $reference_id;
            move_uploaded_file($files["tmp_name"][$i], "uploads/" . $file_name);
            $attachFile->save();
         }
      }
   }

   public function add_homework_question($data) {
      $ask_homework_question = new HomeworkQuestions();
      $ask_homework_question->attributes = $data;

      if ($ask_homework_question->validate()) {
         $ask_homework_question->save();
         return $ask_homework_question->id;
      }
      else {
         //$error = $ask_homework_question->getErrors();
         return NULL;
      }
   }

   public function get_packageList() {
      $data = array();
      $packages = PaymentPackage::model()->findall();
      if (count($packages) > 0) {
         foreach ($packages as $package) {
            if ($package->package_name != 'per_homework') {
               if ($package->short_note != NULL || $package->short_note != '') {
                  $data[$package->month_duration] = '<span class="package">' . $package->package_name . '</span><span class="package-price">$' . $package->charge . ' (' . $package->short_note . ')</span>';
               }
               else {
                  $data[$package->month_duration] = '<span class="package">' . $package->package_name . '</span><span class="package-price">$' . $package->charge . '</span>';
               }
            }
         }
      }

      return $data;
   }

}

?>
