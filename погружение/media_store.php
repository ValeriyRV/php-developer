<?php
session_start();
require "functions.php";

$id = $_SESSION['edit_user']['id'];
$old_image = $_SESSION['edit_user']['image'];
$filename = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];

media_store($id, $old_image, $filename, $tmp_name);

set_flash_message("success", "Изображение пользователя успешно изменено");
redirect_to("users.php");
?>