<?php 
include('controller/NoteController.php');
$home = new NoteController();
$home->listPage();
?>