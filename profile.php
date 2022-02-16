<?php

    include "header.php";

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

    <div class="profile-body">

        <div class="profile-top">
            
            <div class="profile-img-div"><a href="updatePFP.php">
                <img src="<?php
                    foreach($currentUser as $user){
                        echo "images/".$user["img"];
                    }
                ?>" class="profile-img"></a>
            </div>

            <div class="profile-info">

                <div class="profile-info-name">
                    <h1><?php
                    foreach($currentUser as $user){
                        echo $user["name"]." ".$user["surname"];
                    }
                    ?></h1>
                </div>

                <div class="profile-info-authority">
                    <h1><?php
                    foreach($currentUser as $user){
                        if($user["authority_id"] == 1){
                            echo "Employee";
                        } else if ($user["authority_id"] == 2){
                            echo "Manager";
                        } else if ($user["authority_id"] == 3){
                            echo "Admin";
                        }
                    }
                    ?></h1>
                </div>

                <div class="profile-info-department">
                    <h1><?php
                    foreach($currentUser as $user){
                        if($user["department_id"] == 1){
                            echo "IT";
                        } else if ($user["department_id"] == 2){
                            echo "Developer";
                        } else if ($user["department_id"] == 3){
                            echo "Marketing";
                        } else if ($user["department_id"] == 4){
                            echo "Accounting";
                        }
                    }
                    ?></h1>
                </div>

            </div>

        </div>

        <div class="profile-bot">

            <div class="profile-bot-left">
                <p>Email</p>
                <p>Joined Company</p>
            </div>
            <div class="profile-bot-right">
                <p><?php
                    foreach($currentUser as $user){
                        echo $user["email"];
                    }
                    ?></p>
                <p><?php
                    foreach($currentUser as $user){
                        $date = $user["created_at"];
                        echo substr_replace($date,'',stripos("$date"," "));
                    }
                    ?></p>
            </div>

            <a href="changePass.php" class="profile-button-anchor"><button class="profile-button">Change Password</button></a>
            
        </div>

    </div>

</body>
</html>