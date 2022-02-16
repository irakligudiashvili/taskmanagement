<?php

include "../header.php";

$delete = new DB();
$delete->deleteUser($_POST['email']);

header("location: ../department.php");