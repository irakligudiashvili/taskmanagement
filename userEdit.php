<?php

include "header.php";

foreach($currentUser as $user){
    if($user["authority_id"] == 1){
      header("Location: 404.php");
    }
}

if($_POST['action'] == 'view'){
    $userTask = new DB();
    $tasks = $userTask->getUserTask($_POST['email']);
    $name = new DB();
    if(count($tasks)){
    $getName = $name->getName($tasks[0]['assigned_by']);
    }

    

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="body-right">
    
<div class="tasks-box">
  
    <?php
if($_POST['action'] == 'view'){
    foreach($tasks as $task){
        if($task['completed'] == 0 ){
      ?>
      <div class="tasks-box">
          <div class="tasks-box-top">
              <div>
                <h1 class="tasks-box-top-name"><?php $taskName = new DB();
    $tName = $taskName->getTaskName($task['id']);
    echo $tName[0]['name']; ?></h1>
              </div>

              <div>
                <h1 class="tasks-box-top-assign">Assigned by: <?php echo $getName[0]['name'].' '.$getName[0]['surname'] ?></h1>
              </div>
          </div>

          <div class="tasks-box-mid">
            <div>
              <p class="tasks-box-mid-desc"><?php echo $task['description']?></p>
            </div>

            <div class="tasks-box-mid-deadline">
              <div>
                <p class="tasks-box-mid-deadline-title">Deadline</p>
              </div>
              <div>
                <p class="tasks-box-mid-deadline-date"><?php echo $task['deadline']?></p>
              </div>
            </div>
          </div>

      </div>
  <?php
        }
}
} else {

    ?>

<div class="adduser-box">
        <form class="adduser-form" action="actions/updateUser.php" method="POST">
            <label class="adduser-form-label">Name</label>
            <input class="adduser-form-input" type="text" name="name" required="required" value="<?php echo $_POST['name']?>">
            <label class="adduser-form-label">Surname</label>
            <input class="adduser-form-input" type="text" name="surname" required="required" value="<?php echo $_POST['surname']?>">
            <label class="adduser-form-label">Email</label>
            <input class="adduser-form-input" type="email" name="email" required="required" value="<?php echo $_POST['email']?>">
            <label class="adduser-form-label">Gender</label><br>
            <select class="adduser-form-select" name="gender">
            <?php
                if($_POST['gender'] == 'Female'){
                    ?>
                    <option name="female">Female</option>
                    <option name="male">Male</option>
                    <?php
                } else if ($_POST['gender'] == 'Male'){
                    ?>
                    <option name="male">Male</option>
                    <option name="female">Female</option>
                    <?php
                }
            ?>
            </select><br>
            <label class="adduser-form-label">Department</label><br>
            <select class="adduser-form-select" name="department">
                <?php
                foreach($currentUser as $user){
                    if($user["authority_id"] == 3){
                        if($_POST['department_id'] == 1){
                            ?>
                            <option name="it" value="1">IT</option>
                            <option name="developer" value="2">Developer</option>
                            <option name="marketing" value="3">Marketing</option>
                            <option name="accounting" value="4">Accounting</option>
                            <?php
                        } else if ($_POST['department_id'] == 2){
                            ?>
                            <option name="developer" value="2">Developer</option>
                            <option name="it" value="1">IT</option>
                            <option name="marketing" value="3">Marketing</option>
                            <option name="accounting" value="4">Accounting</option>
                            <?php
                        } else if ($_POST['department_id'] == 3){
                            ?>
                            <option name="marketing" value="3">Marketing</option>
                            <option name="it" value="1">IT</option>
                            <option name="developer" value="2">Developer</option>
                            <option name="accounting" value="4">Accounting</option>
                            <?php
                        } else if ($_POST['department_id'] == 4){
                            ?>
                            <option name="accounting" value="4">Accounting</option>
                            <option name="it" value="1">IT</option>
                            <option name="developer" value="2">Developer</option>
                            <option name="marketing" value="3">Marketing</option>
                            <?php
                        }
                    } else if($user["authority_id"] == 2){
                        if($user["department_id"] == 1){
                            ?>
                                <option name="it" value="1">IT</option>
                            <?php
                        } else if ($user["department_id"] == 2){
                            ?>
                                <option name="developer" value="2">Developer</option>
                            <?php
                        } else if ($user["department_id"] == 3){
                            ?>
                                <option name="marketing" value="3">Marketing</option>
                            <?php
                        } else if ($user["department_id"] == 4){
                            ?>
                                <option name="accounting" value="4">Accounting</option>
                            <?php
                        }
                    }

                }

                ?>
            </select><br>
            <label class="adduser-form-label">Rank</label><br>
            <select class="adduser-form-select" name="rank">
                <?php

                    foreach($currentUser as $user){
                        if($user["authority_id"] == 3){
                            if($_POST['authority'] == 1){
                                ?>
                                <option name="employee" value="1">Employee</option>
                                <option name="manager" value="2">Manager</option>
                                <option name="admin" value="3">Admin</option>
                                <?php
                            } else if ($_POST['authority'] == 2){
                                ?>
                                <option name="manager" value="2">Manager</option>
                                <option name="employee" value="1">Employee</option>
                                <option name="admin" value="3">Admin</option>
                                <?php
                            } else if ($_POST['authority'] == 3){
                                ?>
                                <option name="admin" value="3">Admin</option>
                                <option name="employee" value="1">Employee</option>
                                <option name="manager" value="2">Manager</option>
                                <?php
                            }
                        } else if($user["authority_id"] == 2){
                            if($_POST['authority'] == 3){
                                header("Location: department.php");
                            } else{
                            ?>
                                <option name="employee" value="1">Employee</option>
                                <option name="manager" value="2">Manager</option>
                            <?php
                            }
                          
                        }
                    }

                ?>
                
            </select><br>
            <label class="adduser-form-label">Select Image</label><br>
            <input type="file" name="img" class="adduser-form-input">

            <input type="submit" name="submit" value="Update User" class="adduser-form-button">
        </form>

    <?php
}
?>

    </div>

    <div>

    <div class="adduser-box">
        <form class="adduser-form" style="margin: 0px;" action="actions/resetPassword.php" method="POST">
            <input type="hidden" name="email" value="<?php echo $_POST['email']?>">
            <input type="submit" name="reset" value="Reset Password" class="adduser-form-button" style="margin: 0px">
        </form>
    </div>

    <div class="adduser-box">
        <form class="adduser-form" style="margin: 0px;" action="actions/deleteUser.php" method="POST">
            <input type="hidden" name="email" value="<?php echo $_POST['email']?>">
            <input type="submit" name="delete" value="Delete User" class="adduser-form-button-delete" style="margin: 0px">
        </form>
    </div>

    </div>


</body>
</html>