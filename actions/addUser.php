<?php

include "../header.php";



$reg = new DB();
$reg->registerUser($_POST);

