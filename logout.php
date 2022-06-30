<?php

session_start();
session_unset();
session_destroy();

echo "<h1>Successfully Logout...</h1>";

header("location: index.php");


?>