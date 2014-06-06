<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="language" content="en" />
      <title><?php echo Common::getPageTitle($this->pageTitle); ?></title>
      <meta http-equiv="author" content="Erica Frank" />
      <?php 
	  	if(Common::getPageTitle($this->pageTitle) == 'Frankly Math - Whychoosethismethod')
			$desc = 'Frankly Math. Why choose Frankly Math as your method of tutoring';
		elseif(Common::getPageTitle($this->pageTitle) == 'Frankly Math - Howitworks')
			$desc = 'Frankly Math. How does the Frankly Math tutoring service work';
		elseif(Common::getPageTitle($this->pageTitle) == 'Frankly Math - Getstarted')
			$desc = 'Frankly Math. Getting started with Frankly Math tutoring';
		elseif(Common::getPageTitle($this->pageTitle) == 'Frankly Math - Askhomework')
			$desc = 'Ask Frankly math your homework question now!';
		elseif(Common::getPageTitle($this->pageTitle) == 'Frankly Math - Practiceexam')
			$desc = 'Request a math practice exam from frankly math today!';
		elseif(Common::getPageTitle($this->pageTitle) == 'Frankly Math - Aboutme')
			$desc = "About Frankly Math's tutor, Erica Frank";
		elseif(Common::getPageTitle($this->pageTitle) == 'Frankly Math - Whoisthisfor')
			$desc = "What type of student will benefit from Frankly Math's tutoring services";
		elseif(Common::getPageTitle($this->pageTitle) == 'Frankly Math - Login')
			$desc = 'Log into frankly math now';
		elseif(Common::getPageTitle($this->pageTitle) == 'Frankly Math - Register')
			$desc = 'Register for Frankly Math today';
		else
			$desc = 'Frankly Math. Ask your math homework question or request a practice exam today!';
	  ?>
	  <meta name="description" content="<?php echo $desc;?>" />

      <?php
      //-------------------  add css/js script here  -------------------//
      $script = Yii::app()->clientScript;
      $script->registerCssFile(Yii::app()->request->baseUrl . '/media/css/reset.css');
      $script->registerCssFile(Yii::app()->request->baseUrl . '/media/css/fonts.css');
      $script->registerCssFile(Yii::app()->request->baseUrl . '/media/css/style.css');
      $script->registerCssFile(Yii::app()->request->baseUrl . '/media/css/layout.css');
      $script->registerCssFile(Yii::app()->request->baseUrl . '/media/css/blocksets.css');
      $script->registerCssFile(Yii::app()->request->baseUrl . '/media/css/menu.css');
      $script->registerScriptFile(Yii::app()->request->baseUrl . '/media/js/jquery.js');
      $script->registerScriptFile(Yii::app()->request->baseUrl . '/media/js/html5.js');
      $script->registerScriptFile(Yii::app()->request->baseUrl . '/media/js/jquery.validate.js');
      ?>
   </head>

   <body>
      <div class="main-wrapper">
         <div class="page">
            <?php
            $this->renderPartial('//blocks/header');
            echo $content;
            $this->renderPartial('//blocks/footer');

            ?>
         </div>
         <!-- end page --> 
      </div>
   </body>
   <!-- end main-wrapper -->
</html>
