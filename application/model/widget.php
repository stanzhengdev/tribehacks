<?php 

class Model_Widget{

	public $id = null;
	public $title = null;
	public $description = null;
	public $svg = null;


	const TABLE_NAME = "sample_widget";

	public function __construct($data = array())
	{
		if( isset( $data['id'])) $this->id = $data['id'];

		if( isset( $data['title'])) $this->title = $data['title'];

		if( isset( $data['description'])) $this->description = $data['description'];

		if( isset( $data['svg'])) $this->svg = $data['svg'];

	}
	/**
	* Find a forum by its primary key
	* @param int The ID of the forum
	* @return Model_Forum The forum object
	*/
	public static function findById($id)
	{
		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);

		$sql = "SELECT * FROM " . Model_Widget::TABLE_NAME . " WHERE id=:id";
		$st = $conn->prepare($sql);
		$st->bindValue(":id", $id, PDO::PARAM_INT);
		$st->execute();
		$row = $st->fetch();
		$conn = null;

		if($row){
			$widget = new Model_Widget($row);
			return $widget;
		}
			
		return false;
	}


	public static function findAll($rows = 100000000, $order = "title DESC")
	{
		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);


		$sql = "SELECT * FROM ". Model_Widget::TABLE_NAME . " ORDER BY " . $order . " LIMIT :rows";

		$st = $conn->prepare($sql);
		$st->bindValue(":rows", $rows, PDO::PARAM_INT);
		$st->execute();


		$list = array();

		while( $row = $st->fetch())
		{
			$widget = new Model_Widget($row);
			$list[] = $widget;
			
		}

		$conn = null;

		return $list;
	}	

	public static function findAllByAttribute($attribute, $value, $type="INT")
	{
		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
		$sql = "SELECT * FROM ". Model_Widget::TABLE_NAME . " WHERE $attribute=:value";
		$st = $conn->prepare($sql);
		$st->bindValue(":value", $value, PDO::PARAM_INT);
		$st->execute();

		$list = array();

		while( $row = $st->fetch())
		{
			$widget = new Model_Widget($row);
			$list[] = $widget;
		}
		$conn = null;

		return $list;
	}

}


?>