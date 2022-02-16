<?php

include "header.php";

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
    
    <div class="changepass-div">

    <form action="actions/changePass.php" method="POST" class="changepass-form">
        <label class="changepass-label">New Password:</label>
        <input type="password" name="password" required="required" class="changepass-input">
        <input type="submit" class="changepass-button">
    </form>

    </div>

</body>
</html>