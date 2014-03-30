<?php 

class Model_Question{

	public $id = null;
	public $title = null;
	public $description = null;
	public $survey_id = null;
	public $question_type = null;

	public $answers = array();

	const TABLE_NAME = "sample_survey_questions";

	public function __construct($data = array())
	{
		if( isset( $data['id'])) $this->id = $data['id'];

		if( isset( $data['title'])) $this->title = $data['title'];

		if( isset( $data['description'])) $this->description = $data['description'];

		if( isset( $data['survey_id'])) $this->survey_id = $data['survey_id'];

		if( isset( $data['question_type'])) $this->question_type = $data['question_type'];
	}
	/**
	* Find a forum by its primary key
	* @param int The ID of the forum
	* @return Model_Forum The forum object
	*/
	public static function findById($id)
	{
		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);

		$sql = "SELECT * FROM " . Model_Question::TABLE_NAME . " WHERE id=:id";
		$st = $conn->prepare($sql);
		$st->bindValue(":id", $id, PDO::PARAM_INT);
		$st->execute();
		$row = $st->fetch();
		$conn = null;

		if($row){
			$question = new Model_Question($row);
			return $question;
		}
			
		return false;
	}


	public static function findAll($rows = 100000000, $order = "title DESC")
	{
		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);


		$sql = "SELECT * FROM ". Model_Question::TABLE_NAME . " ORDER BY " . $order . " LIMIT :rows";

		$st = $conn->prepare($sql);
		$st->bindValue(":rows", $rows, PDO::PARAM_INT);
		$st->execute();


		$list = array();

		while( $row = $st->fetch())
		{
			$question = new Model_Quesiton($row);
			$list[] = $question;
			
		}

		$conn = null;

		return $list;
	}	

	public static function findAllByAttribute($attribute, $value, $type="INT")
	{
		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
		$sql = "SELECT * FROM ". Model_Question::TABLE_NAME . " WHERE $attribute=:value";
		$st = $conn->prepare($sql);
		$st->bindValue(":value", $value, PDO::PARAM_INT);
		$st->execute();

		$list = array();

		while( $row = $st->fetch())
		{
			$question = new Model_Question($row);
			$list[] = $question;
		}
		$conn = null;

		return $list;
	}

}


?>