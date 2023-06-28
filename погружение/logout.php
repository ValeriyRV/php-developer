<?php

session_start();
require "functions.php";

logout();

header('Location: page_login.php');

?>