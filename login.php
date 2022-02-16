<?php



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="body-noauth">

<div>

     <div class="login-body">
            <img alt="" src="https://i.postimg.cc/WzkCM20g/logo1.png" class="form-img">
            <form action="actions/login.php" method="POST" class="login">

                <input type="email" placeholder="email" required="required" name="email">
                <input type="password" placeholder="password" required="required" name="password" style="margin-top: 2px; margin-bottom: 10px;">
                <input type="submit" name="login" value="Log In">

            </form>
        </div>

</div>
    
</body>
</html>