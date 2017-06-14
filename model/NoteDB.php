<?php 
include ('config/database.php');
include('InterfaceNote.php');
/**
* 
*/
class NoteDB implements Note
{
	private $id;
	private $typeId;
	private $title;
	private $content;

	function __construct()
	{
		// $this->title = $title;
	}
	
	public function setId($id)
	{
		$this->id = $id;
	}
	public function getId()
	{
		return $this->$id;
	}
	public function setTitle($title)
	{
		$this->title = $title;
	}
	public function getTitle()
	{
		return $this->$title;
	}
	public function setContent($content)
	{
		$this->content = $content;
	}
	public function getContent()
	{
		return $this->$content;
	}
	public function setTypeId($typeId)
	{
		$this->typeId = $typeId;
	}
	public function getType()
	{
		return $this->$typeId;
	}

	public function save()
	{
		$db = Database::connect();
		$sql = "INSERT INTO note(`title`, `content`, `type_id`) VALUES ('$this->title', '$this->content', '$this->typeId')";
		if (!empty($this->title)) {
			if ($db->exec($sql)) {
				echo "Thêm dữ liệu thành công";
			} else {
				echo "Error: " . $sql;
			}
		}
		
		// return $row_count > 0;
	}

	public function delete($noteId)
	{
		$db = Database::connect();
		$sql = "DELETE FROM note WHERE id = '$noteId'";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		// return $row_count > 0;
	}
	
}

?>