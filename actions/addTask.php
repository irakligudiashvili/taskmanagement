<?php

include "../header.php";

$department = new DB();
$uDepartment = $department->getDepartment($_POST['taskEmployee']);

$task = new DB();
$task->addTask($_POST, $uDepartment[0]['department_id']);

header("Location: ../addTask.php");