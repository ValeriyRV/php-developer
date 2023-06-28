<?php
session_start();
require "functions.php";

$user = get_user_by_id($_GET['id']);

delete_user($user);

if($user['id'] == $_SESSION['logged_in_user']['id']) {
	logout();
} 

redirect_to("users.php");

?>