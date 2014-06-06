<?php
class ConnectionCommand extends CConsoleCommand 
{
    private $private_apiKey;
    private $admin_email;
    /**
     * run function when cronjob command call in console
     */
    public function run($server) 
    {  
      if($server[0] == 'development'){
         $this->admin_email = 'mjsanish@yahoo.com';
         $this->private_apiKey = 'sk_test_fw9d5HriVhd6iOl12yhOIOEb';
      }
      else if($server[0] == 'staging'){
         Yii::app()->setComponent('db', Yii::app()->staging);
         $this->admin_email = 'mjsanish@yahoo.com';
         $this->private_apiKey = 'sk_test_fw9d5HriVhd6iOl12yhOIOEb';
      }
      else if($server[0] == 'production'){
         Yii::app()->setComponent('db', Yii::app()->production);
         $this->admin_email = 'mjsanish@yahoo.com';
         $this->private_apiKey = 'sk_test_fw9d5HriVhd6iOl12yhOIOEb';
      }
    }
}