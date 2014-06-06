<?php

class AdminController extends Controller {
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
		$data = array();
		$this->render('index', $data);
	}

	public function actionEditProfile(){
		$model = User::model()->findByPk(1);
		$data['model'] = $model;
		if (isset($_POST['User'])) {
			$model->attributes = $_POST['User'];
			//$model->password = md5('FranklyMaht!@3' . $model->password);
			if ($model->update()) {
				$this->redirect(array('admin/'));
			}else{
				$this->redirect(array('admn/editProfile'));
			}
		}
		$this->render('editProfile',$data);
	}

     public function actionSetting(){
      $WebsiteSetting = WebsiteSetting::model()->find();
      if (isset($_POST['WebsiteSetting'])) {
          $WebsiteSetting->attributes = $_POST['WebsiteSetting'];
          if($WebsiteSetting->update()){
             $data['success_msg'] = 'Update Successfylly.';
         }
         else{
            $error = $user->getErrors();
            $data['fail_msg'] = 'User or Password does not match.';
         }
      }

      $data['WebsiteSetting'] = $WebsiteSetting;
      $this->render('admin_setting', $data);
   }

}
