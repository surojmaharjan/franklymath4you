<?php
/*
 * Error Controller to handle Error
 */
class ErrorController extends Controller
{
	/**
	  /*Default layout
	 */
	public $layout = '//layouts/main';
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionIndex()
	{
         $error = Yii::app()->errorHandler->error;
         if (Yii::app()->request->isAjaxRequest)
              echo $error['message'];
         else
              $this->render('error', $error);
	}
}
