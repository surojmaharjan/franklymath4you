<?php

/**
 * Common Class contain all function that required in bee in play
 */
Class Validate
{
	public static function validate_email($email){
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return false;
		} else {
			return true;
		}
	}

	public static function confirm_password($password,$confirm_password){
		if($password != '' && $confirm_password !=''){
		if($password != $confirm_password)
			return false;
		else
			return true;
		}
          else{
			return false;
		}
	}

}