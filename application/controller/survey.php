<?php

class Controller_Survey{

	public function index()
	{
		$app = new App();
		$app->surveys = Model_Survey::findAll();
		$app->render('layout/header');
		$app->render('survey/index');
		$app->render('layout/footer');

	}

	public function view()
	{
		if( isset( $_GET['id']))
			$id = $_GET['id'];
		else
			header('Location: ?r=site/index');

		if( ! $survey = Model_Survey::findById($id))
			header('Location: ?r=site/index');

		$app = new App();

		$app->survey = $survey;

		$app->render('layout/header');

		$app->render('survey/view');

		$app->render('layout/footer');
		
	}


}

?>