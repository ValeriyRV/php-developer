<?php 
session_start();

$pdo = new PDO("mysql:host=localhost;dbname=my_project;", "root", "");

$sql = 'SELECT * FROM task_19_20_21_pictures WHERE id=:id';
$statement = $pdo->prepare($sql);
$statement->execute($_GET);
$file_to_delete = $statement->fetch(PDO::FETCH_ASSOC);	

if (file_exists("uploads/".$file_to_delete['filename'])) {
	unlink("uploads/".$file_to_delete['filename']);
	$sql = 'DELETE FROM task_19_20_21_pictures WHERE id=:id';
	$statement = $pdo->prepare($sql);
	$statement->execute($_GET);
	header('Location: task_19-20-21.php');
	exit;
}
else {
	$_SESSION['error'] = "Файл не найден";
	$sql = 'DELETE FROM task_19_20_21_pictures WHERE id=:id';
	$statement = $pdo->prepare($sql);
	$statement->execute($_GET);
	header('Location: task_19-20-21.php');
	exit;
};

?>