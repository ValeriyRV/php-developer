<?php
session_start();

$name = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$pdo = new PDO("mysql:host=localhost;dbname=my_project;", "root", "");

$sql = "SELECT * FROM task_17_18_register_auth WHERE email=:email";
$statement = $pdo->prepare($sql);
$statement->execute(['email' => $email]);
$user = $statement->fetchAll(PDO::FETCH_ASSOC);


if(!empty($user)) {
	$_SESSION['error'] = "Этот эл адрес уже занят другим пользователем";
	//echo $_SESSION['error'];
	header('Location: task_17-18_reg_form.php');
	exit;
};

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO task_17_18_register_auth (`name`, `email`, `password`) VALUES (:name, :email, :password)";
$statement = $pdo->prepare($sql);
$statement->execute(['name' => $name, 'email' => $email, 'password' => $hashed_password]);
header('Location: task_17-18_reg_form.php');
?>