<?php

session_start();

unset($_SESSION['account_name']);

header('Location: task_17-18_autorized.php');


?>