<?php 
include('NoteDB.php');
/**
* 
*/
class NoteManagement
{
	// lua chon noi luu du lieu
	function changeNoteStore($storeType){
		if ($storeType === “File”) {
			$this->note = new NoteFile();
			Return true;
		}

		if ($storeType === “DB”) {
			$this->note = new NoteDB();
			Return true;
		}
		$this->note = null;
		return false;
	}
	// Them moi note
	public function addNote($title, $content, $typeId)
	{
		$note = new NoteDB($title);
		$note->setTitle($title);
		$note->setContent($content);
		$note->setTypeId($typeId);
		$note->save();
	}

	// xoa note
	public function deleteNote($noteId)
	{
		$note = new NoteDB();
		$note->delete($noteId);
	}

	// update note
	public function updateNote($id, $title, $content)
	{
		$db = Database::connect();
		$sql = "UPDATE note SET title='$title', content='$content' WHERE id='$id'";
		// $stmt = $db->prepare($sql);
		$row = $db->exec($sql);
		return $row;
	}

	// lay toan bo danh sach note
	public function listNote()
	{
		$db = Database::connect();
		$sql = "SELECT note.id AS NoteId, note.title AS NoteTitle, note.content AS NoteContent, note_type.name AS NoteType FROM note INNER JOIN note_type WHERE note.type_id = note_type.id";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$row = $stmt->fetchAll(PDO::FETCH_OBJ);
		return $row;
	}

	// lay ve note
	public function getNote($noteId)
	{
		$db = Database::connect();
		$sql = "SELECT * FROM note WHERE id = '$noteId'";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$row = $stmt->fetchAll(PDO::FETCH_OBJ);
		return $row;
	}

	// lay ve danh sach note theo type
	public function listNoteType($noteType)
	{
		// print_r($noteType);
		$db = Database::connect();
		$sql = "SELECT note.title AS NoteTitle, note.content AS NoteContent, note_type.name AS NoteType FROM note INNER JOIN note_type WHERE note_type.id = '$noteType' AND note.type_id='$noteType'";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$row = $stmt->fetchAll(PDO::FETCH_OBJ);
		return $row;
	}


	// lay ten type
	function getNameType()
	{
		$db = Database::connect();
		$sql = "SELECT name FROM note_type";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$row = $stmt->fetchAll(PDO::FETCH_OBJ);
		return $row;
	}


	// lay ve id type tu ten type
	function getTypeId($name)
	{
		$db = Database::connect();
		$sql = "SELECT id FROM note_type WHERE name = '$name'";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$row = $stmt->fetchAll(PDO::FETCH_OBJ);
		if (isset($row)) {
			foreach ($row as $key => $value) {
				$result=$value->id;
				return $result;
			}
		} else return false;
	}

	// Chuc nang tim kiem theo tieu de theo tu khoa
	public function searchNotes($keyword)
	{
		$db = Database::connect();
		$sql = "SELECT note.title AS NoteTitle, note.content AS NoteContent, note_type.name AS NoteType FROM note INNER JOIN note_type WHERE note.title LIKE '%$keyword%' AND note.type_id=note_type.id";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$row = $stmt->fetchAll(PDO::FETCH_OBJ);
		return $row;
	}
	
}
?>