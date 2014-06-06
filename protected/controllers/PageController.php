<?php

/*
 * Error Controller to handle Error
 */

class PageController extends Controller
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
		$criteria = new CDbCriteria();
		$criteria->addNotInCondition('id', array(0));

		$count = Page::model()->count($criteria);
		$pages = new CPagination($count);
		// results per page
		$pages->pageSize = 15;
		$pages->applyLimit($criteria);
		$models = Page::model()->findAll($criteria);

		$data['models']=$models;
		$data['pages']=$pages;


		$this->render('index', $data);
	}

	public function actionAdd()
	{
		$model = new Page();
		$data['model'] = $model;
		if (isset($_POST['Page'])) {
			$model->attributes = $_POST['Page'];
			$model->status = 'published';
			if ($model->save()) {
				$this->redirect(array('page/'));
			}else{
				$this->redirect(array('page/add'));
			}
		}

		$this->render('add', $data);
	}

	public function actionEdit()
	{
		$id = $_GET['id'];
		$model = Page::model()->findByPk($id);
		$data['model'] = $model;
		if (isset($_POST['Page'])) {
			$model->attributes = $_POST['Page'];
			if($model->update()){
				$this->redirect(array('page/'));
			}else{
				$this->redirect(array('page/edit'));
			}
		}
		$this->render('edit', $data);
	}

	public function actionDelete(){
		$id = $_GET['id'];
		if (Page::model()->deleteByPk($id)) {
			$this->redirect(array('page/'));
		}else{
			$this->redirect(array('page/'));
		}
	}

}
