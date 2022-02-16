<?php

include "../header.php";

$loginUser = new DB();
$loginUser->loginUser($_POST);

header("location: ../index.php");