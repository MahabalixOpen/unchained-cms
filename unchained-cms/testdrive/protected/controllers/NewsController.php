<?php

class NewsController extends Controller
{
	public function actionIndex()
	{
	
	$category = Yii::app()->request->getParam('category');
	$article = Yii::app()->request->getParam('article');
	
	if(!empty($article))
	{$this->render('Article', array('article' => $article) ); }
	
	elseif(!empty($category))
	{$this->render('Category', array('category' => $category) ); }
	
	else
		{$this->render('index');}
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}