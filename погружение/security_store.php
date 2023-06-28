<?php

session_start();
require "functions.php";

$id = $_SESSION['edit_user']['id'];
$email = $_POST['email'];
$password1 = $_POST['pass1'];
$password2 = $_POST['pass2'];

$user = get_user_by_email($email);

if($user['email'] != $email || $user['email'] == $email && $user['id'] == $id) {

	if($password1 != $password2) {
		set_flash_message("danger", "Пароли не совпадают");
		redirect_to("security.php?id=$id");
		exit;
	} 	
	security_store($id, $email, $password1);
	set_flash_message("success", "Данные пользователя успешно обновленыы");
	redirect_to("users.php");
}

else {
	set_flash_message("danger", "Этот электронный адрес уже занят другим пользователем");
	redirect_to("security.php?id=$id");	
	exit;	
}

?>