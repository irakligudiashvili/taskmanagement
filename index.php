<?php

include "header.php";

if(!isset($_SESSION['user'])){

}else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body class="body-right">
    
    <?php



    if($auth->checkUserAuth() == 1){
        header("location: profile.php");
    }



    ?>

</body>
</html>

<?php

}

?>