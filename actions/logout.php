<?php

include "../header.php";

$logout = new DB();
$logout->logout();

header("location: ../index.php");