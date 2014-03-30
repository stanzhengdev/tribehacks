<?php
class Controller_Answer{
	public function index()
	{

	}

	public static function getanswers($survey, $question, $params)
	{
		

		$arr = array(
			"detail"=>$params,
			"survey"=>$survey->id,
			"question"=>$question->id ,
		);

		return  Model_Answer::query( $arr);
		// echo json_encode($answers);



			

	}
}