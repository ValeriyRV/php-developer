<?php

session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$pdo = new PDO("mysql:host=localhost;dbname=my_project;", "root", "");

$sql = "SELECT * FROM task_17_18_register_auth WHERE email=:email";
$statement = $pdo->prepare($sql);
$statement->execute(['email' => $email]);
$user = $statement->fetch(PDO::FETCH_ASSOC);

if(empty($user)) {
    $_SESSION['error_login'] = "Неверный логин или пароль";
    header('Location: task_17-18.php');
    exit;
};

if(!password_verify($password, $user['password'])) {
    $_SESSION['error_login'] = "Неверный логин или пароль";
    header('Location: task_17-18.php');
    exit;
};

$_SESSION['account_name'] = $user['name'];
header('Location: task_17-18_autorized.php');

?>