<?php 

class Model_Survey{

	public $id = null;

	public $title = null;

	public $alias = null;

	public $catid = null;

	public $introtext = null;

	public $endtext = null;

	public $questions = array();

	const TABLE_NAME = "sample_survey";

	public function __construct($data = array())
	{
		if( isset( $data['id'])) $this->id = $data['id'];

		if( isset( $data['title'])) $this->title = $data['title'];

		if( isset( $data['alias'])) $this->alias = $data['alias'];

		if( isset( $data['catid'])) $this->catid = $data['catid'];

		if( isset( $data['introtext'])) $this->introtext = $data['introtext'];

		if( isset( $data['endtext'])) $this->endtext = $data['endtext'];
	}
	/**
	* Find a forum by its primary key
	* @param int The ID of the forum
	* @return Model_Forum The forum object
	*/
	public static function findById($id)
	{
		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);

		$sql = "SELECT * FROM " . Model_Survey::TABLE_NAME . " WHERE id=:id";
		$st = $conn->prepare($sql);
		$st->bindValue(":id", $id, PDO::PARAM_INT);
		$st->execute();
		$row = $st->fetch();
		$conn = null;

		if($row){
			$survey = new Model_Survey($row);
			$survey->questions = Model_Question::findAllByAttribute("survey_id", $survey->id);
			return $survey;
		}
			
		return false;
	}


	public static function findAll($rows = 100000000, $order = "title DESC")
	{
		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);


		$sql = "SELECT * FROM ". Model_Survey::TABLE_NAME . " ORDER BY " . $order . " LIMIT :rows";

		$st = $conn->prepare($sql);
		$st->bindValue(":rows", $rows, PDO::PARAM_INT);
		$st->execute();


		$list = array();

		while( $row = $st->fetch())
		{
			$survey = new Model_Survey($row);
			$list[] = $survey;
			
		}

		$conn = null;

		return $list;
	}	
}


?>