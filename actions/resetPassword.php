<?php

include '../header.php';



$reset = new DB();
$reset->resetPassword($_POST['email']);

header("Location: ../department.php");