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

	public function view()
	{
		//$query = Model_Answer::query();
		//var_dump($query);
		if( isset($_GET['id']))
			$id = $_GET['id'];
		else
			header("Location: ?r=site/index");
		if( ! $question = Model_Question::findById($id))
			header("Location: ?r=site/index");
		$app = new App();
		$app->question = $question;
		$app->survey = Model_Survey::findById($question->survey_id);
		$app->render('layout/header');
		$app->render('question/view');
		$app->render('layout/footer');
	}

	public function generate()
	{
		if( isset( $_POST['question']))
			$question_id = $_POST['question'];
		else
			header("Location: ?r=site/index");

		if( ! $question = Model_Question::findById($question_id) )
			header( "Location: ?r=site/index");

		$survey = Model_Survey::findById($question->survey_id);

		if( isset( $_POST["params"]))
			$params = $_POST["params"];
		else
			echo "params not provided.";

		$data = Controller_Answer::getanswers($survey, $question, $params );
		//var_dump($data);

		$app = new App();

		$app->data = $data;

		$app->render('layout/header');
		$app->render('widget/create');
		$app->render('layout/footer');

		

	}
}
?>
