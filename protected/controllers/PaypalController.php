<?php

class PaypalController extends Controller
{
	public function actionBuy(){
		$paymentInfo['Order']['theTotal'] = 5.00;
		$paymentInfo['Order']['description'] = "Payment ";
		$paymentInfo['Order']['quantity'] = '1';
          Yii::app()->Paypal->returnUrl = 'home';
		// call paypal 
		$result = Yii::app()->Paypal->SetExpressCheckout($paymentInfo); 
		//Detect Errors 
		if(!Yii::app()->Paypal->isCallSucceeded($result)){ 
			if(Yii::app()->Paypal->apiLive === true){
				//Live mode basic error message
				$error = 'We were unable to process your request. Please try again later';
			}else{
				//Sandbox output the actual error message to dive in.
				$error = $result['L_LONGMESSAGE0'];
			}
			echo $error;
			Yii::app()->end();
			
		}else { 
			// send user to paypal 
			$token = urldecode($result["TOKEN"]); 
			
			$payPalURL = Yii::app()->Paypal->paypalUrl.$token; 
			$this->redirect($payPalURL); 
		}
	}

	public function actionConfirm()
	{
		$token = trim($_GET['token']);
		$payerId = trim($_GET['PayerID']);
		
		$result = Yii::app()->Paypal->GetExpressCheckoutDetails($token);
		$result['PAYERID'] = $payerId; 
		$result['TOKEN'] = $token; 
		$result['ORDERTOTAL'] = 5.00;

		//Detect errors 
		if(!Yii::app()->Paypal->isCallSucceeded($result)){ 
			if(Yii::app()->Paypal->apiLive === true){
				//Live mode basic error message
				$error = 'We were unable to process your request. Please try again later';
			}else{
				//Sandbox output the actual error message to dive in.
				$error = $result['L_LONGMESSAGE0'];
			}
			echo $error;
			Yii::app()->end();
		}else{ 
			
			$paymentResult = Yii::app()->Paypal->DoExpressCheckoutPayment($result);
			//Detect errors  
			if(!Yii::app()->Paypal->isCallSucceeded($paymentResult)){
				if(Yii::app()->Paypal->apiLive === true){
					//Live mode basic error message
					$error = 'We were unable to process your request. Please try again later';
				}else{
					//Sandbox output the actual error message to dive in.
					$error = $paymentResult['L_LONGMESSAGE0'];
				}
				echo $error;
				Yii::app()->end();
			}else{
				//payment was completed successfully
				
				$this->render('confirm');
			}
			
		}
	}
        
    public function actionCancel()
	{
		//The token of the cancelled payment typically used to cancel the payment within your application
		$token = $_GET['token'];
		
		$this->render('cancel');
	}
	
	public function actionDirectPayment(){ 
		$paymentInfo = array('Member'=> 
			array( 
				'first_name'=>'sanish', 
				'last_name'=>'maharjan', 
				'billing_address'=>'kirtipur', 
				'billing_address2'=>'', 
				'billing_country'=>'nepal', 
				'billing_city'=>'kathmandu', 
				'billing_state'=>'bagmati', 
				'billing_zip'=>'8100' 
			), 
			'CreditCard'=> 
			array( 
				'card_number'=>'6011868805414293', 
				'expiration_month'=>'08', 
				'expiration_year'=>'2018', 
                    'credit_type'=>'Discover', 
				'cv_code'=>'123' 
			), 
			'Order'=> 
			array('theTotal'=>25.00) 
		); 

	   /* 
		* On Success, $result contains [AMT] [CURRENCYCODE] [AVSCODE] [CVV2MATCH]  
		* [TRANSACTIONID] [TIMESTAMP] [CORRELATIONID] [ACK] [VERSION] [BUILD] 
		*  
		* On Fail, $ result contains [AMT] [CURRENCYCODE] [TIMESTAMP] [CORRELATIONID]  
		* [ACK] [VERSION] [BUILD] [L_ERRORCODE0] [L_SHORTMESSAGE0] [L_LONGMESSAGE0]  
		* [L_SEVERITYCODE0]  
		*/ 
	  
		$result = Yii::app()->Paypal->DoDirectPayment($paymentInfo); 
		
		//Detect Errors 
		if(!Yii::app()->Paypal->isCallSucceeded($result)){ 
			if(Yii::app()->Paypal->apiLive === true){
				//Live mode basic error message
				$error = 'We were unable to process your request. Please try again later';
			}else{
				//Sandbox output the actual error message to dive in.
				$error = $result['L_LONGMESSAGE0'];
			}
			echo $error;
			
		}else { 
			//Payment was completed successfully, do the rest of your stuff
		}

		Yii::app()->end();
	} 
}