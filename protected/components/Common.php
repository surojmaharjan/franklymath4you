<?php

/**
 * Common Class contain all function that required in bee in play
 */
Class Common {

   /**
    * Function array_debug is for testing array data type
    * @param type $value
    * @return type formatted array
    */
   public static function array_debug($value) {
      echo "<pre>";
      print_r($value);
      echo "</pre>";
   }

   /**
    * @function generate ramdom file name
    * @return string file name
    */
   public static function generate_filename() {
      $possible_letters = '23456789bcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $codelength = 40;
      $code = '';
      $i = 0;

      while ($i < $codelength) {
         $code .= substr($possible_letters, mt_rand(0, strlen($possible_letters) - 1), 1);
         $i++;
      }

      return $code;
   }

   /**
    * This function generate title.
    * @return string title in [site_name - title] format.
    */
   public static function getPageTitle($pageTitle) {
      $split_pageTitle = explode(' - ', $pageTitle);
      $title = $split_pageTitle[0];
      $split_pageTitle2 = explode(' ', $split_pageTitle[1]);
      $title .= ' - ' . $split_pageTitle2[0];
      return $title;
   }

   public static function pay_payment($returnUrl, $cancelUrl, $charge, $description, $id) {
      $paymentInfo['Order']['theTotal'] = $charge;
      $paymentInfo['Order']['description'] = $description;
      $paymentInfo['Order']['quantity'] = '1';
      Yii::app()->Paypal->returnUrl = $returnUrl;
      
      $setting = WebsiteSetting::model()->find();
     
      if(isset($setting)){
         Yii::app()->Paypal->apiUsername = $setting->paypal_username;
         Yii::app()->Paypal->apiPassword = $setting->paypal_password;
         Yii::app()->Paypal->apiSignature = $setting->paypal_signature;
      }

      // call paypal 
      $result = Yii::app()->Paypal->SetExpressCheckout($paymentInfo);
      $token = $result['TOKEN'];
      Yii::app()->session[$token] = array('id'=>$id, 'charge'=>$charge);

      //Detect Errors 
      if (!Yii::app()->Paypal->isCallSucceeded($result)) {
         if (Yii::app()->Paypal->apiLive === true) {
            //Live mode basic error message
            $error = 'We were unable to process your request. Please try again later';
         }
         else {
            //Sandbox output the actual error message to dive in.
            $error = $result['L_LONGMESSAGE0'];
         }

         $data['is_valid'] = FALSE;
         $data['error'] = $error;
         return $data;
      }
      else {
         // send user to paypal 
         $token = urldecode($result["TOKEN"]);
         $payPalURL = Yii::app()->Paypal->paypalUrl . $token;
         $data['is_valid'] = TRUE;
         $data['payPalUrl'] = $payPalURL;
         return $data;
      }
   }

   public static function get_payment_status($token, $payerId) {
      $setting = WebsiteSetting::model()->find();
      
      if(isset($setting)){
         Yii::app()->Paypal->apiUsername = $setting->paypal_username;
         Yii::app()->Paypal->apiPassword = $setting->paypal_password;
         Yii::app()->Paypal->apiSignature = $setting->paypal_signature;
      }
      
      $result = Yii::app()->Paypal->GetExpressCheckoutDetails($token);
      
      $result['PAYERID'] = $payerId;
      $result['TOKEN'] = $token;
      $charge = Yii::app()->session[$token]['charge'];
      unset(Yii::app()->session[$token]);
      $result['ORDERTOTAL'] = $charge;

      //Detect errors 
      if (!Yii::app()->Paypal->isCallSucceeded($result)) {
         if (Yii::app()->Paypal->apiLive === true) {
            //Live mode basic error message
            $error = 'We were unable to process your request. Please try again later';
         }
         else {
            //Sandbox output the actual error message to dive in.
            $error = $result['L_LONGMESSAGE0'];
         }

         $data['status'] = 'error';
         $data['msg'] = $error;
      }
      else {
         $paymentResult = Yii::app()->Paypal->DoExpressCheckoutPayment($result);
         //Detect errors  
         if (!Yii::app()->Paypal->isCallSucceeded($paymentResult)) {
            if (Yii::app()->Paypal->apiLive === true) {
               //Live mode basic error message
               $error = 'We were unable to process your request. Please try again later';
            }
            else {
               //Sandbox output the actual error message to dive in.
               $error = $paymentResult['L_LONGMESSAGE0'];
            }

            $data['status'] = 'error';
            $data['msg'] = $error;
         }
         else {
            $data['status'] = 'success';
            $data['msg'] = 'payment success.';
         }
      }

      return $data;
   }
   
   public static function getPackage_price($month_duration){
      $package = PaymentPackage::model()->findByAttributes(array('month_duration'=>$month_duration), 'is_active=1');
      if(isset($package)){
         return (float) $package->charge;
      }
      else{
         return 0;
      }
   }
   
   public static function getPackageInfo($id){
      $package = PaymentPackage::model()->findByPk($id);
      if(isset($package)){
         return $package->attributes;
      }
      else{
         return NULL;
      }
   }
   
   public static function isExpierSubscriber(){
      $user_id = Yii::app()->user->user_id;
      $user = RegisterUsers::model()->findByPk($user_id);
      $payment_date = $user->payment_date;
      $package_id = $user->package_id;
      $package = PaymentPackage::model()->findByPk($package_id);
      $month_duration = $package->month_duration;
      
      date_default_timezone_set('America/Los_Angeles');
      $expire_timestamp = strtotime(date("Y-m-d", strtotime($payment_date)) . " +".$month_duration." month");
      $expire_date = date("Y-m-d", $expire_timestamp);
      $date = new DateTime();
      $current_date = $date->format("Y-m-d");
      
      if($expire_date > $current_date){
         return false;
      }
      else{
         $user->payment_status = 'expired';
          $user->update();
         return true;
      }
   }
   
   public static function isExceedRequest($exam_type, $user_email){
       date_default_timezone_set('America/Los_Angeles');
       $date = new DateTime();
       $current_year_month = $date->format("Y-m");
       
      //Quiz, Test, Midterm, Final
       if($exam_type == 'Quiz' || $exam_type == 'Test'){
          $max_per_month = 2;
       }
       else{
          $max_per_month = 1;
       }
       
       $requested_practice_exams = PracticeExamRequest::model()->findAllByAttributes(array('email'=>$user_email, 'exam_type'=>$exam_type), "request_date LIKE '".$current_year_month."%'");
       $request_num = count($requested_practice_exams);
       if($request_num >= $max_per_month){
          return true;
       }
       else{
          return false;
       }
   }
   
}