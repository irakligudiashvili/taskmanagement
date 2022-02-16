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

    <div>
        <form action="actions/updatePFP.php" method="POST" class="updatepfp-form">
            <label class="updatepfp-form-label">Select New Image</label>
            <input type="file" name="img" class="updatepfp-form-upload" required="required" id="img">
            <input type="submit" name="submit" value="Update Image" class="updatepfp-form-button">
        </form>
    </div>
    
</body>
</html>