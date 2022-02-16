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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body class="body-right">
    
    <div class="adduser-box">
        <form class="adduser-form" action="actions/addUser.php" method="POST">
            <label class="adduser-form-label">Name</label>
            <input class="adduser-form-input" type="text" name="name" required="required">
            <label class="adduser-form-label">Surname</label>
            <input class="adduser-form-input" type="text" name="surname" required="required">
            <label class="adduser-form-label">Email</label>
            <input class="adduser-form-input" type="email" name="email" required="required">
            <label class="adduser-form-label">Password</label>
            <input class="adduser-form-input" type="password" name="password" required="required">
            <label class="adduser-form-label">Gender</label><br>
            <select class="adduser-form-select" name="gender">
                <option name="male">Male</option>
                <option name="female">Female</option>
            </select><br>
            <label class="adduser-form-label">Department</label><br>
            <select class="adduser-form-select" name="department">
                <?php

                foreach($currentUser as $user){
                    if($user["authority_id"] == 3){
                        ?>
                            <option name="it" value="1">IT</option>
                            <option name="developer" value="2">Developer</option>
                            <option name="marketing" value="3">Marketing</option>
                            <option name="accounting" value="4">Accounting</option>
                        <?php
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
                            ?>
                                <option name="employee" value="1">Employee</option>
                                <option name="manager" value="2">Manager</option>
                                <option name="admin" value="3">Admin</option>
                            <?php
                        } else if($user["authority_id"] == 2){
                            ?>
                                <option name="employee" value="1">Employee</option>
                                <option name="manager" value="2">Manager</option>
                            <?php
                        }
                    }

                ?>
                
            </select><br>
            <label class="adduser-form-label">Select Image</label><br>
            <input type="file" name="img" class="adduser-form-input">

            <input type="submit" name="submit" value="Add User" class="adduser-form-button">
        </form>
    </div>

</body>
</html>