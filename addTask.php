<?php

include "header.php";

foreach($currentUser as $user){
    if($user["authority_id"] == 1){
      header("Location: 404.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body class="body-right">

    <div class="addtask-box">

        <form action="actions/addTask.php" method="POST" class="addtask-form">
            <label class="addtask-form-label">Task Name</label>
            <input type="text" required="required" class="addtask-form-input" name="taskName">
            <label class="addtask-form-label">Task Description</label>
            <textarea required="required" class="addtask-form-textarea" style="resize: none;" name="taskDesc"></textarea>
            <label class="addtask-form-label">Employee</label>
            <select class="addtask-form-select" name='taskEmployee'>
                <?php
foreach($currentUser as $user){
    if($user["authority_id"] == 3){
                foreach($usersIT as $user){
                    echo "<option class='addtask-form-option' value='$user[id]'>"."IT - ".$user['name']." ".$user['surname']."</option>";
                }
                foreach($usersDeveloper as $user){
                    echo "<option class='addtask-form-option' value='$user[id]'>"."Developer - ".$user['name']." ".$user['surname']."</option>";
                }
                foreach($usersMarketing as $user){
                    echo "<option class='addtask-form-option' value='$user[id]'>"."Marketing - ".$user['name']." ".$user['surname']."</option>";
                }
                foreach($usersAccounting as $user){
                    echo "<option class='addtask-form-option' value='$user[id]'>"."Accounting - ".$user['name']." ".$user['surname']."</option>";
                }
            }}

            foreach($currentUser as $user){
                if($user["authority_id"] == 2){
                    if($user['department_id'] == 1){
                        foreach($usersIT as $user){
                            echo "<option class='addtask-form-option' value='$user[id]'>".$user['name']." ".$user['surname']."</option>";
                        }
                    } else if ($user['department_id'] == 2){
                        foreach($usersDeveloper as $user){
                            echo "<option class='addtask-form-option' value='$user[id]'>".$user['name']." ".$user['surname']."</option>";
                        }
                    } else if ($user['department_id'] == 3){
                        foreach($usersMarketing as $user){
                            echo "<option class='addtask-form-option' value='$user[id]'>".$user['name']." ".$user['surname']."</option>";
                        }
                    } else if ($user['department_id'] == 4){
                        foreach($usersAccounting as $user){
                            echo "<option class='addtask-form-option' value='$user[id]'>".$user['name']." ".$user['surname']."</option>";
                        }
                    }
                }}
                ?>
            </select>
            <label class="addtask-form-label">Select Deadline<label><br>
            <input type="date" name="deadline" class="addtask-form-date" required="required"><br>
            <input type="hidden" value="<?php foreach($currentUser as $user){
                    echo $user['id'];
                }?>" name="assignedBy">

            <input type="submit" class="addtask-form-button" value="Add Task">

        </form>
    </div>
    
</body>
</html>