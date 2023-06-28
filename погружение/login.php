<?php
session_start();
require "functions.php";

$email = $_POST['email'];
$password = $_POST['password'];

if(!login($email, $password)) {
	set_flash_message("danger", "Не верный email или пароль");
	redirect_to("page_login.php");	
	exit;	
} else {
	
redirect_to("users.php");
}
?>