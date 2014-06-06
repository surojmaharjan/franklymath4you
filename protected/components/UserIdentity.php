<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

   /**
    * Authenticates a user.
    * The example implementation makes sure if the username and password
    * are both 'demo'.
    * In practical applications, this should be changed to authenticate
    * against some persistent user identity storage (e.g. database).
    * @return boolean whether authentication succeeds.
    */
   private $_id;
   public $userType;

   public function __construct($username, $password, $userType = 'student') {
      parent::__construct($username, $password);
      $this->userType = $userType;
   }

   public function authenticate() {
      $user = Users::model()->findByAttributes(array('email' => $this->username));
      if($user != NULL){
         $this->userType = 'admin';
      }
      else{
         $user = RegisterUsers::model()->findByAttributes(array('email' => $this->username));
         $this->userType = 'student';
      }
      if ($user === null) {
         $this->errorCode = self::ERROR_USERNAME_INVALID;
      }
      else {
         if ($user->password !== md5('FranklyMaht!@3' . $this->password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
         }
         else {
            $this->_id = $user->id;
            $this->setState('user_id', $user->id);
            $this->setState('email', $user->email);

            if($this->userType == 'admin'){
               $this->setState('name', $user->user_name);
               $this->setState('role', 'admin');
            }
            else{
                $this->setState('name', $user->name);
                $this->setState('role', 'student');
            }

            $this->errorCode = self::ERROR_NONE;
         }
      }
      return !$this->errorCode;
   }

}