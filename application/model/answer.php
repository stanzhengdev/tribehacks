<?php
	class Model_Answer{

		public function __construtc()
		{

		}

		public static function query($arr) {

		// $arr = array(
		// 	"detail"=>array(
		// 		"gender",
		// 	),
		// 	"survey"=>12,
		// 	"question"=>131,
		// );

		$sql = 'SELECT COUNT(*) ';	

		foreach( $arr["detail"] as $detail)
		{
			$sql .= ", d.{$detail}";
		}
		$sql .= ", a.answer_label
			FROM sample_survey s
			, sample_survey_questions q
			, sample_survey_answers a
			, sample_survey_keys k
			, sample_wm_add_details d
			, sample_survey_response_details e
			WHERE s.id = q.survey_id
			AND q.id = a.question_id
			AND s.id = :survey
			AND q.id = :question
			AND k.survey_id = s.id
			AND k.contact_id = d.contact_id
			AND e.response_id = k.response_id
			AND e.answer_id = a.id
			AND e.question_id = q.id
			GROUP BY ";
			foreach($arr["detail"] as $key=>$detail)
			{
				if( $key > 0 )
					$sql .= ',';

				$sql .= "d.{$detail}";
				
			}
			
			$sql .= ', a.answer_label';

			$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);

			$st = $conn->prepare($sql);
			$st->bindValue(":survey", $arr['survey'], PDO::PARAM_INT);
			$st->bindValue(":question", $arr["question"], PDO::PARAM_INT);

			$st->execute();
			$list = array();
			while($row = $st->fetch())
			{
				foreach( $row as $index=>$value)
					if(is_int($index))
						unset($row[$index]);
				$list[] = $row;
			}

			return $list;

		}
	}
?>