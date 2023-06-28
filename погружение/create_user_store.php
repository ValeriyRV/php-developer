<?php

session_start();
require "functions.php";

$name = $_POST['name'];
$job_title = $_POST['job_title'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$email = $_POST['email'];
$password = $_POST['pass'];
if($_POST['status'] == "Онлайн") {
	$status = "success";
} elseif($_POST['status'] == "Отошел") {
	$status = "warning";
} elseif($_POST['status'] == "Не беспокоить") {
	$status = "danger";
}
$filename = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];
$vk = $_POST['vk'];
$telegram = $_POST['telegram'];
$instagram = $_POST['instagram'];
$role = "user";

$user = get_user_by_email($email);

if(!empty($user)) {
	set_flash_message("danger", "Этот электронный адрес уже занят другим пользователем");
	redirect_to("create_user.php");	
	exit;	
}

create_user($name, $job_title, $phone, $address, $email, $password, $status, $filename, $tmp_name, $vk, $telegram, $instagram, $role);
set_flash_message("success", "Аккаунт создан успешно");
redirect_to("users.php");
?>