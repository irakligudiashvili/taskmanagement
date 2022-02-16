<?php

include "../header.php";

$complete = new DB();
$complete->completeTask($_POST);

header("location: ../tasks.php");