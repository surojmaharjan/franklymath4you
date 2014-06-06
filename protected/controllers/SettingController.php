<?php

/*
 * Error Controller to handle Error
 */

class SettingController extends Controller
{

	/**
	  /*Default layout
	 */
	public $layout = '//layouts/admin';
	protected function beforeAction($event)
	{
		if(isset(Yii::app()->user->role) && Yii::app()->user->role = 'admin'){
			return true;
		}else{
			$this->redirect(Yii::app()->request->baseUrl . '/home');
			return false;
		}

	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionIndex()
	{
		$model = WebsiteSetting::model()->findByPk(1);
		$data['model'] = $model;
		if (isset($_POST['WebsiteSetting'])) {
			$model->attributes = $_POST['WebsiteSetting'];

			if ($model->update()) {
				$this->redirect(array('setting/'));
			} else {
				$this->redirect(array('setting/'));
			}
		}
		$this->render('index', $data);
	}

}
