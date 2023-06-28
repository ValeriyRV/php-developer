<?php
session_start();
require "functions.php";
$id = $_SESSION['edit_user']['id'];
$status = $_POST['status'];
if($_POST['status'] == "Онлайн") {
	$status = "success";
} elseif($_POST['status'] == "Отошел") {
	$status = "warning";
} elseif($_POST['status'] == "Не беспокоить") {
	$status = "danger";
}
status_store($id, $status);
set_flash_message("success", "Статус пользователя успешно изменен");
redirect_to("users.php");
?>