<?php
class Controller_Answer{
	public function index()
	{

	}

	public function getanswers()
	{
		if( isset( $_GET['survey']))
			$survey_id = $_GET['survey'];
		else{
			echo json_encode(array("ok"=>false));
			exit();
		}

		if( isset( $_GET['question']))
			$question_id = $_GET['question'];
		else{
			echo json_encode(array("ok"=>false));
			exit();
		}

		if( isset( $_GET['params']))
			$params = mysql_real_escape_string($_GET['params']);
		else{
			echo json_encode(array("ok"=>false));
			exit();
		}

		$arr = array(
			"detail"=>explode(',', $params),
			"survey"=>$survey_id,
			"question"=>$question_id ,
		);

		$answers = Model_Answer::query( $arr);
		echo json_encode($answers);



			

	}
}