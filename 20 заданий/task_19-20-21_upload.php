<?php 

for ($i=0; $i < count($_FILES['image']['name']); $i++) {
	$picturename = upload_file($_FILES['image']['name'][$i], $_FILES['image']['tmp_name'][$i]);
	files_to_dbase($picturename);	
}

function upload_file($filename, $tmp_name) {
	$picture = pathinfo ($filename);
	$filename = uniqid() . "." . $picture['extension'];	
	move_uploaded_file($tmp_name, 'uploads/' . $filename);
	return $filename;
};

function files_to_dbase($filename) {
	$pdo = new PDO("mysql:host=localhost;dbname=my_project;", "root", "");
	$sql = "INSERT INTO task_19_20_21_pictures (`filename`) VALUES (:filename)";
	$statement = $pdo->prepare($sql);
	$statement->execute(['filename' => $filename]);
};

header('Location: task_19-20-21.php');
?>