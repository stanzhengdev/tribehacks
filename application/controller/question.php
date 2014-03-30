<?php

class Controller_Question{

	public function index()
	{
		$app = new App();
		$app->surveys = Model_Survey::findAll();
		$app->render('layout/header');
		$app->render('site/index');
		$app->render('layout/footer');

	}

	public function listall()
	{
		if( isset( $_GET['survey_id']))
			$survey_id = $_GET['survey_id'];
		else
			header('Location: ?r=site/index');

		if( ! $survey = Model_Survey::findById($survey_id))
			header('Location: ?r=site/index');

		$app = new App();

		$app->survey = $survey;

		$app->render('layout/header');

		$app->render('question/listall');

		$app->render('layout/footer');
	}
}
?>
