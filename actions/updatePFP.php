<?php

include "../header.php";

$pfp = new DB();
$pfp->updatePFP($_POST['img'],$_SESSION["user"]["authKey"]);

header("location: ../profile.php");

?>