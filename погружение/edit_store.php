<?php
session_start();
require "functions.php";

$id = $_SESSION['edit_user']['id'];
$name = $_POST['name'];
$job_title = $_POST['job_title'];
$phone = $_POST['phone'];
$address = $_POST['address'];

edit_store($id, $name, $job_title, $phone, $address);

redirect_to("users.php");

?>