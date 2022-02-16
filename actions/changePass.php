<?php

include "../header.php";

$change = new DB();
$changePass = $change->changePassword($_POST,$currentUser[0]['id']);

header("location: ../profile.php");