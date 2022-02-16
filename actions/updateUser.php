<?php

include '../header.php';

$update = new DB();
$update->updateUser($_POST, $_POST['email']);

