<?php 
include('model/NoteManagement.php');
include('LoadView.php');
/**
* 
*/
class NoteController extends LoadView
{
	public function addPage()
	{
		$note = new NoteManagement();
		$listType = $note->getNameType();
		$objectNote = array('nameType' => $listType );
		$this->LoadViews('addNote', $objectNote);
		
		$title = "";
		$content = "";
		$type = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (isset($_POST['title'])) {
				$title = $_POST['title'];
			}
			if (isset($_POST['content'])) {
				$content = $_POST['content'];
			}
			if (isset($_POST['type'])) {
				$type = $_POST['type'];
			}
		}
		
		$typeId = $note->getTypeId($type);
		$note->addNote($title, $content, $typeId);
	}
	public function listPage()
	{
		$note = new NoteManagement();
		$notetype = "All";
		$keyword = "";
		$action = '';
		$listNoteType=[];
		$detailNote=[];
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (isset($_POST['notetype'])) {
				$notetype = $_POST['notetype'];
			}
			if (isset($_POST['searchTitle'])) {
				$keyword = $_POST['searchTitle'];
			}
			if (isset($_POST['action'])) {
				$action = $_POST['action'];
			}
		}
		if ($notetype=="All") {
			$listNote = $note->listNote();
		} else {
			$listNote = $note->listNoteType($notetype);
		}
		if (!empty($keyword)) {
			$listNoteType = $note->searchNotes($keyword);
		}
		if ($action=='deleteNote') {
			$noteId = $_POST['noteIdDelete'];
			$note->deleteNote($noteId);
		}
		if ($action=='viewNote') {
			$noteId = $_POST['noteIdView'];
			$detailNote = $note->getNote($noteId);
		}
		if ($action=='editNote') {
			$idEdit = $_POST['IdEdit'];
			$titleEdit = $_POST['titleEdit'];
			$contentEdit = $_POST['contentEdit'];
			$row = $note->updateNote($idEdit, $titleEdit, $contentEdit);
		}
		$objectNote = array('listNote' => $listNote, 'listNoteType' => $listNoteType, 'detailNote' => $detailNote);
		$this->LoadViews('listNote', $objectNote);
	}
}
?>