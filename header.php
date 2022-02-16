<?php

include "classes/db.php";

session_start();


date_default_timezone_set("Asia/Tbilisi");




    $auth = new DB();
    $auth->checkUserAuth();

    if ($auth->checkUserAuth() != 1) {
        header("location: login.php");
    }


$user = new DB();
$currentUser = $user->getCurrentuser($_SESSION["user"]["authKey"]);

$users = new DB();
$usersIT = $users->getIT();
$usersDeveloper = $users->getDeveloper();
$usersMarketing = $users->getMarketing();
$usersAccounting = $users->getAccounting();

$tasks = new DB();
$tasksIT = $tasks->getCompletedTasksIT();
$tasksDeveloper = $tasks->getCompletedTasksDeveloper();
$tasksMarketing = $tasks->getCompletedTasksMarketing();
$tasksAccounting = $tasks->getCompletedTasksAccounting();


?>


<!DOCTYPE html>
<html lang="en">
<!--divinectorweb.com-->
<head>
	<meta charset="UTF-8">
	<title>Task Management System</title>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
</head>
<body class="<?php if($auth->checkUserAuth() == 1){echo "body-auth";} else {echo "body-noauth";}?>">
    <?php

    if ($auth->checkUserAuth() == 1){
        ?>
    
	<div class="body-left">
        <nav>
            <ul>
                <li class="logo"><img alt="" src="https://i.postimg.cc/WzkCM20g/logo1.png"></li>
                <li>
                    <a href="profile.php"><i class="fa fa-vcard-o"></i>   Profile</a>
                </li>
                <?php
                foreach($currentUser as $user){
                    if($user["authority_id"] != 1){
                        ?>
                            <li>
                                <a href="department.php"><i class="fa fa-users"></i>   Department</a>
                            </li>
                        <?php
                    }
                }

                ?>
                
                <li>
                    <a href="tasks.php"><i class="fa fa-suitcase"></i>   Tasks</a>
                </li>
                <?php
                foreach($currentUser as $user){
                    if($user["authority_id"] != 1){
                        ?>
                            <li>
                                <a href="completedTasks.php"><i class="fa fa-tasks"></i>   Completed Tasks</a>
                            </li>
                            <li>
                                <a href="addTask.php"><i class="fa fa-plus-square"></i>   Add Task</a>
                            </li>
                            <li>
                                <a href="addUser.php"><i class="fa fa-plus-circle"></i>   Add User</a>
                            </li>
                        <?php
                    }
                }
                ?>
                
                <li>
                    <a href="actions/logout.php"><i class="fa fa-sign-out"></i>   Logout</a>
                </li>
            </ul>
        </nav>
    </div>
    
    <?php
    }
    


    ?>



</body>
</html>

<?php



?>